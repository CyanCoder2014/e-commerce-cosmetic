<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;

class ProductPackage extends Model
{

    protected $table='product_package';
//    public $timestamps=false;
    protected $fillable = ['id', 'product_id', 'name', 'description','price','product_details'];
    protected $casts=[
        'product_details' => 'array',
        'name' => 'array',
        'description' => 'array',
    ];
}
