<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{


    public function products(){
        return $this->hasMany('Modules\ShopModule\Products\ProductModel','provider_id');
    }
    public function link(){
        return route('shop.provider',['url' => 'pr-'.$this->id.'-'.str_replace(' ','-',$this->name)]);
    }

}
