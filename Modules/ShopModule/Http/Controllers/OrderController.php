<?php

namespace Modules\ShopModule\Http\Controllers;


use App\Province;
use App\SectionModel;
use App\User;
use App\UserAddress;
use App\Utility;
use Modules\ShopModule\Products\Loading;
use Modules\ShopModule\Products\Shipping;
use Modules\ShopModule\Products\UserProduct;
use App\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Session;
use Modules\ShopModule\Products\InvoiceModel;
use Modules\ShopModule\Products\OrderItemModel;
use Modules\ShopModule\Products\OrderModel;
use Modules\ShopModule\Products\ProductCatModel;
use Modules\ShopModule\Products\ProductDetailGroupModel;
use Modules\ShopModule\Products\ProductDetailModel;
use Modules\ShopModule\Products\ProductModel;

class OrderController extends Controller
{


    private static $start_order_state=0;
    private static $editable_order_states=[0];
    private static $payment_stateNum=1;
    public static $payment_successNum=2;
    private static $payment_failNum=3;
    private static $tax=0;

    private static $invoice_start=0;

    public static $invoice_successPayment=1;
    private static $invoice_failPayment=2;
    private static $invoice_cancelPayment=3;

    private static $invoice_pending_status=1;
    private static $invoice_accepted_status=2;
    private static $invoice_preparing_status=3;
    private static $invoice_sending_status=4;
    private static $invoice_delivering_status=5;




    private $discount_items_num;
    private $discount_items_per;
    private $discount_price_num;
    private $discount_price_per;


    private  $MerchantID = '5134202';
    private    $Password = 'LxBiPtrDG';




    public function __construct()
    {
        $setting = Utility::where('type','factor')->first();
        if($setting){

            OrderController::$tax= $setting->tax;
            $this->discount_items_num= $setting->item;
            $this->discount_items_per= $setting->item_discount;
            $this->discount_price_num= $setting->price;
            $this->discount_price_per= $setting->price_discount;
            config( ['cart.tax' => $setting->tax] );
//            Cart::instance('default')->setTaxRate($setting->tax);
        }
        OrderController::$tax=config('cart.tax');
    }
    public function index(){
        $cart = json_decode(app('Modules\ShopModule\Http\Controllers\CartController')->getCart());
        return view('shopmodule::cart-new',compact('cart'));
    }

//    public function temp(){
//        $Refnumber = 2147483647;
//        $client = new \SoapClient('http://merchant.arianpal.com/WebService.asmx?wsdl');
//        $Price=10000;
//        $res = $client->VerifyPayment(array("MerchantID" => $this->MerchantID , "Password" =>$this->Password , "Price" =>$Price,"RefNum" =>$Refnumber ));
//        return var_dump($res);
//    }

    function TrackingCode($length=9, $chars=NULL)
    {
        if (NULL == $chars) {
            // makes a random alpha numeric string of a given lenth
            $chars = array_merge(range('A', 'Z'), range('a', 'z'),range(0, 9));
        }
        $out ='';
        for($c=0;$c < $length;$c++) {
            $out .= $chars[mt_rand(0,count($chars)-1)];
        }
        return strtoupper($out);
    }


