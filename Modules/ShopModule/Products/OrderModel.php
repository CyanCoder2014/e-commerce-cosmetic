<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;

class OrderModel extends Model
{

    protected $table='order';
//    public $timestamps=false;
    protected $fillable = ['user_id','detail','amount','deliver_method','state','date','address'];
    protected $casts = [ 'amount' => 'float','address'=>'array'];

    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
    public function items(){
        return $this->hasMany('Modules\ShopModule\Products\OrderItemModel','order_id','id');
    }


}
