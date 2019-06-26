@extends('layouts.layout')
@section('title')
    {!! \Illuminate\Support\Str::words($product->name , $words = 6, $end = '...') !!}
@endsection
@section('header')
    <style>
        #exzoom {
            width: 100%;
            /*height: 400px;*/
        }

        .containerr {
            margin: auto;
            max-width: 960px;
        }

        .hidden {
            display: none;
        }

        .exzoom .exzoom_nav .exzoom_nav_inner span.current {
            border: none !important;
        }
    </style>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ"
            crossorigin="anonymous"></script>
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="/src/jquery.exzoom.js"></script>
    <link href="/src/jquery.exzoom.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript">

        $('.containerr').imagesLoaded(function () {
            $("#exzoom").exzoom({
                autoPlay: false,
            });
            $("#exzoom").removeClass('hidden')
        });
        $('.changeColor').hover(function () {
            var color = $(this).attr('data-key');
            var images = ['/photos/shares/801-promo.jpg', '/photos/shares/eyebrow-group(1).jpg', '/photos/shares/menu1.png']
            for (var i = 0; i <= images.length; i++) {
                $('.exzoom_img_ul li:eq( ' + i + ' ) img').attr('src', images[i])
                $('.exzoom_nav_inner span:eq( ' + i + ' ) img').attr('src', images[i])
            }


        })

    </script>
@endsection

