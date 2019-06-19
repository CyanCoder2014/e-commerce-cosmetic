<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QCategories extends Model
{
    protected $table='question_cat';
    protected $fillable = ['title','options','grade'];
    protected $casts=['options' => 'array'];


}
