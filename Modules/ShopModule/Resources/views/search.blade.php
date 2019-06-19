@extends('layouts.layout')
{{--namayeshe brands--}}


@section('title')

    @if($name!= '')
        {{$name->name}}
    @else
        آگهی فروش ساعت نو دست دوم
    @endif


@endsection
@section('header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    @if($name!= '')
        <meta name="description"
              content="{{$name->description}}">
    @else
        <meta name="description"
              content="محصولات و آگهی های خرید و فروش ساعت های برند ">
    @endif



    <style>
        .maxim {
            max-width: 220px !important;
            max-height: 330px !important;
        }
        html {
            scroll-behavior: smooth;
        }
    </style>
@endsection


@section('content')



    <!--<div class="bg-image pt-5">
        <div class="row mt-5 pt-5 dir-r ">
            <div class="col-md-12 text-white text-center">
                {{--<h1 class=" pt-4"> {{$name}}</h1>--}}
            </div>

        </div>
    </div>-->

    @if($name!= '')


    <div >


        <div class="position-relative overflow-h" style="max-height: 260px">
            <img src="@if(isset($name->image)) {{ asset($name->image) }} @else /new/img/4.jpg @endif" class="w-100"/>
            <div class="ladiesbtn"><a href="#catalog" class="sweep-to-left0 sweep-to-left-border-gold shadow d-block mt-5 " style="border: 0 "> کاتالوگ
                    {{$name->name}} </a></div>
        </div>


        <div class="container-fluid">
            <div class="row justify-content-around text-center font-size-13 p-2" style="background-color: #efecea">
                <div class="col-md-4 py-3"><a href="#" class="text-grey"> برند:  <span class="font-weight-bold">{{$name->name}}</span></a></div>
                <div class="col-md-4 py-3"><a href="#" class="text-grey">کشور سازنده:  <span class="font-weight-bold">{{$name->country}}</span></a></div>
               <div class="col-md-4 py-3"><a href="#" class="text-grey"> سال تاسیس:  <span class="font-weight-bold">{{$name->year}}</span></a></div>
               <div class="col-md-4 py-3"><a href="#" class="text-grey"> موسس:  <span class="font-weight-bold">{{$name->founder}}</span></a></div>
               <div class="col-md-4 py-3"><a href="#" class="text-grey"> رده بندی:  <span class="font-weight-bold">
                           @if($name->classification == '1')
                               <button class="btn btn-dark btn-sm"> لوکس ++</button>
                           @endif
                           @if($name->classification == '2')
                               <button class="btn btn-dark btn-sm"> لوکس +</button>
                           @endif
                           @if($name->classification == '3')
                               <button class="btn btn-dark btn-sm"> لوکس</button>
                           @endif
                           @if($name->classification == '4')
                               <button class="btn btn-dark btn-sm"> معمولی</button>
                           @endif
                           @if($name->classification == '5')
                               <button class="btn btn-dark btn-sm"> سایر</button>
                           @endif

                       </span></a></div>
               <div class="col-md-4 py-3"><a target="_blank" href="http://{{$name->site}}" class="text-grey"> سایت:  <span class="font-weight-bold">{{$name->site}}</span></a></div>
                </div>
        </div>





    </div>

    <div id="catalog" class="container watchTab mt-5" >

        <div class="row">

            <div class="col-md-2 ">
                <div class="next_section cursor-p text-center p-3"><i class="fas fa-chevron-up"></i></div>
                <div class="watchSider">
                    <ul class="nav flex-column text-left" id="myTab" role="tablist">

                        @foreach($name->collections as $key => $collection)

                            <li class="nav-item border-left">
                                <a class="nav-link
                         @if($key == 0)
                                        active
@endif
                                        " id="abc{{$collection->id }}-tab" data-toggle="tab" href="#abc{{$collection->id }}" role="tab"
                                   aria-controls="abc{{$collection->id }}"
                                   @if($key == 0)
                                   aria-selected="true"
                                   @@else
                                   aria-selected="false"
                                        @endif

                                >{{$collection->name}}</a>
                            </li>
                        @endforeach






                    </ul>
                </div>

                <div class="prev_section cursor-p text-center p-3"><i class="fas fa-chevron-down"></i></div>
            </div>
            <div class="col-md-10">
                <div class="tab-content" id="myTabContent">


                    @foreach($name->collections as $key => $collection)

                    <div class="tab-pane fade show
                    @if($key ==0)
                            active
                    @endif
" id="abc{{$collection->id }}" role="tabpanel" aria-labelledby="abc{{$collection->id }}-tab">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6 watchHeight">
                                    <img src="{{asset($collection->image)}}" class=" pl-5 " style="max-height: 300px"/>
                                </div>
                                <div class="col-md-6 text-center pt-2">
                                    <img src="{{asset($name->logo)}}" height="104" />
                                    <div class="my-3">
                                        {{$collection->name}}
                                    </div>
                                    <div>
                                        {{$collection->description}}
                                    </div>
                                    <div class="mt-3">
                                        <div href="#"
                                             class="sweep-to-left sweep-to-left-border-dark shadow mt-3 cursor-p showProduct btn-sm">
                                            نمایش محصولات</div>
                                        <div href="#"
                                             class="sweep-to-left sweep-to-left-border-dark shadow mt-3 cursor-p hideProduct btn-sm">
                                            نمایش کمتر</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row shadow text-center pt-3 heightChange">
                                @foreach($collection->products as $product)
                                    <div class="item col-lg-4 col-md-6 col-xs-12 mb-5">
                                        <div class="blogCat shadow-hover">
                                            <div class="ovrly25">
                                                <div class="overflow-h" style="height: 250px">
                                                    @if(isset($product->image[0]))
                                                        <img src="{{ asset($product->image[0]) }}" class="h-100" alt="{{ $product->name }}">
                                                    @endif
                                                </div>
                                                <div class="ovrlyT"></div>

                                            </div>
                                            <div class="p-3 bg-white">
                                                <h4 class="text-center text-grey px-3 pt-3">{{ $product->name }}</h4>
                                                <div class="text-center"><span class="gold-underline"></span></div>
                                                <p class="p-0 text-center ">رفرنس:
                                                    {{ $product->reference }}
                                                </p>
                                                <p class="p-0 text-center ">سایز قاب:
                                                    {{ $product->size }}
                                                </p>
                                                <p class="p-0 text-center ">جنس بزل:
                                                    {{ $product->kind }}
                                                </p>
                                                <p class="p-0 text-center ">جنس بند:
                                                    {{ $product->wristlet }}
                                                </p>
                                                <p class="p-0 text-center " style="display: flex;justify-content: center">توضیحات:
                                                    {!! \Illuminate\Support\Str::words($product->description , $words = 16, $end = '...') !!}
                                                </p>

                                            </div>
                                        </div>


                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>
    <div class="bgwatch text-white text-center mt-3" style="background-image: url('{{asset($banners->img_brand)}}')">
        <h3 class="p-3"> {{$name->name}}</h3>
        <div>
            {{$name->description}}
        </div>
    </div>



@else

        <div class="position-relative overflow-h" style="max-height: 300px">
            <img src="/new/img/4.jpg" class="w-100"/>
            <div class="ladiesbtn" style="display: flex;justify-content: center;width: 350px"><a href="#profilesellers" class="m-2 sweep-to-left0 sweep-to-left-border-gold shadow d-block mt-5 " style="color: #0b0b0b;border: 0 ">

                   لیست فروشگاه ها </a>

                <a href="user/register" class=" m-2 sweep-to-left0 sweep-to-left-border-gold shadow d-block mt-5 " style="color: #0b0b0b;border: 0 ">

                    ثبت فروشگاه ساعت </a>
            </div>
        </div>


@endif

















    <div class="shadow">
        <div class="container pt-4 pb-3">
            <div class="row">
                <div class="col-md-3 text-center mt-5">
                    <div><img src="{{ asset($banners->img_maghale)}}" width="100"/></div>
                    <div class="text-grey  m-4  ">مقالات
                    </div>
                    <div><a href="/content/magazine/all"
                            class="sweep-to-left sweep-to-left-border-gold shadow d-block mt-3  btn-sm">
                            بیشتر</a></div>
                </div>
                <div class="col-md-3 text-center mt-5">
                    <div><img src="{{asset($banners->img_tamir)}}" width="100"/></div>
                    <div class="text-grey  m-4  ">تعمیرگاه ها
                    </div>
                    <div><a href="/profile/sellerList?type=1&brand_id={{ $name->id??null }}"
                            class="sweep-to-left sweep-to-left-border-gold shadow d-block mt-3  btn-sm">
                            بیشتر</a></div>
                </div>
                <div class="col-md-3 text-center mt-5">
                    <div><img src="{{asset($banners->img_frush)}}" width="100"/></div>
                    <div class="text-grey  m-4  ">فروشگاه ها
                    </div>
                    <div><a href="/profile/sellerList?type=0&brand_id={{ $name->id??null }}"
                            class="sweep-to-left sweep-to-left-border-gold shadow d-block mt-3  btn-sm">
                            بیشتر</a></div>
                </div>
                <div class="col-md-3 text-center mt-5">
                    <div><img src="{{asset($banners->img_agahi)}}" width="100"/></div>
                    <div class="text-grey  m-4  ">آگهی ها
                    </div>
                    <div><a href="#advertisement"
                            class="sweep-to-left sweep-to-left-border-gold shadow d-block mt-3  btn-sm">
                            بیشتر</a></div>
                </div>
            </div>
        </div>
    </div>



    <div class="container mt-5 " id="advertisement">



        <div class="accordion mb-3 " id="accordionExample275">
            <div class="card z-depth-0 bordered">
                <div class="card-header text-center " id="headingOne2">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-center "  type="button"  data-toggle="collapse" data-target="#collapseOne2"
                                aria-expanded="true" aria-controls="collapseOne2">
                           فیلتر آگهی ها
                        </button>
                    </h5>
                </div>
                <div id="collapseOne2" class="collapse" aria-labelledby="headingOne2"
                     data-parent="#accordionExample275">
                    <div class="card-body">
                        <form action="" method="get" style="width: 100%">

                            <div class="row text-right mt-1 pt-0 ">
                                <div class="col-md-4 my-3 form-group">
                                    <span class="ml-2"> وضعیت: </span>
                                    <!-- Example split danger button -->
                                    <select class="form-control form-control-sm" id="status" name="status" style="width: 100%" >
                                        <option value="">همه</option>
                                        <option value="0" @if(Request::get('brand') == 0) selected="selected" @endif>نو</option>
                                        <option value="1" @if(Request::get('brand') == 1) selected="selected" @endif>در حد نو</option>
                                        <option value="2" @if(Request::get('brand') == 2) selected="selected" @endif>کارکرده</option>
                                    </select>
                                </div>
                                <div class="col-md-4 my-3 form-group">
                                    <span class="ml-2"> کاربرد: </span>
                                    <!-- Example split danger button -->
                                    <select class="form-control form-control-sm " id="usage" name="usage" style="width: 100%" >
                                        <option value="">همه</option>
                                        <option value="0" @if(Request::get('usage') == 0) selected="selected" @endif>مچی</option>
                                        <option value="1" @if(Request::get('usage') == 1) selected="selected" @endif>جیبی</option>
                                        <option value="2" @if(Request::get('usage') == 2) selected="selected" @endif>رومیزی</option>
                                    </select>
                                </div>
                                <div class="col-md-4 my-3 form-group">
                                    <span class="ml-2"> موتور: </span>
                                    <!-- Example split danger button -->
                                    <select class="" id="motor" name="motor" style="width: 100%" >
                                        <option value="">همه</option>
                                        <option value="0" @if(Request::get('motor') == 0) selected="selected" @endif>اتوماتیک</option>
                                        <option value="1" @if(Request::get('motor') == 1) selected="selected" @endif>کوکی</option>
                                        <option value="2" @if(Request::get('motor') == 2) selected="selected" @endif>کوارتز</option>
                                    </select>
                                </div>
                                <div class="col-md-4 my-3 form-group">
                                    <span class="ml-2"> لوازم جانبی: </span>
                                    <!-- Example split danger button -->
                                    <select class="form-control form-control-sm" id="accessories" name="accessories" style="width: 100%" >
                                        <option value="">همه</option>
                                        <option value="0" @if(Request::get('accessories') == 0) selected="selected" @endif>ندارد</option>
                                        <option value="1" @if(Request::get('accessories') == 1) selected="selected" @endif>دارد</option>
                                    </select>
                                </div>
                                <div class="col-md-4 my-3 form-group">
                                    <span class="ml-2"> پیچیدگی: </span>
                                    <!-- Example split danger button -->
                                    <select class="form-control form-control-sm" id="complexity" name="complexity[]" multiple style="width: 100%" >
                                        <option value="">همه</option>
                                        <option value="0" @if(is_array(Request::get('complexity')) && in_array(0,Request::get('complexity'))) selected="selected" @endif>آنالوگ</option>
                                        <option value="1" @if(is_array(Request::get('complexity')) && in_array(1,Request::get('complexity'))) selected="selected" @endif>تقویم</option>
                                        <option value="2" @if(is_array(Request::get('complexity')) && in_array(2,Request::get('complexity'))) selected="selected" @endif>کرنوگراف</option>
                                        <option value="3" @if(is_array(Request::get('complexity')) && in_array(3,Request::get('complexity'))) selected="selected" @endif>توربیلیون</option>
                                    </select>
                                </div>
                                <div class="col-md-4 my-3 form-group">
                                    <span class="ml-2"> جنسیت: </span>
                                    <!-- Example split danger button -->
                                    <select class="form-control form-control-sm" id="sex" name="sex" style="width: 100%" >
                                        <option value="">همه</option>
                                        <option value="0" @if(Request::get('sex') == 0) selected="selected" @endif>زنانه</option>
                                        <option value="1" @if(Request::get('sex') == 1) selected="selected" @endif>مردانه</option>
                                        <option value="2" @if(Request::get('sex') == 2) selected="selected" @endif>یونیسکس</option>
                                    </select>
                                </div>
                                <div class="col-md-4 my-3 form-group">
                                    <span class="ml-2"> متریال به کار رفته: </span>
                                    <!-- Example split danger button -->
                                    <select class="form-control form-control-sm" id="material" name="material[]" multiple="multiple" style="width: 100%" >
                                        <option value="">همه</option>
                                        <option value="0" @if(is_array(Request::get('material')) && in_array(0,Request::get('material'))) selected="selected" @endif>طلا</option>
                                        <option value="1" @if(is_array(Request::get('material')) && in_array(1,Request::get('material'))) selected="selected" @endif>استیل</option>
                                        <option value="2" @if(is_array(Request::get('material')) && in_array(2,Request::get('material'))) selected="selected" @endif>سرامیک</option>
                                        <option value="3" @if(is_array(Request::get('material')) && in_array(3,Request::get('material'))) selected="selected" @endif>تیتانیوم</option>
                                        <option value="4" @if(is_array(Request::get('material')) && in_array(4,Request::get('material'))) selected="selected" @endif>سنگ قیمتی</option>
                                        <option value="5" @if(is_array(Request::get('material')) && in_array(5,Request::get('material'))) selected="selected" @endif>پلاتین</option>
                                        <option value="6" @if(is_array(Request::get('material')) && in_array(6,Request::get('material'))) selected="selected" @endif>چرم</option>
                                    </select>
                                </div>
                                <div class="col-md-4 my-3 form-group">
                                    <span class="ml-2"> ضد آب: </span>
                                    <!-- Example split danger button -->
                                    <select class="form-control form-control-sm" id="waterproof" name="waterproof" style="width: 100%" >
                                        <option value="">همه</option>
                                        <option value="0" @if(Request::get('waterproof') == 0) selected="selected" @endif>دارد</option>
                                        <option value="1" @if(Request::get('waterproof') == 1) selected="selected" @endif>ندارد</option>
                                    </select>
                                </div>
                                <div class="col-md-4 my-3 form-group">
                                    <span class="ml-2"> فروشنده: </span>
                                    <!-- Example split danger button -->
                                    <select class="form-control form-control-sm" id="seller" name="seller" style="width: 100%" >
                                        <option value="">همه</option>
                                        <option value="0" @if(Request::get('seller') == 0) selected="selected" @endif>فروشگاه</option>
                                        <option value="1" @if(Request::get('seller') == 1) selected="selected" @endif>خانگی</option>
                                    </select>
                                </div>
                                <div class="col-md-4 my-3 form-group">
                                    <span class="ml-2"> برند: </span>
                                    <!-- Example split danger button -->
                                    <select class="form-control form-control-sm" id="brand" name="brand" data-action="{{ route('getcollections',['id' => null]).'/' }}" style="width: 100%" >
                                        <option value="">همه</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}" @if(Request::get('brand') == $brand->id) selected="selected" @endif>{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4 my-3 form-group">
                                    <span class="ml-2"> کالکشن: </span>
                                    <!-- Example split danger button -->
                                    <select class="form-control form-control-sm" id="collection" name="colection" data-selected="{{Request::get('colection')}}" style="width: 100%" >
                                        <option value="">همه</option>

                                    </select>
                                </div>
                                <div class="col-md-4 my-3 form-group">
                                    <span class="ml-2"> استان : </span>
                                    <!-- Example split danger button -->

                                    <select id="province" class="form-control form-control-sm" name="province_id" data-action="{{ route('getcities',['id' => null]).'/' }}" style="width: 100%" >
                                        <option value="">همه</option>
                                        @foreach($provinces as $province)
                                            <option value="{{$province->id}}" @if($province->id == Request::get('province_id')) selected @endif>{{$province->name}}</option>
                                        @endforeach
                                    </select>



                                </div>
                                <div class="col-md-4 my-3 form-group">
                                    <label for="city" class=" ">شهر : </label>
                                    <select id="city" class="form-control form-control-sm" name="city_id" data-selected="{{Request::get('city_id')}}" style="width: 100%" >
                                        <option value="">همه</option>
                                    </select>
                                </div>
                                <div class="col-md-4 my-3 mt-5">
                                    <button class="btn btn-primary px-5">فیلتر</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>





                    <div class="row shadow text-center pt-3">
                        @foreach($advertisings as $advertising)
                        <div class="col-md-6 mb-3 col-lg-3">
                            <div class="card border-0 shadow-hover grow-parent">
                                <div class="overflow-h ">

                                   @if(isset($advertising->images[0]))
                                    <img class="m-auto p-3 grow" width="200" height="220"
                                         src="{{asset($advertising->images[0])}}"
                                         alt="Card image cap">
                                       @endif



                                </div>
                                <div class="card-body">
                                    <h5 class="card-title font-weight-bold">{{$advertising->title}}</h5>
                                    <p class="card-text text-gold">
                                        {{$advertising->price}} تومان
                                    </p>

                                    <p>
                                        {{$advertising->serial}}
                                    </p>
                                    <div class="row">
                                        <div class="col-9 p-0">
                                            <a href="{{ $advertising->link() }}"
                                               class="sweep-to-left sweep-to-left-border-dark shadow d-block mt-3">بیشتر</a>
                                        </div>
{{--                                        <div class="col-3 p-0 text-right">--}}
{{--                                            <button type="button" class="btn btn-outline-gold mt-3"><i--}}
{{--                                                        class="fas fa-shopping-cart"></i></button>--}}
{{--                                        </div>--}}

                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {!! $advertisings->links() !!}

                    </div>



        @if($name== '')

            <div id="profilesellers" style="display: flex;justify-content: center ;margin-top: 50px">
