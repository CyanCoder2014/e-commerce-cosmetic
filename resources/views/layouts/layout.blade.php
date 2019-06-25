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
    <a class="navbar-image" href="#"><img src="{{asset($setting->data['image_black'])}}"/></a>
    <button class="navbar-toggler text-black p-2" type="button" data-toggle="collapse" style="display: block"
            data-target="#navbarSupportedContent1"
            aria-controls="navbarSupportedContent1"
            aria-expanded="false" aria-label="Toggle navigation"><i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent1">
        <div class="w-100 boxShadowBottom text-black ml-xl-5">

            <ul class="nav flex-xs-column p-0 font-weight-bold h5 myNav">
                <li class="nav-item ">
                    <a href="#" class="text-black p-4 d-inline-block">دسته بندی محصولات</a>
                    <div class="dropdown-win">
                        <div class="bg-second shadow h-100 overflow-s">
                            <div class="container-fluid">
                                <div class="row">
                                    @foreach($categories as $key => $cat)
                                        <div class="col-md-2 pt-3 text-center item-hover">
                                            <a href="#">
                                                <div class="bg-background w-100" style="height: 150px;background-image:url('{{asset($cat->image)}}') "></div>

                                                <div class="text-center p-3">
                                                    {{$cat->name}}
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach


                                </div>
                            </div>


                        </div>
                    </div>
                </li>
                <li class="nav-item ">
                    <a href="/aboutus" class="text-black p-4 d-inline-block">درباره ما</a>
                </li>
                <li class="nav-item ">
                    <a href="#" class="text-black p-4 d-inline-block">تماس با ما</a>
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
        <img src="{{asset($setting->data['image_white'])}}" class="w-100" alt="">
    </div>
</div>
<div class="menuBar ">
    <div class="bg-slider">
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
                        <div class="mt-5">
                            <ul class=" list-unstyled">
                                <li class="m-3"><a class="text-white h3 menuHover" href="#">Rooms and suites</a>
                                </li>
                                <li class="m-3"><a class="text-white h3 menuHover" href="#">Rooms and suites</a>
                                </li>
                                <li class="m-3"><a class="text-white h3 menuHover" href="#">Rooms and suites</a>
                                </li>
                            </ul>
                            <ul class=" list-unstyled mt-5">
                                <li class="m-3"><a class=" h5 menuHover" href="#">Rooms and suites</a>
                                </li>
                                <li class="m-3"><a class=" h5 menuHover" href="#">Rooms and suites</a>
                                </li>
                                <li class="m-3"><a class=" h5 menuHover" href="#">Rooms and suites</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mt-5">
                            <div>
                                <span class="d-inline-block mr-3 bg-gray" style="width: 50px;height: 3px"></span>
                                <span class="text-gray font-weight-bold">WHERE WE ARE</span>
                            </div>
                            <ul class="text-white list-unstyled">
                                <li class="m-3"><span class=" h4 text-gray" href="#">4444444</span></li>
                                <li class="m-3"><span class=" h4 text-gray" href="#">555555</span></li>
                                <li class="m-3"><a class="text-white h4 menuHover" href="#">Rooms and suites</a>
                                </li>
                                <li class="m-3"><a class="text-white h4 menuHover" href="#">Rooms and suites</a>
                                </li>
                            </ul>
                            <div class="mt-5">
                                <span class="d-inline-block mr-3 bg-gray" style="width: 50px;height: 3px"></span>
                                <span class="text-gray font-weight-bold">FOLLOW US ON</span>
                            </div>
                            <ul class="d-flex flex-row list-unstyled justify-content-end">
                                <li class="m-3"><a class="text-white menuHover" href="#"><i
                                                class="fab fa-facebook-f"></i></a></li>
                                <li class="m-3"><a class="text-white menuHover" href="#"><i
                                                class="fab fa-instagram"></i></a></li>
                                <li class="m-3"><a class="text-white menuHover" href="#"><i
                                                class="fab fa-twitter"></i></a></li>
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
            <img src="{{asset($setting->data['image_white'])}}" width="250"/>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{asset($setting->data['image_white'])}}" width="82"/></div>
                <div class="col-md-6">
                    <ul class="list-unstyled d-lg-flex flex-lg-row justify-content-center">
                        <li class="p-3"><a href="#" class="text-white">DISCLAIMER & WEBSITE</a></li>
                        <li class="p-3"><a href="#" class="text-white">JOBS</a></li>
                        <li class="p-3"><a href="#" class="text-white">PRESS</a></li>
                        <li class="p-3"><a href="#" class="text-white">PRESS</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <ul class="d-flex flex-row list-unstyled justify-content-center">
                        <li class="m-3"><a class="text-white menuHover" href="{{$contact->data['facebook_link']}}"><i
                                        class="fab fa-facebook-f"></i></a></li>
                        <li class="m-3"><a class="text-white menuHover" href="{{$contact->data['instagram_link']}}"><i
                                        class="fab fa-instagram"></i></a></li>
                        <li class="m-3"><a class="text-white menuHover" href="{{$contact->data['twitter_link']}}"><i
                                        class="fab fa-twitter"></i></a></li>
                        <li class="m-3"><a class="text-white menuHover" href="{{$contact->data['linkedin_link']}}"><i
                                        class="fab fa-linkedin"></i></a></li>
                        <li class="m-3"><a class="text-white menuHover" href="{{$contact->data['telegram_link']}}"><i
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
