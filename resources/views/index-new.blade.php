@extends('layouts.layout')



@section('header')
    <title>مدیر جو | مدیریت انگیزه</title>
    <meta name="description"
          content="فروش بسته های آموزشی انگیره | شناخت اهمیت انگیزه و راهکارهای آموزشی افزایش انگیزه مدیران، دانشجویان، دانش آموزان و ..."/>
@endsection



@section('content')
    <section class="hero container-full">

        <div></div>
        <article class="hero__content">
            <h1 class="anim text-up"
                style="visibility: visible; animation-name: text-up;direction: rtl;text-align: right
                ;max-width: 100%;margin-bottom:60px;margin-top: -120px"> <i class="fa fa-arrow-left" style="font-size: 26px"></i>     </h1>
            <!--<p class="anim text-up " data-wow-delay=".2s"
               style="visibility: visible; animation-delay: 0.2s; animation-name: text-up;direction: rtl;text-align: right">انگیزه در مدیران<br>
                انگیز در دانشجویان
                <br>
                انگیزه در دانش آموزان  </p>
            <div class="anim text-up" data-wow-delay=".4s"
                 style="visibility: visible; animation-delay: 0.4s; animation-name: text-up;">


            </div>-->


            <div id="slideshow" style="width: 110%;height: 350px;text-align: right;direction: rtl">
                @foreach($slider as $slide)
                    <div>
                        <div style="max-height: 220px;overflow: hidden" >
                            <img alt=" مدیر جو -  {!! \Illuminate\Support\Str::words($slide->data['title'] , $words = 6, $end = '...') !!}" src="{{$slide->data['image']}}">
                        </div>
                        <a href="{{$slide->data['link']}}" >
                            <div class="block-title mb-60">
                                <br>
                                <h3 class="title">{!! \Illuminate\Support\Str::words($slide->data['title'] , $words = 6, $end = '...') !!} </h3>
                            </div>

                        </a>
                    </div>
                @endforeach

            </div>




        </article>





        <article class="hero__devices">
            <div class="hero__laptop"><img class="screen anim slow-fade" data-wow-delay=".5s"
                                           src="{{ $firstpage->data['image1 }}"
                                           alt="چگونه انگیزه خود را بالا ببریم؟" data-pagespeed-url-hash="1809658852"
                                           onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                           style="visibility: visible; animation-delay: 0.5s; animation-name: slow-fade;">
                <img class="laptop  anim slight-up"
                     src="<?= Url('/modern/asset/macbook-clay.png'); ?>" alt="مدیر جو"
                     data-pagespeed-url-hash="1379710151"
                     onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                     style="visibility: visible; animation-name: slight-up;"></div>
            <div class="hero__mobile"><img class="screen anim slow-fade" data-wow-delay=".5s"
                                           src="{{ $firstpage->data['image2 }}"
                                           alt="آموزش افزایش انگیزه" data-pagespeed-url-hash="720791545"
                                           onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                           style="visibility: visible; animation-delay: 0.5s; animation-name: slow-fade;">
                <img class="iphone anim slight-up" data-wow-delay=".2s"
                     src="<?= Url('/modern/asset/iphone-clay.png'); ?>" alt="مدیر جو"
                     data-pagespeed-url-hash="941943550"
                     onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                     style="visibility: visible; animation-delay: 0.2s; animation-name: slight-up;"></div>
        </article>
    </section>

    <section class="pricing container-full">
        <div class="container" style="display: flex;justify-content: center;margin-bottom: 100px;margin-top: -190px">

            <h2 class="caps"><strong>مقالات انگیزه</strong></h2>
        </div>
        <div class="wrapper">



            @foreach($contents as  $key=>$content)

            <article class="pricing__table" style="margin-bottom: 55px;direction: rtl;text-align: right">
                <div class="card-show">
                    <!-- Card image -->
                    <img alt="  -  {!! \Illuminate\Support\Str::words($content->title , $words = 11, $end = '...') !!}" src="<?= Url('/post-img/'.$content->image); ?>" class="card-img-top h-225"/>
                    <!-- Card content -->
                    <div class="card-body">
                        <p style="margin-right: -17px;color: #a63e68" class="card-text">{!! \Illuminate\Support\Str::words($content->title , $words = 9, $end = '...') !!}</p>
                    </div>
                </div>
                <span class="">{!! \Illuminate\Support\Str::words($content->intro , $words = 19, $end = '...') !!}</span>
                <h4 class="card-title"><a href="<?= Url('/content/show/'.'324-'.$content->id.'-'.str_replace(" ","-",$content->title)); ?>" >ادامه مطلب </a></h4>
            </article>
            @endforeach

        </div>
        <div style="display: flex;justify-content: center">
            <a  style="margin: 0 auto;border: 1px solid #e06b61;color:#e06b61!important;" class="btn" href="<?= Url('/content'); ?>" > مقالات بیشتر </a>
        </div>
    </section>




    @foreach($tests as  $key=>$test)

    <section class="meetings container-full"  id="tests" style="margin-top: 30px;margin-bottom: 50px">
        <div class="wrapper" style="text-align:right;direction: rtl ">
            <div class="hero__laptop"><img class="screen anim slow-fade" data-wow-delay=".5s"
                                           src="<?= asset($test->image); ?>"
                                           alt="تست انگیزه" data-pagespeed-url-hash="1809658852"
                                           onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                                           style="visibility: visible; animation-delay: 0.5s; animation-name: slow-fade; max-height: 225px;">
                <img class="laptop  anim slight-up"
                     src="<?= Url('/modern/asset/macbook-clay.png'); ?>" alt="فیگورات"
                     data-pagespeed-url-hash="1379710151"
                     onload="pagespeed.CriticalImages.checkImageForCriticality(this);"
                     style="visibility: visible; animation-name: slight-up;"></div>
            <div class="meetings__content homepage__content">
                <div class="homepage__content__icon"><img alt="آزمون" data-pagespeed-url-hash="3766648412"
                                                          src="<?= Url('/modern/asset/bell-icon.png'); ?>"
                                                          onerror="this.onerror=null;pagespeed.lazyLoadImages.loadIfVisibleAndMaybeBeacon(this);">
                </div>
                <h2 class="anim text-up" style="visibility: visible; animation-name: text-up;"> {!! \Illuminate\Support\Str::words($test->title , $words = 5, $end = '...') !!}</h2>
                <p class="anim text-up" data-wow-delay=".2s"
                   style="visibility: visible; animation-delay: 0.2s; animation-name: text-up;">{!! \Illuminate\Support\Str::words($test->description , $words = 7, $end = '...') !!}
                   </p><br>
            <a class="btn btn-primary" href="{{ route('front.test',['id' => '321-'.$test->id.'-'.str_replace(" ","-",$test->title)]) }}">شرکت در تست</a></div>
        </div>
    </section>
    @endforeach









    <section class=" container-full" id="products">

        <div class="">
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

                    <textarea rows="3"  class="form-control"   style="direction: rtl;margin-top: 12px;margin-bottom: 20px" type="text" name="message"
                               placeholder="پیام شما ..."></textarea>

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

