<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class Province extends Model
{
    use Eloquence;
    protected $table='province';

    protected $searchableColumns = ['name'];

    public function cities(){
        return $this->hasMany(City::class,'province_id');
    }
}
