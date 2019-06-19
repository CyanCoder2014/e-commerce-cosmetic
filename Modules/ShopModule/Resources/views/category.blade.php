@extends('layouts.layout')

@section('title')
    {!! \Illuminate\Support\Str::words($cat->name[App::getlocale()] , $words = 6, $end = '...') !!}
@endsection
@section('header')
    <style>
        .maxim{
            max-width: 220px !important;
            max-height: 330px !important;
        }
    </style>
@endsection



@section('content')
    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                @if($cat)
                    @if($cat->parent)
                        @include('shopmodule::category.recursive-topbar',['category' => $cat->parent])
                    @endif
                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="{{ $cat->link() }}" itemprop="url">
                            <span itemprop="title">{{ $cat->name[App::getlocale()] }}</span>
                        </a>
                    </li>
                @endif
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Left Part Start -->
                <aside id="column-left" class="col-sm-3 hidden-xs">
                    <h3 class="subtitle">دسته ها</h3>
                    <div class="box-category">
                        <ul id="cat_accordion">
                            @foreach($categories as $category)
                                <?php $child =$category->childs() ?>
                                <li @if(count($child) > 0 )class="cutom-parent-li" @endif>
                                    <a href="{{ route('shop.category',['id' => '234-'.$category->id.'-'.str_replace(' ','-',$category->name[App::getlocale()])]) }}" class="cutom-parent @if($cat->id == $category->id) active @endif ">{{ $category->name[App::getlocale()] }}
                                        @if(count($child) > 0 ) <span class="dcjq-icon"></span> @endif
                                    </a> @if(count($child) > 0 ) <span class="down"></span> @endif
                                    @if(count($child) > 0 )
                                        @include('shopmodule::category.recursive-menu',['categories' => $child,'cat' => $cat])
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <h3 class="subtitle">پرفروش ها</h3>
                    <div class="side-item">
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="/new/image/product/apple_cinema_30-50x75.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">تی شرت کتان مردانه</a></h4>
                                <p class="price"><span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-10%</span></p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="/new/image/product/iphone_1-50x75.jpg" alt="آیفون 7" title="آیفون 7" class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">آیفون 7</a></h4>
                                <p class="price"> 2200000 تومان </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span></div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="/new/image/product/macbook_1-50x75.jpg" alt="آیدیا پد یوگا" title="آیدیا پد یوگا" class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">آیدیا پد یوگا</a></h4>
                                <p class="price"> 900000 تومان </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="/new/image/product/sony_vaio_1-50x75.jpg" alt="کفش راحتی مردانه" title="کفش راحتی مردانه" class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">کفش راحتی مردانه</a></h4>
                                <p class="price"> <span class="price-new">32000 تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-25%</span> </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="/new/image/product/FinePix-Long-Zoom-Camera-50x75.jpg" alt="دوربین فاین پیکس" title="دوربین فاین پیکس" class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">دوربین فاین پیکس</a></h4>
                                <p class="price">122000 تومان</p>
                            </div>
                        </div>
                    </div>
                    <h3 class="subtitle">ویژه</h3>
                    <div class="side-item">
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="/new/image/product/macbook_pro_1-50x75.jpg" alt=" کتاب آموزش باغبانی " title=" کتاب آموزش باغبانی " class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">کتاب آموزش باغبانی</a></h4>
                                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">120000 تومان</span> <span class="saving">-26%</span> </p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="/new/image/product/samsung_tab_1-50x75.jpg" alt="تبلت ایسر" title="تبلت ایسر" class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">تبلت ایسر</a></h4>
                                <p class="price"> <span class="price-new">98000 تومان</span> <span class="price-old">240000 تومان</span> <span class="saving">-5%</span> </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="/new/image/product/apple_cinema_30-50x75.jpg" alt="تی شرت کتان مردانه" title="تی شرت کتان مردانه" class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="http://demo.harnishdesign.net/opencart/marketshop/v1/index.php?route=product/product&amp;product_id=42">تی شرت کتان مردانه</a></h4>
                                <p class="price"> <span class="price-new">110000 تومان</span> <span class="price-old">122000 تومان</span> <span class="saving">-10%</span> </p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="/new/image/product/nikon_d300_1-50x75.jpg" alt="دوربین دیجیتال حرفه ای" title="دوربین دیجیتال حرفه ای" class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">دوربین دیجیتال حرفه ای</a></h4>
                                <p class="price"> <span class="price-new">92000 تومان</span> <span class="price-old">98000 تومان</span> <span class="saving">-6%</span> </p>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="/new/image/product/nikon_d300_5-50x75.jpg" alt="محصولات مراقبت از مو" title="محصولات مراقبت از مو" class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">محصولات مراقبت از مو</a></h4>
                                <p class="price"> <span class="price-new">66000 تومان</span> <span class="price-old">90000 تومان</span> <span class="saving">-27%</span> </p>
                                <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div>
                            </div>
                        </div>
                        <div class="product-thumb clearfix">
                            <div class="image"><a href="product.html"><img src="/new/image/product/macbook_air_1-50x75.jpg" alt="لپ تاپ ایلین ور" title="لپ تاپ ایلین ور" class="img-responsive"></a></div>
                            <div class="caption">
                                <h4><a href="product.html">لپ تاپ ایلین ور</a></h4>
                                <p class="price"> <span class="price-new">10 میلیون تومان</span> <span class="price-old">12 میلیون تومان</span> <span class="saving">-5%</span> </p>
                            </div>
                        </div>
                    </div>
                    <div class="banner owl-carousel owl-theme" style="opacity: 1; display: block;">
                        <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 1052px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(0px, 0px, 0px); transform-origin: 131.5px center 0px; perspective-origin: 131.5px center;"><div class="owl-item" style="width: 263px;"><div class="item"> <a href="#"><img src="/new/image/banner/small-banner1-265x350.jpg" alt="small banner" class="img-responsive"></a> </div></div><div class="owl-item" style="width: 263px;"><div class="item"> <a href="#"><img src="/new/image/banner/small-banner-265x350.jpg" alt="small banner1" class="img-responsive"></a> </div></div></div></div>

                    </div>
                </aside>
                <!--Left Part End -->
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <h1 class="title">{{ $cat->name[App::getlocale()] }}</h1>

                    {{--<h3 class="subtitle">بهبود جستجو</h3>--}}
                    {{--<div class="category-list row">--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<ul class="list-item">--}}
                                {{--<li><a href="category.html">صوتی و تصویری (3)</a></li>--}}
                                {{--<li><a href="category.html">لوازم خانگی (2)</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<ul class="list-item">--}}
                                {{--<li><a href="category.html">موبایل و تبلت (2)</a></li>--}}
                                {{--<li><a href="category.html">لپ تاپ (3)</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                        {{--<div class="col-sm-3">--}}
                            {{--<ul class="list-item">--}}
                                {{--<li><a href="category.html">رومیزی (0)</a></li>--}}
                                {{--<li><a href="category.html">دوربین (0)</a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    <div class="product-filter">
                        <div class="row">
                            <div class="col-md-4 col-sm-5">
                                <div class="btn-group">
                                    <button type="button" id="list-view" class="btn btn-default" data-toggle="tooltip" title="" data-original-title="List"><i class="fa fa-th-list"></i></button>
                                    <button type="button" id="grid-view" class="btn btn-default selected" data-toggle="tooltip" title="" data-original-title="Grid"><i class="fa fa-th"></i></button>
                                </div>

                            </div>
                            <div class="col-sm-2 text-right">
                                <label class="control-label" for="input-sort">مرتب سازی :</label>
                            </div>
                            <div class="col-md-3 col-sm-2 text-right">
                                <select id="input-sort" class="form-control col-sm-3">
                                    <option value="">قیمت</option>
                                    <option value="">بازدید</option>
                                    <option value="">جدید ترین</option>
                                </select>
                            </div>
                            <div class="col-sm-1 text-right">
                                <label class="control-label" for="input-limit">نمایش :</label>
                            </div>
                            <div class="col-sm-2 text-right">
                                <select id="input-limit" class="form-control">
                                    <option value="" selected="selected">20</option>
                                    <option value="">25</option>
                                    <option value="">50</option>
                                    <option value="">75</option>
                                    <option value="">100</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row products-category">
                        <?php if( app('request')->input('num') ) $products = $cat->products(app('request')->input('num'));
                                else $products = $cat->products(12); ?>
                        @foreach($products as $key => $product)
                            <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-12">
                                <div class="product-thumb">
                                    <div class="image"><a href="{{ route('shop.show',['id' => '243-'.$product->id.'-'.str_replace(' ','-',$product->name[App::getlocale()])]) }}"><img @if(isset($product->image[0]))src="{{ $product->image[0] }}"@endif alt="{{ $product->name[App::getlocale()] }}" title="{{ $product->name[App::getlocale()] }}" class="img-responsive maxim" /></a></div>
                                    <div class="caption">
                                        <h4><a href="{{ route('shop.show',['id' => '243-'.$product->id.'-'.str_replace(' ','-',$product->name[App::getlocale()])]) }}">{{ $product->name[App::getlocale()] }}</a></h4>
                                        <p class="price">
                                            <span class="price-new">{{ $product->price-($product->discount*$product->price/100) }} تومان</span>
                                            @if($product->discount > 0)
                                                <span class="price-old">{{$product->price}} تومان</span>
                                                <span class="saving">-{{$product->discount}}%</span>
                                            @endif
                                        </p>
                                    </div>
                                    <div class="button-group">
                                        <button class="btn-primary cart-add" type="button " qty="1" id="{{ $product->id }}"><span>افزودن به سبد</span></button>
                                        <div class="add-to-links"></div>
                                    </div>
                                </div>
                        </div>
                        @if($key%4 == 3)
                            <span class="clearfix visible-lg-block"></span>
                        @endif
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-sm-6 text-left">
                            {!! $products->links() !!}
                        </div>
                        <div class="col-sm-6 text-right">نمایش 1 تا {{app('request')->input('num')}} از {!! $products->total() !!} </div>
                    </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>





@endsection
