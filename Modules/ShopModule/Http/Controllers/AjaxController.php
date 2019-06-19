<?php

namespace Modules\ShopModule\Http\Controllers;

use Modules\ShopModule\Products\Collection;
use Modules\ShopModule\Products\ProductComment;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{


    public function getcollection($id){
        $collections = [];
        if(ctype_digit($id))
            $collections = Collection::select('name','id')->where('brand_id',$id)->get()->toArray();
        return json_encode($collections);
    }

}
