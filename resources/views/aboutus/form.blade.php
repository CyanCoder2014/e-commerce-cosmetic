@extends('layouts.layout')

@section('content')




    {{--<div class="view">
        <div class="w-100 heightScreen bg-img" style="background-image: url('pic/schwan-cosmetics-tomorrows-beauty-now-header-start.jpg')"></div>
        <div class="mask waves-effect waves-light">
            <h1 class="white-text display-3 font-weight-bold titlePos">strong overlay</h1>
        </div>
    </div>
    <div class="openCarousel pt-3 pr-3"><i class="far fa-folder-open fa-3x"></i></div>
    <div class="carouselPlace animated fadeInDown">
        <div class="closeCarousel mt-3 mr-3 mb-5"><i class="fas fa-times fa-3x text-white fa-3x"></i></div>
        <div id="carouselAbout" class="carousel slide w-75 m-auto" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="pic/Wide-promo-lipsticks.png"
                         alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="pic/Wide-promo-lip-gloss.jpg"
                         alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="pic/Wide-promo-foundation.jpg"
                         alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselAbout" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"><i
                            class="fas fa-chevron-left fa-2x"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselAbout" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"><i
                            class="fas fa-chevron-right fa-2x"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>--}}
    <!--/.Carousel Wrapper-->

    <div class="bg-second-index dir-r mt-menu parallax"
         style="background-image: url('{{asset($setting->about_us_image_bg)}}');clip-path: none">
        <div class="cover_bg-second"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-white">
                    <img src="{{$setting->data['image_white']}}" class="w-75 mx-auto d-block" alt="">
                    <p class="text-center">{{$setting->data['about_us']}}</p>
                </div>
                <div class="col-md-6">
                    <img src="{{$setting->data['about_us_image']}}" class="w-100 secondBgImg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-black p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div>
                        <span class="text-gray font-weight-bold">{{$setting->data['about_us_more2']}}</span>
                        <span class="d-inline-block ml-3 bg-gray" style="width: 50px;height: 3px"></span>
                    </div>
                    <h1 class="text-white font-weight-bold mt-3">{{$setting->data['about_us_title']}}</h1>
                </div>
                <div class="col-md-7 ">
                    <div class="text-gray">
                        {{$setting->data['about_us_more']}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="mt-5"><img src="{{$setting->data['about_us_image2']}}" class="w-100"/></div>
                </div>
                <div class="col-md-7 ">
                    <div id="carouselSliderAboutUs" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($sliderAboutUs as $key => $sliderAboutUs)
                                <div class="carousel-item @if($key===0) active @endif">
                                    <img class="d-block w-100"
                                         src="{{$sliderAboutUs->image}}"
                                         alt="First slide">
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselSliderAboutUs" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselSliderAboutUs" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-carousel">
        <div class="view padding-14">
            <img src="{{asset($setting->about_us_image_bg)}}" class="w-100" alt="placeholder">
            <div class="mask flex-center waves-effect waves-light rgba-black-strong">
                <div>
                    <div id="about-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#about-carousel" data-slide-to="0" class="active">
                                <div>1994</div>
                            </li>
                            <li data-target="#about-carousel" data-slide-to="1">
                                <div>2000</div>
                            </li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="container ">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="pic/schwan-cosmetics-products-inspiration-06gr.jpg"
                                                 class="w-100" alt="placeholder">
                                        </div>
                                        <div class="col-md-6 pl-4">
                                            <h3 class="text-white mt-3">WE ARE PROUD TO PRESENT THE 7132 HOTEL’S
                                                COWS.</h3>
                                            <p class="text-gray mt-3">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Aliquid culpa
                                                dicta dolorum eaque eos et laborum, omnis quae. A adipisci, at earum
                                                maxime nam quia quis ratione soluta tempora totam!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="pic/schwan-cosmetics-products-inspiration-02gr.jpg" class="w-100"
                                                 alt="placeholder">
                                        </div>
                                        <div class="col-md-6 pl-4">
                                            <h3 class="text-white mt-3">WE ARE PROUD TO PRESENT THE 7132 HOTEL’S
                                                COWS.</h3>
                                            <p class="text-gray mt-3">Lorem ipsum dolor sit amet, consectetur
                                                adipisicing elit. Aliquid culpa
                                                dicta dolorum eaque eos et laborum, omnis quae. A adipisci, at earum
                                                maxime nam quia quis ratione soluta tempora totam!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#about-carousel" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"><i
                                        class="fas fa-chevron-left fa-3x"></i></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#about-carousel" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"><i
                                        class="fas fa-chevron-right fa-3x"></i></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection