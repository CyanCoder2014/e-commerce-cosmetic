@extends('layouts.layout')


@section('title')
    فروشگاه pippa
@endsection



@section('header')

@endsection
@section('content')

    <div id="carousel-index" class="carousel slide" data-ride="carousel">
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            {{--<div class="carousel-item active">
                <div class="view">
                    <div class="w-100 heightScreen bg-img"
                         style="background-image: url('pic/WhatsApp Image 2019-05-31 at 6.02.57 PM.jpeg')"></div>

                    <div class="mask rgba-black-light"></div>
                </div>
                <div class="carousel-caption">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 mt-menu">
                                <img src="pic/pippa%20-%20gr-%2001-12.png" class="w-100" alt="">
                            </div>
                            <div class="col-md-6">
                                <img src="pic/pippa%20-%20gr-%2001-15.png" class="w-75 ml-auto mt-5" alt="">
                            </div>
                        </div>
                    </div>

                </div>
            </div>--}}
            @foreach($sliderFirst as $key => $sliderFirst)
                <div class="carousel-item @if($key===0) active @endif">
                    <!--Mask color-->
                    <div class="view">
                        <div class="w-100 heightScreen bg-img"
                             style="background-image: url('{{$sliderFirst->image}}')"></div>

                        <div class="mask rgba-black-light"></div>
                    </div>
                    <div class="carousel-caption">
                        <h1 class="display-2 text-right">{{$sliderFirst -> title}}</h1>
                        <p class="text-right">{{$sliderFirst->description}}</p>
                        <a href="{{$sliderFirst->link}}" class="text-white border-bottom">ادامه مطلب</a>
                    </div>
                </div>
            @endforeach
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-index" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-index" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
    <!--/.Carousel Wrapper-->

    <div class="bg-second-index dir-r bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-black">
                    <img src="{{$setting->data['image_black']}}" class="w-75 mx-auto d-block" alt="">
                    <p class="text-center">{{$setting->data['about_us']}}</p>
                </div>
                <div class="col-md-6">
                    <img src="{{$setting->data['about_us_image']}}" class="w-100 secondBgImg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="bg-items">
        <div class="container-fluid position-relative">
            <span class="catalogProduct menuBarBtn active menuHover2">
                <h3 class="text-black font-weight-bold m-3">کاتالوگ محصولات</h3>
                <div class="bg-black">
                    <img src="{{$setting->data['image_white']}}" class="w-100" alt="">

                </div>
            </span>
            <div class="row">
                <div class="col-md-5 p-0">
                    <div class="height1">
                        <div class="view overlay grow">
                            <a href="#" class="d-block">
                                <img src="{{$setting->data['catalog_left_top_image']}}" class="w-100 "
                                     alt="smaple image">
                                <div class="text-overlay">{{$setting->data['catalog_left_top_title']}}</div>
                                <div class="mask flex-center rgba-black-light">
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="height2">
                        <div class="view overlay grow">
                            <a href="#" class="d-block">
                                <img src="{{$setting->data['catalog_left_bottom_image']}}" class="w-100 "
                                     alt="smaple image">
                                <div class="text-overlay">{{$setting->data['catalog_left_bottom_title']}}</div>
                                <div class="mask flex-center rgba-black-light">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 p-0 height3 overflow-h">
                    <div class="view overlay grow">
                        <a href="#" class="d-block">
                            <img src="{{$setting->data['catalog_right_image']}}" class="w-100 "
                                 alt="smaple image">
                            <div class="text-overlay">{{$setting->data['catalog_right_title']}}</div>
                            <div class="mask flex-center rgba-black-light">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">

        <section class="slick2 slickSlider">
            {{--{{dd($products)}}--}}
            @foreach($products as $key => $productsIn)
                <div>
                    <div class="product-item">
                        <div style="height: 300px">
                            <div class="img-product1"
                                 style="background-image: url('{{$productsIn->image[0]??'defualt'}}');"></div>

                            <div class="img-product2"
                                 style="background-image: url('{{$productsIn->image[1]??'defualt'}}');"></div>
                        </div>

                        {{--<div class="img-product1" style="background-image: url('{{$products->image}}');"></div>
                        <div class="img-product2" style="background-image: url('{{$products->image}}');"></div>--}}
                        <div class="p-3 font-weight-bold">{{$productsIn->name}}</div>
                        <div>{{$productsIn->datadescription}}</div>
                        <button type="button" class="btn btn-block waves-effect productBtn">خرید</button>
                        </p>
                    </div>
                </div>
            @endforeach
        </section>

    </div>
    <div class="moving-card">
        <div class="item-flex">
            <a href="#">
                <div class="bg-background w-100 heightItem h-100"
                     style="background-image:url('{{$setting->data['grow_image1']}}') "></div>
                <div class="item-flex-text">{{$setting->data['grow_image1_text']}}</div>
            </a>

        </div>
        <div class="item-flex">
            <a href="#">
                <div class="bg-background w-100 heightItem h-100"
                     style="background-image:url('{{$setting->data['grow_image2']}}') "></div>
                <div class="item-flex-text">{{$setting->data['grow_image2_text']}}</div>
            </a>
        </div>
        <div class="item-flex">
            <a href="#">
                <div class="bg-background w-100 heightItem h-100"
                     style="background-image:url('{{$setting->data['grow_image3']}}') "></div>
                <div class="item-flex-text">{{$setting->data['grow_image3_text']}}</div>
            </a>
        </div>
        <div class="item-flex">
            <a href="#">
                <div class="bg-background w-100 heightItem h-100"
                     style="background-image:url('{{$setting->data['grow_image4']}}') "></div>
                <div class="item-flex-text">{{$setting->data['grow_image4_text']}}</div>
            </a>
        </div>
    </div>
    <div>
        <div class="bg-background position-relative bg-white">

            <!--<div class="bg-pink-glass"></div>-->
            <ul class="nav nav-tabs justify-content-center py-5" id="myTab" role="tablist">
                @foreach($cats as $key => $cat)
                    <li class="nav-item p-0 mx-2">
                        <a class="nav-link @if($key===0) active @endif m-0" id="myTab{{$key}}href" data-toggle="tab"
                           href="#myTab{{$key}}" role="tab"
                           aria-controls="myTab{{$key}}"
                           aria-selected="true">
                            <button type="button" class="btn btn-outline-myPink waves-effect">{{$cat->name}}</button>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="tab-content" id="myTabContent">
            @foreach($cats as $key => $cat)
                <div class="tab-pane fade  @if($key===0) active show @endif" id="myTab{{$key}}" role="tabpanel"
                     aria-labelledby="myTab{{$key}}-tab">
                    <div class="grid">

                        @foreach($cat->products() as $key1 => $productsInner)
                            {{-- {{dd($productsInner)}}--}}
                            @switch($key1%8)

                                @case(0)
                                <div class="@if($key%2===0) grid-item1 @else grid-item2 @endif grid-item--width2 grid-item--height4">
                                    <a href="{{$productsInner->link()}}">
                                        <div class="view overlay cursor-p">

                                            <div class="bg-background grid-item--height4"
                                                 style="background-image: url('{{$productsInner->image[0]??'defualt'}}');"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">{{$productsInner->name}}</div>
                                                    <div class="font-small">{!!$productsInner->description!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @break
                                @case(1)
                                <div class="@if($key%2===0) grid-item1 @else grid-item2 @endif grid-item--width2 grid-item--height4">
                                    <a href="{{$productsInner->link()}}">
                                        <div class="view overlay cursor-p">

                                            <div class="bg-background grid-item--height4"
                                                 style="background-image: url('{{$productsInner->image[0]??'defualt'}}')"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">{{$productsInner->name}}</div>
                                                    <div class="font-small">{!!$productsInner->description!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @break
                                @case(2)
                                <div class="@if($key%2===0) grid-item1 @else grid-item2 @endif grid-item--height2">
                                    <a href="{{$productsInner->link()}}">
                                        <div class="view overlay cursor-p">

                                            <div class="bg-background grid-item--height2"
                                                 style="background-image: url('{{$productsInner->image[0]??'defualt'}}')"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">{{$productsInner->name}}</div>
                                                    <div class="font-small">{!!$productsInner->description!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @break
                                @case(3)
                                <div class="@if($key%2===0) grid-item1 @else grid-item2 @endif grid-item--height2">
                                    <a href="{{$productsInner->link()}}">
                                        <div class="view overlay cursor-p">

                                            <div class="bg-background grid-item--height2"
                                                 style="background-image: url('{{$productsInner->image[0]??'defualt'}}')"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">{{$productsInner->name}}</div>
                                                    <div class="font-small">{!!$productsInner->description!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @break
                                @case(4)
                                <div class="@if($key%2===0) grid-item2 @else grid-item1 @endif grid-item--width2 grid-item--height4">
                                    <a href="{{$productsInner->link()}}">
                                        <div class="view overlay cursor-p">

                                            <div class="bg-background grid-item--height4"
                                                 style="background-image: url('{{$productsInner->image[0]??'defualt'}}');"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">{{$productsInner->name}}</div>
                                                    <div class="font-small">{!!$productsInner->description!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @break
                                @case(5)
                                <div class="@if($key%2===0) grid-item2 @else grid-item1 @endif grid-item--width2 grid-item--height4">
                                    <a href="{{$productsInner->link()}}">
                                        <div class="view overlay cursor-p">

                                            <div class="bg-background grid-item--height4"
                                                 style="background-image: url('{{$productsInner->image[0]??'defualt'}}');"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">{{$productsInner->name}}</div>
                                                    <div class="font-small">{!!$productsInner->description!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @break
                                @case(6)
                                <div class="@if($key%2===0) grid-item2 @else grid-item1 @endif grid-item--height2">
                                    <a href="{{$productsInner->link()}}">
                                        <div class="view overlay cursor-p">

                                            <div class="bg-background grid-item--height2"
                                                 style="background-image: url('{{$productsInner->image[0]??'defualt'}}')"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">{{$productsInner->name}}</div>
                                                    <div class="font-small">{!!$productsInner->description!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @break
                                @case(7)
                                <div class="@if($key%2===0) grid-item2 @else grid-item1 @endif grid-item--height2">
                                    <a href="{{$productsInner->link()}}">
                                        <div class="view overlay cursor-p">

                                            <div class="bg-background grid-item--height2"
                                                 style="background-image: url('{{$productsInner->image[0]??'defualt'}}')"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">{{$productsInner->name}}</div>
                                                    <div class="font-small">{!!$productsInner->description!!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                @break
                            @endswitch
                        @endforeach
                        {{--<div class="grid-item grid-item--width2">
                            <div class="view overlay">
                                <div class="bg-background"
                                     style="background-image: url('pic/800-table.jpg');height: 400px"></div>
                                <div class="mask rgba-black-light">
                                    <div class="textHover">
                                        <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                  height="90" alt=""></div>
                                        <div class="font-weight-bold py-3">header</div>
                                        <div class="font-small">Achieve full and hydrating coverage with the
                                            Caché Crème Satin Foundation
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="view overlay">
                                <div class="bg-background"
                                     style="background-image: url('pic/Wide-promo-foundation.jpg');height: 300px"></div>
                                <div class="mask rgba-black-light">
                                    <div class="textHover">
                                        <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                  height="90" alt=""></div>
                                        <div class="font-weight-bold py-3">header</div>
                                        <div class="font-small">Achieve full and hydrating coverage with the
                                            Caché Crème Satin Foundation
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="view overlay">
                                <div class="bg-background"
                                     style="background-image: url('pic/800-table.jpg');height: 400px"></div>
                                <div class="mask rgba-black-light">
                                    <div class="textHover">
                                        <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                  height="90" alt=""></div>
                                        <div class="font-weight-bold py-3">header</div>
                                        <div class="font-small">Achieve full and hydrating coverage with the
                                            Caché Crème Satin Foundation
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="grid-item">
                            <div class="view overlay">
                                <div class="bg-background"
                                     style="background-image: url('pic/Wide-promo-foundation.jpg');height: 300px"></div>
                                <div class="mask rgba-black-light">
                                    <div class="textHover">
                                        <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                  height="90" alt=""></div>
                                        <div class="font-weight-bold py-3">header</div>
                                        <div class="font-small">Achieve full and hydrating coverage with the
                                            Caché Crème Satin Foundation
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>--}}

                    </div>
                    {{--<div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8 p-0">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-6 p-0">
                                            <div class="view overlay">
                                                <div class="bg-background"
                                                     style="background-image: url('pic/800-table.jpg');height: 300px"></div>
                                                <div class="mask rgba-black-light">
                                                    <div class="textHover">
                                                        <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                                  height="90" alt=""></div>
                                                        <div class="font-weight-bold py-3">header</div>
                                                        <div class="font-small">Achieve full and hydrating coverage with the
                                                            Caché Crème Satin Foundation
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 p-0">
                                            <div class="view overlay">
                                                <div class="bg-background"
                                                     style="background-image: url('pic/lipstick-closeup.jpg');height: 300px"></div>
                                                <div class="mask rgba-black-light">
                                                    <div class="textHover">
                                                        <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                                  height="90" alt=""></div>
                                                        <div class="font-weight-bold py-3">header</div>
                                                        <div class="font-small">Achieve full and hydrating coverage with the
                                                            Caché Crème Satin Foundation
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 p-0">
                                            <div class="view overlay">
                                                <div class="bg-background"
                                                     style="background-image: url('pic/Wide-promo-foundation.jpg');height: 500px"></div>
                                                <div class="mask rgba-black-light">
                                                    <div class="textHover">
                                                        <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                                  height="90" alt=""></div>
                                                        <div class="font-weight-bold py-3">header</div>
                                                        <div class="font-small">Achieve full and hydrating coverage with the
                                                            Caché Crème Satin Foundation
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4 p-0">
                                <div>
                                    <div class="view overlay">
                                        <div class="bg-background"
                                             style="background-image: url('pic/nightfall-promo.jpg');height: 500px"></div>
                                        <div class="mask rgba-black-light">
                                            <div class="textHover">
                                                <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                          height="90" alt=""></div>
                                                <div class="font-weight-bold py-3">header</div>
                                                <div class="font-small">Achieve full and hydrating coverage with the Caché
                                                    Crème Satin Foundation
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="view overlay">
                                        <div class="bg-background"
                                             style="background-image: url('pic/eyebrow-group(1).jpg');height: 300px"></div>
                                        <div class="mask rgba-black-light">
                                            <div class="textHover">
                                                <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                          height="90" alt=""></div>
                                                <div class="font-weight-bold py-3">header</div>
                                                <div class="font-small">Achieve full and hydrating coverage with the Caché
                                                    Crème Satin Foundation
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>--}}
                </div>
            @endforeach
            {{--<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 p-0">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12 p-0">
                                        <div class="view overlay">
                                            <div class="bg-background"
                                                 style="background-image: url('pic/Wide-promo-foundation.jpg');height: 500px"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">header</div>
                                                    <div class="font-small">Achieve full and hydrating coverage with the
                                                        Caché Crème Satin Foundation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 p-0">
                                        <div class="view overlay">
                                            <div class="bg-background"
                                                 style="background-image: url('pic/800-table.jpg');height: 300px"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">header</div>
                                                    <div class="font-small">Achieve full and hydrating coverage with the
                                                        Caché Crème Satin Foundation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <div class="view overlay">
                                            <div class="bg-background"
                                                 style="background-image: url('pic/lipstick-closeup.jpg');height: 300px"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">header</div>
                                                    <div class="font-small">Achieve full and hydrating coverage with the
                                                        Caché Crème Satin Foundation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4 p-0">

                            <div>
                                <div class="view overlay">
                                    <div class="bg-background"
                                         style="background-image: url('pic/eyebrow-group(1).jpg');height: 300px"></div>
                                    <div class="mask rgba-black-light">
                                        <div class="textHover">
                                            <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                      height="90" alt=""></div>
                                            <div class="font-weight-bold py-3">header</div>
                                            <div class="font-small">Achieve full and hydrating coverage with the Caché
                                                Crème Satin Foundation
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="view overlay">
                                    <div class="bg-background"
                                         style="background-image: url('pic/nightfall-promo.jpg');height: 500px"></div>
                                    <div class="mask rgba-black-light">
                                        <div class="textHover">
                                            <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                      height="90" alt=""></div>
                                            <div class="font-weight-bold py-3">header</div>
                                            <div class="font-small">Achieve full and hydrating coverage with the Caché
                                                Crème Satin Foundation
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 p-0">
                            <div>
                                <div class="view overlay">
                                    <div class="bg-background"
                                         style="background-image: url('pic/nightfall-promo.jpg');height: 500px"></div>
                                    <div class="mask rgba-black-light">
                                        <div class="textHover">
                                            <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                      height="90" alt=""></div>
                                            <div class="font-weight-bold py-3">header</div>
                                            <div class="font-small">Achieve full and hydrating coverage with the Caché
                                                Crème Satin Foundation
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="view overlay">
                                    <div class="bg-background"
                                         style="background-image: url('pic/eyebrow-group(1).jpg');height: 300px"></div>
                                    <div class="mask rgba-black-light">
                                        <div class="textHover">
                                            <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                      height="90" alt=""></div>
                                            <div class="font-weight-bold py-3">header</div>
                                            <div class="font-small">Achieve full and hydrating coverage with the Caché
                                                Crème Satin Foundation
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-8 p-0">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 p-0">
                                        <div class="view overlay">
                                            <div class="bg-background"
                                                 style="background-image: url('pic/800-table.jpg');height: 300px"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">header</div>
                                                    <div class="font-small">Achieve full and hydrating coverage with the
                                                        Caché Crème Satin Foundation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 p-0">
                                        <div class="view overlay">
                                            <div class="bg-background"
                                                 style="background-image: url('pic/lipstick-closeup.jpg');height: 300px"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">header</div>
                                                    <div class="font-small">Achieve full and hydrating coverage with the
                                                        Caché Crème Satin Foundation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 p-0">
                                        <div class="view overlay">
                                            <div class="bg-background"
                                                 style="background-image: url('pic/Wide-promo-foundation.jpg');height: 500px"></div>
                                            <div class="mask rgba-black-light">
                                                <div class="textHover">
                                                    <div><img src="pic/pippa-logo-800px.png" class="m-auto" width="140"
                                                              height="90" alt=""></div>
                                                    <div class="font-weight-bold py-3">header</div>
                                                    <div class="font-small">Achieve full and hydrating coverage with the
                                                        Caché Crème Satin Foundation
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>--}}
        </div>
    </div>
    <div>
        <div class="text-center font-weight-bold py-5">پیام در اینستاگرام</div>
        <div>
            <section class="slick3 slickSlider2">
                <div>
                    <img src="pic/g2.jpg" class="w-100">
                </div>
                <div>
                    <img src="pic/g3.jpg" class="w-100">
                </div>
                <div>
                    <img src="pic/g4.jpg" class="w-100">
                </div>
                <div>
                    <img src="pic/g5.jpg" class="w-100">
                </div>
                <div>
                    <img src="pic/g6.jpg" class="w-100">
                </div>
            </section>
        </div>
    </div>
<div class="dir-r text-right">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb pb-0 pr-5 mb-0 py-2 bg-white z-depth-2 font-small">
                <li class="breadcrumb-item "><a href="#">خانه</a></li>
                <li class="breadcrumb-item active ">نمایندگان فروش و خدمات پس از فروش</li>
            </ol>
        </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-4">
                <div class=my-3">
                    نمایش فهرست نمایندگی های مجاز فروش و خدمان پس از فروش
                    pippa در ذیل داده میشود
                </div>
                <div class="bg-black mt-3 text-white p-2 z-depth-1 rounded">استان مورد
                    نظر خود را انتخاب کنید
                </div>
                <div class="agent-prrovince-background pb-4">
                    <div class="container-fluid">


                        <form method="get"
                              action="" id="agentform">


                            <div class="row p-3 bg-white mt-3">


                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-4 pt-1 font-small"> نام
                                            استان:
                                        </div>
                                        <div class="col-md-8">


                                            <select name="city"
                                                    class="browser-default custom-select custom-select-sm"
                                                    id="city">
                                                <option selected>نام استان را انتخاب
                                                    کنید
                                                </option>
                                                <option value="azarbayjan sharghi">
                                                    آذربایجان شرقی
                                                </option>
                                                <option value="azarbayjan gharbi">
                                                    آذربایجان غربی
                                                </option>
                                                <option value="ardebil">اردبیل
                                                </option>
                                                <option value="esfehan">اصفهان
                                                </option>
                                                <option value="alborz">البرز
                                                </option>
                                                <option value="ilam">ایلام</option>
                                                <option value="bushehr">بوشهر
                                                </option>
                                                <option value="tehran">تهران
                                                </option>
                                                <option value="mahal">چهارمحال
                                                    بختیاری
                                                </option>
                                                <option value="khorasan jonubi">
                                                    خراسان جنوبی
                                                </option>
                                                <option value="khorasan razavi">
                                                    خراسان رضوی
                                                </option>
                                                <option value="khorasan shomali">
                                                    خراسان شمالی
                                                </option>
                                                <option value="khuzestan">خوزستان
                                                </option>
                                                <option value="zanjan">زنجان
                                                </option>
                                                <option value="semnan">سمنان
                                                </option>
                                                <option value="sistan">سیستان و
                                                    بلوچستان
                                                </option>
                                                <option value="fars">فارس</option>
                                                <option value="ghazvin">قزوین
                                                </option>
                                                <option value="ghom">قم</option>
                                                <option value="kordestan">کردستان
                                                </option>
                                                <option value="kerman">کرمان
                                                </option>
                                                <option value="kermanshah">
                                                    کرمانشاه
                                                </option>
                                                <option value="kohgiluye">کهکیلویه و
                                                    بویراحمد
                                                </option>
                                                <option value="golestan">گلستان
                                                </option>
                                                <option value="gilan">گیلان</option>
                                                <option value="lorestan">لرستان
                                                </option>
                                                <option value="mazandaran">
                                                    مازندران
                                                </option>
                                                <option value="markazi">مرکزی
                                                </option>
                                                <option value="hormozgan">هرمزگان
                                                </option>
                                                <option value="hamedan">همدان
                                                </option>
                                                <option value="yazd">یزد</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-md-4">

                                    <!-- <span class="agent-border-color ">
                                         <a class=" p-1">
                                         <i class="fas fa-key"></i>
                                             </a>
                                     </span>
                                             <span class="font11">فروش</span>
                                             <span class="agent-border-color">
                                             <a class=" p-1">
                                    <i class="fas fa-wrench"></i>
                                             </a>
                                     </span>
                                             <span class="font11">خدمات پس از فروش</span>

                                             -->
                                </div>
                            </div>
                        </form>


                    </div>
                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <div class="bg-pink p-2 text-white z-depth-1">عنوان</div>

                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12958.568448977405!2d51.411705618567204!3d35.71042366599737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e0166f8cc432f%3A0x3dca3f769a547d6a!2sKachiran!5e0!3m2!1sen!2ses!4v1544976503063"
                        frameborder="0" style="border:0; height: 160px"
                        class=" w-100"
                        allowfullscreen></iframe>


            </div>
            <div class="col-md-8 col-sm-12">
                <div class=" p-2 bg-pink text-white z-depth-1">
                    <div>نام نماینده اصلی</div>
                </div>

                <hr class="m-0 hr-agent">
                <ul class=" p-2 m-3">
                    <li><span>استان :</span><span>تهران</span></li>
                    <li><span>شهر :</span><span>تهران</span></li>
                    <li><span>آدرس :</span><span>تهران</span></li>
                    <li><span>تلفن :</span><span>تهران</span></li>
                    <li><span>فکس :</span><span>تهران</span></li>
                    <li><span>ایمیل :</span><span>تهران</span></li>
                    <li><span>سایت :</span><span>تهران</span></li>
                    <li><span>توضیحات :</span><span>تهران</span></li>

                </ul>
            </div>
        </div>
    </div>


</div>



@endsection


@section('script')
    {{--<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>--}}
    <script>
        $('.grid').masonry({
            itemSelector: '.grid-item',
        });
    </script>
@endsection
