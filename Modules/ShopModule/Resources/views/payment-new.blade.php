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
                    <div id="content" class="col-sm-12" style="text-align: right">
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
                                                <tbody>
                                                <tr>
                                                    <td class="text-right" colspan="4"><strong>کل :</strong></td>
                                                    <td class="text-right">{{substr(Cart::total(), 0, -3)}} تومان</td>
                                                </tr>
                                                </tbody>
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
