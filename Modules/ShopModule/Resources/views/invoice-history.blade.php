@extends('layouts.userProfile_layout')

@section('name')
    گزارش سفارشات
@endsection
@section('header')
    <meta name="description"
          content="'گزارش سفارشات انجام شده">
@endsection


@section('profile_content')


    <div class="row">
        <!--Middle Part Start-->
        <div id="content" class="col-sm-12">
            <h1 class="title">گزارش سفارشات</h1>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <td class="text-center">کد رهگیری</td>
                        <td class="text-center">محصولات</td>
                        <td class="text-center">مبلغ کل</td>
                        <td class="text-center">تاریخ</td>
                        <td class="text-center">وضعیت</td>


                    </tr>
                    </thead>
                    <tbody>

                    @foreach($invoices as $invoice)
                        <tr>
                            <td class="text-center">{{ $invoice->tracking_code }}</td>
                            <td class="text-right">
                                @foreach($invoice->items as $item)
                                    @if(isset($item->product->name))
                                        <a href="{{ route('shop.show',['id' => '321'.'-'.$item->product_id.'-'.str_replace(" ","-",$item->product->name)]) }}"><span class="badge badge-primary">{{ $item->product->name }}</span></a>
                                    @endif
                                @endforeach
                            </td>
                            <td class="text-center">{{number_format($invoice->final_amount)}}</td>
                            <td class="text-center">{{ to_jalali_date($invoice->created_at) }}</td>
                            <td class="text-center">
                                @if($invoice->state == 0)
                                    <span class="badge badge-secondary">در انتظار پرداخت</span>
                                @elseif($invoice->state == 1)
                                    <span class="badge badge-success">پرداخت موفق</span>
                                @elseif($invoice->state == 2)
                                    <span class="badge badge-danger">پرداخت ناموفق</span>
                                @elseif($invoice->state == 3)
                                    <span class="badge badge-warning">انصراف از پرداخت</span>
                                @endif
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
        <!--Middle Part End -->
    </div>


@endsection
