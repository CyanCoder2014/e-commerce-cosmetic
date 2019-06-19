<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestResult extends Model
{
    protected $table='test_result';
    protected $casts=['result'=>'array'];

    public function test(){

        return $this->hasOne("App\Tests", "id",'test_id');

    }}
