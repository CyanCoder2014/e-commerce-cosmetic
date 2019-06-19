<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;

class ProductLock extends Model
{
    protected $fillable=['product_id' ,
        'quantity' ,
        'order_id' ,
        'expired_at' ];
    public $timestamps=false;
    public function order(){
        return $this->belongsTo('Modules\ShopModule\Products\OrderModel','order_id');
    }
}