    public function payment(Request $request){
        $Status = '';
        if(Session::get('invoice_id')){
            $invoice=InvoiceModel::find(Session::get('invoice_id'));
            $order=OrderModel::find($invoice->order_id);
            $order->state=OrderController::$payment_stateNum;
            $order->save();
            $user=User::find($order->user_id);
            // todo add delivery cost to invoice
            Cart::destroy();



            $Price = $invoice->final_amount; //Price By Toman

            $ReturnPath = route('shop.payment.verify',['id'=>$invoice->id]);

            $ResNumber = $invoice->tracking_code ;// Order Id In Your System

            $itemList='لیست محصولات:';
            foreach ($invoice->items as $item)
                $itemList .= $item->product->name.' - ';
            $Description =  $itemList;
            $Paymenter = $user->name;
            $Email = $user->email;
            $Mobile = $user->mobile;

            $client = new \SoapClient('http://merchant.arianpal.com/WebService.asmx?wsdl');

            $res = $client->RequestPayment(array("MerchantID" => $this->MerchantID , "Password" =>$this->Password , "Price" =>$Price, "ReturnPath" =>$ReturnPath, "ResNumber" =>$ResNumber, "Description" =>$Description, "Paymenter" =>$Paymenter, "Email" =>$Email, "Mobile" =>$Mobile));

            $PayPath = $res->RequestPaymentResult->PaymentPath;
            $Status = $res->RequestPaymentResult->ResultStatus;
            if($Status == 'Succeed')
                return redirect($PayPath);
            else
                return 'خطا در اتصال به درگاه';
        }
        return  print_r('پیش فاکتوری ثبت نشده');
    }

//    public function payment(){
//
//        if(Session::get('invoice_id'))
//        {
//
//            Cart::destroy();
//            session()->forget('order_id');
//            $invoice=InvoiceModel::find(Session::get('invoice_id'));
//            $order=OrderModel::find($invoice->order_id);
//            $order->state=OrderController::$payment_stateNum;
//            $order->save();
////            $order=OrderModel::find($invoice->order_id);
//            $user=User::find($order->user_id);
//
//
//
//            $Price = $invoice->final_amount; //Price By Toman
//
//            $ReturnPath = route('shop.payment.verify',['id'=>$invoice->id]);
//
//            $ResNumber = $invoice->id ;// Order Id In Your System
//            $Description = '';
//            $Paymenter = $user->name.' '.$user->family;
//            $Email = $user->email;
//            $user_profile= UserProfile::find($user->id);
//            $Mobile = $user_profile->mobile;
//
//            $client = new \SoapClient('http://merchant.arianpal.com/WebService.asmx?wsdl');
//
//            $res = $client->RequestPayment(array("MerchantID" => $this->MerchantID , "Password" =>$this->Password , "Price" =>$Price, "ReturnPath" =>$ReturnPath, "ResNumber" =>$ResNumber, "Description" =>$Description, "Paymenter" =>$Paymenter, "Email" =>$Email, "Mobile" =>$Mobile));
//
//            $PayPath = $res->RequestPaymentResult->PaymentPath;
//            $Status = $res->RequestPaymentResult->ResultStatus;
//
//            return view('shopmodule::payment_con',compact('Status'));
//        }
//        return 'error';
//
//    }

    public function payment_verify(Request $request,$id){



        if(isset($request->status) && $request->status == 100){

            $Status = $request->status;

            $Refnumber = $request->refnumber;

            $Resnumber = explode('-',$request->resnumber);
            $invoice=InvoiceModel::find($Resnumber[1]);

            $Price = $invoice->final_amount; //Price By Toman
//Your Order ID

            $client = new \SoapClient('http://merchant.arianpal.com/WebService.asmx?wsdl');

            $res = $client->VerifyPayment(array("MerchantID" => $this->MerchantID , "Password" =>$this->Password , "Price" =>$Price,"RefNum" =>$Refnumber ));


            Session::forget('invoice_id');

            $Status = $res->verifyPaymentResult->ResultStatus;
            $PayPrice = $res->verifyPaymentResult->PayementedPrice;
            if($Status == 'Success')// Your Peyment Code Only This Event
            {
                $order=OrderModel::find($invoice->order_id);
                $order->state   =  OrderController::$payment_successNum;
                $invoice->payment_state =   OrderController::$invoice_successPayment;
                $invoice->state =   OrderController::$invoice_pending_status;;
                $invoice->ref_num =   $Refnumber;
                $invoice->final_dis =   $Status;
                $order->save();
                $invoice->save();
                $items=OrderItemModel::where('order_id',$invoice->order_id)->get();
                foreach ($items as $item)
                {
                    $new = new UserProduct;
                    $new->product_id=$item->product_id;
                    $new->user_id=$invoice->user_id;
                    $new->save();
                }

                return view('shopmodule::payment_verify',compact('Status','Refnumber','PayPrice'));

            }
            else{
                $order=OrderModel::find($invoice->order_id);
                $order->state   =  OrderController::$payment_failNum;
                $invoice->payment_state =   OrderController::$invoice_failPayment;
                $invoice->ref_num =   $Refnumber;
                $invoice->final_dis =   $Status;
                $order->save();
                $invoice->save();
                return view('shopmodule::payment_verify',compact('Status','Refnumber','Resnumber'));
            }
        }
        else
        {
            if(Session::get('invoice_id'))
            {
                $invoice = InvoiceModel::find(Session::get('invoice_id'));
                $invoice->state = OrderController::$invoice_cancelPayment;
                $invoice->save();
                Session::forget('invoice_id');
            }
            return view('shopmodule::payment_verify');
        }
    }

