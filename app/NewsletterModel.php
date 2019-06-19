<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsletterModel extends Model
{
    protected $table='newsletter';
    public $timestamps=false;
    protected $fillable = ['id','name','email','crated_at'];
}
