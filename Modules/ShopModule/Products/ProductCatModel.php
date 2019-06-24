<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Input;

class ProductCatModel extends Model
{

    protected $table='product_cat';
    public $timestamps=true;
    protected $fillable = ['id','name','parent_id'];
//    protected $casts = ['name' => 'array'];

    public function parent(){
        return $this->belongsTo('Modules\ShopModule\Products\ProductCatModel','parent_id');
    }


    public function childs()
    {
        return Cache::rememberForever('category_' . $this->id . '_childs',  function() {
            return $this->where('parent_id' ,$this->id )->get();
        });

    }
    public function dynasty_ids()
    {
        return Cache::rememberForever('category_' . $this->id . '_dynasty_ids', function() {
            $subs = ProductCatModel::select('id')->where('parent_id' ,$this->id )->get();
            $ids = [];
            if($subs)
                foreach ($subs as $sub){
                    $ids[]=$sub->id;
                    $ids=array_merge($ids,$sub->dynasty_ids());
                }


            return $ids;

        });

    }
    public function save(array $options = [])
    {
        if(isset($this->parent_id)){
            Cache::forget('category_' . $this->parent_id . '_dynasty_ids');
            Cache::forget('category_' . $this->parent_id . '_childs');
        }
        return parent::save($options);

    }

    public function products($take = 0){
        $cat_ids = $this->dynasty_ids();
        $cat_ids[]= $this->id;
        $products= ProductModel::whereIn('category_id',$cat_ids)->orderby('id','desc');
        if($take > 0)
             return $products->paginate($take)->appends(Input::except('page'));
        return $products->get();
    }
    public function link(){
        return route('shop.category',['url' => 'cat-'.$this->id.'-'.str_replace(' ','-',$this->name)]);
    }
}
