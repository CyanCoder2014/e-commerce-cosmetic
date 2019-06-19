

@extends('layouts.layout')



@section('header')
    <title>  |  </title>
    <meta name="description"
          content="ی"/>
@endsection



@section('content')





    <div class="container mt-menu">
        <div class="row pb-5">
            <div class="col-md-12">
                <div class=" prob rad-20">
                    <img src="/new/img/1.jpg" class="w-100"/>
                    <div></div>
                    <a href="#">
                        <h3 class="text-white">
                            {{$cat->title['fa']}}
                        </h3>
                        <p>
                            {{$cat->intro['fa']}}
                        </p>
                    </a>
                </div>
            </div>




            @foreach($contents as  $key=>$content)

                <div class="col-md-12 mt-5">
                    <div class="shadow rad-10 overflow-h bg-second shadow-hover grow-parent">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="overflow-h">
                                    {{--<img src="<?= Url('/post-img/'.$content->image); ?>" class="grow img-fluid"/>--}}
                                </div>
                            </div>
                            {{--<div class="col-md-8 p-4 text-right">--}}
                                {{--<h2>   {!! \Illuminate\Support\Str::words($content->title , $words = 10, $end = '...') !!}</h2>--}}
                                {{--<p>--}}
                                    {{--{!! \Illuminate\Support\Str::words($content->intro , $words = 20, $end = '...') !!}--}}
                                {{--</p>--}}
                                {{--<a href="<?= Url('/content/show/'.'324-'.$content->id.'-'.str_replace(" ","-",$content->title)); ?>" class="sweep-to-left sweep-to-left-bg-dark shadow d-block w-50">ادامه مطلب</a>--}}
                            {{--</div>--}}
                        </div>
                    </div>
                </div>
            @endforeach


        </div>
    </div>






    <section class="pricing container-full">

        <div class="container">



            @foreach($contents as  $key=>$content)

                <article class="pricing__table" style="margin-bottom: 55px;direction: rtl;text-align: right">
                    <div class="card-show">
                        <!-- Card image -->
                        {{--<img alt=" figorat -  {!! \Illuminate\Support\Str::words($content->title , $words = 11, $end = '...') !!}" src="<?= Url('/post-img/'.$content->image); ?>" class="card-img-top h-225"/>--}}
                        <!-- Card content -->
                        <div class="card-body">
                            {{--<p style="margin-right: -17px;color: #a63e68" class="card-text">{!! \Illuminate\Support\Str::words($content->title , $words = 10, $end = '...') !!}</p>--}}
                        </div>
                    </div>
                    {{--<span class="">{!! \Illuminate\Support\Str::words($content->intro , $words = 20, $end = '...') !!}</span>--}}
                    {{--<h4 class="card-title"><a href="<?= Url('/content/show/'.'324-'.$content->id.'-'.str_replace(" ","-",$content->title)); ?>" >ادامه مطلب </a></h4>--}}
                </article>
            @endforeach


        </div>


        <div style="display: flex;justify-content: center">
            {{$contents->links()}}

        </div>
    </section>







@endsection









