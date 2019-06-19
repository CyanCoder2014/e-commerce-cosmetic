@extends('layouts.layout')
@section('title')
    {!! \Illuminate\Support\Str::words($content->title[App::getlocale()] , $words = 6, $end = '...') !!}
@endsection
@section('header')
    <meta name="description"
          content="{!! \Illuminate\Support\Str::words($content->intro[App::getlocale()] , $words = 25, $end = '...') !!}">

    <style>
        img{
            max-width: 98%!important;
        }
    </style>
@endsection


@section('content')


    {{--new--}}
    <div class="bg-f p-5 px-xs-0">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12 p-2">
                    <div class="bg-white">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                @if($content->cat)
                                <li class="breadcrumb-item"><a
                                            href="{{ route('content.cat',['id' => '324-'.$content->cat->id.'-'.str_replace(" ","-",$content->cat->title[App::getlocale()])]) }}">
                                        {{$content->cat->title[App::getlocale()]  }}</a>
                                </li>
                                @endif
                                <li class="breadcrumb-item active">{!! $content->title[App::getlocale()] !!}</li>
                            </ol>
                        </nav>
                        <div class="container p-xl-5 p-lg-5 p-md-3">
                            <div class="row">
                                <div class="col-md-6 text-right font-weight-bold">
                                    {!! $content->title[App::getlocale()] !!}
                                </div>
                                <div class="col-md-6 text-grey mytext-xs-right font-13">
                                    <a href="#">
                                        افزودن به لیست علاقه‌مندی ها<i class="far fa-heart fa-2x pr-3"></i></a>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-3 mytext-xs-right">
                                    <img src="/new/img/1.jpg" width="50" height="50" class="rounded-circle" alt="">
                                    <span class="font-13 mr-3"> فیگورات</span>
                                </div>
                                <div class="col-md-3 font-13 offset-2 pt-3 mytext-xs-right">

                                </div>
                                <div class="col-md-4 font-13 pt-3 mytext-xs-right">
                                    @if(App::getlocale() == 'fa')
                                        {!!  to_jalali_date($content->created_at) !!}
                                    @else
                                        {{ date('Y-m-d',strtotime($content->created_at)) }}
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <img src="{{asset($content->image)}}" class="w-100 mt-3" alt="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 blogDet">

                                    <p class="text-right mt-3 ">
                                        {!! $content->intro[App::getlocale()] !!}
                                    </p>
                                    <div class="mt-3 font-weight-bold text-right">
                                        @if($content->cat){{ $content->cat->name[App::getlocale()] }}@endif
                                    </div>
                                    <p class="text-right mt-3">
                                        {!! $content->text[App::getlocale()] !!}
                                    </p>
                                    <div class="container-fluid ">
                                        <div class="row ">
                                            <div class="col-12">
                                                <div class="text-right">
                                                    <span>منبع </span>
                                                    <a href="#"><span class="text-gold pr-3">{{$content->previous_link[App::getlocale()] }} </span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-md-6 text-right">
