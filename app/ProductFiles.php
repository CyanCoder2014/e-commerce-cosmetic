<?php

namespace App;

use Illuminate\Support\Facades\Auth;

use Illuminate\Database\Eloquent\Model;
use Modules\ShopModule\Products\UserProduct;

class ProductFiles extends Model
{
    protected $table='product_files';
    protected $fillable = ['file','name','type','time'];
//    protected $casts=[
//        'name' => 'array'
//    ];

    public function havAccess(){
        if ( $this->type == 0) // if its free
            return true;
        elseif (Auth::check() && (
                Auth::user()->roles()->count() > 0 // if loged in user is admin and has role
                || UserProduct::where('user_id',Auth::id())->where('product_id',$this->product_id)->get()->count() >0 // if login an byed product by user
                ))
            return true;
        else
            return false;
    }
}
