@extends('layouts.admin')

<?php $fileCount=0 ?>
@section('script')
    <link rel="stylesheet" href="{{asset('assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <link rel="stylesheet" href="/select2/select2.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <style>
        .select2-container {
            width: 100% !important;
        }
        .image-address{
            display: none;
        }
        .btn {
            margin-right: 0px !important;
        }
    </style>
@endsection
@section('end_script')
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>
        $('.lfm').click(function(){
            $('.lfm').filemanager('image');
        });
        $('.filelfm').filemanager('file');
    </script>
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

        <div class="page page-shop-single-product">

            <div class="pageheader">

                <h2>افزودن محصول<span></span></h2>

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="{{ url('/admin') }}"><i class="fa fa-home"></i> پنل مدیریت</a>
                        </li>
                        <li>
                            <a href="{{ route('product.index') }}">مدیریت محصولات</a>
                        </li>
                        <li>
                            <a href="">افزودن محصول</a>
                        </li>
                    </ul>

                </div>

            </div>

            <div class="pagecontent">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

            <form id="productForm" class="form-horizontal ng-pristine ng-valid" role="form" method="post" action="{{route('product.add')}}">
                {{ csrf_field() }}
                <input type="hidden" name="users_id" value="{{Auth::id()}} ">
                <input type="hidden" name="state" value="1">
                <div class="add-nav">
                    <div class="nav-heading">
                        <h3>محصول  <strong class="text-greensea">جدید:</strong></h3>
                        <span class="controls pull-left">
                                  <a href="{{ route('product.index') }}" class="btn btn-ef btn-ef-1 btn-ef-1-default btn-ef-1a btn-rounded-20 mr-5" data-toggle="tooltip" title="بازگشت"><i class="fa fa-times"></i></a>
                                  <a href="javascript:;" onclick="document.getElementById('productForm').submit();" class="btn btn-ef btn-ef-1 btn-ef-1-success btn-ef-1a btn-rounded-20 mr-5" data-toggle="tooltip" title="ذخیره"><i class="fa fa-check"></i></a>
                        </span>
                    </div>

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <!--<li role="presentation"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>-->
                            <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">عمومی</a></li>
                            <li role="presentation"><a href="#meta" aria-controls="meta" role="tab" data-toggle="tab">مشخصات</a></li>
                            <li role="presentation"><a href="#images" aria-controls="images" role="tab" data-toggle="tab">عکس</a></li>
                            <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">ویدیو</a></li>
                            <li role="presentation"><a href="#historyTab" aria-controls="history" role="tab" data-toggle="tab">انواع محصول</a></li>
                        </ul>

                        <div class="tab-content">
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

{{--                                                <div class="form-group col-sm-6">--}}
{{--                                                    <label for="id" class="col-sm-2 control-label">نوع محصول: </label>--}}
{{--                                                    <div class="col-sm-10">--}}
{{--                                                        <select class="form-control" name="type">--}}

{{--                                                            <option value="2">  فیزیکی</option>--}}
{{--                                                            <option value="1"> مجازی</option>--}}
{{--                                                            <option value="0">عدم نمایش</option>--}}

