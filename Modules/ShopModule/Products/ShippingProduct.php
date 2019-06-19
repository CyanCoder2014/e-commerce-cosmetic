<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;

class ShippingProduct extends Model
{
 public $timestamps= false;

 public function shipping(){
     return $this->belongsTo('Modules\ShopModule\Products\Shipping','shipping_id');
 }
}
