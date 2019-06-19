@extends('layouts.layout')



@section('header')
    <title> | </title>
    <meta name="description"
          content="ی"/>
@endsection



@section('content')

    {{--cat--}}
    <div class="bg-f p-5 px-xs-0">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/">خانه</a></li>
                            <li class="breadcrumb-item active">{{$cat->title['fa'] }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-12 ">
                    <div class="container">
                        <div class="row bg-white rounded shadow p-4">
                            <!--<div class="col-md-6">
                                <select class="browser-default custom-select">
                                    <option selected>مرتب سازی</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                            </div>
                            <div class="col-md-6 mytext-xs-right mt-xs-3">
                                <span class="font-weight-bold">339</span>
                                <span>مطلب موجود می‌باشد</span>
                            </div>
                            -->


                            <div  class="col-md-12" style="direction: rtl;text-align: right">

                                 <span><a

                                             href="/content/magazine/all" class="badge badge-pill badge-light">  همه موارد</a>
                                </span>


                            @foreach($cats as $cat1)


                                <span><a
                                            @if($cat1->id == $cat->id)
                                            style="color: #e0e0dd"
                                            @endif
                                            href="{{ route('content.cat',['id' => '324-'.$cat1->id.'-'.str_replace(" ","-",$cat1->title[App::getlocale()])]) }}" class="badge badge-pill badge-light">  {{$cat1->title[App::getlocale()]  }}</a>
                                </span>

                                 @endforeach
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row mt-5">
                @foreach($contents as $content)
                    <div class="item col-lg-4 col-md-6 col-xs-12 mb-5">
                    <div class="blogCat shadow-hover">
                        <div class="ovrly25">
                            <div class="overflow-h" style="height: 250px">
                                <img src="{{asset($content->image)}}" class="w-100" alt="">
                            </div>
                            <div class="ovrlyT"></div>
                            <div class="ovrlyB"></div>
                            <div class="buttons">
                                <a href="{{ route('content.show',['id' => '324-'.$content->id.'-'.str_replace(" ","-",$content->title['fa'])]) }}" class="fa fa-link"></a>
                                <a href="{{ route('content.show',['id' => '324-'.$content->id.'-'.str_replace(" ","-",$content->title['fa'])]) }}" class="fa fa-search"></a>
                            </div>

                        </div>
                        <div class="p-3 bg-white">
                            <h2 class="text-center text-grey px-3 pt-3">{!! \Illuminate\Support\Str::words($content->title['fa'] , $words = 8, $end = '...') !!}</h2>
                            <div class="text-center"><span class="gold-underline"></span></div>
                            <p class="p-2 text-center">
                                {!! \Illuminate\Support\Str::words($content->intro['fa'] , $words = 16, $end = '...') !!}
                            </p>
                            <div class="row mt-4">
                                <div class="col-md-6 text-right">
                                    <img src="/new/img/1.jpg" width="40" height="40" class="rounded-circle" alt="">
                                    <span class="font-13 mr-3">فیگورات </span>
                                </div>
                                <div class="col-md-6 font-13 pt-3 mytext-xs-right">
                                    @if(App::getlocale() == 'fa')
                                        {!!  to_jalali_date($content->created_at) !!}
                                    @else
                                        {{ date('Y-m-d',strtotime($content->created_at)) }}
                                    @endif                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection