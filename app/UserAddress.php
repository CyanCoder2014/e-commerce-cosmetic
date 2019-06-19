<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $fillable=[
        'user_id',
        'firstname',
        'lastname',
        'phone',
        'fax',
        'address',
        'company_name',
        'postcode',
        'province_id',
        'city_id',
        ];
    protected $table='user_address';
    public $timestamps=true;

    public function city(){
        return $this->belongsTo('App\City','city_id');
    }
    public function province(){
        return $this->belongsTo('App\Province','province_id');
    }
}
