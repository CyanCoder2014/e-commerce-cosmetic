<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;

class ProductDetailModel extends Model
{

    protected $table='product_detail';
//    public $timestamps=false;
    protected $fillable = ['id', 'product_id', 'title', 'description','price','detail','group_id','state'];
//    protected $casts=[
//        'title' => 'array',
//        'description' => 'array',
//    ];
}
