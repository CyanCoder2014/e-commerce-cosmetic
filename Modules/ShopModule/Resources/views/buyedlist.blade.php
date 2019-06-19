@extends('layouts.layout')

@section('name')
    سبد خرید
@endsection
@section('header')
    <meta name="description"
          content="سبد خرید شما">
@endsection


@section('content')




        <section class="hero container-full">


            <article class="pricing__table" style="width: 90%;margin:0 auto;direction: rtl">



                <div class="content_fullwidth less2" style="margin-top:70px;direction: rtl">
                    <div class="">
                        <!-- Breadcrumb Start-->
                        <!-- Breadcrumb End-->
                        <div class="row">
                            <!--Middle Part Start-->
                            <div id="content" class="col-sm-12">
                                <h1 class="title">محصولات خریداری شده</h1>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td class="text-center">تصویر</td>
                                            <td class="text-left">نام محصول</td>


                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $item)
                                            <tr>
                                                <td class="text-center"><a href="{{ route('shop.show',['id' => '321'.'-'.$item->id.'-'.str_replace(" ","-",$item->name)]) }}"><img src="@if(isset($item->image[0])){{asset($item->image[0])}}@endif" alt="{{$item->name}}" title="{{$item->name}}" class="img-thumbnail"></a></td>
                                                <td class="text-left"><a href="{{ route('shop.show',['id' => '321'.'-'.$item->id.'-'.str_replace(" ","-",$item->name)]) }}">{{$item->name}}</a><br>
                                                    {{--<small>امتیازات خرید: 1000</small>--}}
                                                </td>

                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!--Middle Part End -->
                        </div>
                    </div>
                    </div>
                </div>
            </article>

        </section>



@endsection