    public function checkout_in(Request $request)
    {
        $count=Cart::count();
        if($count > 0 ) {
            if (Auth::user()) {

                if(Session::get('order_id')){
                    $order = OrderModel::find(Session::get('order_id'));
                    if(in_array($order->state ,OrderController::$editable_order_states)){
                        OrderItemModel::where('order_id',$order->id)->delete();
                        $order->user_id = Auth::id();
                        $order->state = OrderController::$start_order_state;
                        $order->amount = Cart::subtotal();
                        $order->save();
                        $cart = Cart::content();
                        $total = 0;
                        foreach ($cart as $item) {
                            $order_item = new OrderItemModel;
                            $order_item->order_id = $order->id;
                            $order_item->product_id = $item->id;
                            $product = ProductModel::find($item->id);
                            $order_item->discount = $product->discount;
                            $order_item->number = $item->qty;
                            $order_item->amount = $item->subtotal;
                            $total += $item->subtotal;
                            $order_item->save();
                        }

                    }
                }

                if (!isset($order) || !in_array($order->state ,OrderController::$editable_order_states)){
                    $order = new OrderModel;
                    $order->user_id = Auth::id();
                    $order->state = OrderController::$start_order_state;
                    $order->amount = Cart::subtotal();
                    $order->save();
                    $cart = Cart::content();
                    $total = 0;
                    foreach ($cart as $item) {
                        $order_item = new OrderItemModel;
                        $order_item->order_id = $order->id;
                        $order_item->product_id = $item->id;
                        $product = ProductModel::find($item->id);
                        $order_item->discount = $product->discount;
                        $order_item->number = $item->qty;
                        $order_item->amount = $item->subtotal;
                        $total += $item->subtotal;
                        $order_item->save();
                    }

                }

                $addresses = UserAddress::where('user_id',Auth::id())->get();
                $provinces=Province::all();
                $cart = json_decode($this->getOrder($order->id));
                $order->amount = $cart->subtotal;
                $order->discount = $cart->discount;
                $order->discount_type = $cart->discount_type;
                $order->save();
                $request->session()->put('order_id', $order->id);


                return view('shopmodule::checkout-new', compact('cart','addresses','provinces'));
            }
            else{
                return redirect()->route('login')->with('message', "برای ورود به این قسمت ابتدا باید وارد شوید")
                    ->withCookie('redirect_to',$request->url(),15)->with('redirect_to',$request->url());

            }
        }
        else
            return redirect()->back()->with('message','محصولی داخل سبد خرید شما وجود ندارد ');

    }
    public function shipping(Request $request)
    {


        if(Session::get('order_id')) {
            if (Auth::user()) {

                $address_record = UserAddress::findOrFail($request->address);
                $city_id = $address_record->city_id;
                $province_id = $address_record->city_id;
                $address=[];
                $address['city']=$address_record->city->name;
                $address['province']=$address_record->province->name;
                $address['name']=$address_record->firstname.' '.$address_record->lastname;
                $address['phone']=$address_record->phone;
                $address['postcode']=$address_record->postcode;
                ///////// invoice //////////////
                $order= OrderModel::find(Session::get('order_id'));
                $order_items = $order->items;
                $this->updateQuantityOrder($order_items);




                $order->detail = $request->detail;

                $order->address = $address;
                $order->save();
                foreach ($order_items as $item)
                    $item->product->setlock($item->number,$order->id);



                $cart = json_decode($this->getOrder($order->id));



                return view('shopmodule::checkout-shipping', compact('cart', 'order_items','address_record'));
            }
            else
                return redirect()->route('login')->with('message', "برای ورود به این قسمت ابتدا باید وارد شوید")
                    ->withCookie('redirect_to',$request->url(),15)->with('redirect_to',$request->url());


        }
        else
            return redirect()->back()->with('message','محصولی داخل سبد خرید شما وجود ندارد ');



    }
    public function comfirmation(Request $request)
    {


        if(Session::get('order_id')) {
            if (Auth::user()) {
                $invoice=null;
                if(Session::get('invoice_id') && InvoiceModel::find(Session::get('invoice_id'))->state == OrderController::$invoice_start) {
                    $invoice = InvoiceModel::find(Session::get('invoice_id'));
//                    if ($invoice->state != OrderController::$invoice_start)
//                        $invoice = new InvoiceModel();

                }
                else
                    $invoice = new InvoiceModel();



                $order= OrderModel::find(Session::get('order_id'));
                $order_items = $order->items;
                $delivery_cost = 0;
                $loading=[];
                foreach ($order_items as $item){
                    if (isset($request->shipping[$item->id]))
                    {
                        $shipping= Shipping::findOrFail($request->shipping[$item->id]);
                        if(!isset($loading[$shipping->id])){
                            $loading[$shipping->id]=[];
                            $delivery_cost+= $shipping->base_price;
                        }
                        array_push($loading[$shipping->id],$item->id);
                        $price = $shipping->getProductPrice($item->product);
                        if($price)
                            $delivery_cost += $price;
                        else
                            return back()->with('message','خطا در انتخاب سیستم حمل و نقل');


                    }
                    else
                        return back()->with('message','سیستم های حمل و نقل به درستی تعریف نشده');
                }



                $invoice->order_id = $order->id;
                $invoice->state = OrderController::$invoice_start;
                $invoice->payment_status = OrderController::$invoice_start;
                $invoice->detail = $request->detail;
                $invoice->discount_type = $order->discount_type;
                $invoice->tax = $order->amount* OrderController::$tax/100;
                $invoice->deliver_cost = $delivery_cost;
                $invoice->address = $order->address;
                $invoice->final_amount = $invoice->deliver_cost + $order->amount + $invoice->tax;
                $invoice->user_id = Auth::id();
                $invoice->save();
                foreach ($loading as $shipping_id => $items)
                {
                    $new = new Loading();
                    $new->shipping_id = $shipping_id ;
                    $new->invoice_id = $invoice->id ;
                    $new->items = $items ;
                    $new->status = AdminInvoiceController::$loading_start_status;
                    $new->save();


                }

                $invoice->tracking_code = $this->TrackingCode() . '-' . $invoice->id;
                InvoiceModel::where('id', $invoice->id)->update(['tracking_code' => $invoice->tracking_code]);
                $request->session()->put('invoice_id', $invoice->id);

                $trackingcode =$invoice->tracking_code;
                $cart = json_decode($this->getOrder($order->id));



                return view('shopmodule::checkout-confirmation', compact('cart', 'order_items','trackingcode','invoice'));
            }
            else
                return redirect()->route('login')->with('message', "برای ورود به این قسمت ابتدا باید وارد شوید")
                    ->withCookie('redirect_to',$request->url(),15)->with('redirect_to',$request->url());


        }
        else
            return redirect()->back()->with('message','محصولی داخل سبد خرید شما وجود ندارد ');



    }
//    public function addOrder(Request $request)
//    {
//
//
//
//            if(Session::get('order_id'))
//                $this->updateOrderCart($request);
//            elseif(Auth::user()) {
//                $order=new OrderModel;
//                $order->user_id=Auth::id();
//                $order->deliver_method=$request->deliver_method;
//                $order->detail=$request->detail;
//                $cart = Cart::content();
//                foreach ($cart as $item) {
//                    $order_item= new OrderItemModel;
//                    $order_item->order_id=$order->id;
//                    $order_item->product_id=$item->id;
//                    $order_item->discount=$item->name['discount'];
//                    $order_item->number=$item->qty;
//                    $order_item->amount=$item->subtotal;
//                    $order_item->save();
//                }
//
//                $order->amount =$cart->total;
//                $order->save();
//                Session('order_id',$order->id);
//
//            }
//            else
//                ; //todo go to login page
//
//
//    }
//    public static function restore(){
//        if(Session::get('order_id') && Cart::count() == 0){
//            $order_id=Session::get('order_id');
//            $order=OrderItemModel::where('order_id',$order_id);
//            $cart= new CartController;
//            foreach ($order as $item){
//                $cart->addCart($item->product_id,$item->number);
//            }
//        }
//    }
    public function show()
    {



        // todo show the order


    }
    public function history(Request $request)
    {
        if(Auth::user()) {
            $invoices = InvoiceModel::where('user_id',Auth::id())->get();
            return view('shopmodule::invoice-history',compact('invoices'));
        }
        else{

            return redirect()->route('login')->with('message', "برای ورود به این قسمت ابتدا باید وارد شوید")
                ->with('redirect_to',$request->url());
        }

    }
    public function updateOrderCart(Request $request)
    {
        $id= Session::get('order_id');
        if($id) {
            $order = OrderModel::find($id);
            if ($order->user_id == Auth::id() && in_array($order->state ,OrderController::$editable_order_states)) {
                $order->deliver_method=$request->deliver_method;
                $order->detail=$request->detail;
            }
        }

    }
    public function updateOrderCartItem($id)
    {
        if($id) {
            $order = OrderModel::find($id);
            if ($order->user_id == Auth::id() && $order->state == $this->start_state) {
                $cart = Cart::content();
                OrderItemModel::where('order_id', $order->id)->delete();
                foreach ($cart as $item) {
                    $order_item = new OrderItemModel;
                    $order_item->order_id = $order->id;
                    $order_item->product_id = $item->id;
                    $order_item->discount = $item->name['discount'];
                    $order_item->number = $item->qty;
                    $order_item->amount = $item->subtotal;
                    $order_item->save();

                    $order->amount = $cart->total;


                }
            }
        }

    }
    public function deleteOrder($id)
    {
        OrderModel::destroy($id);
        OrderItemModel::where('order_id', $id)->delete();

    }

