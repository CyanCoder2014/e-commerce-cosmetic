<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;

class ProductDetailGroupModel extends Model
{

    protected $table='product_detail_group';
    public $timestamps=false;
    protected $fillable = ['id', 'title','description','parent_id','detail','state'];
}
