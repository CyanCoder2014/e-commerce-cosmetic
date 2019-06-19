<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestQusetions extends Model
{
    protected $table='test_questions';
    protected $fillable = ['test_id','q_id'];

    public function Tests()
    {
        return $this->belongsToMany('App\Tests');
    }
}