@section('content')

    {{--<div class="view">

        <img src="pic/Wide-promo-compact-powder.png" class="w-100 heightScreen" alt="placeholder">
        <div class="mask waves-effect waves-light">
            <h1 class="white-text display-3 font-weight-bold titlePos">strong overlay</h1>
        </div>
    </div>
    <div class="openCarousel pt-3 pr-3"><i class="fas fa-search fa-3x"></i></div>
    <!--/.Carousel Wrapper-->
    <div class="carouselPlace animated fadeInDown">
        <div class="closeCarousel mt-3 mr-3 mb-5"><i class="fas fa-times fa-3x text-white fa-3x"></i></div>
        <div class="w-75 mx-auto mt-5">
            <img src="pic/Wide-promo-compact-powder.png" class="w-100" alt="placeholder">
        </div>
    </div>--}}
    {{--{{dd($product->features)}}--}}
    <div class="bg-second-index mt-menu parallax"
         style="background-image: url('{{$product->image[0]??'defualt'}}');clip-path: none">
        <div class="cover_bg-second"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-6">
                    <div>
                        <ul class="nav nav-tabs justify-content-end py-5" id="productTab" role="tablist">
                            @foreach($product->details as $key => $productInner)
                                <li class="nav-item">
                                    <a class="nav-link @if($key===0) active @endif" data-toggle="tab"
                                       href="#tab{{$key}}" role="tab"
                                       aria-controls="tab{{$key}}"
                                       aria-selected="true">{{$productInner->title}}</a>
                                </li>
                            @endforeach
                            {{--<li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                   aria-controls="profile"
                                   aria-selected="false">second</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                   aria-controls="contact"
                                   aria-selected="false">third</a>
                            </li>--}}
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            @foreach($product->details as $key => $productInner)
                                <div class="tab-pane @if($key===0) active show @endif animated slideInLeft"
                                     id="tab{{$key}}" role="tabpanel"
                                     aria-labelledby="tab{{$key}}">
                                    <div class="pb-3">
                                        {{-- <div class="font-weight-bold text-white">title2</div>--}}
                                        <div class="text-white">{{$productInner->description}}</div>
                                    </div>
                                    {{-- <div class="pb-3">
                                         <div class="font-weight-bold text-white">title2</div>
                                         <div class="text-gray">something2</div>
                                     </div>
                                     <div class="pb-3">
                                         <div class="font-weight-bold text-white">title2</div>
                                         <div class="text-gray">something2</div>
                                     </div>--}}
                                </div>
                            @endforeach
                            {{--<div class="tab-pane animated slideInLeft" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title3</div>
                                    <div class="text-gray">something3</div>
                                </div>
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title3</div>
                                    <div class="text-gray">something3</div>
                                </div>
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title3</div>
                                    <div class="text-gray">something3</div>
                                </div>
                            </div>
                            <div class="tab-pane animated slideInLeft" id="contact" role="tabpanel"
                                 aria-labelledby="contact-tab">
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title4</div>
                                    <div class="text-gray">something4</div>
                                </div>
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title4</div>
                                    <div class="text-gray">something4</div>
                                </div>
                                <div class="pb-3">
                                    <div class="font-weight-bold text-white">title4</div>
                                    <div class="text-gray">something4</div>
                                </div>
                            </div>--}}
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-white">
                    <h1 class="display-2">{{$product->name}}</h1>
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white p-5">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="containerr">
                        <div class="exzoom hidden" id="exzoom">
                            <div class="exzoom_img_box">
                                <ul class='exzoom_img_ul'>
                                    @foreach($product->image as $key => $productImage)
                                        <li><img src="{{$productImage}}"/></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="exzoom_nav"></div>
                            <p class="exzoom_btn">
                                <a href="javascript:void(0);" class="exzoom_prev_btn"> <i
                                            class="fas fa-chevron-left fa-2x"></i> </a>
                                <a href="javascript:void(0);" class="exzoom_next_btn"> <i
                                            class="fas fa-chevron-right fa-2x"></i> </a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 text-black text-right">
                    <h1 class="display-4">ویژگی های محصول</h1>
                    <ul class="my-3 list-unstyled">
                        @foreach($product->features as $key => $productFeatures)
                            <li class="nav-item text-right p-2 shadow">
                                {{$productFeatures->name}}
                            </li>
                        @endforeach
                    </ul>
                    <ul class="list-unstyled d-flex flex-row justify-content-end flex-wrap ml-3 p-3 border rounded">
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                        <li class="changeColor m-2 cursor-p rounded" data-key="colorNumber1"><img src="/pic/color.jpg" class="rounded" alt=""></li>
                    </ul>
                </div>

            </div>
            <div class="row border-top my-4">
                <div class="col-12 my-4">
                    <h3 class="my-5 text-center">Ratings & Reviews</h3>
                </div>
                <div class="col-md-6">
                    <div class="my-2 myProgress">
                        <span class="dir-r text-right">5 star</span><span class="float-left">555 نفر</span>
                        <div class="progress">
                            <div class="progress-bar bg-black" role="progressbar" style="width: 80%" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="my-2 myProgress">
                        <span>4 star</span><span class="float-left">555 نفر</span>
                        <div class="progress">
                            <div class="progress-bar bg-black" role="progressbar" style="width: 60%" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="my-2 myProgress">
                        <span>3 star</span><span class="float-left">555 نفر</span>
                        <div class="progress">
                            <div class="progress-bar bg-black" role="progressbar" style="width: 20%" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="my-2 myProgress">
                        <span>2 star</span><span class="float-left">555 نفر</span>
                        <div class="progress">
                            <div class="progress-bar bg-black" role="progressbar" style="width: 15%" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="my-2 myProgress">
                        <span>1 star</span><span class="float-left">555 نفر</span>
                        <div class="progress">
                            <div class="progress-bar bg-black" role="progressbar" style="width: 10%" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center mt-5">
                        <span><i class="fas fa-star fa-2x"></i></span>
                        <span><i class="fas fa-star fa-2x"></i></span>
                        <span><i class="fas fa-star fa-2x"></i></span>
                        <span><i class="fas fa-star-half-alt fa-2x"></i></span>
                        <span><i class="far fa-star fa-2x"></i></span>
                    </div>
                    <div class="text-center mt-3">4.5 / 5 stars</div>
                </div>


            </div>
            <div class="row border-top">
                <div class="col-md-8 text-right dir-r">
                    <div class="mt-4">
                        <span><i class="far fa-star"></i></span>
                        <span><i class="fas fa-star-half-alt"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>

                    </div>
                    <div class="font-weight-bold my-3">title</div>
                    <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad aut blanditiis culpa debitis
                        distinctio, ex facilis ipsam maxime minima nam necessitatibus nostrum odio, quos, tenetur
                        veniam. Exercitationem porro rerum tenetur!</p><a href="#">read more</a>
                    <div>
                        <button type="button" class="btn btn-outline-black btn-sm waves-effect">موافقم</button>
                        <button type="button" class="btn btn-outline-black btn-sm waves-effect">مخالفم</button>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mt-4">
                        <span class="px-2 font-weight-bold text-right">نام و نام خانوادگی</span>
                        <span class="px-2"><img src="/pic/g1.jpg" width="50" height="50" class="rounded-circle" alt=""></span>
                    </div>
                    <ul class="mt-3 list-unstyled dir-r">
                        <li class="font-small"><span
                                    class="font-weight-bold ml-2">سن</span>
                            <span>23</span>
                        </li>
                        <li class="font-small"> <span
                                    class="font-weight-bold ml-2">رنگ چشم</span><span>قهوه ای</span></li>
                        <li class="font-small"> <span
                                    class="font-weight-bold ml-2">رنگ مو</span><span>میشی</span></li>
                    </ul>
                </div>
            </div>
            {{-- <div class="row row-form">
                 <div class="col">
                     <div class="p-3">
                         <select class="browser-default custom-select custom-select-lg mb-3 dir-r">
                             <option selected>select menu</option>
                             <option value="1">One</option>
                             <option value="2">Two</option>
                             <option value="3">Three</option>
                         </select>
                     </div>
                 </div>
             </div>
             <div class="row">
                 <div class="col-md-6 py-3 border-right">
                     <div class="font-small text-center text-white">DEPARTURE</div>
                     <input class="persianDate w-100" placeholder="1398/3/6">
                     <div class="text-center"><i class="fas fa-chevron-down text-gray fa-2x"></i></div>
                 </div>
                 <div class="col-md-6 py-3 ">
                     <div class="font-small text-center text-white">DEPARTURE</div>
                     <input class="persianDate w-100" placeholder="1398/3/6">
                     <div class="text-center"><i class="fas fa-chevron-down text-gray fa-2x"></i></div>
                 </div>
                 <div class="col-md-6 py-3 border-top">
                     <div class="font-small text-center text-white">DEPARTURE</div>
                     <select class="browser-default custom-select mySelect custom-select-lg">
                         <option selected>02</option>
                         <option value="1">One</option>
                         <option value="2">Two</option>
                         <option value="3">Three</option>
                     </select>
                     <div class="text-center"><i class="fas fa-chevron-down text-gray fa-2x"></i></div>
                 </div>
                 <div class="col-md-6 py-3 border-top border-left">
                     <div class="font-small text-center text-white">DEPARTURE</div>
                     <select class="browser-default custom-select mySelect custom-select-lg">
                         <option selected>02</option>
                         <option value="1">One</option>
                         <option value="2">Two</option>
                         <option value="3">Three</option>
                     </select>
                     <div class="text-center"><i class="fas fa-chevron-down text-gray fa-2x"></i></div>
                 </div>
                 <div class="col-12">
                     <button type="button" class="btn btn-white btn-block text-black mt-4">Primary</button>
                 </div>
             </div>--}}
        </div>
    </div>
@endsection

