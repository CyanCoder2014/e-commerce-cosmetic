<?php

namespace Modules\ShopModule\Http\Controllers;


use App\SectionModel;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Modules\ShopModule\Products\ProductCatModel;
use Modules\ShopModule\Products\ProductDetailGroupModel;
use Modules\ShopModule\Products\ProductDetailModel;
use Modules\ShopModule\Products\ProductModel;

class CartController extends Controller
{

    private $tax;
    private $discount_items_num;
    private $discount_items_per;
    private $discount_price_num;
    private $discount_price_per;

    public function __construct()
    {
//        $this->post = $content;
//        if (Auth::check()){
//            $this->middleware('ProfileComplete');
//    }
        $setting = Utility::where('type','factor')->first();
        if($setting){

            $this->tax= $setting->tax;
            $this->discount_items_num= $setting->item;
            $this->discount_items_per= $setting->item_discount;
            $this->discount_price_num= $setting->price;
            $this->discount_price_per= $setting->price_discount;
            config( ['cart.tax' => $setting->tax] );
//            Cart::instance('default')->setTaxRate($setting->tax);
        }

    }


    public function addCart(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'id' => 'required',
        ]);
        if($validation->fails())
        {
            $errors = $validation->errors();

            return $errors->toJson();
        }
        $id=$request->input('id');
        if($request->input('qty'))
            $qty=$request->input('qty');
        else
            $qty=1;

            $product= ProductModel::find($id);
            if($product && $product->quantity >= $qty ){
                if(isset($product->image[0]))
                    $pic=$product->image[0];
                else
                    $pic='';

                    foreach(Cart::content() as $row)
                        if($row->id == $product->id) // if exist in cart before then update it
                        {
                            $request->replace(['qty' => $row->qty + $qty]);
                            $request->merge(['rowid' => $row->rowId]);
                            return $this->updateCart($request);

                        }

                Cart::add($product->id,['name'=>$product->name,'pic'=>$pic,'discount' =>$product->price*$product->discount/100,'link' => route('shop.show',['id' => '243-'.$product->id.'-'.str_replace(' ','-',$product->name)])],$qty,$product->price - ($product->price*$product->discount/100));


            }
            else {
                if(!$product)
                    return $this->getCart('محصول وجود ندارد');
                else
                    return $this->getCart('محصول به اندازه درخواست شما وجود ندارد');
            }
//        }


        return $this->getCart();

    }

    public function updateCart(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'rowid' => 'required',
            'qty' => 'required',
        ]);

        if($validation->fails())
        {
            $errors = $validation->errors();

            return $errors->toJson();
        }
        $cart=Cart::get($request->rowid);
        if(!$cart)
            return json_encode('شماره کارت غلط است');
        $product_id= $cart->id;
        $product = ProductModel::find($product_id);
        if($product->quantity == 0)
            return $this->deleteCart($request);
        if ($request->input('qty') > $product->quantity)
            return $this->getCart('محصول به اندازه درخواست شما وجود ندارد');

        Cart::update($request->rowid, $request->input('qty'));

        return $this->getCart();


    }
    public function updateCartPage(Request $request)
    {
        $this->validation($request,[
            'rowid' => 'required',
            'qty' => 'required',
        ]);
        $cart=Cart::get($request->input('rowid'));
        $product = ProductModel::find($cart->id);
        if ($request->input('qty') > $product->quantity)
            return back()->with('message','محصول به اندازه درخواست شما وجود ندارد');

        Cart::update($request->input('rowid'), $request->input('qty'));

        return redirect()->back();


    }
    public function deleteCart(Request $request)
    {
        $rowId=$request->input('rowid');
        Cart::remove($rowId);
        return $this->getCart();



    }
    public function updateQuantityCart(){
        foreach(Cart::content() as $row){
            $product= ProductModel::find($row->id);
            if($product->quantity == 0) // if not available delete it from cart
            {
                $order_open=true;
                if(Session::get('order_id'))
                {
                    $order_open=OrderController::deleteItem(Session::get('order_id'),$product->id);
                    OrderController::UpdateAmount(Session::get('order_id'));
                }
                if($order_open)
                    Cart::remove($row->rowId);
            }
            elseif ($product->quantity <  $row->qty) // if with less quantity available update it to new quantity
            {
                $order_open=true;
                if(Session::get('order_id'))
                {
                    $order_open=OrderController::UpdateItem(Session::get('order_id'),$product->id,$product->quantity);
                    OrderController::UpdateAmount(Session::get('order_id'));
                }
                if($order_open)
                    Cart::update($row->rowId, $product->quantity);

            }

        }

    }
    public function getCart($message = false){
        $this->updateQuantityCart();
        $response=array();
        $response['item']= Cart::content();
        $discount=0;
        $total=0;
        foreach ($response['item'] as $key => $item){
//            $discount+=$item->name['discount'] * $item->qty;
            $response['item'][$key]->name['pic']=asset($item->name['pic']);
            $total += $item->price * $item->qty;
        }
        $response['subtotal']=number_format($total);
        if($total >=  $this->discount_price_num){
            $total = $total - ($total*$this->discount_price_per/100);
            $discount += $total*$this->discount_price_per/100;
        }
        elseif(Cart::count() >= $this->discount_items_num){
            $total = $total - ($total*$this->discount_items_per/100);
            $discount += $total*$this->discount_items_per/100;
        }
        $tax =$total*$this->tax/100;
        $total += $tax;
        $response['discount']=number_format($discount);
        $response['tax']=number_format($tax);
        $response['total']=number_format($total);
        if ($message)
            $response['message']= $message;

        return json_encode($response);

//       return Session::get('order_id');

    }











}
