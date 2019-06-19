<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InvoiceModel extends Model
{

    protected $table='invoice';
//    public $timestamps=false;
    protected $casts=['address'=>'array'];
    protected $fillable = ['id','user_id','order_id','detail','final_dis','discount_type','tax','state','deliver_cost','final_amount','tracking_code','date' ];
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function items(){
        return $this->hasMany('Modules\ShopModule\Products\OrderItemModel','order_id','order_id');
    }
    public function order(){
        return $this->belongsTo('Modules\ShopModule\Products\OrderModel','order_id');
    }
    public function products(){
        return $this->items()->product();
//        return $this->hasManyThrough('Modules\ShopModule\Products\ProductModel','Modules\ShopModule\Products\OrderItemModel','producta_id','id','order_id');
        return DB::table('order_item')->select('product.*')->where('order_id',$this->order_id)->join('product','product.id','order_item.product_id')->get();
//        select `product`.*, `order_item`.`product_id` from `product` inner join `order_item` on `order_item`.`product_id` = `product`.`id` where `order_item`.`order_id` = 6
    }
    public function loadings(){
        return $this->hasMany('Modules\ShopModule\Products\Loading','invoice_id','id');
    }

    public function laratablesCreatedAt()
    {
        return to_jalali_date($this->created_at);
    }
    public function laratablesState()
    {
        if($this->state == 0)
           return '<span class="label bg-danger">پرداخت نشده</span>';
        elseif($this->state == 1)
            return '<span class="label bg-success">پرداخت شده</span>';
        else
            return '<span class="label bg-warning">نامعلوم</span>';

    }
    public function laratablesFinalAmount()
    {
        return number_format($this->final_amount).' تومان';
    }
    public static function laratablesCustomAction($invoice)
    {
        return view('shopmodule::admin.invoices.action', compact('invoice'))->render();
    }


}
