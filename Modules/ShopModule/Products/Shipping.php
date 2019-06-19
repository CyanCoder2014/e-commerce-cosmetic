<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Shipping extends Model
{
    use Eloquence;

    protected $searchableColumns = ['name'];
    public function province(){
        return $this->belongsToMany('App\Province', 'shipping_provinces');
    }
    public function city(){
        return $this->belongsToMany('App\City', 'shipping_cities');
    }
    public function size(){
        return $this->hasMany('Modules\ShopModule\Products\ShippingSize' );
    }
    public function getProductPrice(ProductModel $product){
        if($product->is_shipping_available($this->id))
        {
            $size = $this->size()->where(function ($query) use ($product)  {
                $query->where('to_height', '>=', $product->dimensions['height'])
                    ->orWhereNull('to_height');
            })
                ->where(function ($query) use ($product) {
                    $query->where('from_height', '<=', $product->dimensions['height'])
                        ->orWhereNull('from_height');
                })
                ->where(function ($query) use ($product) {
                    $query->where('to_width', '>=', $product->dimensions['width'])
                        ->orWhereNull('to_width');
                })
                ->where(function ($query) use ($product) {
                    $query->where('from_width', '<=', $product->dimensions['width'])
                        ->orWhereNull('from_width');
                })
                ->where(function ($query) use ($product) {
                    $query->where('to_length', '>=', $product->dimensions['length'])
                        ->orWhereNull('to_length');
                })
                ->where(function ($query) use ($product) {
                    $query->where('from_length', '<=', $product->dimensions['length'])
                        ->orWhereNull('from_length');
                })->first();

            return $size->price + $product->weight*$this->unit_price_weight;

        }

    }
}
