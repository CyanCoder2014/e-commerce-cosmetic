<?php

namespace  Modules\ShopModule\Products;

use App\Product;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Collection extends Model
{
    use SearchableTrait;
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'name' => 10,
            'description' => 2,
        ],
        'joins' => [
        ],
    ];
    public function brand(){
        return $this->belongsTo('Modules\ShopModule\Products\Brand','brand_id');
    }

    public function products(){
        return $this->hasMany(Product::class);
    }
    public function link(){
        return route('shop.brand',['url' => 'br-'.$this->brand_id.'-'.str_replace(' ','-',$this->brand->name??$this->name)]);
    }

}
