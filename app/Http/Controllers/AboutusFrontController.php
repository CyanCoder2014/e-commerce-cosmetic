<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utility;

class AboutusFrontController extends Controller
{
    public function show()
    {

        $aboutus=Utility::where('type',"about_us")->orderBy('id', 'desc')->first();
        return View('aboutus.form',compact('aboutus'));
    }
}
