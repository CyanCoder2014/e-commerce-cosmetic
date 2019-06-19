@extends('layouts.layout')
{{--namayeshe brands--}}

@section('header')

@endsection


@section('content')
{{--    {{ dd($advertise) }}--}}
    <div class="shadow pt-menu pb-4">
    <div class="container">
        <div class="row ">
            <div class="col-lg-7">
                <div class="row">
                    <div class="col-md-2">
                        @foreach($advertise->image as $image)
                        <img src="{{ $image }}" width="100" height="100" class="mt-2 rad-10 w"/>
                        @endforeach
                    </div>
                    <div class="col-md-10">
                        <div class="magnify">

                            <!-- This is the magnifying glass which will contain the original/large version -->
                            <div class="large"></div>

                            <!-- This is the small image -->
                            <img class="small ort img-fluid rad-10 shadow h-100" src="@if(isset($advertise->image[0])){{$advertise->image[0]}}@endif"/>
                        </div>
                    </div>

                </div>


            </div>
            <div class="col-lg-5 text-right">
                <h3 class="font-weight-bold">{{ $advertise->name }}</h3>
                <div><a href="#" class="sweep-to-left sweep-to-left-border-gold shadow d-block mt-3 w-100">activate notification</a></div>
                <div class="p-3 mt-2 shadow">
                    <span>قیمت :</span>
                    @if($advertise->discount >0)
                    <span class="float-left text-red" style="text-decoration: line-through">{{ $advertise->price }}</span>
                    @endif
                    <span class="float-left text-gold">{{ $advertise->total() }}</span>
                </div>
                <div class="p-3 mt-2 shadow">
                    <span>هزینه ارسال :</span>
                    <span class="float-left text-gold">1000 تومان</span>
                </div>
                <div class="p-3 mt-2 shadow">
                    <span class="font-size-13"></span>
                    <div><h3>WatchShopping.com Inc.</h3></div>
                    <div>
                        <span class="text-gold">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </span>
                        <a href="#" class="text-grey"> ( Reviews: 365 )</a>
                    </div>
                    <div class="pt-3">
                        <span><img src="img/US.png" height="16" width="22"/></span>
                        <span class="pr-3">US - San Mateo</span>
                    </div>
                    <div>
                        <a href="#" class="sweep-to-left sweep-to-left-border-dark shadow d-block mt-3">
                            contact seller</a>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>
    <div class="shadow pb-5">
    <div class="container pt-4 text-right">
        <div class="row">
            <h2 class="pb-2">توضیحات</h2>
            <div class="col-md-12">
                {!!  $advertise->description !!}
            </div>

        </div>
        <div class="row">
            <h2 class="pb-2">جزئیات</h2>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="p-3 mt-2 shadow">
                            <span>برند :</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 mt-2 shadow">
                            <span class=" text-gold">1000 تومان</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="p-3 mt-2 shadow">
                            <span>کالکشن :</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 mt-2 shadow">
                            <span class=" text-gold">1000 تومان</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="p-3 mt-2 shadow">
                            <span>قیمت :</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 mt-2 shadow">
                            <span class=" text-gold">1000 تومان</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="p-3 mt-2 shadow">
                            <span>قیمت :</span>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="p-3 mt-2 shadow">
                            <span class=" text-gold">1000 تومان</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection