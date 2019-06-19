@extends('layouts.layout')

@section('header')
    <title>مدیر جو |    تایید نهایی</title>
@endsection

@section('content')

    <section class="hero container-full">


        <article class="pricing__table" style="width: 90%;margin:0 auto;direction: rtl">



            <div class="content_fullwidth less2" style="margin-top:70px;direction: rtl">
                <div class="row">
                    <!--Middle Part Start-->
                    <div id="content" class="col-sm-12">
                        <h1 class="title">تایید نهایی</h1>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> سبد خرید</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <td class="text-center">تصویر</td>
                                                    <td class="text-left">نام محصول</td>
                                                    <td class="text-left">تعداد</td>
                                                    <td class="text-right">قیمت واحد</td>
                                                    <td class="text-right">کل</td>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                $discount=0;
                                                ?>
                                                @foreach(Cart::content() as $item)
                                                    <tr>
                                                        <td class="text-center"><a href=""><img src="{{asset($item->name['pic'])}}" alt="{{$item->name['name']}}" title="{{$item->name['name']}}" class="img-thumbnail"></a></td>
                                                        <td class="text-left"><a href="">{{$item->name['name']}}</a></td>
                                                        <td class="text-left"><div class="input-group btn-block" style="max-width: 200px;">

                                                                <input name="qty" value="{{$item->qty}}" size="1" class="form-control" type="" disabled>

                                                            </div></td>
                                                        <td class="text-right">{{$item->price}} تومان</td>
                                                        <td class="text-right">{{$item->subtotal}} تومان</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>جمع کل:</strong></td>
                                                    <td class="text-right">{{substr(Cart::subtotal(), 0, -3)}} تومان</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>هزینه ارسال ثابت :</strong></td>
                                                    <td class="text-right">5000 تومان</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>کسر هدیه:</strong></td>
                                                    <td class="text-right">{{number_format($discount)}} تومان</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>مالیات:</strong></td>
                                                    <td class="text-right">{{substr(Cart::tax(), 0, -3)}} تومان</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>کل :</strong></td>
                                                    <td class="text-right">{{substr(Cart::total(), 0, -3)}} تومان</td>
                                                </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="{{route('shop.payment')}}">
                                <div class="panel-body">
                                    <div class="pull-right">
                                        <input class="btn btn-primary" id="button-confirm" value="پرداخت سفارش" type="submit">
                                    </div>
                                </div>

                            </a>
                            <a href="{{route('shop.checkout')}}">
                                <div class="panel-body">
                                    <div class="pull-right">
                                        <input class="btn btn-primary" id="button-confirm" value="بازگشت" type="submit">
                                    </div>
                                </div>

                            </a>

                        </div>
                    </div>
                    <!--Middle Part End -->
                </div>
            </div>
        </article>

    </section>


@endsection
