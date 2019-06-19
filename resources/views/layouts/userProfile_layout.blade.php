@extends('layouts.layout')



@section('header')


    <style>
        .thumb.thumb-xl {
            width: 120px;
        }
        .list-group {

            margin:auto;

            padding-top:20px;
        }
        .lead {

            margin:auto;
            left:0;
            right:0;
            padding-top:10%;
        }

    </style>
@endsection



@section('content')
    <section class="hero container-full">


        <article class="pricing__table" style="width: 90%;margin:0 auto;direction: rtl">



            <div class="content_fullwidth less2" style="margin-top:70px;direction: rtl">
                <!-- Breadcrumb Start-->
                {{--<ul class="breadcrumb">--}}
                    {{--<li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>&nbsp; > &nbsp;--}}
                    {{--<li><a href="{{route('shop.basket')}}">سبد خرید</a></li>&nbsp; > &nbsp;--}}
                    {{--<li><a href="">تسویه حساب</a></li>--}}
                {{--</ul>--}}
                <!-- Breadcrumb End-->
                <!-- row -->
                <div class="row">






                        <!-- col -->
                        <div class="col-md-4">

                            <!-- tile -->
                            <section class="tile tile-simple">

                                <!-- tile widget -->
                                <div class="tile-widget p-30 text-center">

                                    <div class="thumb">
                                        <img class="img-circle" src="{{asset('new/img/2.jpg')}}" alt="" style="width:155px ">
                                    </div>
                                    <?php $user =Auth::user() ?>
                                    <h4 class="mb-0">{{ $user->name }}</h4>
                                    <span class="text-muted">{{$user->email}}</span>
                                    <div class="mt-10">
                                        <div class="list-group">

                                            <a href="{{ route('profile.edit') }}" class="list-group-item"><i class="fa fa-key"></i> <span>ویرایش اطلاعات کاربری</span></a>
                                            <a href="{{ route('shop.history') }}" class="list-group-item"><i class="fa fa-credit-card"></i> <span>گزارش سفارشات</span></a>
                                            {{--<a href="#" class="list-group-item"><i class="fa fa-question-circle"></i> <span>Support</span></a>--}}
                                            <a href="{{ route('logout') }}" class="list-group-item"><i class="fa fa-arrow-circle-o-left"></i> <span>خروج</span></a>
                                            {{--<a href="#" class="list-group-item"><i class="fa fa-book"></i> <span>QuickStart Overview</span></a>--}}
                                            {{--<a href="#" class="list-group-item"><i class="fa fa-compass"></i> <span>Documentation</span></a>--}}


                                        </div>
                                    </div>

                                </div>
                                <!-- /tile widget -->

                                <!-- tile body -->
                                {{--<div class="tile-body text-center bg-blue p-0">--}}

                                    {{--<ul class="list-inline tbox m-0">--}}
                                        {{--<li class="tcol p-10">--}}
                                            {{--<h2 class="m-0">695</h2>--}}
                                            {{--<span class="text-transparent-white">Tweets</span>--}}
                                        {{--</li>--}}
                                        {{--<li class="tcol bg-blue dker p-10">--}}
                                            {{--<h2 class="m-0">1 269</h2>--}}
                                            {{--<span class="text-transparent-white">Followers</span>--}}
                                        {{--</li>--}}
                                        {{--<li class="tcol p-10">--}}
                                            {{--<h2 class="m-0">369</h2>--}}
                                            {{--<span class="text-transparent-white">Following</span>--}}
                                        {{--</li>--}}
                                    {{--</ul>--}}

                                {{--</div>--}}
                                <!-- /tile body -->

                            </section>
                            <!-- /tile -->




                        </div>
                        <!-- /col -->






                        <!-- col -->
                        <div class="col-md-8">
                            @yield('profile_content')
                        </div>
                        <!-- /col -->











                    </div>
                <!-- /row -->




            </div>
        </article>

    </section>


@endsection


