<?php

namespace Modules\ShopModule\Http\Controllers;

use App\Http\Controllers\Controller as Controller;
use App\Notifications\Email;
use Illuminate\Http\Request;
use Modules\ShopModule\Products\InvoiceModel;
use Freshbitsweb\Laratables\Laratables;
use Modules\ShopModule\Products\Loading;

class AdminInvoiceController extends Controller
{
    public static $loading_start_status = 0 ;

    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('UserMiddleware');
    }

    public function invoices_view(){
        return view('shopmodule::admin.invoices.invoicelist');


    }
    public function invoices_list(){

        return Laratables::recordsOf(InvoiceModel::class);


    }
    public function invoice_details($id){
        $invoice= InvoiceModel::find($id);
        return view('shopmodule::admin.invoices.invoice',compact('invoice'));


    }

    public function NextLoadingStatus($id){
        $loading = Loading::findOrFail($id);
        if ($loading->nextStatus()){
            $loading->status +=1;
            $loading->save();
            return back()->with('message','وضعیت محموله به '.$loading->statusName().' تغییر داده شد');
        }
        $loading->invoice->user->notify(new Email('پیشرفت در وضعیت سفارش شما','محموله شما که شامل  '.implode('-',$loading->itemsName()).' به وضعیت'.$loading->statusName().' رسید','#'));
        return back()->with('message','وضعیت محموله نمیتواند تغییر کند ');

    }
    public function PreviousLoadingStatus($id){
        $loading = Loading::findOrFail($id);
        if ($loading->previousStatus()){
            $loading->status -=1;
            $loading->save();
            return back()->with('message','وضعیت محموله به '.$loading->statusName().' تغییر داده شد');
        }
        return back()->with('message','وضعیت محموله نمیتواند تغییر کند ');

    }
}
