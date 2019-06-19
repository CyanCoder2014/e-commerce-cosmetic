<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class City extends Model
{
    use Eloquence;

    protected $table='city';
    protected $searchableColumns = ['name'];

    public function province(){
        return $this->belongsTo('App\Province');
    }

}
