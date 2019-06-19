<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    protected $table='questions';
    protected $fillable = ['title','type','test_id','content','options'];
    protected $casts=['options' => 'array'];


    public function category()
    {
        return $this->belongsTo('App\QCategories','type');
    }

}
