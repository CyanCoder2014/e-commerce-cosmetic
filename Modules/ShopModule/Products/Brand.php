<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class Brand extends Model
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
    function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
    function __destruct()
    {
//        $this->unlock();
    }
    protected $table='brands';
    protected $fillable = ['id','name','description','logo','founder','country','year','variety','site','company','classification','image','created_at','updated_at'];
    protected $casts=[
        'image'=> 'array',
        'logo'=> 'array',
//        'name'=> 'array',
//        'description'=> 'array',
//        'details'=> 'array',
//        'active'=> 'array',
//        'dimensions'=> 'array',
    ];

    public function collections(){
        return $this->hasMany('Modules\ShopModule\Products\Collection','brand_id');
    }


    public function products(){
        return $this->hasMany('Modules\ShopModule\Products\ProductModel','brand_id');
    }


    public function link(){
        return route('shop.brand',['url' => 'br-'.$this->id.'-'.str_replace(' ','-',$this->name)]);
    }

}
