<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    public $table='utility';
    protected $fillable = [
        'active', 'title', 'type','lang','subtype', 'data'
    ];
    protected $casts = [
        'data' => 'array'
    ];

    public function __get($varName){

        $var = parent::__get($varName);
        if(isset($var))
            return $var;
        elseif (!array_key_exists($varName,$this->data)){
            //this attribute is not defined!
            return;
        }
        else return $this->data[$varName];

    }

}
