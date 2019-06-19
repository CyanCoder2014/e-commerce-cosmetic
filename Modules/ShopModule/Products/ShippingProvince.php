<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;

class ShippingProvince extends Model
{
    protected $table='shipping_provinces';
    public $timestamps=false;
//    protected $fillable=['shipping_id' ,'province_id'];
}
