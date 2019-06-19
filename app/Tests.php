<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tests extends Model
{
    protected $table='test';
    protected $fillable = ['title','description'];

    public function questions(){

        return $this->hasMany("App\TestQusetions", "test_id");

    }
}
