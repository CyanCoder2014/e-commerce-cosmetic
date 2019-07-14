<!DOCTYPE html>
<html lang="en">


<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">


    <title>{{$setting->data['title']}} | @yield('title')</title>

    <meta name="title" content="{{$setting->data['title']}} | @yield('title')"/>
    @yield('header')

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


    <!-- <link rel="stylesheet" href="css/all.css">-->
    <link rel="stylesheet" href="/semantic/semantic.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/mdb.min.css">
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" href="/css/mycustom.css">


</head>


<body>
<nav class="navbar navbar-expand-lg text-white fixed-top" id="nav-blog">
    <div class="bg-black text-white border-bottom-black">

        <div id="navbarSupportedContent2" class=" font-weight-bold">
            <div class="text-center font-small p-1">
                محصولات ما بسیار خوب است
            </div>
        </div>

    </div>
    <a class="navbar-image" href="/"><img src="{{asset($setting->image_black)}}"/></a>
    <button class="navbar-toggler text-black p-2" type="button" data-toggle="collapse" style="display: block"
            data-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1"
            aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse boxShadowBottom" id="navbarSupportedContent1">
        <div class="w-100 text-black mr-xl-5">

            <ul class="nav flex-xs-column p-0 myNav justify-content-end">
                <li class="nav-item ">
                    <a href="#" class="text-black p-4 d-inline-block font-weight-bold">دسته بندی محتوا</a>
                    <div class="dropdown-win">
                        <div class=" h-100 overflow-s">
                            <div class="container-fluid py-5">
                                <div class="row">
                                    <div class="col-md-10 dir-r">
                                        <div class="container-fluid">
                                            <div class="row dir-r">
                                                @foreach($blog as $key =>$content)
                                                    @if($key < 3)
                                                <div class="col-md-3">
                                                    <a href="{{ route('content.show',['id' => '324-'.$content->id.'-'.str_replace(" ","-",$content->title['fa'])]) }}">
                                                        <div class="bg-background"
                                                             style="height: 200px; background-image: url('{{asset($content->image)}}')"></div>
                                                        <div class="p-3 text-center">
                                                            <div class="font-weight-bold">{!! \Illuminate\Support\Str::words($content->title['fa'] , $words = 8, $end = '...') !!}</div>
                                                            <div>{!! \Illuminate\Support\Str::words($content->intro['fa'] , $words = 16, $end = '...') !!}</div>
                                                        </div>
                                                    </a>
                                                </div>
                                                    @endif
                                                @endforeach
                                                {{--<div class="col-md-3">
                                                    <a href="#">
                                                        <img src="/pic/lips-edited.jpg" class="w-100" alt="">
                                                        <div class="p-3 text-center">
                                                            <div class="font-weight-bold">عنوان</div>
                                                            <div>توضیحات</div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="#">
                                                        <img src="/pic/lips-edited.jpg" class="w-100" alt="">
                                                        <div class="p-3 text-center">
                                                            <div class="font-weight-bold">عنوان</div>
                                                            <div>توضیحات</div>
                                                        </div>
                                                    </a>
                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 dir-r">
                                        <ul>
                                            @foreach($blog as $key =>$content)
                                                @if($key >= 3)
                                                    <li class="font-weight-bold"><a
                                                                href="{{ route('content.show',['id' => '324-'.$content->id.'-'.str_replace(" ","-",$content->title['fa'])]) }}">
                                                            {!! \Illuminate\Support\Str::words($content->title['fa'] , $words = 8, $end = '...') !!}
                                                        </a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                    {{--@foreach($categories as $key => $cat)
                                        <div class="col-md-2 pt-3 text-center item-hover">
                                            <a href="#">
                                                <div class="bg-background w-100" style="height: 150px;background-image:url('{{asset($cat->image)}}') "></div>

                                                <div class="text-center p-3">
                                                    {{$cat->name}}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach--}}


                                </div>
                            </div>


                        </div>
                    </div>
                </li>
                <li class="nav-item ">
                    <a href="#" class="text-black p-4 d-inline-block font-weight-bold">نکات آرایشی</a>
                    <div class="dropdown-win">
                        <div class="h-100 overflow-s">
                            <div class="container-fluid py-5">
                                <div class="row">
                                    <div class="col-md-10 dir-r">
                                        <div class="container-fluid">
                                            <div class="row dir-r">
                                                <div class="col-md-3">
                                                    <a href="#">
                                                        <img src="/pic/lips-edited.jpg" class="w-100" alt="">
                                                        <div class="p-3 text-center">
                                                            <div class="font-weight-bold">عنوان</div>
                                                            <div>توضیحات</div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="#">
                                                        <img src="/pic/lips-edited.jpg" class="w-100" alt="">
                                                        <div class="p-3 text-center">
                                                            <div class="font-weight-bold">عنوان</div>
                                                            <div>توضیحات</div>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="#">
                                                        <img src="/pic/lips-edited.jpg" class="w-100" alt="">
                                                        <div class="p-3 text-center">
                                                            <div class="font-weight-bold">عنوان</div>
                                                            <div>توضیحات</div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 dir-r">
                                        <ul>
                                            <li class="font-weight-bold"><a href="#">لینک</a></li>
                                            <li><a href="#">لینک</a></li>
                                            <li><a href="#">لینک</a></li>
                                            <li><a href="#">لینک</a></li>
                                            <li><a href="#">لینک</a></li>
                                            <li class="font-weight-bold"><a href="#">لینک</a></li>
                                            <li><a href="#">لینک</a></li>
                                            <li><a href="#">لینک</a></li>
                                        </ul>
                                    </div>
                                    {{--@foreach($categories as $key => $cat)
                                        <div class="col-md-2 pt-3 text-center item-hover">
                                            <a href="#">
                                                <div class="bg-background w-100" style="height: 150px;background-image:url('{{asset($cat->image)}}') "></div>

                                                <div class="text-center p-3">
                                                    {{$cat->name}}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach--}}


                                </div>
                            </div>


                        </div>
                    </div>
                </li>
                <li class="nav-item ">
                    <a href="#" class="text-black p-4 d-inline-block font-weight-bold">دسته بندی محصولات</a>
                    <div class="dropdown-win">
                        <div class=" h-100 overflow-s">
                            <div class="container-fluid py-5">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div id="carouselNavbar" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner">
                                                @foreach($productSliderMenu as $key =>$productSliderMenuIn)
                                                    <div class="carousel-item @if($key===0) active @endif">
                                                        <div class="bg-background"
                                                             style="height: 200px; background-image: url('{{asset($productSliderMenuIn->image)}}')"></div>

                                                        <div class="p-3 text-center">
                                                            <div class="font-weight-bold">{{$productSliderMenuIn->name}}</div>
                                                            <div class="text-grey">{{$productSliderMenuIn->description}}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselNavbar" role="button"
                                               data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"><i
                                                            class="fas fa-chevron-left"></i></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselNavbar" role="button"
                                               data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"><i
                                                            class="fas fa-chevron-right"></i></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-md-7 dir-r example example-balance">
                                        <ul>
                                            @foreach($categories as $category)
                                                <li class="font-weight-bold"><a href="#">{{ $category->name }}</a></li>
                                                @foreach($category->products(10) as $product)
                                                    <li class="font-small"><a
                                                                href="{{ $product->link() }}">{{ $product->name }}</a>
                                                    </li>
                                                @endforeach
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-2 dir-r">
                                        <ul class="font-weight-bold">
                                            @foreach($productLinks as $productLink)
                                                <li><a href="{{$productLink->link}}">{{$productLink->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    {{--@foreach($categories as $key => $cat)
                                        <div class="col-md-2 pt-3 text-center item-hover">
                                            <a href="#">
                                                <div class="bg-background w-100" style="height: 150px;background-image:url('{{asset($cat->image)}}') "></div>

                                                <div class="text-center p-3">
                                                    {{$cat->name}}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach--}}


                                </div>
                            </div>


                        </div>
                    </div>
                </li>
                <li class="nav-item ">
                    <a href="/aboutus" class="text-black p-4 d-inline-block font-weight-bold">درباره ما</a>
                </li>
                <li class="nav-item ">
                    <a href="#" class="text-black p-4 d-inline-block font-weight-bold">تماس با ما</a>
                </li>
                <li class="nav-item ">
                    <a href="/agents" class="text-black p-4 d-inline-block font-weight-bold">نمایندگان فروش</a>
                    <div class="dropdown-win">
                        <div class="h-100 overflow-s py-5">
                            <section class="slick4 slickSlider4">
                                <div class="py-3">
                                    <a href="#" class="z-depth-1 d-block">
                                        <div class="p-3 text-right">
                                            <div class="font-weight-bold">نام نمایندگی</div>
                                            <div>آدرس</div>
                                            <div>شماره تلفن</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="py-3">
                                    <a href="#" class="z-depth-1 d-block">
                                        <div class="p-3 text-right">
                                            <div class="font-weight-bold">نام نمایندگی</div>
                                            <div>آدرس</div>
                                            <div>شماره تلفن</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="py-3">
                                    <a href="#" class="z-depth-1 d-block">
                                        <div class="p-3 text-right">
                                            <div class="font-weight-bold">نام نمایندگی</div>
                                            <div>آدرس</div>
                                            <div>شماره تلفن</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="py-3">
                                    <a href="#" class="z-depth-1 d-block">
                                        <div class="p-3 text-right">
                                            <div class="font-weight-bold">نام نمایندگی</div>
                                            <div>آدرس</div>
                                            <div>شماره تلفن</div>
                                        </div>
                                    </a>
                                </div>
                                <div class="py-3">
                                    <a href="#" class="z-depth-1 d-block">
                                        <div class="p-3 text-right">
                                            <div class="font-weight-bold">نام نمایندگی</div>
                                            <div>آدرس</div>
                                            <div>شماره تلفن</div>
                                        </div>
                                    </a>
                                </div>

                            </section>


                        </div>
                    </div>
                </li>
            </ul>

        </div>


    </div>
</nav>
<div class="navMenu z-depth-5 menuBarBtn active menuHover2">
    <div class="w-100 p-3 font-weight-bold text-black mb-0 ">
        <span class="textProduct"> کاتالوگ محصولات</span>
        <i class="fas fa-times"></i>
    </div>
    <div class="w-100 bg-black p-3 h5 mb-0 menuHover">
        <img src="{{asset($setting->image_white)}}" class="w-100" alt="">
    </div>
</div>

<div class="menuBar ">
    <div class="bg-slider" style="background-image: url('{{asset($setting->catalog_bg)}}')">
        <div class="coverBlack"></div>
        <div class="pt-menu">

            <div class="container">
                <div class="row">
                    <div class="col">
                        <ul class="d-flex flex-row  list-unstyled justify-content-end position-relative">
                            <li class="m-3 border-bottom "><a class="text-white menuHover" href="#">EN</a></li>
                            <li class="m-3"><a class="text-white menuHover" href="#">DE</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mt-5 example example-balance">
                            <ul>
                                @foreach($categories as $category)
                                    <li class="m-3"><a href="#"
                                                       class="text-white h4 menuHover">{{ $category->name }}</a></li>
                                    @foreach($category->products(10) as $product)
                                        <li class="m-3"><a class=" menuHover text-white"
                                                           href="{{ $product->link() }}">{{ $product->name }}</a>
                                        </li>
                                    @endforeach
                                @endforeach
                                {{-- <li class="m-3"><a class="text-white h3 menuHover" href="#">Rooms and suites</a>
                                 </li>
                                 <li class="m-3"><a class="text-white h3 menuHover" href="#">Rooms and suites</a>
                                 </li>
                                 <li class="m-3"><a class="text-white h3 menuHover" href="#">Rooms and suites</a>
                                 </li>--}}
                            </ul>
                            {{--<ul class=" list-unstyled mt-5">
                                <li class="m-3"><a class=" h5 menuHover text-white" href="#">Rooms and suites</a>
                                </li>
                                <li class="m-3"><a class=" h5 menuHover text-white" href="#">Rooms and suites</a>
                                </li>
                                <li class="m-3"><a class=" h5 menuHover text-white" href="#">Rooms and suites</a>
                                </li>
                            </ul>--}}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-5">
                            <div>
                                <span class="d-inline-block mr-3 bg-gray" style="width: 50px;height: 3px"></span>
                                <span class="text-white font-weight-bold">تماس با ما</span>
                            </div>
                            <ul class="text-white list-unstyled">
                                <li class="m-3"><span class=" h4 text-white menuHover"
                                                      href="#">{{$contact->phone}}</span></li>
                                <li class="m-3"><span class=" h4 text-white menuHover"
                                                      href="#">{{$contact->mobile}}</span></li>
                                <li class="m-3"><span class=" h4 text-white menuHover"
                                                      href="#">{{$contact->address_}}</span></li>
                            </ul>
                            <div class="mt-5">
                                <span class="d-inline-block mr-3 bg-gray" style="width: 50px;height: 3px"></span>
                                <span class="text-white font-weight-bold">ما را دنبال کنید</span>
                            </div>
                            <ul class="d-flex flex-row list-unstyled justify-content-end">
                                <li class="m-3"><a class="text-white menuHover" href="{{$contact->facebook_link}}"><i
                                                class="fab fa-facebook-f fa-lg"></i></a></li>
                                <li class="m-3"><a class="text-white menuHover" href="{{$contact->instagram_link}}"><i
                                                class="fab fa-instagram fa-lg"></i></a></li>
                                <li class="m-3"><a class="text-white menuHover" href="{{$contact->twitter_link}}"><i
                                                class="fab fa-twitter fa-lg"></i></a></li>
                                <li class="m-3"><a class="text-white menuHover" href="{{$contact->linkedin_link}}"><i
                                                class="fab fa-linkedin fa-lg"></i></a></li>
                                <li class="m-3"><a class="text-white menuHover" href="{{$contact->telegram_link}}"><i
                                                class="fab fa-telegram fa-lg"></i></a></li>
                            </ul>
                            <div>
                                <a href="#" class="button-circle-menu">
                                    <div class="text-gray mt-4">visit</div>
                                    <div class="text-white h3 mt-3">our blog</div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


</div>

<section class="my-Index">

    @yield('content')
    <footer class="bg-black222">
        <div class="p-5 text-center">
            <img src="{{asset($setting->image_white)}}" width="250"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{asset($footer_image->image)}}" width="82"/></div>
                <div class="col-md-6">
                    <ul class="list-unstyled d-lg-flex flex-lg-row justify-content-center">
                        @foreach($footer_links as $footer_link)
                        <li class="p-3"><a href="#" class="text-white">{{$footer_link->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="d-flex flex-row list-unstyled justify-content-center">
                        <li class="m-3"><a class="text-white menuHover" href="{{$contact->facebook_link}}"><i
                                        class="fab fa-facebook-f"></i></a></li>
                        <li class="m-3"><a class="text-white menuHover" href="{{$contact->instagram_link}}"><i
                                        class="fab fa-instagram"></i></a></li>
                        <li class="m-3"><a class="text-white menuHover" href="{{$contact->twitter_link}}"><i
                                        class="fab fa-twitter"></i></a></li>
                        <li class="m-3"><a class="text-white menuHover" href="{{$contact->linkedin_link}}"><i
                                        class="fab fa-linkedin"></i></a></li>
                        <li class="m-3"><a class="text-white menuHover" href="{{$contact->telegram_link}}"><i
                                        class="fab fa-telegram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-black py-3 text-center text-white">
            designed by CyanCoder
        </div>
    </footer>
</section>


<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/mdb.min.js"></script>
<script src="/js/script.js"></script>
<script src="/js/navbar.js"></script>
<script src="/js/slick.js"></script>
</body>
</html>


<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


@yield('script')
