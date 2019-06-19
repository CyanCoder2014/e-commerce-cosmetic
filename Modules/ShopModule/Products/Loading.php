<?php

namespace  Modules\ShopModule\Products;

use Illuminate\Database\Eloquent\Model;

class Loading extends Model
{
    protected $casts=['items'=>'array'];
    private $status_name = ['درخواست',
        'تایید سفارش',
        'اماده سازی',
//        'تایید ارسال',
        'تحویل مشتری',
        'غیرفعال'
    ];
    public function invoice(){
        return $this->belongsTo('Modules\ShopModule\Products\InvoiceModel','invoice_id');
    }

    public function shipping(){
        return $this->belongsTo('Modules\ShopModule\Products\Shipping','shipping_id');
    }
    public function statusName(){
        return $this->status_name[$this->status];
    }
    public function nextStatus(){
        if(isset($this->status_name[$this->status+1]))
            return $this->status_name[$this->status+1];
        else
            return false;
    }
    public function previousStatus(){
        if(isset($this->status_name[$this->status-1]))
            return $this->status_name[$this->status-1];
        else
            return false;
    }
    public function itemsName(){
        $products =OrderItemModel::select('product.name')->whereIn('order_item.id',$this->items)->join('product','order_item.product_id','=','product.id')->get();
        $names=[];
        foreach ($products as $product)
            array_push($names,$product->name);
        return $names;
    }
}