<span class="text-gold">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                                                <span class="text-grey">۴.۹ از ۵</span>
                                            </div>
                                            <div class="col-md-6 mytext-xs-right">
                                                <div class="mt-xs-3">
                                                    <a href="#" class="text-grey"><span class="px-2"><i
                                                                    class="fab fa-telegram-plane fa-lg"></i></span></a>
                                                    <a href="#" class="text-grey"><span class="px-2"><i
                                                                    class="fab fa-instagram fa-lg"></i></span></a>
                                                    <a href="#" class="text-grey"><span class="px-2"><i
                                                                    class="fab fa-linkedin fa-lg"></i></span></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <hr>
                                                <div class="text-right">
                                                    <span class="pl-3">دسته بندی :</span>
                                                    <span><a href="{{ route('content.cat',['id' => '324-'.$content->cat->id.'-'.str_replace(" ","-",$content->cat->title[App::getlocale()])]) }}" class="badge badge-pill badge-light">  {{$content->cat->title[App::getlocale()]  }}</a></span>



                                                </div>
                                            </div>
                                            @if($content->comment == 1 )
                                                <hr>
                                                @include('blogmodule::comment',['comments'=>$comments])
                                            <div class="col-12">
                                                <hr>
                                                <div class="text-right pb-3">
                                                    <button class="btn bg-gold text-white" type="button"
                                                            data-toggle="collapse" data-target="#multiCollapseExample2"
                                                            aria-expanded="false" aria-controls="multiCollapseExample2">
                                                        دیدگاه شما
                                                    </button>
                                                </div>
                                                <div class="collapse multi-collapse" id="multiCollapseExample2">

                                                    <form class="text-right p-5" method="post" action="{{route('content.comment.send')}}">
                                                        <input type="hidden" name="post_id" value="{{$content->id}}">

                                                    {{csrf_field()}}
                                                    @if(!\Illuminate\Support\Facades\Auth::check())
                                                        <!-- Name -->
                                                        <input type="text"
                                                               name="name"
                                                               value="{{old('name')}}"
                                                               class="form-control mb-4" placeholder="@lang('home.Name')">

                                                        <!-- Email -->
                                                        <input type="email"
                                                               name="email"
                                                               value="{{old('email')}}"
                                                               class="form-control mb-4" placeholder="@lang('home.Email')">
                                                    @endif
                                                        <!-- Message -->
                                                        <div class="form-group">
                                                        <textarea class="form-control rounded-0"
                                                                  name="comment"
                                                                  value="{{old('comment')}}"
                                                                  rows="3"
                                                                  placeholder="@lang('home.Comment')"></textarea>
                                                        </div>

                                                        <!-- Send button -->
                                                        <button class="sweep-to-left sweep-to-left-border-dark shadow d-block cursor-p"
                                                           type="submit">@lang('home.Submit')</button>

                                                    </form>
                                                    <!-- Default form contact -->
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 p-2">
                    <div class="bg-white">

                        <div class="text-center pt-1"> </div>


                        <!--
                        <div class="text-center pt-3">محصولات مرتبط</div>
                        <div class="text-center mb-3"><span class="gold-underline"></span></div>
                        <div>
                            <div id="blogSide" class="carousel slide carousel-fade" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#blogSide" data-slide-to="0" class="active"></li>
                                    <li data-target="#blogSide" data-slide-to="1"></li>
                                </ol>
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-item active">
                                        <img class="d-block w-75 m-auto"
                                             src="https://mdbootstrap.com/img/Photos/Slides/img%20(130).jpg"
                                             alt="First slide">
                                        <div class="text-center mt-3">محصولات مرتبط  </div>
                                    </div>

                                    <div class="carousel-item">
                                        <img class="d-block w-75 m-auto"
                                             src="https://mdbootstrap.com/img/Photos/Slides/img%20(129).jpg"
                                             alt="Second slide">
                                        <div class="text-center mt-3">محصولات مرتبط </div>
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#blogSide" role="button" data-slide="prev">
                            <span aria-hidden="true">
                                <i class="fas fa-chevron-left"></i>
                            </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#blogSide" role="button" data-slide="next">
                            <span aria-hidden="true">
                                <i class="fas fa-chevron-right"></i>
                            </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>

                        -->





                        <div class="text-center mt-5">مطالب بیشتری بخوانید</div>
                        <div class="text-center"><span class="gold-underline"></span></div>
                        <div class="container mt-3">
                            @foreach($contentsL as $item)
                            <a href="{{ route('content.show',['id' => '324-'.$item->id.'-'.str_replace(" ","-",$item->title[App::getlocale()])]) }}">
                                <div class="row border-top p-3">

                                    <div class="col-md-4 text-right">
                                        <img src="{{Url($item->image)}}" width="70"   alt="">
                                    </div>
                                    <div class="col-md-8 text-right">
                                        <div class="font-weight-bold">
                                            {!! \Illuminate\Support\Str::words($item->title[App::getlocale()] , $words = 5, $end = '...') !!}
                                        </div>
                                        <div>
                                            {!! \Illuminate\Support\Str::words($item->intro[App::getlocale()] , $words = 8, $end = '...') !!}
                                        </div>
                                        <div class="font-13 text-grey pt-2">
                                            {!! to_jalali_date($item->created_at) !!}
                                        </div>
                                    </div>


                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>

                </div>


            </div>
        </div>
    </div>
    {{--new--}}








@endsection
@section('script')

@endsection
