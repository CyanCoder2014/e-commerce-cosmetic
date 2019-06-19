@extends('layouts.layout')
@section('title')
    {!! \Illuminate\Support\Str::words($product->name , $words = 6, $end = '...') !!}
@endsection
@section('header')
    <link rel="stylesheet" type="text/css" href="/new/js/swipebox/src/css/swipebox.min.css">
    <meta name="description"
          content="{!! \Illuminate\Support\Str::words($product->datails, $words = 25, $end = '...') !!}">
@endsection

@section('script')

    @foreach($ProductFile as $file)
        @if($file->havAccess())
            <div class="modal fade bd-example-modal-lg{{$file->id}}"  tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #000">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" >
                                <span aria-hidden="true" style="color: #fff;font-size: xx-large;">&times;</span>
                            </button>
                        </div>
                        <video style="width: 100%;max-height: 500pxmax-height: 500px;" class="video-js vjs-default-skin" controls preload="none" data-setup="{}">
                            <source src="{{ route('Pfile.stream',['id' => $file->id]) }}" type="video/mp4">
                            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
                        </video>

                    </div>
                </div>
            </div>
        @endif
    @endforeach
    <link href="http://vjs.zencdn.net/7.0/video-js.min.css" rel="stylesheet">
    <script src="http://vjs.zencdn.net/7.0/video.min.js"></script>
    <style>
        .vjs-control-bar,.vjs-control {
            font-family: Arial,Helvetica,sans-serif !important;
        }
    </style>
    <script>
        function play(e) {
            $('#video').attr('src', $(e).data('action'));
            var video = $('#videoID');
            video.load();
            video.play();
        }
        $('.modal').on('hidden.bs.modal', function (e) {
//            video=document.getElementsByTagName("video");
//            for (i=0 ; i< video.length;i++){
//                video[i].pause();
//                console.log('pause');
//
//            }
            $(this).find('video').get(0).pause();


        });
        $(".close").click(function(){
            $(this).parent().parent().parent().parent().modal('hide');
        });

    </script>

    <script type="text/javascript" src="/new/js/jquery.elevateZoom-3.0.8.min.js"></script>
    <script type="text/javascript" src="/new/js/swipebox/lib/ios-orientationchange-fix.js"></script>
    <script type="text/javascript" src="/new/js/swipebox/src/js/jquery.swipebox.min.js"></script>
    <script type="text/javascript">
        // Elevate Zoom for Product Page image
        $("#zoom_01").elevateZoom({
            gallery:'gallery_01',
            cursor: 'pointer',
            galleryActiveClass: 'active',
            imageCrossfade: true,
            zoomWindowFadeIn: 500,
            zoomWindowFadeOut: 500,
            zoomWindowPosition : 11,
            lensFadeIn: 500,
            lensFadeOut: 500,
            loadingIcon: 'image/progress.gif'
        });
        //////pass the images to swipebox
        $("#zoom_01").bind("click", function(e) {
            var ez =   $('#zoom_01').data('elevateZoom');
            $.swipebox(ez.getGalleryList());
            return false;
        });
    </script>
@endsection
<script>
    function play(e) {
        $('#video').attr('src', $(e).data('action'));
        var video = $('#videoID');
        video.load();
        video.play();
    }
</script>