<h3>فروشگاه های ساعت</h3>
            </div>

            <div class="container">
                <div class="row pb-5">


                    @foreach($profilesellers as $profile)
                        <div class="col-md-12 mt-5">
                            <div class="shadow rad-10 overflow-h bg-second shadow-hover grow-parent">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="overflow-h">
                                            @if(isset($profile->logo_img))
                                                <img src="{{ asset($profile->logo_img) }}" class="grow img-fluid"/>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8 p-4 text-right">
                                        <h2>{{ $profile->company }}</h2>
                                        {{--                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci blanditiis, commodi--}}
                                        {{--                            consectetur consequuntur esse maiores maxime molestias neque quas quasi qui quia quidem--}}
                                        {{--                            repudiandae sed, similique sunt ut veniam voluptatum.</p>--}}
                                        <a href="{{ $profile->link() }}" class="sweep-to-left sweep-to-left-bg-dark shadow d-block w-50">ادامه مطلب</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {!! $profilesellers->links() !!}
                </div>
            </div>




        @endif



        <div style="display: flex;justify-content: center">

        </div>
    </div>

    <!--
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#centralModalSuccess">
        Launch demo modal
    </button>
    -->
<br>
<br>
<br>

    <!-- Central Modal Medium Success -->
    <div class="modal fade" id="centralModalSuccess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-notify modal-success" role="document">
            <!--Content-->
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header">
                    <p class="heading lead">Modal Success</p>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="white-text">&times;</span>
                    </button>
                </div>

                <!--Body-->
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-check fa-4x mb-3 animated rotateIn"></i>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit iusto nulla aperiam blanditiis
                            ad consequatur in dolores culpa, dignissimos, eius non possimus fugiat. Esse ratione fuga, enim,
                            ab officiis totam.</p>
                    </div>
                </div>

                <!--Footer-->
                <div class="modal-footer justify-content-center">
                    <a type="button" class="btn btn-success">Get it now <i class="far fa-gem ml-1 text-white"></i></a>
                    <a type="button" class="btn btn-outline-success waves-effect" data-dismiss="modal">No, thanks</a>
                </div>
            </div>
            <!--/.Content-->
        </div>
    </div>
    <!-- Central Modal Medium Success-->

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        function getCities(th)
        {

            selected_city = $('#city').attr('data-selected') || null;


            $('#city').html('').fadeIn(800).append('<option>لطفا کمی صبر کنید ...</option>');

            $.ajax({
                type: "GET",
                url: $(th).data('action') + $(th).val(),
                dataType : 'json',
                success: function(data)
                {

                    $('#city').html('').fadeIn(800).append('<option>انتخاب شهر</option>');
                    $.each(data, function(i, city){
                        if(selected_city == city.id)
                            $('#city').append('<option value="' + city.id + '" selected>' + city.name + '</option>');
                        else
                            $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                },
                error : function(data)
                {
                    console.log('province_city.js#getCities function error: #line : 30');
                }
            });


            return false; // avoid to execute the actual submit of the form.
        }
        function getCollection(th)
        {

            selected_city = $('#collection').attr('data-selected') || null;


            $('#collection').html('').fadeIn(800).append('<option>لطفا کمی صبر کنید ...</option>');

            $.ajax({
                type: "GET",
                url: $(th).data('action') + $(th).val(),
                dataType : 'json',
                success: function(data)
                {

                    $('#collection').html('').fadeIn(800).append('<option value="">انتخاب کالکشن</option>');
                    $.each(data, function(i, row){
                        if(selected_city == row.id)
                            $('#collection').append('<option value="' + row.id + '" selected>' + row.name + '</option>');
                        else
                            $('#collection').append('<option value="' + row.id + '">' + row.name + '</option>');
                    });
                },
                error : function(data)
                {
                    console.log('collection function error: #line : 30');
                }
            });


            return false; // avoid to execute the actual submit of the form.
        }
        $(document).ready(function() {
            $('#province').select2();
            $('#city').select2();
            $('#brand').select2();
            $('#collection').select2();
            $('#status').select2();
            $('#usage').select2();
            $('#sex').select2();
            $('#accessories').select2();
            $('#motor').select2();
            $('#complexity').select2();
            $('#multiple').select2();
            $('#waterproof').select2();
            $('#material').select2();
            $('#seller').select2();
            @if(Request::get('province_id'))
            getCities($('#province'));
            @endif
            @if(Request::get('brand'))
            getCollection($('#brand'));
            @endif

        });
        $(document).on('change', '#province', function (e) {
            getCities(this);
//            $(this).siblings('.city').select2();

        });
        $(document).on('change', '#brand', function (e) {
            getCollection(this);
//            $(this).siblings('.city').select2();

        });
    </script>
@endsection
