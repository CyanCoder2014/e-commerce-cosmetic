@extends('layouts.layout')


@section('title')
فروشگاه ساعت | خرید و فروش ساعت لوکس دست دوم و نو | کاتالوگ برند های ساعت | فروشگاه های فروش و تعمیر ساعت | مجله ساعت
@endsection



@section('header')
    <meta name="description"
          content="|   آگهی های ساعت | فروشگاه اینترنتی ساعت | بازار خرید و فروش ساعت های برند و لوکس | نقد و بررسی ساعت | فروشندگان و تعمیر کننده های ساعت | قیمت گذاری و تعمیر ساعت های لوکس">

    <style>
        .productSlider {
            width: 80%;
            margin: 100px auto;
        }

        .slick-slide {
            margin: 0px 20px;
        }

        .slick-slide img {
            width: 100%;
        }

        .slick-prev:before,
        .slick-next:before {
            color: black;
        }


        .slick-slide {
            transition: all ease-in-out .3s;
        }

        .slick-prev:before, .slick-next:before {
            opacity: 1 !important;
        }

        .slick-prev, .slick-next {
            font-weight: bold;
            background-color: #c7b77c !important;
            border-radius: 50%;
        }

        .slick-prev:before {
            content: '<' !important;
        }

        .slick-next:before {
            content: '>' !important;
        }
    </style>
@endsection
@section('content')


    <!--<div class="position-relative overflow-h" style="max-height: 300px">
        <img src="/new/img/3.jpg" class="w-100"/>
        <div class="ladiesbtn"></div>
    </div>-->



    <div class="shadow">
        <div class="container pt-4 pb-3">
            <div class="row">
                <div class="col-md-3 text-center mt-5">
                    <div><img src="{{$introduction->shop1_img}}" height="100" width="100"/></div>
                    <div class="text-grey   m-4 ">
                        {{$introduction->shop1_intro}}
                    </div>
                    <div><a href="/user/register"
                            class="sweep-to-left sweep-to-left-border-dark shadow d-block mt-3  btn-sm">
                            {{$introduction->shop1_btn}}</a></div>
                </div>
                <div class="col-md-6 pt-0 mt-0">
                    <div><img src="{{$introduction->shop_img}}" class="img-fluid "/></div>
                </div>
                <div class="col-md-3 text-center mt-5">
                    <div><img src="{{$introduction->shop2_img}}" height="100" width="100"/></div>
                    <div class="text-grey  m-4  ">{{$introduction->shop2_intro}}
                    </div>
                    <div><a href="/advertising/creating"
                            class="sweep-to-left sweep-to-left-border-gold shadow d-block mt-3  btn-sm">
                            {{$introduction->shop2_btn}} </a></div>
                </div>
            </div>
        </div>
    </div>





    <div class="bg-main p-5 mt-0 px-xs-0">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-white text-center px-5 px-xs-1">

                    <h1 style="font-size: 16px" class=""><span class="text-gold">فیگورات </span>
                        {{$introduction->sliderSide_title}}
                    </h1>

                    <div class=" mt-3 small">
                        {{$introduction->sliderSide_intro}}
                    </div>
                    <div class="mt-2 ">
                        <span class="text-gold">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                    </div>
                    <div class="text-grey font-size-13 mt-2">  {!! $setting->about_us !!}</div>
                    <div class="mt-3">
                        <img src="/new/img/Logo-Figorat-White-Orange.png" height="25" width="70"/>
                        <span class="font-size-13">Powered by</span>
                    </div>
                </div>

                <div class="col-md-6 px-5 px-xs-1" style="direction: rtl;text-align: right">
                    <!--Carousel Wrapper-->
                    <div id="comments" class="carousel slide carousel-fade " data-ride="carousel">
                        <!--Indicators-->
                        <ol class="carousel-indicators">

                            @foreach($sellers as $key => $seller)

                                <li data-target="#comments" data-slide-to="{{$key}}"
                                    @if($key== 0)
                                    class="active"
                                        @endif
                                ></li>
                            @endforeach


                        </ol>
                        <!--/.Indicators 33-->
                        <!--Slides ttt-->

                        <div class="carousel-inner" role="listbox">
                            <!--First slide-->


                            @foreach($sellers as $key => $seller)
                                <div class="carousel-item
                            @if($key== 0)
                                        active
                            @endif
                                        ">
                                    <div class="container bg-white p-3 333">
                                        <div class="row">
                                            <div class="col-md-10">
                                                <div class="font-size-13">
                        <span class="text-gold">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                                                </div>
                                                <div class="mt-2">
                                                    <a href="#"
                                                       class="text-black font-weight-bold">{{$seller->name}}</a>
                                                </div>
                                                <div class="mt-2">{{$seller->introduce}}</div>
                                                <div class="mt-2 font-size-13">
                                                    <a href="<?= Url('/profile/seller/' . '324-' . $seller->id . '-' . str_replace(" ", "-", $seller->name)); ?>"
                                                       class="text-grey">اطلاعات بیشتر </a>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <img src="/new/img/person.png" class="w-100 rounded-circle border"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach






                        <!--/First slide-->

                        </div>
                        <!--/.Slides-->
                        <!--Controls-->
                        <a class="carousel-control-prev" href="#comments" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#comments" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                        <!--/.Controls-->
                    </div>
                    <!--/.Carousel Wrapper-->
                </div>
            </div>
        </div>
    </div>

    <section class="productSlider dir-l">
        @foreach($brandsHome as $brand)
            <div>
                <div class="card border-0 shadow-hover my-3 text-center">
                    <img class="m-auto img-fluid"
                         src="{{$brand->logo}}"
                         alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title ">{{$brand->name}}</h5>
                        <!--<p class="card-text text-gold">
                            55
                        </p>-->
                        <div class="row">
                            <div class="col-12 p-0">
                                <a href="<?= Url('/shop/brand/' . '324-' . $brand->id . '-' . str_replace(" ", "-", $brand->name)); ?>"
                                   class="sweep-to-left sweep-to-left-border-gold shadow d-block mt-3  btn-sm">
                                    مشخصات</a>
                            </div>
                            <!--<div class="col-3 p-0 pt-1 text-right">
                                <button type="button" class="btn btn-outline-gold mt-3"><i
                                            class="fas fa-shopping-cart"></i></button>
                            </div>
                            -->

                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </section>




