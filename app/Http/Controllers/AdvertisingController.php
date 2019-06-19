<?php

namespace App\Http\Controllers;

use App\Advertising;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Modules\ShopModule\Products\Brand;
use Modules\ShopModule\Products\Collection;

class AdvertisingController extends Controller
{
    public function create(){

        $brands = Brand::all();
        $clocks = [];
        for ($i =1 ; $i < 3;$i++){
            $clocks[]=[
                'hour' => \random_int(0,12),
                'min' => \random_int(0,59),
            ];
        }
        Session::put('clocks',$clocks);

        return view('advertising.create',compact('brands','clocks'));
    }
    public function store(Request $request){

        if(Auth::guest()){
            if(isset($request->username))
                $validation = [
                    'firstname' => 'required|string|max:255',
                    'lastname' => 'required|string|max:255',
                    'username' => 'required|string|max:255|unique:users',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6|confirmed',
                    'mobile' => 'required|string|digits:11|unique:users',
                    'postcode' => 'required|string|digits:10',
                    'address' => 'required|string',
                    'province_id' => 'required|integer',
                    'city_id' => 'required|integer',
                    'agree' => 'required',
                ];
            else
                $validation = [
                    'email' => 'required|string|email|max:255',
                    'password' => 'required|string|min:6',
                ];
            $this->validate($request,$validation);
            if(isset($request->username)){
                $user = new User();
                $user->username = $request->username;
                $user->name = $request->firstname;
                $user->family = $request->lastname;
                $user->mobile = $request->mobile;
                $user->email = $request->email;
                $user->password = bcrypt($request->password);
                $user->network    =  '1';
                $user->save();
                Auth::login($user);

            }
            else{
                if (Auth::attempt([
                    'email' => $request->email,
                    'password' => $request->password,

                ]))
                    $user = Auth::user();
            }
        }
        $user=Auth::user();

        if ($user){
            $this->validate($request,[
                'title' => 'required',
                'province_id' => 'required',
                'city_id' => 'required',
                'brand_id' => 'required',
                'reference' => 'required',
                'serial' => 'required',
                'status' => 'required',
                'description' => 'required',
                'price' => 'required',
                'guarantee' => 'required',
                'box' => 'required',
                'tell' => 'required',
                'image' => 'array|min:2|max:2'
            ]);
            $new = new Advertising();
            foreach ($new->getFillable() as $fillable)
                if (isset($request->{$fillable}))
                            $new->{$fillable} = $request->{$fillable};

            $clocks = Session::get('clocks');
            $file_addresses=[];
            if ($request->hasFile('image'))
                foreach ($request->file('image') as $key => $file)
                {
                    $hour = $clocks[$key]['hour']??'00';
                    $min  = $clocks[$key]['min']??'00';
                    $name = time().'('.$hour.'.'.$min.').'.str_replace([ '(', ')' ], '', $file->getClientOriginalName());
                    $file->move(public_path('files'), $name);
                    $file_addresses[]='files/'.$name;
                }
            $new->images = $file_addresses;
            $new->save();
        }

        return back()->with('message','successful');
        
    }

    public function getCollection(Request $request){
        $records=[];
        if (isset($request->brand_id))
            $records = Collection::where('brand_id',$request->brand_id)->get();
        $out = [];
        foreach ($records as $record)
            $out[$record->id]= $record->name;
        return json_encode($out);
    }
    public function getProduct(Request $request){
        $records=[];
        if (isset($request->collection_id))
            $records = Product::where('collection_id',$request->collection_id)->get();
        $out = [];
        foreach ($records as $record)
            $out[$record->id]= $record->name;
        return json_encode($out);
    }
}
