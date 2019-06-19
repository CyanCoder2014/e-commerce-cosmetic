@extends('layouts.layout')



@section('header')
    <title>مدیر جو | مقالات انگیزه</title>
    <meta name="description"
          content="فروش بسته های آموزشی انگیره | شناخت اهمیت انگیزه و راهکارهای آموزشی افزایش انگیزه مدیران، دانشجویان، دانش آموزان، سازمان ها و ..."/>
@endsection



@section('content')








    <section class="pricing container-full">
        <div class="container" style="display: flex;justify-content: center;margin-bottom: 40px;margin-top: -290px">

            <h2 class="caps"><strong>مقالات انگیزه</strong></h2>
        </div>
        <div class="wrapper">



            @foreach($contents as  $key=>$content)

                <article class="pricing__table" style="margin-bottom: 55px;direction: rtl;text-align: right">
                    <div class="card-show">
                        <!-- Card image -->
                        <img alt=" فیگورات -  {!! \Illuminate\Support\Str::words($content->title , $words = 11, $end = '...') !!}" src="<?= Url('/post-img/'.$content->image); ?>" class="card-img-top h-225"/>
                        <!-- Card content -->
                        <div class="card-body">
                            <p style="margin-right: -17px;color: #a63e68" class="card-text">{!! \Illuminate\Support\Str::words($content->title , $words = 10, $end = '...') !!}</p>
                        </div>
                    </div>
                    <span class="">{!! \Illuminate\Support\Str::words($content->intro , $words = 20, $end = '...') !!}</span>
                    <h4 class="card-title"><a href="<?= Url('/content/show/'.'324-'.$content->id.'-'.str_replace(" ","-",$content->title)); ?>" >ادامه مطلب </a></h4>
                </article>
            @endforeach


        </div>


        <div style="display: flex;justify-content: center">
            {{$contents->links()}}

        </div>
    </section>










    <section class=" container-full" id="products" style="margin-top: 20px">

        <div class="" >
            <div class="container" style="display: flex;justify-content: center;margin-bottom: 50px">

                <h2 class="caps"><strong>بسته های آموزشی</strong></h2>
            </div>
            <div class="container" style="display: flex;justify-content: center">


                <div class="container">
                    <div class="row">


                        @foreach($product as  $key => $product)

                            <div class="col-md-4" style="margin-bottom: 30px;text-align: right">
                                <!-- Card -->
                                <div class="card h-350 cards" style="height: 430px">

                                    <div class="card-show0">
                                        <!-- Card image -->
                                        <img alt="{!! \Illuminate\Support\Str::words($product->name , $words = 7, $end = '...') !!}فیگورات - " src="@if(isset($product->image[0])){{$product->image[0]}}@else http://placehold.it/257x450 @endif" class="card-img-top h-225"/>
                                        <!-- Card content -->
                                        <div class="card-body">

                                            <!-- Title -->
                                            <h3 class="card-title"><a>{!! \Illuminate\Support\Str::words($product->name , $words = 4, $end = '...') !!} </a></h3>
                                            <!-- Text -->
                                            <p class="card-text">
                                                {!! \Illuminate\Support\Str::words($product->details , $words = 7, $end = '...') !!}</p>
                                        <!--<p class="card-text">{!!  to_jalali($product->created_at) !!}</p>-->


                                            @if($product->discount ==0)
                                                <h5 style="color: #880e4f " class="caps light">
                                                    <strong> {{ $product->price }}</strong> تومان </h5>
                                            @else
                                                <h5>
                                                        <span style="text-decoration: line-through">
                                                        <strong> {{ $product->price }}</strong>  تومان
                                                        </span>
                                                    <span style="margin-right: 17px;color: #880e4f ">
                                                        <strong> {{ $product->price - ($product->price*$product->discount/100) }}</strong> تومان
                                                    </span>
                                                </h5>
                                            @endif
                                            <div class="clearfix margin_bottom3"></div>
                                            <a href="{{ route('shop.show',['id' => '321'.'-'.$product->id.'-'.str_replace(" ","-",$product->name)]) }}" id="{{$product->id}}" class="btn btn-success">خرید بسته
                                                آموزشی</a>


                                        </div>
                                    </div>

                                <!--
                                        <div class="card-caption text-center pink darken-4 pt-5" style="height: 430px">
                                            <button type="button" class="btn btn-cap"><i class="fas fa-times fa-2x"></i>
                                            </button>
                                            <button type="button" class="btn btn-cap"><i
                                                        class="fas fa-microphone-alt-slash fa-2x"></i></button>
                                            <div>
                                                <span class="pr-3 color-white"><a
                                                            href="{{ route('shop.show',['id' => random_int(100,999).'-'.$product->id.'-'.$product->name]) }}">adfsa</a></span>
                                                <span class="pl-2 color-white">mute</span>
                                            </div>
                                        </div>
                                        -->

                                </div>
                                <!-- Card -->
                            </div>

                        @endforeach


                    </div>
                </div>


            </div>
        </div>

    </section>


    <section class="signup container-full" id="contactus">
        <h2 class="anim text-up"
            style="visibility: visible; animation-name: text-up;"> تماس با ما</h2>
        <div class="anim text-up" data-wow-delay=".2s"
             style="visibility: visible; animation-delay: 0.2s; animation-name: text-up;">

            <form id="mc4wp-form-2" class="mc4wp-form mc4wp-form-23" method="post" data-id="23"
                  data-name="Newsletter" novalidate  action="<?= Url('/contactus/send'); ?>">
                <div class="mc4wp-form-fields">

                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                    <input class="form-control" style="direction: rtl" type="text" name="name"
                           placeholder="نام" >

                    <input class="form-control"  style="direction: rtl;margin-top: 12px" type="text" name="email"
                           placeholder="ایمیل">

                    <input  class="form-control"  style="direction: rtl;margin-top: 12px;margin-bottom: 20px" type="text" name="message"
                            placeholder="پیام شما ..." >

                    <button class="btn btn-default" style="background-image: linear-gradient(-131deg,#c04068 0%,#4f3e68 100%); " type="submit"  name="_token" value="{{ csrf_token() }}" >ارسال پیام</button></div>
            </form>
        </div>
    </section>



    <!--<div id="drift-widget-container" style="position: absolute; z-index: 2147483647;">
        <iframe id="drift-widget" src="<?= Url('/modern/asset/index-prod.html'); ?>"
                title="Drift Messenger" role="complementary" class="drift-widget-welcome-expanded-online"
                __idm_id__="814492673"
                style="border: none; display: block; position: fixed; top: auto; left: auto; bottom: 24px; right: 24px; width: 420px !important; height: 326px !important; visibility: visible; z-index: 2147483647; max-height: 100vh; max-width: 100vw; transition: none; background: none transparent; opacity: 1;"></iframe>
    </div>-->




@endsection

