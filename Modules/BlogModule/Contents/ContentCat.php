<?php

namespace  Modules\BlogModule\Contents;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class ContentCat extends Model
{
    protected $table='contents_cat';
    public $timestamps=false;
    protected $fillable = ['id','parent_id','title','intro','image','state'];
    protected $casts = [
        'title' => 'array',
        'intro' => 'array',
    ];




    public function subs($parentId)
    {
        return $this->where('parent_id' ,$parentId )->get();
    }

    public function cat()
    {
        return $this->where('parent_id' ,0 )->get();
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
            $subs = ContentCat::select('id')->where('parent_id' ,$this->id )->get();
            $ids = [];
            if($subs)
                foreach ($subs as $sub){
                    $ids[]=$sub->id;
                    $ids=array_merge($ids,$sub->dynasty_ids());
                }


            return $ids;

        });

    }

    public function contents()
    {
        return $this->hasMany('Modules\BlogModule\Contents\Content', 'cat_id');
    }




}
