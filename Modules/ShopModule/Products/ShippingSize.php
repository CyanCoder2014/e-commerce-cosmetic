<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;

class ShippingSize extends Model
{
    protected $table='shipping_sizes';
    public $timestamps=false;
    protected $fillable=['shipping_id',
        'price' ,
        'from_length',
        'to_length',
        'from_width',
        'to_width',
        'from_height',
        'to_height'];

}
