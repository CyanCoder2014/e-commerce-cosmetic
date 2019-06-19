@extends('layouts.admin')

<?php $fileCount=0 ?>
@section('content')
@section('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
        $('.lfm').filemanager('file');
    </script>
@endsection
<section id="content" >

    <div class="page page-dashboard">

        <div class="pageheader">

            <h2><span> </span></h2>

            <div class="page-bar">

                <ul class="page-breadcrumb">
                    <li>
                        <a href="<?= Url('/admin' ); ?>"><i class="fa fa-home"></i> پنل مدیریت </a>
                    </li>
                    <li>
                        <a href="#"> مدیریت محصولات</a>
                    </li>
                </ul>


            </div>

        </div>

        <!-- cards row -->

        <div class="inner" style="min-height: 565px;">
            <div class="row">
                <section id="lts_sec " class="right" style="margin: -20px auto;">
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">
                                    <a data-toggle="modal" data-target=".add-page" style="float: left" class="btn btn-primary"><i class="fa fa-plus"></i> افزودن محصول </a>

                                    <h3>مدیریت  محصولات </h3>
                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-custom"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">&nbsp;شماره</th>
                                            <th style="text-align: center">&nbsp;عنوان محصول</th>
                                            <th style="text-align: center">&nbsp;تاریخ انتشار</th>
                                            <th style="text-align: center">  قیمت</th>
                                            <th style="text-align: center"> ویرایش</th>
                                            <th style="text-align: center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr class="odd gradeX">
                                                <th style="text-align: center">{{ $product->id }}</th>
                                                <th style="text-align: center"> &nbsp; <a target="_blank" href="<?= Url('/blog/information/'.$product->id); ?>">{{$product->name}} </a></th>
                                                <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($product->created_at) !!}</th>
                                                <th style="text-align: center; font-weight: 100">{{ $product->price }}</th>
                                                <th style="text-align: center; font-weight: 100"><a data-toggle="modal" data-target=".edit-page-{{$product->id}}" class="btn btn-warning "><i class="fa fa-edit"></i></a></th>
                                                <th style="text-align: center; font-weight: 100">

                                                    <a onclick="return confirm('آیا از حذف این محصول مطمئن هستید؟');"  href="{{ route('advertising.delete',['id' =>$product->id]) }}" class="btn btn-danger"><i class="fa fa-remove"></i></a>

                                                </th>



                                            </tr>





                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{$products->links()}}
                        <br><br>
                    </div>

                </section>
            </div>
        </div>
    </div>








    <div class="modal fade add-page" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>

                <form name="_token" method="POST" enctype="multipart/form-data"
                      action="{{route('advertising.add')}}">
                    {{ csrf_field() }}
                    <input type="hidden" name="users_id" value="{{Auth::id()}} ">
                    <div class="panel with-nav-tabs panel-default">
                        <div class="panel-heading">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab1default" data-toggle="tab">عمومی</a></li>
                                <li><a href="#tab2default" data-toggle="tab">عکس</a></li>
                                <li><a href="#tab3default" data-toggle="tab">فایل</a></li>
                                <li><a href="#tab4default" data-toggle="tab">مشخصات</a></li>

                            </ul>
                        </div>
                        <div class="panel-body">
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="tab1default">
                                    <div class="col-md-6" style="float: right">
                                        <div class="input-group"><p style="float: right">  عنوان محصول</p>
                                            <input required name="name" type="text" value="{{old('name')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="sec"><p>انتخاب نوع محصول </p>
                                            <select class="form-control" name="type">

                                                <option value="2">  مقاله</option>
                                                <option value="1"> فیلم</option>
                                                <option value="3"> آموزش </option>
                                                <option value="0">عدم نمایش</option>

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="sec"><p> دسته بندی محصول </p>
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
                                    <div class="col-md-6" style="float: right">
                                        <div class="input-group"><p style="float: right">قیمت</p>
                                            <input required type="number" name="price"  value="{{old('price')}}" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6" style="float: right">
                                        <div class="input-group"><p style="float: right">تخفیف</p>
                                            <input  name="discount" type="number" value=@if(old('discount'))"{{old('discount')}}"@else"0"@endif class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12"><p>  مشخصات محصول  </p>
                                        <textarea class="form-control"  required title="details" name="details" rows="2" cols="110" >{{old('details')}}</textarea><br>
                                    </div>
                                    <div class="col-md-12">
                                        <label>توضیحات تکمیلی محصول</label>

                                        <textarea required title="text" name="description" id="editor1222" rows="10" cols="80" >{{old('description')}}</textarea><br>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab2default">
                                    <div id="image-post-store" style=" margin: 10px;">

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                            <label class="control-label col-lg-4 col-md-6 col-sm-12 col-xs-12">انتخاب تصویر مطلب</label>
                                            <div class="filewrapper">
                                                <input type="file" name="Images[]" accept="image/*" >
                                            </div>
                                            <a href="javascript:void(0);" class="filebutton btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span>اضافه کردن</a>
                                            {{--<div><input type="file"--}}
                                            {{--name="image_u"--}}
                                            {{--value="image_u"--}}
                                            {{--accept="images/*"/>--}}
                                            {{--</div><br>--}}
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab3default">
                                    <div class="col-md-12">

                                        <div class="border-bottom margin_bottom1 border-dark" style="border-bottom-width: 1px">
                                            <label>ویدیو اول محصول</label>
                                            <ul>
                                                <li>
                                                    <input type="file" name="file" >

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
                                                    </tbody>
                                                </table>
                                                <a href="javascript:void(0);" class="file_add_button btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>

                                            </div>



                                            <div>
                                            </div><br>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab4default">
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
                    </div>

                    <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                    <input type="hidden" name="state" value="1">




                    <div class="modal-footer" >
                        <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                        <button  type="submit"  name="_token" value="{{ csrf_token() }}" class="btn  blue-bg">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>








    <script>
        CKEDITOR.replace( 'editor1222',{
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });

    </script>




    @foreach($products as $product)

        <div class="modal fade edit-page-{{$product->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>

                    <form name="_token" method="POST" enctype="multipart/form-data"
                          action="{{ route('advertising.update',['id' =>$product->id]) }}">
                        {{ csrf_field() }}
                        <div class="modal-body">


                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                            <input type="hidden" name="users_id" value="{{Auth::id()}} ">



                            <div class="panel with-nav-tabs panel-default">
                                <div class="panel-heading">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a href="#tab1default{{$product->id}}" data-toggle="tab">عمومی</a></li>
                                        <li><a href="#tab2default{{$product->id}}" data-toggle="tab">عکس</a></li>
                                        <li><a href="#tab3default{{$product->id}}" data-toggle="tab">فایل</a></li>
                                        <li><a href="#tab4default{{$product->id}}" data-toggle="tab">مشخصات</a></li>

                                    </ul>
                                </div>
                                <div class="panel-body">
                                    <div class="tab-content">
                                        <div class="tab-pane fade in active" id="tab1default{{$product->id}}">
                                            <div class="col-md-6" style="float: right">
                                                <div class="input-group"><p style="float: right">  عنوان محصول</p>
                                                    <input required name="name" type="text" value="{{$product->name}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="sec"><p>انتخاب نوع محصول </p>
                                                    <select class="form-control" name="type">

                                                        <option
                                                                @if('2' == $product->type)
                                                                selected
                                                                @endif
                                                                value="2">  مقاله</option>
                                                        <option
                                                                @if('1' == $product->type)
                                                                selected
                                                                @endif
                                                                value="1">فیلم </option>
                                                        <option
                                                                @if('3' == $product->type)
                                                                selected
                                                                @endif
                                                                value="3">  آموزش</option>
                                                        <option
                                                                @if('0' == $product->type)
                                                                selected
                                                                @endif
                                                                value="0">عدم نمایش</option>



                                                    </select>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <div class="sec"><p>انتخاب دسته بندی </p>
                                                    <select class="form-control" name="pc_id">
                                                        <option value="0">بدون دسته</option>
                                                        @foreach($productCats as $cat)
                                                            <option
                                                                    @if($cat->id == $product->pc_id)
                                                                    selected
                                                                    @endif
                                                                    @if($cat->parent_id == 0)
                                                                    style="font-weight: 600;color: #2C3E50"
                                                                    @endif
                                                                    value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="float: right">
                                                <div class="input-group"><p style="float: right">قیمت</p>
                                                    <input required type="number" name="price"  value="{{$product->price}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-6" style="float: right">
                                                <div class="input-group"><p style="float: right">تخفیف</p>
                                                    <input  name="discount" type="number" value="{{$product->discount}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-12"><p>  مشخصات محصول  </p>
                                                <textarea class="form-control"  required title="details" name="details" rows="2" cols="110" >{!! $product->details !!}</textarea><br>
                                            </div>
                                            <div class="col-md-12">
                                                <label>توضیحات تکمیلی محصول</label>
                                                <textarea required title="text" name="description" id="editor{{$product->id}}" rows="10" cols="80" >{!! $product->description !!}</textarea><br>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab2default{{$product->id}}">
                                            <div id="image-post-store" style=" margin: 10px;">

                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <label class="control-label col-lg-4 col-md-6 col-sm-12 col-xs-12">انتخاب تصویر مطلب</label>
                                                    <div class="filewrapper">
                                                        <input type="file" name="Images[]" accept="image/*" >
                                                    </div>
                                                    <a href="javascript:void(0);" class="filebutton btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span>اضافه کردن</a>
                                                    {{--<div><input type="file"--}}
                                                    {{--name="image_u"--}}
                                                    {{--value="image_u"--}}
                                                    {{--accept="images/*"/>--}}
                                                    {{--</div><br>--}}
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                                    <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                                        <label class="control-label">تصاویر قبلی</label>
                                                    </div>
                                                    <ul class="row">
                                                        @foreach($product->image as $key => $image)
                                                            <li class="input-group">
                                                                <input  id="Image{{$product->id}}{{$key}}" class="form-control" type="hidden" name="privious_images[]" value="{{ $image}}">
                                                                <img id="holder{{$key}}" src="{{ asset($image)}}" style="margin-top:15px;max-height:100px;">
                                                                <a onclick="$(this).parent().remove()">حذف</a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="tab3default{{$product->id}}">
                                            <div class="col-md-12">

                                                <div class="border-bottom margin_bottom1 border-dark" style="border-bottom-width: 1px">
                                                    <label>ویدیو اول محصول</label>
                                                    <ul>
                                                        <li>
                                                            @if($product->file)
                                                                <label>:لینک ویدیو</label>
                                                                <a href="{{ asset($product->file) }}">file</a>
                                                            @endif
                                                        </li>
                                                        <li>
                                                            <input type="file" name="file" >

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
                                                            @foreach($products_file as $item)
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
                                                                            <input type="text" name="pre_file_name[{{$item->id}}]" class="form-control" value="{{$item->name}}">
                                                                        </td>
                                                                        <td>

                                                                            <input disabled id="thumbnail" class="form-control" type="text" name="pre_file_file[{{$item->id}}]" value="{{$item->file}}">

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
                                        </div>
                                        <div class="tab-pane fade" id="tab4default{{$product->id}}">
                                            <table class="table-striped " style="width:100%">
                                                <tbody class="field_wrapper">
                                                <tr>
                                                    <th>دسته بندی</th>
                                                    <th>عنوان</th>
                                                    <th>توضیحات</th>
                                                    <th>حذف</th>
                                                </tr>
                                                @foreach($productsDetail as $item)
                                                    @if( $product->id == $item->product_id)
                                                        <tr>
                                                            <td>
                                                                <select class="form-control" name="datail_group[]">
                                                                    <option value="0">بدون دسته</option>
                                                                    @foreach($detailgroup as $cat)
                                                                        <option
                                                                                @if($cat->id == $item->group_id)
                                                                                selected
                                                                                @endif
                                                                                @if($cat->parent_id == 0)
                                                                                style="font-weight: 600;color: #2C3E50"
                                                                                @endif
                                                                                value="{{$cat->id}}">{{$cat->title}}</option>

                                                                    @endforeach
                                                                </select>
                                                            </td>
                                                            <td>
                                                                <input type="text" name="detail_name[]" class="form-control" value="{{$item->title}}">
                                                            </td>
                                                            <td>
                                                                <input type="text" name="detail_description[]" class="form-control" value="{{$item->description}}">
                                                            </td>
                                                            <td>
                                                                <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a>
                                                            </td>

                                                        </tr>
                                                    @endif
                                                @endforeach
                                                </tbody>
                                            </table>
                                            <a href="javascript:void(0);" class="adddbutton btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer" >
                                <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                                <button  type="submit"  name="_token" value="{{ csrf_token() }}" class="btn  blue-bg">ثبت</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <script>
            CKEDITOR.replace( 'editor{{$product->id}}',{
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
                var y = 1; //Initial field counter is 1
                var maxField = 10; //Input fields increment limitation
                var addButton = $('.adddbutton'); //Add button selector
                var wrapper = $('.field_wrapper'); //Input field wrapper
                var fieldHTML ='<tr>'+
                    '<td>'+
                    '<select class="form-control" name="datail_group[]">'+
                    '<option value="0">بدون دسته</option>'+
                        @foreach($detailgroup as $cat) '<option '+
                        @if($cat->parent_id == 0) 'style="font-weight: 600;color: #2C3E50" '+
                        @endif 'value="{{$cat->id}}">{{$cat->title}}</option>'+
                        @endforeach
                            '</select> </td> <td> <input type="text" name="detail_name[]" class="form-control"> </td> <td> <input type="text" name="detail_description[]" class="form-control"> </td>' +
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
                var addfile ='<tr>'+
                    '<td>'+
                    '<select class="form-control" name="file_type[]">'+
                        @foreach(config('file_type') as $key => $cat) '<option '+
                    'value="{{$key}}">{{$cat}}</option>'+
                        @endforeach
                            '</select> </td> '+
                    '<td> <input type="text" name="file_name[]" class="form-control"> </td>'+
                    '<td><input  class="form-control" type="file" name="file_file[]"></td>'+
                    ' <td> <input type="text" name="file_time[]" class="form-control"> </td>' +
                    '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'; //New input field html

                $('.file_add_button').click(function(){ //Once add button is clicked
                    console.log('hey');
                    if(z < max_file){ //Check maximum number of input fields
                        z++; //Increment field counter
                        $('.file_field').append(addfile); // Add field html
                        fileCount++;

                    }
                });


                $('.file_field').on('click', '.file_remove_button', function(e){ //Once remove button is clicked
                    e.preventDefault();
                    $(this).parent().parent().remove(); //Remove field html
                    z--; //Decrement field counter
                });

            };
            // });
        </script>

    @endforeach
</section>
@endsection