    public static function addItem($order_id,$product,$qty,$discount,$price){
        $order = OrderModel::find($order_id);
        if($qty > $product->quantity )
            return false;
        if(isset($order->id) && $order->user_id == Auth::id() && in_array($order->state ,OrderController::$editable_order_states)){
            $newItem= New OrderItemModel();
            $newItem->product_id =$product->id;
            $newItem->order_id =$order->id;
            $newItem->number =$qty;
            $newItem->discount =$discount;
            $newItem->amount =$price*$qty;
            $newItem->save();

            return true;
        }
        return false;
    }

    public static function UpdateItem($order_id,$product_id,$qty){
        $order = OrderModel::find($order_id);
        if(isset($order->id) && $order->user_id == Auth::id() && in_array($order->state ,OrderController::$editable_order_states)){
            $updateItem= OrderItemModel::where('order_id',$order_id)->where('product_id',$product_id)->first();
            $updateItem->amount =($updateItem->amount/$updateItem->number*$qty);
            $updateItem->number =$qty;
            $updateItem->save();
            return true;
        }
        return false;
    }

    public static function deleteItem($order_id,$product_id){
        $order = OrderModel::find($order_id);
        if(isset($order->id) && $order->user_id == Auth::id() && in_array($order->state ,OrderController::$editable_order_states)){
            OrderItemModel::where('order_id',$order_id)->where('product_id',$product_id)->delete();
            return true;
        }
        return false;
    }
    public static function UpdateAmount($order_id){
        $items=OrderItemModel::where('order_id',$order_id)->get();
        $amount=0;
        foreach ($items as $item)
            $amount+=$item->amount;
        OrderModel::where('id',$order_id)->update(['amount' => $amount]);
    }