@section('content')

    <div id="container">
        <div class="container">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb"><a href="{{ url('/') }}" itemprop="url"><span itemprop="title"><i class="fa fa-home"></i></span></a></li>
                @if($product->category)
                    @if($product->category->parent)
                        @include('shopmodule::category.recursive-topbar',['category' => $product->category->parent])
                    @endif
                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="{{ $product->category->link() }}" itemprop="url">
                            <span itemprop="title">{{ $product->category->name }}</span>
                        </a>
                    </li>
                @endif
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-9">
                    <div itemscope="" itemtype="http://schema.org/محصولات">
                        <h1 class="title" itemprop="name">{{ $product->name }}</h1>
                        <div class="row product-info">
                            <div class="col-sm-6">
                                <div class="image">
                                    <div style="height:525px;width:350px;" class="zoomWrapper">
                                        <img class="img-responsive"  itemprop="image" id="zoom_01" @if(isset($product->image[0]))src="{{ asset($product->image[0]) }}"@endif title="{{ $product->name }}" alt="{{ $product->name }}" data-zoom-image="@if(isset($product->image[0])) {{ asset($product->image[0]) }} @endif" style="position: absolute;max-height: 525px;max-width: 350px;"></div> </div>
                                <div class="center-block text-center"><span class="zoom-gallery"><i class="fa fa-search"></i> برای مشاهده گالری روی تصویر کلیک کنید</span></div>
                                <div class="image-additional" id="gallery_01">
                                    @if(isset($product->image))
                                    @foreach($product->image as $image)
                                    <a class="thumbnail" href="#" data-zoom-image="{{ asset($image) }}" data-image="{{ asset($image) }}" title="لپ تاپ ایلین ور">
                                        <img src="{{ asset($image) }}" title="{{ $product->name }}" alt="{{ $product->name }}">
                                    </a>
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled description">
                                    @if(isset($product->brand))
                                    <li><b>برند :</b> <a href="{{ $product->brand->link() }}"><span itemprop="brand">{{ $product->brand->name }}</span></a></li>
                                    @endif
                                    <li><b>وضعیت موجودی :</b> @if($product->quantity >0) <span class="instock">موجود</span> @else <span class="nostock">ناموجود</span> @endif</li>
                                </ul>
                                <ul class="price-box">
                                    <li class="price" itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
                                        @if($product->discount > 0)
                                        <span class="price-old">{{ number_format($product->price) }} تومان</span>
                                        @endif
                                        <span itemprop="price">{{number_format($product->price - ($product->discount*$product->price/100)) }} تومان
                                            <span itemprop="availability" content="موجود"></span>
                                        </span>
                                    </li>
                                    <li></li>
                                </ul>
                                <div id="product">
                                    <div class="cart">
                                        <div>
                                            <div class="qty">
                                                <label class="control-label" for="input-quantity">تعداد</label>
                                                <input name="quantity" value="1" size="2" id="input-quantity" class="form-control" type="text">
                                                <a class="qtyBtn plus" href="javascript:void(0);">+</a><br>
                                                <a class="qtyBtn mines" href="javascript:void(0);">-</a>
                                                <div class="clear"></div>
                                            </div>
                                            <button type="button" id="button-cart" class="btn btn-primary btn-lg">افزودن به سبد</button>
                                        </div>
                                        <div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
                            <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
                            <li><a href="#tab-review" data-toggle="tab">بررسی ({{ count($comments) }})</a></li>
                        </ul>
                        <div class="tab-content">
                            <div itemprop="description" id="tab-description" class="tab-pane active">
                                <div>
                                    {!! $product->details !!}
                                    <hr>
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div id="tab-specification" class="tab-pane">
                                <div id="tab-specification" class="tab-pane">
                                    @foreach($groups as $group)
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <td title="{{ $group->description }}" colspan="2">
                                                    <strong>{{ $group->title }}</strong></td>
                                            </tr>
                                            </thead>
                                            @foreach($productdetails as $key => $productdetail)
                                                @if($productdetail->group_id == $group->id)
                                                    <tbody>

                                                    <tr>
                                                        <td style="background-color: #eeeeee;width: 20%">{{ $productdetail->title }}

                                                        </td>
                                                        <td>{{ $productdetail->description }}</td>
                                                        <?php unset($productdetails[$key]) ?>

                                                    </tr>
                                                    </tbody>

                                                @endif
                                            @endforeach
                                        </table>
                                    @endforeach
                                </div>
                            </div>
                            <div id="tab-review" class="tab-pane">
                                <div id="review">
                                    <div>
                                        @include('shopmodule::comments',['comments'=>$comments])
                                    </div>
                                    <div class="text-right"></div>
                                </div>
                                <h2>یک بررسی بنویسید</h2>
                                <form class="form-horizontal" method="post" action="{{route('product.comment.add')}}">
                                    <input type="hidden" name="product_id" value="{{$product->id}}">
                                    {{ csrf_field() }}
                                    @if(!\Illuminate\Support\Facades\Auth::check())
                                        <div class="form-group required">
                                            <div class="col-sm-12">
                                                <label for="name">نام</label>

                                                <input type="text" name="name" id="name" class="form-control"/>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <div class="col-sm-12">
                                                <label for="mail">ایمیل</label>

                                                <input type="text" name="email" id="mail" class="form-control"/>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group  required">
                                        <div class="col-sm-12">
                                            <label for="input-review" class="control-label">بررسی شما</label>
                                            <textarea name="comment" class="form-control" rows="1" cols="7"></textarea>

                                        </div>
                                    </div>

                                    <div class="buttons" >
                                        <div class="pull-right">
                                            <button style="margin: 15px" class="btn btn-primary " id="button-review" type="submit">ارسال</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <h3 class="subtitle">محصولات مرتبط</h3>
                        <div class="owl-carousel related_pro owl-theme" style="opacity: 1; display: block;">
                            <div class="owl-wrapper-outer">
                                <div class="owl-wrapper" style="width: 2040px; left: 0px; display: block;">
                                    @foreach($related as $key => $product)
                                        <div class="owl-item" style="width: 170px;">
                                            <div class="product-thumb">
                                                <div class="image"><a href="{{ route('shop.show',['id' => '243-'.$product->id.'-'.str_replace(' ','-',$product->name)]) }}"><img @if(isset($product->image[0]))src="{{ $product->image[0] }}"@endif alt="{{ $product->name }}" title="{{ $product->name }}" class="img-responsive maxim" /></a></div>
                                                <div class="caption">
                                                    <h4><a href="{{ route('shop.show',['id' => '243-'.$product->id.'-'.str_replace(' ','-',$product->name)]) }}">{{ $product->name }}</a></h4>
                                                    <p class="price">
                                                        <span class="price-new">{{ number_format($product->price-($product->discount*$product->price/100)) }} تومان</span>
                                                        @if($product->discount > 0)
                                                            <span class="price-old">{{number_format($product->price)}} تومان</span>
                                                            <span class="saving">-{{$product->discount}}%</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="button-group">
                                                    <button class="btn-primary" type="button" onClick="cart.add('42');"><span>افزودن به سبد</span></button>
                                                    <div class="add-to-links">
                                                        <button type="button" data-toggle="tooltip" title="افزودن به علاقه مندی ها" onClick=""><i class="fa fa-heart"></i></button>
                                                        <button type="button" data-toggle="tooltip" title="مقایسه این محصول" onClick=""><i class="fa fa-exchange"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>





                            <div class="owl-controls clickable"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div><div class="owl-page"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev"><i class="fa fa-angle-left"></i></div><div class="owl-next"><i class="fa fa-angle-right"></i></div></div></div></div>
                    </div>
                </div>
                <!--Middle Part End -->
                <!--Right Part Start -->
                <aside id="column-right" class="col-sm-3 hidden-xs">
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
                </aside>
                <!--Right Part End -->
            </div>
        </div>
    </div>
@endsection

