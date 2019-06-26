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
    <div class="bg-white p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div>
                        <span class="text-gray font-weight-bold">{{$setting->data['about_us_more2']}}</span>
                        <span class="d-inline-block ml-3 bg-gray" style="width: 50px;height: 3px"></span>
                    </div>
                    <h1 class="font-weight-bold mt-3">{{$setting->data['about_us_title']}}</h1>
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
    <div class="bg-second-index parallax mt-5"
         style="background-image: url('{{asset($setting->about_us_image_bg)}}');clip-path: none">
        <div class="cover_bg-second"></div>
        <div class="container">
            <div class="row">
               <div class="col-md-12">
                   <div id="about-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                       <ol class="carousel-indicators">
                           @foreach($sliderAboutUs2 as $key => $sliderAboutUs4)
                               <li data-target="#about-carousel" data-slide-to="{{$key}}" @if($key===0) class="active" @endif >
                                   <div>{{$sliderAboutUs4->year}}</div>
                               </li>
                           @endforeach
                       </ol>
                       <div class="carousel-inner">
                           @foreach($sliderAboutUs2 as $key => $sliderAboutUs3)
                               <div class="carousel-item @if($key===0) active @endif">
                                   <div class="container ">
                                       <div class="row">
                                           <div class="col-md-6">
                                               <img src="{{$sliderAboutUs3->image}}"
                                                    class="w-100" alt="placeholder">
                                           </div>
                                           <div class="col-md-6 pl-4">
                                               <h3 class="text-white mt-3">{{$sliderAboutUs3->title}}</h3>
                                               <p class="text-gray mt-3">{{$sliderAboutUs3->description}}</p>
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           @endforeach
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