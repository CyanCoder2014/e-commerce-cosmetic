@extends('layouts.layout')
{{--liste brands--}}

@section('header')
    <style>
        .maxim {
            max-width: 220px !important;
            max-height: 330px !important;
        }
    </style>
@endsection


@section('content')

    <div class="container pt-3 pb-5">
        <div class="row pb-5">
            <div class="col-md-12">
                <h1 class="text-right"> برند ها</h1>

                <div class="row p-1 shadow " id="fix-tab">


                    <div class="col-sm">
                        <a href="#aa" class="alphabet">A</a>
                    </div>
                    <div class="col-sm">
                        <a href="#bb" class="alphabet">B</a>
                    </div>
                    <div class="col-sm">
                        <a href="#cc" class="alphabet">C</a>
                    </div>
                    <div class="col-sm">
                        <a href="#dd" class="alphabet">D</a>
                    </div>
                    <div class="col-sm">
                        <a href="#ee" class="alphabet">E</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">F</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">G</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet alphabet-disabled">H</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">I</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">J</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">K</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">L</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">M</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">N</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">O</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">P</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">Q</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">R</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">S</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">T</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">U</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">V</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">W</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">X</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">Y</a>
                    </div>
                    <div class="col-sm">
                        <a href="#" class="alphabet">Z</a>
                    </div>

                </div>
            </div>
            <div class="col-md-12">

                @foreach($brands as $brand)

                    <ul class="nav shadow " id="aa">
                        <li class="nav-item">
                            <a class="nav-link font-weight-bold alphabet-head pl-5" href="#"><img
                                        src="{{asset($brand->logo)}}" style="border-radius: 10px;width: 100px;"></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link alphabet-link" href="{{$brand->link()}}">{{$brand->name}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link alphabet-link" href="{{$brand->link()}}">{{$brand->country}}</a>
                        </li>
                    </ul>


                @endforeach
                {{--<ul class="nav shadow " id="bb" >--}}
                {{--<li class="nav-item" >--}}
                {{--<a class="nav-link font-weight-bold alphabet-head pl-5" href="#">B</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link alphabet-link" href="#">Link</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link alphabet-link" href="#">Link</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--<ul class="nav shadow " id="cc" >--}}
                {{--<li class="nav-item" >--}}
                {{--<a class="nav-link font-weight-bold alphabet-head pl-5" href="#">C</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link alphabet-link" href="#">Link</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link alphabet-link" href="#">Link</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--<ul class="nav shadow " id="dd" >--}}
                {{--<li class="nav-item" >--}}
                {{--<a class="nav-link font-weight-bold alphabet-head pl-5" href="#">D</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link alphabet-link" href="#">Link</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link alphabet-link" href="#">Link</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--<ul class="nav shadow " id="ee" >--}}
                {{--<li class="nav-item" >--}}
                {{--<a class="nav-link font-weight-bold alphabet-head pl-5" href="#">E</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link alphabet-link" href="#">Link</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                {{--<a class="nav-link alphabet-link" href="#">Link</a>--}}
                {{--</li>--}}
                {{--</ul>--}}
            </div>
        </div>
    </div>



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