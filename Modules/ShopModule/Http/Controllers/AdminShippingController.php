<?php

namespace Modules\ShopModule\Http\Controllers;

use App\Http\Controllers\Controller;
use Modules\ShopModule\Products\Shipping;
use Illuminate\Http\Request;
use Modules\ShopModule\Products\OrderModel;
use Modules\ShopModule\Products\ShippingCity;
use Modules\ShopModule\Products\ShippingProvince;
use Modules\ShopModule\Products\ShippingSize;

class AdminShippingController extends Controller
{
    public function find(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = Shipping::search($term)->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
        }

        return \Response::json($formatted_tags);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = Shipping::orderby('id','desc')->paginate(20);
        return view('shopmodule::admin.shipping.shippinglist',compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ' required|unique:shippings',
            'base_price' => ' required',
            'unit_price_weight' => ' required'
        ]);
//        return json_encode($request->province_list);
        $shipping = new Shipping();
        $shipping->name = $request->name;
        $shipping->base_price = $request->base_price;
        $shipping->unit_price_weight = $request->unit_price_weight;
        $shipping->save();

        if (isset($request->province_list))
        foreach ($request->province_list as $province){
//            ShippingProvince::create([
//                'shipping_id' => $shipping->id,
//                'province_id' => $province,
//            ]);
            $pr = new ShippingProvince();
            $pr->shipping_id =$shipping->id;
            $pr->province_id =$province;
            $pr->save();

        }
        if (isset($request->city_list))
            foreach ($request->city_list as $city){
                $pr = new ShippingCity();
                $pr->shipping_id =$shipping->id;
                $pr->city_id =$city;
                $pr->save();

            }
        if (isset($request->price))
            foreach ($request->price as $key => $price){
                $size = new ShippingSize();
                $size->shipping_id = $shipping->id;
                $size->price = $price;
                $size->from_length = $request->input('from_length.'.$key);
                $size->to_length = $request->input('to_length.'.$key);
                $size->from_width = $request->input('from_width.'.$key);
                $size->to_width = $request->input('to_width.'.$key);
                $size->from_height = $request->input('from_height.'.$key);
                $size->to_height = $request->input('to_height.'.$key);
                $size->save();
    //            ShippingSize::create([
    //                'shipping_id' => $shipping->id,
    //                'price' => $price,
    //                'from_length' => $request->input('from_length.'.$key),
    //                'to_length' => $request->input('to_length.'.$key),
    //                'from_width' => $request->input('from_width.'.$key),
    //                'to_width' => $request->input('to_width.'.$key),
    //                'from_height' => $request->input('from_height.'.$key),
    //                'to_height' => $request->input('to_height.'.$key),
    //
    //            ]);
            }
        else{
            $size = new ShippingSize();
            $size->shipping_id = $shipping->id;
            $size->price = 0;
            $size->save();
        }
        return back()->with('message','حمل نقل جدید وارد سیستم شد');

    }

    /**
     * Display the specified resource.
     *
     * @param  \Modules\ShopModule\Products\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Modules\ShopModule\Products\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Modules\ShopModule\Products\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {   $validation=[
            'name' => ' required|unique:shippings',
            'base_price' => ' required',
            'unit_price_weight' => ' required'
        ];
        if($shipping->name != $request->name)
            $validation['name']  = 'required|unique:shippings';
        else
            $validation['name']  = 'required';
        $this->validate($request,$validation);
//        return json_encode($request->province_list);
        $shipping->name = $request->name;
        $shipping->base_price = $request->base_price;
        $shipping->unit_price_weight = $request->unit_price_weight;
        $shipping->save();

        ShippingProvince::where('shipping_id',$shipping->id)->delete();
        if (isset($request->province_list))
            foreach ($request->province_list as $province){
                $pr = new ShippingProvince();
                $pr->shipping_id =$shipping->id;
                $pr->province_id =$province;
                $pr->save();

            }
        ShippingCity::where('shipping_id',$shipping->id)->delete();
        if (isset($request->city_list))
            foreach ($request->city_list as $city){
                $pr = new ShippingCity();
                $pr->shipping_id =$shipping->id;
                $pr->city_id =$city;
                $pr->save();

            }
        ShippingSize::where('shipping_id',$shipping->id)->delete();
        if (isset($request->price))
            foreach ($request->price as $key => $price) {
                $size = new ShippingSize();
                $size->shipping_id = $shipping->id;
                $size->price = $price;
                $size->from_length = $request->input('from_length.' . $key);
                $size->to_length = $request->input('to_length.' . $key);
                $size->from_width = $request->input('from_width.' . $key);
                $size->to_width = $request->input('to_width.' . $key);
                $size->from_height = $request->input('from_height.' . $key);
                $size->to_height = $request->input('to_height.' . $key);
                $size->save();
            }
        else{
            $size = new ShippingSize();
            $size->shipping_id = $shipping->id;
            $size->price = 0;
            $size->save();
        }

        return back()->with('message','حمل نقل به روز رسانی شد');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Modules\ShopModule\Products\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        return 'hello';
        $shipping->delete();
        return back()->with('message','حمل و نق مورد نظر حذف شد');
    }
    public function estimatePrice (OrderModel $order,$id){

    }
}