    public function updateQuantityOrder($order_items){ // this function update order if quantity of item change
        foreach($order_items as $item){
            $product= ProductModel::find($item->product_id);
            if($product->quantity == 0) // if not available delete it from cart
                $item->delete();
            elseif ($product->quantity <  $item->number) // if with less quantity available update it to new quantity
            {
                $price_unit = $item->amount / $item->number;
                $item->number = $product->quantity;
                $item->amount = ($product->price - ($product->price*$product->discount/100)) * $product->quantity;
                $item->save();

            }

        }

    }

    public function getOrder($id){ // return order items and price detail
        $response=array();
        $order_items = OrderItemModel::where('order_id',$id)->get();
        $this->updateQuantityOrder($order_items);
        $discount=0;
        $total=0;
        $item_count=0;
        foreach ($order_items as $key => $item){
            $response['item'][$key]=[];
            $response['item'][$key]['name']=[];
            $product= ProductModel::find($item->product_id);
            $response['item'][$key]['name']['name']=$product->name;
            $response['item'][$key]['qty']=$item->number;
            $response['item'][$key]['subtotal']=$item->amount;
            $response['item'][$key]['price']=$item->amount/$item->number;
            if(isset($product->image[0]))
                $response['item'][$key]['name']['pic']=asset($product->image[0]);
            $item_count +=$item->number;
            $total += $item->amount;
        }
        $response['discount_type']="";
        $response['subtotal']=$total;
        if($total >=  $this->discount_price_num){
            $total = $total - ($total*$this->discount_price_per/100);
            $discount += $total*$this->discount_price_per/100;
            $response['discount_type']="amount";
        }
        elseif($item_count >= $this->discount_items_num){
            $total = $total - ($total*$this->discount_items_per/100);
            $discount += $total*$this->discount_items_per/100;
            $response['discount_type']="quantity";
        }
        $tax =$total*OrderController::$tax/100;
        $total += $tax;
        $response['discount']=$discount;
        $response['tax']=$tax;
        $response['total']=$total;


        return json_encode($response);

    }











}
