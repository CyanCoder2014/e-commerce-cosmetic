@extends('layouts.layout')

@section('header')

    <title>مدیر جو | نتیجه پرداخت</title>
    <meta name="description"
          content="انگیزه"/>
@endsection



@section('content')

    <section class="hero container-full">


        <article class="pricing__table" style="width: 90%;margin:0 auto;direction: rtl">



            <div class="content_fullwidth less2" style="margin-top:70px;direction: rtl">
                <div class="">
                    <!-- Breadcrumb Start-->
                    <!-- Breadcrumb End-->
                    <div class="row">
                        <!--Middle Part Start-->
                        @if(isset($Status))
                            @if($Status == 'Success')
                                <div style="color:green; font-family:tahoma; direction:rtl; text-align:right">
                                    پرداخت با موفقیت انجام شد ، شماره رسید پرداخت : {{$Refnumber}} ،  مبلغ پرداختی : {{$PayPrice}} !
                                    <br /></div>

                            @else{
                            <div style="color:green; font-family:tahoma; direction:rtl; text-align:right">
                                خطا در پردازش عملیات پرداخت ، نتیجه پرداخت : {{$Status}} !
                                <br /></div>
                            @endif
                        @else
                            <div style="color:red; font-family:tahoma; direction:rtl; text-align:right">
                                انصراف از پرداخت ، اطالعات پرداخت دریافت نگردید'
                                <br /></div>
                    @endif
                        <!--Middle Part End -->
                    </div>

                    <a class="btn btn-primary" href="{{ route('shop.history') }}">سابقه خرید های گذشته</a>
                </div>
            </div>
            </div>
        </article>

    </section>


@endsection