@endsection


@section('script')
    <script>
        $(document).on('ready', function () {
            $(".productSlider").slick({
                dots: true,
                autoplay: true,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        })
    </script>
    <script>

//        function sortMeBy(arg, sel, elem, order) {
//            var $selector = $(sel),
//                $element = $selector.children(elem);
//            $element.sort(function (a, b) {
//                var an = parseInt(a.getAttribute(arg)),
//                    bn = parseInt(b.getAttribute(arg));
//                if (order == "asc") {
//                    if (an > bn)
//                        return 1;
//                    if (an < bn)
//                        return -1;
//                } else if (order == "desc") {
//                    if (an < bn)
//                        return 1;
//                    if (an > bn)
//                        return -1;
//                }
//                return 0;
//            });
//            $element.detach().appendTo($selector);
//        }
//
//        jQuery(document).ready(function ($) {
//
//            $('#input-sort').change(function () {
//                if ($("#input-sort option:selected").val() == 'date')
//                    var deferred = sortMeBy("data-date", ".products-category", ".product-layout", "desc");
//                else if ($("#input-sort option:selected").val() == 'expensive')
//                    var deferred = sortMeBy("data-price", ".products-category", ".product-layout", "desc");
//                else if ($("#input-sort option:selected").val() == 'cheap')
//                    var deferred = sortMeBy("data-price", ".products-category", ".product-layout", "asc");
//                else if ($("#input-sort option:selected").val() == 'visit')
//                    var deferred = sortMeBy("data-visit", ".products-category", ".product-layout", "desc");
//            });
//        });
    </script>
@endsection
