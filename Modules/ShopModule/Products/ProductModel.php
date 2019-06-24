<?php

namespace  Modules\ShopModule\Products;

use App\Inspection;
use App\UserAddress;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Modules\ShopModule\Http\Controllers\OrderController;

class ProductModel extends Model
{

//    function __destruct()
//    {
//        $this->unlock();
//    }

    protected $table='product';
    protected $fillable = ['id','user_id','name','price','discount','type','pc_id','pr_id','file','brand_id','availability',
        'image','description','details','score','view','state','dimensions','weight'];
    protected $casts=[
        'image'=> 'array',
//        'name'=> 'array',
//        'description'=> 'array',
//        'details'=> 'array',
//        'active'=> 'array',
//        'dimensions'=> 'array',
    ];

    public function category(){
        return $this->belongsTo('Modules\ShopModule\Products\ProductCatModel','pc_id');
    }

    public function brand(){
        return $this->belongsTo('Modules\ShopModule\Products\Brand','brand_id');
    }

    public function provider(){
        return $this->belongsTo('Modules\ShopModule\Products\Provider','provider_id');
    }

    public function inspect(){

            return $this->hasMany('App\Inspection','inner_id','id')->where('type',2)->select('count');

    }
    public function details(){

            return $this->hasMany(ProductDetailModel::class,'product_id');

    }
    public function features(){

            return $this->hasManyThrough(ProuductFeature::class,ProuductFeaturePvot::class,'product_id','id','id','product_feature_id');

    }
    public function featuresPvot(){

            return $this->hasMany(ProuductFeature::class ,'product_id');

    }
//    public function shippings(){
//        return $this->belongsToMany('Modules\ShopModule\Products\Shipping', 'shipping_products','product_id');
//    }
//    public function available_shippings(UserAddress $address){
//        $shippings = $this->belongsToMany('Modules\ShopModule\Products\Shipping', 'shipping_products','product_id')
//                ->join('shipping_sizes','shippings.id','=','shipping_sizes.shipping_id')
//                ->select('shippings.*')
//                    ->where(function ($query) {
//                        $query->where('to_height', '>=', $this->dimensions['height'])
//                            ->orWhereNull('to_height');
//                    })
//                    ->where(function ($query) {
//                        $query->where('from_height', '<=', $this->dimensions['height'])
//                            ->orWhereNull('from_height');
//                    })
//                    ->where(function ($query) {
//                        $query->where('to_width', '>=', $this->dimensions['width'])
//                            ->orWhereNull('to_width');
//                    })
//                    ->where(function ($query) {
//                        $query->where('from_width', '<=', $this->dimensions['width'])
//                            ->orWhereNull('from_width');
//                    })
//                    ->where(function ($query) {
//                        $query->where('to_length', '>=', $this->dimensions['length'])
//                            ->orWhereNull('to_length');
//                    })
//                    ->where(function ($query) {
//                        $query->where('from_length', '<=', $this->dimensions['length'])
//                            ->orWhereNull('from_length');
//                    });
//            $shippings2 = clone $shippings;
//            if($shippings->join('shipping_cities','shippings.id','=','shipping_cities.shipping_id')
//                    ->where('city_id',$address->city_id)->count() > 0)
//                return $shippings->join('shipping_cities','shippings.id','=','shipping_cities.shipping_id')
//                    ->where('city_id',$address->city_id);
//            else
//                return $shippings2->join('shipping_provinces','shippings.id','=','shipping_provinces.shipping_id')
//                    ->where('province_id',$address->province_id);
//
////                ->leftJoin('shipping_cities','shippings.id','=','shipping_cities.shipping_id')
////                    ->where('city_id',$address->city_id)
////                ->leftJoin('shipping_provinces','shippings.id','=','shipping_provinces.shipping_id')
////                    ->where('province_id',$address->province_id);
//
//    }
//    public function is_shipping_available($id){
//        if (ShippingProduct::where('product_id',$this->id)->where('shipping_id',$id)->count() >0)
//            return true;
//        else
//            return false;
//    }
//    public function expired_items(){
//
//            return $this->hasMany('Modules\ShopModule\Products\ProductLock','product_id')
//                ->where('expired_at','<=', Carbon::now());
//
//    }
//    private function unlock(){
//
//        foreach ($this->expired_items as $expired)
//            if( $expired->order->state != OrderController::$payment_successNum){
//                $this->quantity += $expired->quantity;
//                $this->save();
//                $expired->delete();
//
//            }
//            else
//                $expired->delete();
//
//
//    }
//    public function setlock($qty,$order_id){
//        if($qty <= $this->quantity)
//        {
//            $this->quantity -= $qty;
//            $this->save();
//            ProductLock::create([
//               'product_id' => $this->id,
//               'quantity' => $qty ,
//               'order_id' => $order_id,
//               'expired_at' => Carbon::now()->addMinutes(15),
//            ]);
//        }
//    }

}
