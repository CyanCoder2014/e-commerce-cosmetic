<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;

class OrderItemModel extends Model
{

    protected $table='order_item';
    public $timestamps=false;
    protected $fillable = ['id','order_id','product_id','number','discount','amount'];

    public function product(){
        return $this->belongsTo('Modules\ShopModule\Products\ProductModel','product_id');
    }
}