{{--                                                        </select>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
                                                <div class="form-group col-sm-6">
                                                    <label for="id" class="col-sm-2 control-label">دسته بندی محصول: </label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="pc_id">
                                                            <option value="0" >بدون دسته</option>
                                                            @foreach($productCats as $cat)
                                                                <option
                                                                        @if($cat->parent_id == 0)
                                                                        style="font-weight: 600;color: #2C3E50"
                                                                        @endif
                                                                        @if($cat->id == old('pc_id'))
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
                                                                        @if($brand->id == old('brand_id'))
                                                                        selected
                                                                        @endif
                                                                        value="{{$brand->id}}">{{$brand->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-6">
                                                    <label for="id" class="col-sm-2 control-label">تولیدکننده: </label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="provider_id">
                                                            <option >نامشخص</option>
                                                            @foreach($providers as $provider)
                                                                <option
                                                                        @if($provider->id == old('provider_id'))
                                                                        selected
                                                                        @endif
                                                                        value="{{$provider->id}}">{{$provider->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group col-sm-12">
                                                    <label for="id" class="col-sm-2 control-label">ویژگی های محصول: </label>
                                                    <div class="col-sm-10">
                                                        <select id="features" name="features[]" class="form-control" multiple></select>
                                                    </div>
                                                </div>


                                                <div class="col-md-12"><p>  فعال </p>
                                                    <input type="checkbox" name="active">
                                                </div>
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">نام محصول: <span class="text-lightred text-md">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name" placeholder="نام" name="name" value="{{old('name')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="col-sm-2 control-label">معرفی محصول: <span class="text-lightred text-md">*</span></label>
                                                    <div class="col-sm-10">
                                                                <textarea class="form-control" id="description" name="description" placeholder="Item Description" rows="5">
                                                                    {{old('description')}}
                                                                </textarea>
                                                    </div>
                                                </div>


{{--                                                    <div class="col-md-12"><label class="col-sm-2 control-label">  محصول ویژه </label>--}}
{{--                                                        <input type="checkbox" name="special" >--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group col-sm-6">--}}
{{--                                                        <label for="id" class="col-sm-2 control-label">تعداد: <span class="text-lightred text-md">*</span></label>--}}
{{--                                                        <div class="col-sm-10">--}}
{{--                                                            <input type="text" class="form-control touchspin" data-min='0' name="quantity" value="0">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}


{{--                                                    <div class="form-group col-sm-6">--}}
{{--                                                        <label for="price" class="col-sm-2 control-label">قیمت: <span class="text-lightred text-md">*</span></label>--}}
{{--                                                        <div class="col-sm-10">--}}
{{--                                                            <input type="text" required name="price"  value="{{old('price')}}" id="price" class="form-control touchspin" data-min='0' data-max="100000000000" data-stepinterval="50" data-maxboostedstep="100000000000" data-prefix="تومان">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-sm-6">--}}
{{--                                                        <label for="discount" class="col-sm-2 control-label">تخفیف: <span class="text-lightred text-md">*</span></label>--}}
{{--                                                        <div class="col-sm-10">--}}
{{--                                                            <input type="text" name="discount" value=@if(old('discount'))"{{old('discount')}}"@else"0"@endif id="discount" class="form-control touchspin" data-min='0' data-max="100" data-boostat="5" data-maxboostedstep="10" data-postfix="%">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}

{{--                                                    <div class="form-group col-sm-6">--}}
{{--                                                        <label for="weight" class="col-sm-2 control-label">وزن: <span class="text-lightred text-md">*</span></label>--}}
{{--                                                        <div class="col-sm-10">--}}
{{--                                                            <input type="text" required name="weight"  value="{{old('weight')}}" id="weight" class="form-control touchspin" data-min='0' data-max="100000" data-stepinterval="50"  data-prefix="کیلوگرم">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="form-group">--}}
{{--                                                        <label for="length" class="col-sm-2 control-label">طول: <span class="text-lightred text-md">*</span></label>--}}
{{--                                                        <div class="col-sm-2">--}}
{{--                                                            <input type="text" required name="dimensions[length]"  value="{{old('dimensions.length')}}" id="height" class="form-control touchspin" data-min='0' data-max="100000"   data-prefix="cm">--}}
{{--                                                        </div>--}}
{{--                                                        <label for="width" class="col-sm-2 control-label">عرض: <span class="text-lightred text-md">*</span></label>--}}
{{--                                                        <div class="col-sm-2">--}}
{{--                                                            <input type="text" required name="dimensions[width]"  value="{{old('dimensions.width')}}" id="height" class="form-control touchspin" data-min='0' data-max="100000"   data-prefix="cm">--}}
{{--                                                        </div>--}}
{{--                                                        <label for="height" class="col-sm-2 control-label">ارتفاع: <span class="text-lightred text-md">*</span></label>--}}
{{--                                                        <div class="col-sm-2">--}}
{{--                                                            <input type="text" required name="dimensions[height]"  value="{{old('dimensions.height')}}" id="height" class="form-control touchspin" data-min='0' data-max="100000"  data-prefix="cm">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}




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
                                                <h1 class="custom-font"><strong>ویرایش </strong> مشخصات محصول</h1>
                                                <ul class="controls">
                                                    <li><a href="javascript:;" class="adddbutton"><i class="fa fa-plus"></i>اضافه کردن</a></li>
                                                </ul>
                                            </div>
                                            <!-- /tile header -->


                                            <!-- tile body -->
                                            <div class="tile-body">
                                                <div class="tile-body">

                                                    <div class="table-responsive">
                                                        <table class="table-striped " style="width:100%">
                                                            <tbody class="field_wrapper">
                                                            <tr>
                                                                <th>دسته بندی</th>
                                                                <th>عنوان</th>
                                                                <th>توضیحات</th>
                                                                <th>حذف</th>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <a href="javascript:void(0);" class="adddbutton btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>

                                                    </div>

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
                                                <h1 class="custom-font"><strong>انتخاب تصویر محصول </strong></h1>
                                                <label for="picp"></label>
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

                                                    </tbody>
                                                </table>
                                                <a href="javascript:void(0);" id="" class="btn btn-success addpic" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>

                                            </div>
                                            <!-- /tile header -->


                                            <!-- tile body -->

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


                                        <!-- tile -->
                                        <section class="tile">

                                            <!-- tile header -->
                                            <div class="tile-header dvd dvd-btm">
                                                <h1 class="custom-font"><strong>فایل </strong></h1>
                                                <ul class="controls">
                                                    <li><a href="javascript:;" class="file_add_button"><i class="fa fa-plus"></i>اضافه کردن</a></li>
                                                </ul>
                                            </div>
                                            <!-- /tile header -->


                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <div class="border-bottom margin_bottom1 border-dark" style="border-bottom-width: 1px">
                                                    <label>ویدیو اول محصول</label>
                                                    <ul>
                                                        <li>
                                                            <input id="file" class="form-control" type="text" name="file" value="{{ old('file') }}">
                                                            <a data-input="file" class="filelfm btn btn-primary"> <i class="fa fa-file-o"></i>انتخاب</a></td>
                                                        </li>

                                                    </ul>
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
                            <div role="tabpanel" class="tab-pane" id="historyTab">





                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-12">
                                        <section class="tile">

                                            <!-- tile header -->
                                            <div class="tile-header dvd dvd-btm 33">
                                                <h1 class="custom-font"><strong>انواع محصول </strong> </h1>
                                            </div>
                                            <!-- /tile header -->


                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <div class="tile-header dvd dvd-btm">
                                                    <table id="product-type" class="table-striped " style="width:100%">
                                                        <thead>
                                                        <tr>
                                                            <th>توضیح</th>
                                                            <th>عکس شاخص</th>
                                                            <th>عکس</th>
                                                            <th>عکس</th>
                                                            <th>عکس</th>
                                                            <th>عکس</th>
                                                            <th>حذف</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody class="type_wrapper">
                                                            @if(is_array(old('index_type_image')))
                                                                @foreach(old('index_type_image') as $id => $Iimage)
                                                                    <tr>
                                                                        <td><input class="form-control" type="text" name="type_description[{{$id}}]" value="{{ old('type_description.'.$id) }}"></td>
                                                                        <td>
                                                                            <a data-input="typethumbnail{{$id}}" data-preview="typethumbnailholder{{$id}}"  class="lfm btn btn-primary">
                                                                                <i class="fa fa-picture-o"></i>انتخاب</a>
                                                                            <input id="typethumbnail{{$id}}" class="form-control image-address" type="text" name="index_type_image[{{$id}}]" value="{{ $Iimage }}">
                                                                            <img id="typethumbnailholder{{$id}}" class="filemanage-image" src="{{ asset($Iimage) }}">
                                                                        </td>
                                                                        @for($key =0; $key <4 ;$key++)
                                                                        <td>
                                                                            <a data-input="typeImage{{$id}}{{ $key }}" data-preview="typeImageholder{{$id}}{{ $key }}"  class="lfm btn btn-primary">
                                                                                <i class="fa fa-picture-o"></i>انتخاب</a>
                                                                            <input id="typeImage{{$id}}{{ $key }}" class="form-control image-address" type="text" name="type_image[{{$id}}][]" value="{{old('type_image.'.$id.'.'.$key)}}">
                                                                            <img id="typeImageholder{{$id}}{{ $key }}" class="filemanage-image" @if(old('type_image.'.$id.'.'.$key)) src="{{ asset(old('type_image.'.$id.'.'.$key)) }}" @endif>
                                                                        </td>
                                                                        @endfor
                                                                       <td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                    <a href="javascript:void(0);" id="" class="btn btn-success addtype" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>

                                                </div>


                                            </div>
                                            <!-- /tile body -->

                                        </section>


                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->




                            </div><!-- end ngRepeat: tab in tabs -->
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
{{--      <script>--}}
{{--        CKEDITOR.replace( 'description_en',{--}}
{{--            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',--}}
{{--            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',--}}
{{--            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',--}}
{{--            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='--}}
{{--        });--}}
{{--        CKEDITOR.replace( 'description_ar',{--}}
{{--            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',--}}
{{--            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',--}}
{{--            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',--}}
{{--            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='--}}
{{--        });--}}

{{--    </script>--}}

    <script src="/select2/select2.min.js"></script>
    <script type="text/javascript">
        // $(document).ready(function(){

        window.onload = function() {

            var maxFile=10;
            var filebutton=$('.filebutton');
            var filewrapper=$('.filewrapper');
            var maxField = 100; //Input fields increment limitation
            var addButton = $('.adddbutton'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML ='<tr>'+
                '<td> <select  type="text" name="detail_cat[]" class="form-control"><option value="1">جزئیات فنی</option><option value="2">جزئیات ظاهری</option></select>' +
                ' </td>'+
                '<td><input  type="text" id="dname" name="detail_name[]" class="form-control"></td>' +
                '<td><input  type="text" id="ddesc" name="detail_description[]" class="form-control">' +
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

            $('#features').select2({
                placeholder: "ویژگی ها ...",
                minimumInputLength: 2,
                tags:true,
                ajax: {
                    url: '{{ route('shop.feature.find') }}',
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

            var ptypeCount = {{ count(old('index_type_image',[])) }};
            var ptCounter = {{ count(old('index_type_image',[])) }};
            var max_ptype=10;
            $('.addtype').click(function(){ //Once add button is clicked
                console.log(ptypeCount);
                if(ptCounter < max_ptype){ //Check maximum number of input fields
                    $(this).siblings('table').children('.type_wrapper').append('<tr>'+
                        '<td><input class="form-control" type="text" name="type_description['+ptypeCount+']"></td>'+
                        '<td>'+
                        '<a data-input="typethumbnail'+ptypeCount+'" data-preview="typethumbnailholder'+ptypeCount+'"  class="lfm btn btn-primary">' +
                        '<i class="fa fa-picture-o"></i>انتخاب</a>'+
                        '<input id="typethumbnail'+ptypeCount+'" class="form-control image-address" type="text" name="index_type_image['+ptypeCount+']">'+
                        '<img id="typethumbnailholder'+ptypeCount+'" class="filemanage-image">' +
                        '</td>'+
                        '<td>'+
                        '<a data-input="typeImage'+ptypeCount+'1" data-preview="typeImageholder'+ptypeCount+'1"  class="lfm btn btn-primary">' +
                        '<i class="fa fa-picture-o"></i>انتخاب</a>'+
                        '<input id="typeImage'+ptypeCount+'1" class="form-control image-address" type="text" name="type_image['+ptypeCount+'][]">'+
                        '<img id="typeImageholder'+ptypeCount+'1" class="filemanage-image">' +
                        '</td>'+
                        '<td>'+
                        '<a data-input="typeImage'+ptypeCount+'2" data-preview="typeImageholder'+ptypeCount+'2"  class="lfm btn btn-primary">' +
                        '<i class="fa fa-picture-o"></i>انتخاب</a>'+
                        '<input id="typeImage'+ptypeCount+'2" class="form-control image-address" type="text" name="type_image['+ptypeCount+'][]">'+
                        '<img id="typeImageholder'+ptypeCount+'2" class="filemanage-image">' +
                        '</td>'+
                        '<td>'+
                        '<a data-input="typeImage'+ptypeCount+'3" data-preview="typeImageholder'+ptypeCount+'3"  class="lfm btn btn-primary">' +
                        '<i class="fa fa-picture-o"></i>انتخاب</a>'+
                        '<input id="typeImage'+ptypeCount+'3" class="form-control image-address" type="text" name="type_image['+ptypeCount+'][]">'+
                        '<img id="typeImageholder'+ptypeCount+'3" class="filemanage-image">' +
                        '</td>'+
                        '<td>'+
                        '<a data-input="typeImage'+ptypeCount+'4" data-preview="typeImageholder'+ptypeCount+'4"  class="lfm btn btn-primary">' +
                        '<i class="fa fa-picture-o"></i>انتخاب</a>'+
                        '<input id="typeImage'+ptypeCount+'4" class="form-control image-address" type="text" name="type_image['+ptypeCount+'][]">'+
                        '<img id="typeImageholder'+ptypeCount+'4" class="filemanage-image"></td>'+
                        '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> ' +
                        '</tr>'); // Add field html
                    ptypeCount++;
                    ptCounter++;
                    $('.lfm').filemanager('image');
                }
            });
            $('.type_wrapper').on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent().parent().remove(); //Remove field html
                ptCounter--; //Decrement field counter
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


            {{--var fileCount = {{$fileCount}};--}}
            {{--var max_file=10;--}}
            {{--var z = 1; //Initial field counter is 1--}}

            {{--$('.file_add_button').click(function(){ //Once add button is clicked--}}
            {{--    console.log('hey');--}}
            {{--    if(z < max_file){ //Check maximum number of input fields--}}
            {{--        z++; //Increment field counter--}}
            {{--        $(this).siblings('table').children('.file_field').append('<tr>'+--}}
            {{--            '<td>'+--}}
            {{--            '<select class="form-control" name="file_type[]">'+--}}
            {{--                @foreach(config('file_type') as $key => $cat) '<option '+--}}
            {{--            'value="{{$key}}">{{$cat}}</option>'+--}}
            {{--                @endforeach--}}
            {{--                    '</select> </td> '+--}}
            {{--            '<td> <input id="fa_name" type="text" name="file_name[]" class="form-control"></td>'+--}}
            {{--            '<td><input id="file'+z+'"  class="form-control" type="text" name="file_file[]">'+--}}
            {{--            '<a data-input="file'+z+'" class="filelfm btn btn-primary"> <i class="fa fa-file-o"></i>انتخاب</a></td>'+--}}
            {{--            ' <td> <input type="text" name="file_time[]" class="form-control"> </td>' +--}}
            {{--            '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'); // Add field html--}}
            {{--        fileCount++;--}}
            {{--        $('.filelfm').filemanager('file');--}}

            {{--    }--}}
            {{--});--}}


            {{--$('.file_field').on('click', '.remove_button', function(e){ //Once remove button is clicked--}}
            {{--    e.preventDefault();--}}
            {{--    $(this).parent().parent().remove(); //Remove field html--}}
            {{--    z--; //Decrement field counter--}}
            {{--});--}}



            // var packageCount = 0;
            // var max_package=10;
            // var packag = 1; //Initial field counter is 1
            //
            // $('.addpackage').click(function(){ //Once add button is clicked
            //     console.log('hey');
            //     if(packag < max_package){ //Check maximum number of input fields
            //         packag++; //Increment field counter
            //         $(this).siblings('table').children('.package_wrapper').append('<tr>'+
            //             '<td><input id="pname" type="text" name="package_name[]" class="form-control"></td> '+
            //             '<td><input id="pdesc" type="text" name="package_desc[]" class="form-control"></td>'+
            //             '<td> <input type="text" name="package_price[]" class="form-control" disabled> </td>'+
            //             '<td><a data-input="packImage'+packag+'" data-preview="packholder'+packag+'"  class="lfm btn btn-primary">' +
            //             '<i class="fa fa-picture-o"></i>انتخاب</a>'+
            //             '<input id="packImage'+packag+'" class="form-control" type="text" name="package_image[]"> </td>'+
            //             '<td></td> '+
            //             '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'); // Add field html
            //         $('.lfm').filemanager('image');
            //
            //     }
            // });
            //
            //
            // $('.package_wrapper').on('click', '.remove_button', function(e){ //Once remove button is clicked
            //     e.preventDefault();
            //     $(this).parent().parent().remove(); //Remove field html
            //     packag--; //Decrement field counter
            // });
            // $

        };
        // });
    </script>

@endsection