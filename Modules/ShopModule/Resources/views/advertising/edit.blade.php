@extends('layouts.layout')

<?php $fileCount=0 ?>
@section('script')
    <link rel="stylesheet" href="{{asset('assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container {
            width: 100% !important;
        }
    </style>







    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>
        $('.lfm').click(function(){
            $('.lfm').filemanager('image');
        });
        $('.filelfm').filemanager('file');
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $('#shipping_list').select2({
            dropdownAutoWidth : true,
            placeholder: "سیستم های حمل و نقل را انتخاب کنید ...",
            minimumInputLength: 2,
            ajax: {
                url: '{{ route('shipping.find') }}',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    </script>
@endsection
@section('content')

    <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
    <section id="content">

        <div class="page page-shop-single-product right container mb-5" style="direction: rtl;text-align: right">



            <div class="pagecontent">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

            <form id="productForm" class="form-horizontal ng-pristine ng-valid" role="form" method="post" action="{{route('advertising.update',['id'=> $product->id])}}">
                {{ csrf_field() }}
                <input type="hidden" name="users_id" value="{{Auth::id()}} ">
                <input type="hidden" name="state" value="1">
                <div class="add-nav">
                    <div class="nav-heading">
                        <h3>ویرایش  <strong class="text-greensea">{{$product->name}}:</strong></h3>
                        <span class="controls pull-left">
                                  <a href="{{ route('advertising.index') }}" class="btn btn-ef btn-ef-1 btn-ef-1-default btn-ef-1a btn-rounded-20 mr-5" data-toggle="tooltip" style="color: #c7254e;float: left" title="بازگشت"><i class="fa fa-times"></i></a>
                                  <a href="javascript:;" onclick="document.getElementById('productForm').submit();" class="btn btn-ef btn-ef-1 btn-ef-1-success btn-ef-1a btn-rounded-20 mr-5"  style="color: #0ab1fc;float: left"  data-toggle="tooltip" title="ذخیره"><i class="fa fa-check"></i></a>
                        </span>
                    </div>

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <!--<li role="presentation"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>-->
                            <li role="presentation"  style="color: #c7254e" class="m-2 active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">عمومی</a></li>
                            <!--<li class="m-2 " style="color: #00aa00" role="presentation"><a href="#meta" aria-controls="meta" role="tab" data-toggle="tab">مشخصات</a></li>
                            -->
                            <li class="m-2 "  style="color: #e0a800" role="presentation"><a href="#images" aria-controls="images" role="tab" data-toggle="tab">عکس</a></li>
                            <!--<li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">ویدیو</a></li>
                            <li role="presentation"><a href="#historyTab" aria-controls="history" role="tab" data-toggle="tab">حمل و نقل</a></li>

                      -->
                        </ul>

                        <div class="tab-content">
                            <!-- tab in tabs -->
                            <div role="tabpanel" class="tab-pane" id="details">



                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-12">

                                        <!-- tile -->
                                        <section class="tile time-simple">

                                            <!-- tile body -->
                                            <div class="tile-body">


                                                <!-- row -->
                                                <div class="row">

                                                    <!-- col -->
                                                    <div class="col-md-4" data-lightbox="gallery">

                                                        <a href="http://placekitten.com/g/800/600" class="img-link" data-lightbox="gallery-item">
                                                            <img src="http://placekitten.com/g/800/600" alt="" class="img-responsive mb-20">
                                                        </a>

                                                        <!-- row thumbnails -->
                                                        <div class="row">

                                                            <!-- col -->
                                                            <div class="col-md-3 wrap-reset p-10 ml-5">
                                                                <a href="http://placekitten.com/g/800/601" class="img-link" data-lightbox="gallery-item">
                                                                    <img src="http://placekitten.com/g/800/601" alt="" class="img-responsive mb-10">
                                                                </a>
                                                            </div>
                                                            <!-- /col -->
                                                            <!-- col -->
                                                            <div class="col-md-3 wrap-reset p-10 ml-10">
                                                                <a href="http://placekitten.com/g/800/602" class="img-link" data-lightbox="gallery-item">
                                                                    <img src="http://placekitten.com/g/800/602" alt="" class="img-responsive mb-10">
                                                                </a>
                                                            </div>
                                                            <!-- /col -->
                                                            <!-- col -->
                                                            <div class="col-md-3 wrap-reset p-10 ml-10">
                                                                <a href="http://placekitten.com/g/800/603" class="img-link" data-lightbox="gallery-item">
                                                                    <img src="http://placekitten.com/g/800/603" alt="" class="img-responsive mb-10">
                                                                </a>
                                                            </div>
                                                            <!-- /col -->
                                                            <!-- col -->
                                                            <div class="col-md-3 wrap-reset p-10 ml-10">
                                                                <a href="http://placekitten.com/g/800/604" class="img-link" data-lightbox="gallery-item">
                                                                    <img src="http://placekitten.com/g/800/604" alt="" class="img-responsive mb-10">
                                                                </a>
                                                            </div>
                                                            <!-- /col -->
                                                        </div>
                                                        <!-- /row -->

                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-8">

                                                        <h2 class="custom-font mb-5">Onions <span class="label label-success">Available</span></h2>

                                                        <p class="short-desc text-sm text-default lt mb-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                        <p class="desc text-default lt mb-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>

                                                        <p class="tags"><span class="label label-default mr-5">food</span><span class="label label-default mr-5">vegetables</span><span class="label label-default mr-5">healthly</span><span class="label label-default mr-5">discount</span></p>

                                                        <h3 class="price mt-40 mb-0 text-success ng-binding">$2.80 / <small>kg</small></h3>
                                                        <p class="discount text-sm text-default lt">Discount: 8%</p>
                                                    </div>
                                                    <!-- /col -->

                                                </div>
                                                <!-- /row -->


                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->

                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->


                            </div>
                            <!-- tab in tabs -->
                            <div role="tabpanel" class="tab-pane active" id="general">




                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-12">


                                        <!-- tile -->
                                        <section class="tile">

                                            <!-- tile header -->
                                            <div class="tile-header dvd dvd-btm">
                                                <h1 class="custom-font"><strong>عمومی </strong> </h1>
                                            </div>
                                            <!-- /tile header -->


                                            <!-- tile body -->
                                            <div class="tile-body">





                                                    <div class="form-group col-sm-6">
                                                        <label for="id" class="col-sm-2 control-label">نوع آگهی: </label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="type">

                                                                <option
                                                                        @if('2' == $product->type)
                                                                        selected
                                                                        @endif
                                                                        value="2">  فروش</option>
                                                                <option
                                                                        @if('1' == $product->type)
                                                                        selected
                                                                        @endif
                                                                        value="1">خرید </option>
                                                                <option
                                                                        @if('3' == $product->type)
                                                                        selected
                                                                        @endif
                                                                        value="3">  تعمیر</option>
                                                                <option
                                                                        @if('0' == $product->type)
                                                                        selected
                                                                        @endif
                                                                        value="0">عدم نمایش</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-sm-6">
                                                        <label for="id" class="col-sm-2 control-label">دسته بندی آگهی: </label>
                                                        <div class="col-sm-10">
                                                            <select class="form-control" name="pc_id">
                                                                <option value="0" >بدون دسته</option>
                                                                @foreach($productCats as $cat)
                                                                    <option
                                                                            @if($cat->parent_id == 0)
                                                                            style="font-weight: 600;color: #2C3E50"
                                                                            @endif
                                                                            @if($cat->id == $product->pc_id)
                                                                            selected
                                                                            @endif
                                                                            value="{{$cat->id}}">{{$cat->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>

                                                <div class="form-group col-sm-6">
                                                    <label for="id" class="col-sm-2 control-label">برند: </label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="brand_id">
                                                            <option >نامشخص</option>
                                                            @foreach($brands as $brand)
                                                                <option
                                                                        @if($brand->id == $product->brand_id)
                                                                        selected
                                                                        @endif
                                                                        value="{{$brand->id}}">{{$brand->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="id" class="col-sm-2 control-label">کالکشن: </label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="provider_id">
                                                            <option >نامشخص</option>
                                                            @foreach($providers as $provider)
                                                                <option
                                                                        @if($provider->id == $product->provider_id)
                                                                        selected
                                                                        @endif
                                                                        value="{{$provider->id}}">{{$provider->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>




                                                    <div class="col-md-12" style="display: none;"><label class="col-sm-2 control-label">  فعال </label>
                                                        <input type="checkbox" name="active[fa]" @if($product->active['fa']) checked="" @endif>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label">نام آگهی: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="name" placeholder="نام" name="name" value="{{$product->name}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sdescription" class="col-sm-2 control-label">  اطلاعات تماس : <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                                            <textarea class="form-control" id="sdescription" placeholder="Short Item Description" title="details" name="details">{{$product->details}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description" class="col-sm-2 control-label">مشخصات  آگهی: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                                    <textarea class="form-control" id="description" name="description" placeholder="Item Description" rows="5">{{$product->description}}</textarea>
                                                        </div>
                                                    </div>

                                                @if(2==3)
                                                    <div class="col-md-12"><label class="col-sm-2 control-label">  آگهی ویژه </label>
                                                        <input type="checkbox" name="special" @if($product->special) checked @endif >
                                                    </div>

                                                @endif




                                                <div class="form-group col-sm-6"  style="display: none">
                                                        <label for="id" class="col-sm-2 control-label">تعداد: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control touchspin" data-min='0' name="quantity" value="{{$product->quantity}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-sm-6">
                                                        <label for="price" class="col-sm-2 control-label">قیمت: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" required name="price"  value="{{$product->price}}" id="price" class="form-control touchspin" data-min='0' data-max="100000" data-stepinterval="50" data-maxboostedstep="100000" data-prefix="تومان">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-sm-6 " style="display: none">
                                                        <label for="discount" class="col-sm-2 control-label">تخفیف: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="discount" value="{{$product->discount}}" id="discount" class="form-control touchspin" data-min='0' data-max="100" data-boostat="5" data-maxboostedstep="10" data-postfix="%">
                                                        </div>
                                                    </div>

                                                @if(2==3)
                                                <div class="form-group col-sm-6">
                                                    <label for="weight" class="col-sm-2 control-label">وزن: <span class="text-lightred text-md">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" required name="weight"  value="{{$product->weight}}" id="weight" class="form-control touchspin" data-min='0' data-max="100000" data-stepinterval="50"  data-prefix="کیلوگرم">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="length" class="col-sm-2 control-label">طول: <span class="text-lightred text-md">*</span></label>
                                                    <div class="col-sm-2">
                                                        <input type="text" required name="dimensions[length]"  value="{{$product->dimensions['length']}}" id="height" class="form-control touchspin" data-min='0' data-max="100000"   data-prefix="cm">
                                                    </div>
                                                    <label for="width" class="col-sm-2 control-label">عرض: <span class="text-lightred text-md">*</span></label>
                                                    <div class="col-sm-2">
                                                        <input type="text" required name="dimensions[width]"  value="{{$product->dimensions['width']}}" id="height" class="form-control touchspin" data-min='0' data-max="100000"   data-prefix="cm">
                                                    </div>
                                                    <label for="height" class="col-sm-2 control-label">ارتفاع: <span class="text-lightred text-md">*</span></label>
                                                    <div class="col-sm-2">
                                                        <input type="text" required name="dimensions[height]"  value="{{$product->dimensions['height']}}" id="height" class="form-control touchspin" data-min='0' data-max="100000"  data-prefix="cm">
                                                    </div>
                                                </div>

                                                @endif



                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->


                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->




                            </div>
                            <!-- tab in tabs -->
                            <div role="tabpanel" class="tab-pane" id="meta">



                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-12">


                                        <!-- tile -->
                                        <section class="tile">

                                            <!-- tile header -->
                                            <div class="tile-header dvd dvd-btm">
                                                <h1 class="custom-font"><strong>ویرایش </strong> مشخصات آگهی</h1>
                                                <ul class="controls">
                                                    <li><a href="javascript:;" class="adddbutton"><i class="fa fa-plus "></i>اضافه کردن</a></li>
                                                </ul>
                                            </div>
                                            <!-- /tile header -->


                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <div class="table-responsive">
                                                    <table class="table-striped " style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>قیمت</th>
                                                                <th>عنوان</th>
                                                                <th>توضیحات</th>
                                                                <th>حذف</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="field_wrapper">
                                                        @foreach($productsDetail as $item)
                                                            <tr>
                                                                <input type="hidden" name="detail_id[]" class="form-control" value="{{$item->id}}">

                                                                <td>
                                                                    <input type="text" name="detail_price[]" class="form-control" value="{{$item->price}}">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="dtitle_fa" name="detail_name[]" class="form-control" value="{{$item->title}}">
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="ddesc_fa" name="detail_description[]" class="form-control" value="{{$item->description}}">
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a>
                                                                </td>

                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                    <a href="javascript:void(0);" class="adddbutton btn btn-success" style="margin-top: 10px" title="Add field"><i class="fa fa-plus "></i>اضافه کردن</a>

                                                </div>

                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->


                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->


                            </div>
                            <!-- tab in tabs -->
                            <div role="tabpanel" class="tab-pane" id="images">




                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-12">


                                        <!-- tile -->
                                        <section class="tile">

                                            <!-- tile header -->
                                            <div class="tile-header dvd dvd-btm">
                                                <h1 class="custom-font"><strong>عکس </strong></h1>
                                                <ul class="controls">
                                                   <!-- <li><a href="javascript:;" class="addpic"><i class=" fa fa-plus"></i>اضافه کردن</a></li>-->
                                                </ul>
                                            </div>
                                            <!-- /tile header -->


                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <div class="table-responsive">
                                                    <label for="picp">انتخاب تصویر مطلب</label>
                                                    <table id="picp" class="table-striped " style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th>انتخاب</th>
                                                            <th>ادرس</th>
                                                            <th>عکس</th>
                                                            <th>حذف</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="pic_wrapper">
                                                        @if($product->image)
                                                            @foreach($product->image as $key => $image)
                                                                <tr>
                                                                    <td>
                                                                        <a data-input="pri_Image{{$key}}" data-preview="pri_holder{{$key}}"  class="lfm btn btn-primary">
                                                                            <i class="fa fa-picture-o"></i>انتخاب</a>
                                                                    <td> <input id="pri_Image{{$key}}" class="form-control" type="text" name="Images[]" value="{{$image}}"> </td>
                                                                    <td><img id="pri_holder{{$key}}" src="{{asset($image)}}" style="margin-top:15px;max-height:100px;"></td>
                                                                    <td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>
                                                            @endforeach
                                                        @endif
                                                        </tbody>
                                                    </table>
                                                    <a href="javascript:void(0);" id="" class="btn btn-success addpic" style="margin-top: 10px" title="Add field"><i class=" fa fa-plus"></i> افزودن عکس</a>

                                                </div>

                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->


                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->



                            </div>
                            <!-- tab in tabs -->
                            <div role="tabpanel" class="tab-pane" id="reviews">





                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-12">


                                        <div class="border-bottom margin_bottom1 border-dark" style="border-bottom-width: 1px">
                                            <label>ویدیو اول آگهی</label>
                                            <ul>
                                                <li class="row">
                                                    <input id="file" class="form-control" type="text" name="file" value=" @if($product->file){{$product->file}}@endif">
                                                    <a data-input="file" class="filelfm btn btn-primary"> <i class="fa fa-file-o"></i>انتخاب</a></td>


                                                </li>
                                            </ul>
                                        </div>
                                        <div id="file" style=" margin: 10px;">

                                            <label>فایل</label>
                                            <div>
                                                <table class="table-striped " style="width:100%">
                                                    <tbody class="file_field">
                                                    <tr>
                                                        <th>نوع</th>
                                                        <th>نام</th>
                                                        <th>فایل</th>
                                                        <th>زمان</th>
                                                        <th>حذف</th>
                                                    </tr>
                                                    @foreach($products_file as $k1 => $item)
                                                        @if( $product->id == $item->product_id)
                                                            <tr>
                                                                <input type="hidden" name="pre_ids[]" value="{{$item->id}}">
                                                                <td>
                                                                    <select class="form-control" name="pre_file_type[{{$item->id}}]">
                                                                        @foreach(config('file_type') as $key => $cat)
                                                                            <option
                                                                                    @if($key == $item->group_id)
                                                                                    selected
                                                                                    @endif
                                                                                    value="{{$key}}">{{$cat}}</option>

                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <input type="text" id="fname_fa" name="pre_file_name[{{$item->id}}]" class="form-control" value="{{$item->name}}">
                                                                </td>
                                                                <td>

                                                                    <input id="pri_file{{$item->id}}{{$k1}}" class="form-control" type="text" name="pre_file_file[{{$item->id}}]" value="{{$item->file}}">
                                                                    <a data-input="pri_file{{$item->id}}{{$k1}}" class="filelfm btn btn-primary"> <i class="fa fa-file-o"></i>انتخاب</a></td>

                                                                </td>
                                                                <td>
                                                                    <input type="text" name="pre_file_time[{{$item->id}}]" class="form-control" value="{{$item->time}}">
                                                                </td>
                                                                <td>
                                                                    <a href="javascript:void(0);" class="file_remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a>
                                                                </td>

                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <a href="javascript:void(0);" class="file_add_button btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>

                                            </div>



                                            <div>
                                            </div><br>
                                        </div>


                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->




                            </div>
                            <!-- tab in tabs -->
                            <div role="tabpanel" class="tab-pane" id="historyTab">





                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-12">
                                        <section class="tile">

                                            <!-- tile header -->
                                            <div class="tile-header dvd dvd-btm">
                                                <h1 class="custom-font"><strong>سیستم های حمل نقل آگهی </strong> </h1>
                                            </div>
                                            <!-- /tile header -->


                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <div class="form-group">
                                                    <label for="shipping_list">سیستم های حمل نقل آگهی:</label>
                                                    <select id="shipping_list" name="shipping_list[]" class="form-control" multiple>
                                                        @foreach($product->shippings as $shipping)
                                                            <option value="{{ $shipping->id }}" selected="selected">{{ $shipping->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                            </div>
                                            <!-- /tile body -->

                                        </section>


                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->




                            </div>
                        <!-- end ngRepeat: tab in tabs -->
                        </div>
                    </div>
                </div>
            </form>


            </div>

        </div>

    </section>
    <!--/ CONTENT -->


    <script>
        CKEDITOR.replace( 'description',{
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });

    </script>
    <script>
        CKEDITOR.replace( 'description_en',{
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });

    </script>
    <script type="text/javascript">
        // $(document).ready(function(){

        window.onload = function() {

            var maxFile=10;
            var filebutton=$('.filebutton');
            var filewrapper=$('.filewrapper');
            var maxField = 10; //Input fields increment limitation
            var addButton = $('.adddbutton'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML ='<tr>'+
                '<td> <input type="text" name="detail_price[]" class="form-control"> </td>'+
                '<td><input type="text" id="dname_fa" name="detail_name[]" class="form-control"></td>' +
                '<td><input type="text" id="ddesc_fa" name="detail_description[]" class="form-control">' +
                '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'; //New input field html


            var x = 1; //Initial field counter is 1
            $(addButton).click(function(){ //Once add button is clicked
                if(x < maxField){ //Check maximum number of input fields
                    x++; //Increment field counter
                    $(wrapper).append(fieldHTML); // Add field html

                }
            });
            $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent().parent().remove(); //Remove field html
                x--; //Decrement field counter
            });



            var picCount = 0;
            var max_pic=10;
            var y = 1; //Initial field counter is 1
            $('.addpic').click(function(){ //Once add button is clicked
                console.log('hey');
                if(y < max_pic){ //Check maximum number of input fields
                    y++; //Increment field counter
                    $(this).siblings('table').children('.pic_wrapper').append('<tr>'+
                        '<td>'+
                        '<a data-input="Image'+picCount+'" data-preview="holder'+picCount+'"  class="lfm btn btn-primary">' +
                        '<i class="fa fa-picture-o"></i>انتخاب</a>'+
                        '<td> <input id="Image'+picCount+'" class="form-control" type="text" name="Images[]"> </td>'+
                        '<td><img id="holder'+picCount+'" style="margin-top:15px;max-height:100px;"></td>'+
                        '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'); // Add field html
                    picCount++;
                    $('.lfm').filemanager('image');
                }
            });
            $('.pic_wrapper').on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent().parent().remove(); //Remove field html
                y--; //Decrement field counter
            });


            $(filebutton).click(function(){ //Once add button is clicked
                console.log('hey');
                if(y < maxFile){ //Check maximum number of input fields
                    y++; //Increment field counter
                    $(filewrapper).append('<input type="file" name="Images[]" accept="image/example" >'); // Add field html

                }
            });
            $(filewrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent().remove(); //Remove field html
                y--; //Decrement field counter
            });


            var fileCount = {{$fileCount}};
            var max_file=10;
            var z = 1; //Initial field counter is 1

            $('.file_add_button').click(function(){ //Once add button is clicked
                console.log('hey');
                if(z < max_file){ //Check maximum number of input fields
                    z++; //Increment field counter
                    $(this).siblings('table').children('.file_field').append('<tr>'+
                        '<td>'+
                        '<select class="form-control" name="file_type[]">'+
                            @foreach(config('file_type') as $key => $cat) '<option '+
                        'value="{{$key}}">{{$cat}}</option>'+
                            @endforeach
                                '</select> </td> '+
                        '<td><input id="fa_name" type="text" name="file_name[]" class="form-control"></td>'+
                        '<td><input id="file'+z+'"  class="form-control" type="text" name="file_file[]">'+
                        '<a data-input="file'+z+'" class="filelfm btn btn-primary"> <i class="fa fa-file-o"></i>انتخاب</a></td>'+
                        ' <td> <input type="text" name="file_time[]" class="form-control"> </td>' +
                        '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'); // Add field html
                    fileCount++;
                    $('.filelfm').filemanager('file');

                }
            });


            $('.file_field').on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent().parent().remove(); //Remove field html
                z--; //Decrement field counter
            });

            var packageCount = 0;
            var max_package=10;
            var packag = {{ count($products_package) }}; //Initial field counter is 1

            $('.addpackage').click(function(){ //Once add button is clicked
                console.log('hey');
                if(packag < max_package){ //Check maximum number of input fields
                     //Increment field counter
                    $(this).siblings('table').children('.package_wrapper').append('<tr>'+
                        '<input type="hidden" name="package_id[]" class="form-control" value="0">'+
                        '<td><input id="pname_fa" type="text" name="package_name['+packag+']" class="form-control"> </td> '+
                        '<td><input id="pdesc_fa" type="text" name="package_desc['+packag+']" class="form-control"> </td>'+
                        '<td> <input type="text" name="package_price['+packag+']" class="form-control" disabled> </td>'+
                        '<td><a data-input="packImage'+packag+'" data-preview="packholder'+packag+'"  class="lfm btn btn-primary">' +
                        '<i class="fa fa-picture-o"></i>انتخاب</a>'+
                        '<input id="packImage'+packag+'" class="form-control" type="text" name="package_image[]"> </td>'+
                        '<td>'+
                            @foreach($productsDetail as $detail)
                                '<div>' +
                        '<label>{{$detail->title}}</label>' +
                        '<input type="checkbox" name="package_details['+packag+'][]" value="{{$detail->id}}" > ' +
                        '</div> '+
                            @endforeach
                                '</td> '+
                        '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'); // Add field html
                    packag++;
                    $('.lfm').filemanager('image');

                }
            });


            $('.package_wrapper').on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent().parent().remove(); //Remove field html
                packag--; //Decrement field counter
            });

        };
        // });


    </script>


@endsection