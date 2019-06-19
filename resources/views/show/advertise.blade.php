@extends('layouts.layout')
@section('title')
    {{ $advertise->title }}
@endsection
@section('header')

@endsection


@section('content')
    <div class="shadow pt-menu pb-4">
        <div class="container">
            <div class="row ">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-md-2">
                            @if(is_array($advertise->images))
                            @foreach($advertise->images as $image )
                                <img src="{{ asset($image) }}" class="mt-2 rad-10 w" width="100" height="100">
                            @endforeach
                            @endif
                        </div>
                        <div class="col-md-10">
                            <div class="magnify">

                            @if(isset($advertise->images[0]))
                                <!-- This is the magnifying glass which will contain the original/large version -->
                                <div class="large" style="background: rgba(0, 0, 0, 0) url(&quot;{{ asset($advertise->images[0]) }}&quot;) no-repeat scroll 109px -682px; display: none; left: -94.0833px; top: 154.5px;"></div>
                                <!-- This is the small image -->
                                <img class="small ort img-fluid rad-10 shadow h-100" src="{{ asset($advertise->images[0]) }}">
                            @endif
                            </div>
                        </div>

                    </div>


                </div>
                <div class="col-lg-5 text-right">
                    <h3 class="font-weight-bold">{{ $advertise->title }}</h3>
{{--                    <div><a href="#" class="sweep-to-left sweep-to-left-border-gold shadow d-block mt-3 w-100">activate notification</a></div>--}}
                    <div class="p-3 mt-2 shadow">
                        <span>قیمت :</span>
                        <span class="float-left text-gold">{{ $advertise->price }} تومان</span>
                    </div>
{{--                    <div class="p-3 mt-2 shadow">--}}
{{--                        <span>هزینه ارسال :</span>--}}
{{--                        <span class="float-left text-gold">1000 تومان</span>--}}
{{--                    </div>--}}
                    <div class="p-3 mt-2 shadow">
                        <span class="font-size-13">فروشنده</span>
                        <div><h3>{{ $advertise->user->name }}</h3></div>
{{--                        <div>--}}
{{--                        <span class="text-gold">--}}
{{--                            <i class="fas fa-star"></i>--}}
{{--                            <i class="fas fa-star"></i>--}}
{{--                            <i class="fas fa-star"></i>--}}
{{--                            <i class="fas fa-star"></i>--}}
{{--                            <i class="fas fa-star"></i>--}}
{{--                        </span>--}}
{{--                            <a href="#" class="text-grey"> ( Reviews: 365 )</a>--}}
{{--                        </div>--}}
                        <div class="pt-3">
                            {!! $advertise->description !!}
                        </div>
                        <div class="pt-3">
                            <span class="pr-3">{{ $advertise->city->province->name }} - {{ $advertise->city->name }}</span>
                        </div>
                        <div class="pt-3">
                            <span class="pr-3"><a href="tel:{{ $advertise->tell }}">{{ $advertise->tell }}</a></span>
                        </div>
                        <div class="pt-3">
                            <span class="pr-3"><a href="mailto:{{ $advertise->email }}">{{ $advertise->email }}</a></span>
                        </div>
                        @if(isset($advertise->user->profile))
                        <div>
                            <a href="{{ $advertise->user->profile->link() }}" class="sweep-to-left sweep-to-left-border-dark shadow d-block mt-3">
                                پروفایل فروشنده</a>
                        </div>
                        @endif
                    </div>

                </div>


            </div>
        </div>
    </div>
    <div class="shadow pb-5">
        <div class="container pt-4 text-right">
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
                                <span class=" text-gold">{{ $advertise->brand->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>


                @if(isset($advertise->collection))
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="p-3 mt-2 shadow">
                                <span>کالکشن :</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 mt-2 shadow">
                                <span class=" text-gold">{{ $advertise->collection->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                    @if(isset($advertise->product))

                    <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="p-3 mt-2 shadow">
                                <span>محصول :</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 mt-2 shadow">
                                <span class=" text-gold">{{ $advertise->product->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                @endif
                @endif




                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="p-3 mt-2 shadow">
                                <span>رفرنس :</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 mt-2 shadow">
                                <span class=" text-gold">{{ $advertise->reference }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="p-3 mt-2 shadow">
                                <span>وضعیت :</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 mt-2 shadow">
                                <span class=" text-gold">{{ $advertise->status() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="p-3 mt-2 shadow">
                                <span>گارانتی :</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 mt-2 shadow">
                                <span class=" text-gold">{{ $advertise->guarantee() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="p-3 mt-2 shadow">
                                <span>جعبه :</span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="p-3 mt-2 shadow">
                                <span class=" text-gold">{{ $advertise->box() }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
