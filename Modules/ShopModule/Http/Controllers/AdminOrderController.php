<?php

namespace Modules\ShopModule\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use Illuminate\Http\Request;
use Modules\ShopModule\Products\OrderModel;


class AdminOrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('UserMiddleware');
    }

    public function orders_list(){
        $orders= OrderModel::paginate(15);
        return view('shopmodule::admin.orders.orderlist',compact('orders'));


    }
    public function order_details($id){
        $order= OrderModel::find($id);
        return view('shopmodule::admin.orders.order',compact('order'));


    }

}
