<!DOCTYPE html>
<html lang="en">



<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">


    <title>{{$setting->data['title']}} | @yield('title')</title>

    <meta name="title" content="{{$setting->data['title']}} | @yield('title')"/>
    @yield('header')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">




    <!-- <link rel="stylesheet" href="css/all.css">-->
    <link rel="stylesheet" href="/new/css/bootstrap.min.css">
    <link rel="stylesheet" href="/semantic/semantic.min.css">

    <link rel="stylesheet" href="/new/css/mycustom.css">
    <link rel="stylesheet" href="/new/css/advertise.css">
    <link rel="stylesheet" href="/new/css/slick.css">
    <link rel="stylesheet" href="/new/css/slick-theme.css">
    <script src="/new/js/jquery.min.js"></script>



    {{--<script>

        var jq13 = $.noConflict(true);
        jq13('#carouselExampleControls').bind('mousewheel', function(e){jq13(this).carousel('next');});
        jq13(document).ready(function () {
            jq13('#kachiran1').carousel({
                interval: 3500
            });
            jq13('#carouselExampleControls').carousel({
                interval: 8000
            });
            jq13('.parallax-h').height(jq13(document).height()-50);
            // console.log($(document).height()-100)
            jq13('.moreInfo').click(function () {
                $('.slider').css('display','none');
                $('.page-continue').css('display','block');
                var bg = $('#carouselExampleControls .active .card2').css('background-image');
                bg = bg.replace('url(','').replace(')','').replace(/\"/gi, "");
                $('.parallax').css("background-image",'url("'+bg+'")');
            });
            jq13('#lessInfo').click(function () {
                $('.slider').css('display','block');
                $('.page-continue').css('display','none')
            });

            var searchCounter=true;
            jq13(".btnSearch").click(function () {
                if (searchCounter) {
                    $('.inputSearch').css('width','225px');
                    searchCounter=false;
                }
                else {
                    $('.inputSearch').css('width','0px');
                    searchCounter=true;
                }

            });
        });
        var a = 0;
        jq13(document).scroll(function() {
            /*changingMubbers*/
            var oTop = $('#counter').offset().top - window.innerHeight+350;
            if (a == 0 && $(window).scrollTop() > oTop) {
                $('.counter-value').each(function() {
                    var $this = $(this),
                        countTo = $this.attr('data-count');
                    $({
                        countNum: $this.text()
                    }).animate({
                            countNum: countTo
                        },

                        {

                            duration: 3000,
                            easing: 'swing',
                            step: function() {
                                $this.text(Math.floor(this.countNum));
                            },
                            complete: function() {
                                $this.text(this.countNum);
                                //alert('finished');
                            }

                        });
                });
                a = 1;
            }
            /*changingMubbers*/
            if($( document ).scrollTop()===0){
                $( '.btnSmoothBottom' ).css('opacity','1')
            }
            else {
                $( '.btnSmoothBottom' ).css('opacity','0')
            }
        });





    </script>--}}


    <style>
        p{
            font-size: 15px;
            line-height: 34px;
            font-weight: normal;
            direction: rtl;
            text-align: right;

        }
    </style>

</head>


<body style="overflow-x: hidden">

<button onclick="topFunction()" id="myBtn" title="Back to top" class="btn primery btn-rounded">Top</button>
<nav class="navbar navbar-expand-lg bg-main text-white special-color-dark p-0 fixed-top" id="nav-blog">
    <div class="bg-main text-white border-bottom-white">
        <button id="toggle" class="navbar-toggler text-white hover-primary p-2 m-btn" type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent2"
                aria-controls="navbarSupportedContent2"
                aria-expanded="false" aria-label="Toggle navigation" onclick="togle()"><i
                    class="fas fa-arrow-circle-down icon-rotate"></i></i>
        </button>
        <div id="navbarSupportedContent2" class="collapse navbar-collapse ml-sm-50px">
            <div class="row justify-content-around w-100">
                <div class="col-lg-6 col-md-12 p-2 text-center">
                    <ul class="nav w-75 m-auto p-0">
                        <li class="nav-item ml-5">
                            <a href="/user/register" class="text-gold"> <i class="fa fa-gem"></i> ثبت نام فروشگاه / تعمیر گاه  </a>
                        </li>
                        <li class="nav-item ml-5">
                            <a href="/advertising/creating" class="text-gold"> <i class="fa fa-clock"></i>    فروش ساعت </a>
                        </li>
                       <!-- <li class="nav-item">
                            <a href="/product.html" class="text-gold"> <i class="fa fa-dollar-sign"></i>  گذاری </a>
                        </li>
                        -->
                    </ul>
                </div>
                <div class="col-lg-6 col-md-12 p-2 text-center">
                    <ul class="nav w-75 m-auto justify-content-end sm-justify-none flexmdcolumn">
                        <li class="nav-item ml-5">
                            <a href="/contactus" class="text-gold"> <i class="fa fa-phone-volume"></i> ارتباط با ما </a>
                        </li>
                        <li class="nav-item">
                            <a href="/content/magazine/all" class="text-gold"> <i class="fa fa-store-alt"></i>  مجله ساعت </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>


    <button class="navbar-toggler text-white hover-primary p-2 m-btn" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1"
            aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i>
    </button>
        <div class="navBrand">
            <a href="/">
                <img src="{{asset($setting->image)}}">
            </a>
        </div>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
        <div class="w-100">
            <div class="row w-100 text-center p-2 bg-main">
                <div class="col">

                    <ul class="nav w-75 m-auto pt-2 pr-0">
                        {{--<li class="nav-item mr-3">--}}
                            {{--@foreach()--}}
                        {{--</li>--}}
                        <li class="nav-item mr-3">
                            <div class="dropdown">
                                <button class="btn btn-trance text-white" type="button" id="dropdownMenuButton2"
                                        data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-user"></i>
                                    @if(Auth::check())
                                        {{Auth::user()->username}}
                                    @endif


                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">


                                    @if(Auth::check())

                                        <a class="dropdown-item" href="/logout"> خروج کاربر </a>

                                        <a class="dropdown-item" href="/user/register">ویرایش فروشگاه یا تعمیرکار</a>

                                    <a class="dropdown-item" href="/advertising"> مدیریت آگهی</a>
                                    <a class="dropdown-item" href="/advertising/creating"> ثبت آگهی</a>


                                        @else

                                        <a class="dropdown-item" href="{{ route('login') }}">ورود</a>
                                        <a class="dropdown-item" href="{{ route('register') }}">ثبت نام </a>


                                    @endif
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>


                <div class="col">


                    <form method="post"  action="<?= Url('/shop/search'); ?>">
                    <div class="input-group pt-2 mr-auto" style="direction: ltr;">
                        <div class="ui search">
                            <input class="prompt" type="text" placeholder="جستجو ..." style="direction: rtl">
                            <div class="results"></div>
                        </div>

                    </div>
                    </form>

                </div>

            </div>
            <div class="row">
                <div class="col-12">
                    <div class="w-100 bg-second position-relative">
                        <ul class="nav justify-content-center p-0">
                            <li class="nav-item py-2 pr-4 pl-4 dropdown-win-click position-relative">
                                <a href="#" class="text-dark">
                                    <div class="toggle-up"><i class="fas fa-caret-up"></i></div>
                                    <span>برندهای ساعت</span></a>
                                <div class="dropdown-win" style="min-width: 400px">
                                    <div class="bg-white p-4 shadow overflow-s mh-400">
                                        <div class="text-left cursor-p dropdown-win-close"><i class="fa-times fa"></i></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul>
                                                   <!-- <li class="list-unstyled font-weight-bold">برند ها </li>-->
                                                    @foreach($brands as $item )
                                                        <li class="list-unstyled ">
                                                            <a class="text-black font-size-13 text-gold-h" href="{{ route('shop.brand',['id' => '324-'.$item->id.'-'.str_replace(" ","-",$item -> name)]) }}">
                                                                {{ $item->name }}
                                                                <img class="p-1 my-2"  style="height: 30px!important; box-shadow: 0 0 1px rgba(0,0,0,0.2)" src="{{$item->logo}} ">

                                                            </a>
                                                        </li>
                                                    @endforeach

                                                </ul>
                                            </div>


                                        </div>

                                    </div>
                                </div>


                            </li>
                            <li class="nav-item py-2 pr-4 pl-4 dropdown-win-click position-relative">
                                <a href="/content/magazine/all" class="text-dark">
                                    <div class="toggle-up"><i class="fas fa-caret-up"></i></div>
                                   <span> مجله ساعت</span></a>
                                <div class="dropdown-win" style="min-width: 200px">
                                    <div class="bg-white p-4 shadow  overflow-s mh-400">
                                        <div class="text-left cursor-p dropdown-win-close"><i class="fa-times fa"></i></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <ul>
                                                   <!-- <li class="list-unstyled font-weight-bold">دسته بندی ها</li>-->
                                                    @foreach($cats as $item )
                                                        <li class="list-unstyled ">
                                                            <a class="text-black font-size-13 text-gold-h" href="{{ route('content.cat',['id' => '324-'.$item->id.'-'.str_replace(" ","-",$item->title[App::getlocale()])]) }}">
                                                                {{ $item->title['fa'] }}
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            {{--<div class="col-md-3">--}}
                                                {{--<ul>--}}
                                                    {{--<li class="list-unstyled font-weight-bold">ghgfh</li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-3">--}}
                                                {{--<ul>--}}
                                                    {{--<li class="list-unstyled font-weight-bold">دسته بندی</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                            {{--<div class="col-md-3">--}}
                                                {{--<ul>--}}
                                                    {{--<li class="list-unstyled font-weight-bold">دسته بندی</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                                                    {{--</li>--}}
                                                {{--</ul>--}}
                                            {{--</div>--}}
                                        </div>

                                    </div>
                                </div>


                            </li>
                            <li class="nav-item py-2 pr-4 pl-4 position-relative">
                                <a href="/sale" class="text-dark">
                                    <div class="toggle-up"><i class="fas fa-caret-up"></i></div>
                                   <span> فروش ساعت</span>

                                </a>



                            </li>
                            <li class="nav-item py-2 pr-4 pl-4 position-relative">
                                <a href="/shop/search" class="text-dark">
                                    <div class="toggle-up"><i class="fas fa-caret-up"></i></div>
                                    <span>خرید ساعت</span></a>



                            </li>
                            <li class="nav-item py-2 pr-4 pl-4 position-relative">
                                <a href="/profile/sellerList" class="text-dark">
                                    <div class="toggle-up"><i class="fas fa-caret-up"></i></div>
                                    <span>تعمیر ساعت</span></a>



                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


    </div>
</nav>
<!--/.Navbar-->



<section class="pt-menu">

    @yield('content')

</section>





<footer class="shadow bg-main pb-0">




    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="contact col-lg-4 col-md-4 col-sm-12 col-xs-12">--}}
                {{--<h5>درباره {{ $setting->title }}</h5>--}}
                {{--{!! $setting->about_us !!}--}}
{{--                <img alt="" src="{{ $setting->image }}">--}}
            {{--</div>--}}
            {{--<div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">--}}
                {{--<h5>{{ $footer_title->title_1 }}</h5>--}}
                {{--<ul>--}}
                    {{--@foreach($footer_1 as $footer)--}}
                        {{--<li><a href="{{ $footer->link }}">{{ $footer->title }}</a></li>--}}
                    {{--@endforeach--}}

                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">--}}
                {{--<h5>{{ $footer_title->title_2 }}</h5>--}}
                {{--<ul>--}}
                    {{--@foreach($footer_2 as $footer)--}}
                        {{--<li><a href="{{ $footer->link }}">{{ $footer->title }}</a></li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">--}}
                {{--<h5>{{ $footer_title->title_3 }}</h5>--}}
                {{--<ul>--}}
                    {{--@foreach($footer_3 as $footer)--}}
                        {{--<li><a href="{{ $footer->link }}">{{ $footer->title }}</a></li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
            {{--<div class="column col-lg-2 col-md-2 col-sm-3 col-xs-12">--}}
                {{--<h5>{{ $footer_title->title_4 }}</h5>--}}
                {{--<ul>--}}
                    {{--@foreach($footer_4 as $footer)--}}
                        {{--<li><a href="{{ $footer->link }}">{{ $footer->title }}</a></li>--}}
                    {{--@endforeach--}}
                {{--</ul>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}






    <div class="container" >
        <div class="row justify-content-end pt-4" id="footer">
            <div class="col-md-3">
                <ul style="margin-top: 5px">
                    <li class="list-unstyled font-weight-bold mb-3" style="color: white">{{ $footer_title->title_1 }}</li>
                    @foreach($footer_1 as $footer)
                        <li class="list-unstyled mt-2"><a href="{{ $footer->link }}" class="text-grey font-size-13 text-gold-h">{{ $footer->title }}</a></li>
                    @endforeach
                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                    {{--</li>--}}
                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                    {{--</li>--}}

                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                 {{--class="text-grey font-size-13 text-gold-h">لینک</a>--}}
                    {{--</li>--}}
                    {{--<li class="list-unstyled"><a href="/products.html"--}}
                                                 {{--class=" 33 text-grey font-size-13 text-gold-h">لینک</a>--}}
                    {{--</li>--}}
                </ul>
            </div>

            <div class="col-md-3">
                <ul style="margin-top: 5px">
                    <li class="list-unstyled font-weight-bold mb-3" style="color: white">{{ $footer_title->title_2 }}</li>
                    @foreach($footer_2 as $footer)
                        <li class="list-unstyled mt-2"><a href="{{ $footer->link }}" class="text-grey font-size-13 text-gold-h">{{ $footer->title }}</a></li>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-3" style="color: gray!important;">
                <ul style="margin-top: 5px">
                    <li class="list-unstyled font-weight-bold " style="color: white">ارتباط با ما</li>

                </ul>
                <p >
                    {!! $setting->about_us !!}
                </p>
            </div>


            <div class="col-md-3">
                <ul style="margin-top: 5px">
                    <li class="list-unstyled font-weight-bold mb-5" style="color: white">{{ $footer_title->title_3 }}</li>
                    @foreach($footer_3 as $key => $footer)


                        @if($key == 0)
                            <li class="list-unstyled m-1  p-1 px-2  " style="display: inline ;background-color: #fff;border-radius: 3px"><a href="{{ $footer->link }}" class="text-grey font-size-15 text-gold-h"><i class="fa fa-film"></i></a></li>
                        @elseif($key == 1)
                            <li class="list-unstyled m-1 p-1 px-2 " style="display: inline ;background-color: #fff;border-radius: 3px "><a href="{{ $footer->link }}" class="text-grey font-size-15 text-gold-h"><i class="fab fa-linkedin-in"></i></a></li>
                        @elseif($key == 2)
                            <li class="list-unstyled m-1  p-1 px-2 " style="display: inline ;background-color: #fff;border-radius: 3px"><a href="{{ $footer->link }}" class="text-grey font-size-15 text-gold-h"><i class="fab fa-telegram"></i></a></li>
                        @elseif($key == 3)
                            <li class="list-unstyled m-1  p-1 px-2 " style="display: inline ;background-color: #fff;border-radius: 3px"><a href="{{ $footer->link }}" class="text-grey font-size-15 text-gold-h"><i class="fab fa-instagram"></i></a></li>

                        @else
                            <li class="list-unstyled m-1  p-1 px-2 " style="display: inline ;background-color: #fff;border-radius: 3px"><a href="{{ $footer->link }}" class="text-grey font-size-15 text-gold-h"><i class="fa fa-users"></i></a></li>

                        @endif
                    @endforeach
                </ul>
            </div>

<!--
            <div class="col-md-3">
                <div class="bg-main rad-50 text-white clock-bottom">
                    <i class="far fa-clock fa-10x"></i>
                </div>
                <div><a href="/content/category/324-22-%D8%B1%D8%A7%D9%87%D9%86%D9%85%D8%A7%DB%8C-%D8%AE%D8%B1%DB%8C%D8%AF-%D8%B3%D8%A7%DB%8C%D8%AA" class="sweep-to-left sweep-to-left-border-dark shadow d-block ml-auto mr-0">
                        راهنمای خرید ساعت  </a></div>
            </div>
            -->



        </div>
    </div>



    <div class=" text-center mb-0 mt-5" style="background-color: #2e3436">
        <a target="_blank"  class="nav-link text-white small" data-toggle="tooltip" data-placement="top" title=" گروه نرم افزاری سایان" href="https://cyancoder.co">Designed by CyanCoder</a>

    </div>

</footer>
<script src="/new/js/popper.min.js"></script>
<script src="/new/js/bootstrap.min.js"></script>
<script src="/new/js/navbar.js"></script>
<script src="/new/js/new.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<script src="/new/js/slick.min.js"></script>

</body>
</html>




<!--

<div id="logo"><a href="index.html"><img class="img-responsive" src="{{ asset( $setting->image ) }}" title="{{$setting->title}}" alt="{{$setting->title}}" /></a></div>



<li class="mobile"><i class="fa fa-phone"></i>{{ $contact->phone }}</li>

@foreach($blogs as $key => $blog)
    @if($key >= 2)
        @break
    @endif
    <td><strong><a class="btn btn-default btn-sm" href="{{ route('content.show',['id' => '324-'.$blog->id.'-'.str_replace(' ','-',$blog->title[App::getlocale()])]) }}">ادامه مطلب</a></strong></td>
@endforeach


-->





<script src="/semantic/semantic.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": 5000,
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    }

    @if(Session::has('message'))
    toastr.info("{{ Session::get('message') }}");
    @endif

@if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif


@if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}");
    @endif


@if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}");
    @endif


@if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif


@if ($errors->any())
    @foreach ($errors->all() as $error)
        toastr.warning("{{  $error }}")
        @endforeach
@endif


        </script>
<script>
    $('.ui.search')
        .search({
            type          : 'category',
            minCharacters : 2,
            apiSettings   : {
                onResponse: function(ResponseAjax) {
                    var
                        response = {
                            results : {}
                        }
                    ;
                    // translate GitHub API response to work with search
                    $.each(ResponseAjax, function(index, item) {
                        var
                            type   = item.type || 'نامشخص',
                            maxResults = 16
                        ;
                        if(index >= maxResults) {
                            return false;
                        }
                        // create new language category
                        if(response.results[type] === undefined) {
                            response.results[type] = {
                                name    : type,
                                results : []
                            };
                        }
                        // add result to category
                        response.results[type].results.push({
                            title       : item.name,
                            url         : item.url
                        });
                        console.log(response.results[type]);
                    });

                    return response;
                },
                url: '{{ route('search.ajax') }}?q={query}'
            }
        })
    ;
</script>
@yield('script')
