@extends('layouts.layout')
{{--namayeshe brands--}}
@section('title')
    {{$profileseller->company}}
@endsection
@section('header')
    <style>
        .maxim {
            max-width: 220px !important;
            max-height: 330px !important;
        }
    </style>
@endsection


@section('content')
    <div class="container pt-menu">
        <div class="row">
            <div class="col">
                <h2 class="text-center"></h2>
            </div>
        </div>
        <div class="row">
            <div class="col text-right">
                @if(isset($profileseller->logo_img))
                <div style="max-height: 250px;overflow: hidden">
                    <img src="{{ asset($profileseller->logo_img) }}" height="60" width="60"/>
                </div>
                @endif
                <div class="font-weight-bold">{{$profileseller->company}}</div>
                <div>
                    <span><i class="fas fa-phone"></i></span>
                    <span><a href="tel:{{$profileseller->tell}}" class="text-gold">{{$profileseller->tell}}</a></span>
                </div>
                <div>
                    <span><i class="fas fa-globe"></i></span>
                    <span><a href="{{$profileseller->site}}" class="text-blue">سایت</a></span>
                </div>
                <div>
                    <span><i class="fas fa-map-pin"></i> استان , شهر:</span>
                    <span>{{ $profileseller->country->province->name }} , {{ $profileseller->country->name }}</span>
                </div>
                <div>
                    <span><i class="fas fa-address-card"></i> آدرس:</span>
                    <span>{{ $profileseller->address }}</span>
                </div>
                <div>
                    <span><i class="fas fa-map"></i> کدپستی:</span>
                    <span>{{ $profileseller->post_code }}</span>
                </div>
            </div>
            <div class="col text-right">
                <div class="mt-2">
                    <span><i class="fas fa-user"></i></span>
                    <span>{{$profileseller->user->name}}</span>
                </div>
                @if(isset($profileseller->place_img))
                    <div style="max-height: 150px;overflow: hidden">
                        <img src="{{ asset($profileseller->place_img) }}"  width="100%"/>
                    </div>
                @endif
                <div class="mt-2">
                    <span><i class="fas fa-info"></i></span>
                    <span>{{ $profileseller->intro }}</span>
                </div>
                {{--<div></div>--}}
                {{--<div class="mt-5">--}}
                        {{--<span class="text-gold">--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                        {{--</span>--}}
                {{--</div>--}}
                {{--<div style="direction: ltr">--}}
                    {{--<a href="#" class="text-gold"> Reviews: 365 </a>--}}
                    {{--<span>|</span>--}}
                    {{--<span>4.9 out of 5 stars   </span>--}}
                {{--</div>--}}
                {{--<div>--}}
                    {{--<span>Detailed explanation of ratings</span>--}}
                    {{--<span class="text-underline text-gold p-2" data-toggle="popover" title="Popover title"--}}
                          {{--data-content="And here's some amazing content. It's very engaging. Right?"><i--}}
                                {{--class="fas fa-exclamation"></i></span>--}}
                {{--</div>--}}
                {{--<div class="mt-2">--}}
                {{--<span class="text-gold font-size-13">--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                        {{--</span>--}}
                    {{--<span> 4.8	Shipping </span>--}}
                {{--</div>--}}
                {{--<div class="mt-2">--}}
                {{--<span class="text-gold font-size-13">--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                        {{--</span>--}}
                    {{--<span> 4.8	Shipping </span>--}}
                {{--</div>--}}
                {{--<div class="mt-2">--}}
                {{--<span class="text-gold font-size-13">--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                        {{--</span>--}}
                    {{--<span> 4.8	Shipping </span>--}}
                {{--</div>--}}
                {{--<div class="mt-3">--}}
                    {{--<div class="percent">99%</div>--}}
                    {{--<span>of buyers would recommend this dealer.</span>--}}
                {{--</div>--}}
                <div class="mt-5">
                    <a href="tel:{{$profileseller->tell}}" class="sweep-to-left sweep-to-left-bg-dark d-block shadow"> تماس با: {{$profileseller->tell}}</a>
                </div>
                <div>
                    <a href="mailto:{{$profileseller->user->email}}" class="sweep-to-left sweep-to-left-border-gold shadow d-block mt-3">ارسال ایمیل به: {{$profileseller->company}}
                        </a>
                </div>
            </div>
        </div>
    </div>
    {{--<div class="bg-main p-5 mt-5">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col">--}}
                    {{--<!--Carousel Wrapper-->--}}
                    {{--<div id="comments" class="carousel slide carousel-fade" data-ride="carousel">--}}
                        {{--<!--Indicators-->--}}
                        {{--<ol class="carousel-indicators">--}}
                            {{--<li data-target="#comments" data-slide-to="0" class="active"></li>--}}
                            {{--<li data-target="#comments" data-slide-to="1"></li>--}}
                            {{--<li data-target="#comments" data-slide-to="2"></li>--}}
                        {{--</ol>--}}
                        {{--<!--/.Indicators-->--}}
                        {{--<!--Slides-->--}}
                        {{--<div class="carousel-inner" role="listbox">--}}
                            {{--<!--First slide-->--}}
                            {{--<div class="carousel-item active">--}}
                                {{--<div class="container bg-white p-3">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-10">--}}
                                            {{--<div class="font-size-13">--}}
                        {{--<span class="text-gold">--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                        {{--</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="mt-2">--}}
                                                {{--<a href="#" class="text-black font-weight-bold">Great interface...smooth transaction.</a>--}}
                                            {{--</div>--}}
                                            {{--<div class="mt-2">Great interface...smooth transaction.--}}
                                                {{--Loved the graphics and the direct link to tracking information.</div>--}}
                                            {{--<div class="mt-2 font-size-13">--}}
                                                {{--<a href="#" class="text-grey">some one</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-2">--}}
                                            {{--<img src="img/person.png" class="w-100 rounded-circle border"/></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!--/First slide-->--}}
                            {{--<!--Second slide-->--}}
                            {{--<div class="carousel-item">--}}
                                {{--<div class="container bg-white p-3">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-10">--}}
                                            {{--<div class="font-size-13">--}}
                        {{--<span class="text-gold">--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                        {{--</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="mt-2">--}}
                                                {{--<a href="#" class="text-black font-weight-bold">Great interface...smooth transaction.</a>--}}
                                            {{--</div>--}}
                                            {{--<div class="mt-2">Great interface...smooth transaction.--}}
                                                {{--Loved the graphics and the direct link to tracking information.</div>--}}
                                            {{--<div class="mt-2 font-size-13">--}}
                                                {{--<a href="#" class="text-grey">some one</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-2">--}}
                                            {{--<img src="img/person.png" class="w-100 rounded-circle border"/></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!--/Second slide-->--}}
                            {{--<!--Third slide-->--}}
                            {{--<div class="carousel-item">--}}
                                {{--<div class="container bg-white p-3">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-10">--}}
                                            {{--<div class="font-size-13">--}}
                        {{--<span class="text-gold">--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                        {{--</span>--}}
                                            {{--</div>--}}
                                            {{--<div class="mt-2">--}}
                                                {{--<a href="#" class="text-black font-weight-bold">Great interface...smooth transaction.</a>--}}
                                            {{--</div>--}}
                                            {{--<div class="mt-2">Great interface...smooth transaction.--}}
                                                {{--Loved the graphics and the direct link to tracking information.</div>--}}
                                            {{--<div class="mt-2 font-size-13">--}}
                                                {{--<a href="#" class="text-grey">some one</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-md-2">--}}
                                            {{--<img src="img/person.png" class="w-100 rounded-circle border"/></div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<!--/Third slide-->--}}
                        {{--</div>--}}
                        {{--<!--/.Slides-->--}}
                        {{--<!--Controls-->--}}
                        {{--<a class="carousel-control-prev" href="#comments" role="button" data-slide="prev">--}}
                            {{--<span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
                            {{--<span class="sr-only">Previous</span>--}}
                        {{--</a>--}}
                        {{--<a class="carousel-control-next" href="#comments" role="button" data-slide="next">--}}
                            {{--<span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
                            {{--<span class="sr-only">Next</span>--}}
                        {{--</a>--}}
                        {{--<!--/.Controls-->--}}
                    {{--</div>--}}
                    {{--<!--/.Carousel Wrapper-->--}}
                {{--</div>--}}
                {{--<div class="col text-white text-center">--}}
                    {{--<h2 class="">What our customers are saying</h2>--}}
                    {{--<div class=" mt-3">Excellent</div>--}}
                    {{--<div class="mt-2 ">--}}
                        {{--<span class="text-gold">--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                            {{--<i class="fas fa-star"></i>--}}
                        {{--</span>--}}
                    {{--</div>--}}
                    {{--<div class="text-grey font-size-13 mt-2">16,343 reviews</div>--}}
                    {{--<div class="mt-3">--}}
                        {{--<img src="img/trustpilot-logo.png" height="25" width="100"/>--}}
                        {{--<span class="font-size-13">Powered by</span>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    {{--<div class="p-5">--}}
        {{--<h2 class="text-center">FAQs - Any questions?</h2>--}}
        {{--<div class="container text-right p-4">--}}
            {{--<div class="p-4">--}}
                {{--<h4 class="text-grey">I'd like to buy this item. How do I proceed?</h4>--}}
                {{--<div>Contact the seller by phone or use the Contact seller button to discuss payment and shipping directly with the seller.</div>--}}
            {{--</div>--}}
            {{--<div class="p-4">--}}
                {{--<h4 class="text-grey">I'd like to buy this item. How do I proceed?</h4>--}}
                {{--<div>Contact the seller by phone or use the Contact seller button to discuss payment and shipping directly with the seller.</div>--}}
            {{--</div>--}}
            {{--<div class="w-25 m-auto"><a href="#" class="sweep-to-left sweep-to-left-border-dark shadow d-block ml-auto mt-5 mb-5">درخواست--}}
                    {{--قیمت--}}
                    {{--گذاری</a></div>--}}
            {{--<hr>--}}
            {{--<h4 class="text-center text-grey m-5">Sell your watch quickly and easily on Chrono24</h4>--}}
            {{--<div class="w-25 m-auto"><a href="#" class="sweep-to-left sweep-to-left-border-dark shadow d-block ml-auto mt-5 mb-5">درخواست--}}
                    {{--قیمت--}}
                    {{--گذاری</a></div>--}}
            {{--<div class="row mb-5">--}}
                {{--<div class="col-md-3 text-right font-weight-bold border-left">--}}
                    {{--<div>More watches</div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}

                {{--</div>--}}
                {{--<div class="col-md-3 text-right font-weight-bold border-left">--}}
                    {{--<div>More watches</div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}

                {{--</div>--}}
                {{--<div class="col-md-3 text-right font-weight-bold border-left">--}}
                    {{--<div>More watches</div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}

                {{--</div>--}}
                {{--<div class="col-md-3 text-right font-weight-bold">--}}
                    {{--<div>More watches</div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}
                    {{--<div class="mt-2"><a href="#" class="text-grey ">Diamond Watches</a></div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}



    <!--<div class="bg-image pt-5">
        <div class="row mt-5 pt-5 dir-r ">
            <div class="col-md-12 text-white text-center">
                {{--<h1 class=" pt-4"> {{$name}}</h1>--}}
            </div>

        </div>
    </div>-->


    <div class="container">



<!--
        <div class="row text-right mt-5 pt-5">
            <div class="col-md-4">
                <span class="ml-2"> دسته بندی بر اساس : </span>
                <div class="btn-group">
                    <button type="button" class="btn bg-gold border">دسته بندی</button>
                    <button type="button" class="btn bg-gold border dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">قیمت</a>
                        <a class="dropdown-item" href="#">جدیدترین </a>
                        <a class="dropdown-item" href="#">قدیمی ترین </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <span class="ml-2"> تعداد محصولات : </span>
                <div class="btn-group">
                    <button type="button" class="btn bg-gold border">تعداد</button>
                    <button type="button" class="btn bg-gold border dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">25</a>
                        <a class="dropdown-item" href="#">50</a>
                        <a class="dropdown-item" href="#">100</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
-->

        <div class="row shadow text-center pt-3 mt-5">
            @foreach($advertisings as $advertising)
                <div class="col-md-6 mb-3 col-lg-3">
                    <div class="card border-0 shadow-hover grow-parent">
                        <div class="overflow-h ">
                            <img class="m-auto p-3 grow" width="200" height="220"
                                 src="{{asset($advertising->images)}}"
                                 alt="Card image cap">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold">{{$advertising->name}}</h5>
                            <p class="card-text text-gold">
                                {{$advertising->price}} تومان
                            </p>
                            <div class="row">
                                <div class="col-9 p-0">
                                    <a href="#"
                                       class="sweep-to-left sweep-to-left-border-dark shadow d-block mt-3">{{$advertising->description}}</a>
                                </div>
                                <div class="col-3 p-0 text-right">
                                    <button type="button" class="btn btn-outline-gold mt-3"><i
                                                class="fas fa-shopping-cart"></i></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            {{--<div class="col-md mb-3  col-lg">--}}
            {{--<div class="card border-0 shadow-hover grow-parent">--}}
            {{--<div class="overflow-h ">--}}
            {{--<img class="m-auto p-3 grow" width="200" height="220"--}}
            {{--src="/new/img/Watch-Transparent-Background-PNG.png"--}}
            {{--alt="Card image cap">--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}
            {{--<h5 class="card-title font-weight-bold">Card title</h5>--}}
            {{--<p class="card-text text-gold">--}}
            {{--111,000 تومان--}}
            {{--</p>--}}
            {{--<div class="row">--}}
            {{--<div class="col-9 p-0">--}}
            {{--<a href="#"--}}
            {{--class="sweep-to-left sweep-to-left-border-dark shadow d-block mt-3">مشخصات</a>--}}
            {{--</div>--}}
            {{--<div class="col-3 p-0 text-right">--}}
            {{--<button type="button" class="btn btn-outline-gold mt-3"><i--}}
            {{--class="fas fa-shopping-cart"></i></button>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md mb-3  col-lg">--}}
            {{--<div class="card border-0 shadow-hover grow-parent">--}}
            {{--<div class="overflow-h ">--}}
            {{--<img class="m-auto p-3 grow" width="200" height="220"--}}
            {{--src="/new/img/Watch-Transparent-Background-PNG.png"--}}
            {{--alt="Card image cap">--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}
            {{--<h5 class="card-title font-weight-bold">Card title</h5>--}}
            {{--<p class="card-text text-gold">--}}
            {{--111,000 تومان--}}
            {{--</p>--}}
            {{--<div class="row">--}}
            {{--<div class="col-9 p-0">--}}
            {{--<a href="#"--}}
            {{--class="sweep-to-left sweep-to-left-border-dark shadow d-block mt-3">مشخصات</a>--}}
            {{--</div>--}}
            {{--<div class="col-3 p-0 text-right">--}}
            {{--<button type="button" class="btn btn-outline-gold mt-3"><i--}}
            {{--class="fas fa-shopping-cart"></i></button>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6 mb-3  col-lg-3">--}}
            {{--<div class="card border-0 shadow-hover grow-parent">--}}
            {{--<div class="overflow-h ">--}}
            {{--<img class="m-auto p-3 grow" width="200" height="220"--}}
            {{--src="/new/img/Watch-Transparent-Background-PNG.png"--}}
            {{--alt="Card image cap">--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}
            {{--<h5 class="card-title font-weight-bold">Card title</h5>--}}
            {{--<p class="card-text text-gold">--}}
            {{--111,000 تومان--}}
            {{--</p>--}}
            {{--<div class="row">--}}
            {{--<div class="col-9 p-0">--}}
            {{--<a href="#"--}}
            {{--class="sweep-to-left sweep-to-left-border-dark shadow d-block mt-3">مشخصات</a>--}}
            {{--</div>--}}
            {{--<div class="col-3 p-0 text-right">--}}
            {{--<button type="button" class="btn btn-outline-gold mt-3"><i--}}
            {{--class="fas fa-shopping-cart"></i></button>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-6 mb-3  col-lg-3">--}}
            {{--<div class="card border-0 shadow-hover grow-parent">--}}
            {{--<div class="overflow-h ">--}}
            {{--<img class="m-auto p-3 grow" width="200" height="220"--}}
            {{--src="/new/img/Watch-Transparent-Background-PNG.png"--}}
            {{--alt="Card image cap">--}}
            {{--</div>--}}
            {{--<div class="card-body">--}}
            {{--<h5 class="card-title font-weight-bold">Card title</h5>--}}
            {{--<p class="card-text text-gold">--}}
            {{--111,000 تومان--}}
            {{--</p>--}}
            {{--<div class="row">--}}
            {{--<div class="col-9 p-0">--}}
            {{--<a href="#"--}}
            {{--class="sweep-to-left sweep-to-left-border-dark shadow d-block mt-3">مشخصات</a>--}}
            {{--</div>--}}
            {{--<div class="col-3 p-0 text-right">--}}
            {{--<button type="button" class="btn btn-outline-gold mt-3"><i--}}
            {{--class="fas fa-shopping-cart"></i></button>--}}
            {{--</div>--}}

            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}
        </div>



    <!--
         <div class="row">

            <div class="col-sm-2 text-right">
                <label class="control-label" for="input-sort">مرتب سازی :</label>
            </div>
            <div class="col-md-6 col-sm-2 text-right">
                <select id="input-sort" class="form-control col-sm-3">
                    <option value="" selected="selected">پیشفرض</option>
                    <option value="expensive">گرانترین</option>
                    <option value="cheap">ارزان ترین</option>
                    <option value="date">جدیدترین</option>
                    <option value="visit">بازدید</option>
                </select>
            </div>
            <div class="col-sm-2 text-left ">
                <label class="control-label" for="input-limit">نمایش :</label>
            </div>
            <div class="col-sm-2 text-right">
                <select id="input-limit" class="form-control"
                        onchange="window.location.replace(this.options[this.selectedIndex].value)">
                    <option value="{{ app('request')->fullUrlWithQuery(['perPage' => 20]) }}"
                            @if(app('request')->input('perPage') == 20) selected @endif>20
                    </option>
                    <option value="{{ app('request')->fullUrlWithQuery(['perPage' => 25]) }}"
                            @if(app('request')->input('perPage') == 25) selected @endif>25
                    </option>
                    <option value="{{ app('request')->fullUrlWithQuery(['perPage' => 50]) }}"
                            @if(app('request')->input('perPage') == 50) selected @endif>50
                    </option>
                    <option value="{{ app('request')->fullUrlWithQuery(['perPage' => 75]) }}"
                            @if(app('request')->input('perPage') == 75) selected @endif>75
                    </option>
                    <option value="{{ app('request')->fullUrlWithQuery(['perPage' => 100]) }}"
                            @if(app('request')->input('perPage') == 100) selected @endif>100
                    </option>
                </select>
            </div>
        </div>


        <div class="row pt-5">

            </div>

-->



        <div style="display: flex;justify-content: center">

        </div>
    </div>

    <br>
    <br>
    <br>



@endsection
@section('script')
    <script>

        function sortMeBy(arg, sel, elem, order) {
            var $selector = $(sel),
                $element = $selector.children(elem);
            $element.sort(function (a, b) {
                var an = parseInt(a.getAttribute(arg)),
                    bn = parseInt(b.getAttribute(arg));
                if (order == "asc") {
                    if (an > bn)
                        return 1;
                    if (an < bn)
                        return -1;
                } else if (order == "desc") {
                    if (an < bn)
                        return 1;
                    if (an > bn)
                        return -1;
                }
                return 0;
            });
            $element.detach().appendTo($selector);
        }

        jQuery(document).ready(function ($) {

            $('#input-sort').change(function () {
                if ($("#input-sort option:selected").val() == 'date')
                    var deferred = sortMeBy("data-date", ".products-category", ".product-layout", "desc");
                else if ($("#input-sort option:selected").val() == 'expensive')
                    var deferred = sortMeBy("data-price", ".products-category", ".product-layout", "desc");
                else if ($("#input-sort option:selected").val() == 'cheap')
                    var deferred = sortMeBy("data-price", ".products-category", ".product-layout", "asc");
                else if ($("#input-sort option:selected").val() == 'visit')
                    var deferred = sortMeBy("data-visit", ".products-category", ".product-layout", "desc");
            });
        });
    </script>
@endsection
