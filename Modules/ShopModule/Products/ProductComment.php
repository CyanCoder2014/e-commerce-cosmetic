<?php

namespace Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    protected $table='product_comments';

    protected $fillable = [
        'id', 'users_id', 'product_id', 'parent_id', 'comment', 'approved', 'ban', 'like', 'view',
    ];




    public function user()
    {
        return $this->belongsTo('App\User' , 'users_id');
    }

    public function product()
    {
        return $this->belongsTo('Modules\ShopModule\Products\ProductModel', 'product_id');
    }

//    public function comment()
//    {
//        return $this->belongsTo('Modules\ShopModule\Products\ProductComment' , 'parent_id');
//    }
    public function answers()
    {
        return $this->hasMany('Modules\ShopModule\Products\ProductComment' , 'parent_id');
    }



}
