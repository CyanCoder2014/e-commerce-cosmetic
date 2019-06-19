@extends('layouts.admin')

<?php $fileCount=0 ?>
@section('script')
    <link rel="stylesheet" href="{{asset('assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

@endsection
@section('end_script')
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>
        $('#lfm').filemanager('image');
        $('.lfm').click(function(){
            $('.lfm').filemanager('image');
        });
        $('.filelfm').filemanager('file');
    </script>
@endsection
@section('content')

    <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
    <section id="content">

        <div class="page page-shop-single-product">

            <div class="pageheader">

                <h2>ویرایش محتوا<span></span></h2>

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="{{ url('/admin') }}"><i class="fa fa-home"></i> پنل مدیریت</a>
                        </li>
                        <li>
                            <a href="{{ route('content.index') }}">مدیریت محتوا</a>
                        </li>
                        <li>
                            <a href="">ویرایش محتوا</a>
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

                <div class="add-nav">
                    <div class="nav-heading">
                        <h3>ویرایش  <strong class="text-greensea">{{$content->title['fa']}}:</strong></h3>
                        <span class="controls pull-left">
                                  <a href="{{ route('content.index') }}" class="btn btn-ef btn-ef-1 btn-ef-1-default btn-ef-1a btn-rounded-20 mr-5" data-toggle="tooltip" title="بازگشت"><i class="fa fa-times"></i></a>
                                  <a href="javascript:;" onclick="document.getElementById('Form').submit();" class="btn btn-ef btn-ef-1 btn-ef-1-success btn-ef-1a btn-rounded-20 mr-5" data-toggle="tooltip" title="ذخیره"><i class="fa fa-check"></i></a>
                        </span>
                    </div>

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">عمومی</a></li>
                        </ul>

                        <div class="tab-content">

                            <div role="tabpanel" class="tab-pane active" id="general">




                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-12">


                                        <!-- tile -->
                                        <form id="Form" name="_token" method="POST" enctype="multipart/form-data"
                                              action="<?= Url('content/admin/content/update/'.$content->id); ?>">
                                            {{ csrf_field() }}
                                            <div class="modal-body">


                                                <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                                                <input type="hidden" name="users_id" value="{{Auth::id()}} ">


                                                <div class="col-md-6">
                                                    <div class="sec"><p>انتخاب نوع مطلب </p>
                                                        <select class="form-control" name="news">

                                                            <option
                                                                    @if('2' == $content->news)
                                                                    selected
                                                                    @endif
                                                                    value="2">  مقاله</option>
                                                            <option
                                                                    @if('1' == $content->news)
                                                                    selected
                                                                    @endif
                                                                    value="1">فیلم </option>
                                                            <option
                                                                    @if('3' == $content->news)
                                                                    selected
                                                                    @endif
                                                                    value="3">  دانشنامه</option>
                                                            <option
                                                                    @if('0' == $content->news)
                                                                    selected
                                                                    @endif
                                                                    value="0">عدم نمایش</option>



                                                        </select>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-6">
                                                    <div class="sec"><p>انتخاب دسته بندی </p>
                                                        <select class="form-control" name="cat_id">
                                                            <option value="0">بدون دسته</option>
                                                            @foreach($contentCats as $cat)
                                                                <option
                                                                        @if($cat->id == $content->cat_id)
                                                                        selected
                                                                        @endif
                                                                        @if($cat->parent_id == 0)
                                                                        style="font-weight: 600;color: #2C3E50"
                                                                        @endif
                                                                        value="{{$cat->id}}">{{$cat->title['fa']}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">

                                                    <div id="image-post-store" style=" margin: 10px;">
                                                        <div class="input-group">
                                                            <label for="Image">عکس مطلب</label>
                                                            <input id="Image" class="form-control" type="text" name="images" value="{{ $content->image}}">
                                                            <span class="input-group-btn" style="margin-top: 25px">
                                                             <a id="lfm" data-input="Image" data-preview="holder"  class="btn btn-primary">
                                                               <i class="fa fa-picture-o"></i>انتخاب
                                                             </a>

                                                                @include('admin.contents.ImageUploader')

                                                           </span>
                                                        </div>
                                                        @if($content->image != 'null')
                                                        <img src="{{asset($content->image)}}"
                                                             alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                        @endif

                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="sec"><label for="commenable">قابلیت کامنت گذاری </label>
                                                        <input type="checkbox" id="commenable" name="commentable" @if($content->comment == 1) checked @endif>
                                                    </div>
                                                </div>

                                                <br><br><br><br>
                                                <div class="panel with-nav-tabs panel-default col-xs-12" style="margin-top:10px ">
                                                    <div class="panel-heading">
                                                        <ul class="nav nav-tabs">
                                                            <li class="active"><a href="#tab1default" data-toggle="tab">فارسی</a></li>
                                                            <li><a href="#tab2default" data-toggle="tab">انگلیسی</a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="tab-content">
                                                            <div class="tab-pane fade in active" id="tab1default">
                                                                <div >

                                                                    <div class="col-md-12"><p>  فعال </p>
                                                                        <input type="checkbox" name="active[fa]" @if($content->active['fa']) checked="" @endif>
                                                                    </div>
                                                                    <div class="col-md-6" style="float: right">
                                                                        <div class="input-group"><p style="float: right">  عنوان مطلب</p>
                                                                            <input required name="title[fa]" type="text" value="{{$content->title['fa']}}" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12"><p>  چکیده مطلب </p>
                                                                        <textarea class="form-control"  required title="intro" name="intro[fa]" rows="2" cols="110" >
                                                                            {!! $content->intro['fa'] !!}
                                                                        </textarea><br>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <textarea required title="text" name="text[fa]" id="description" rows="10" cols="80" >
                                                                            {!! $content->text['fa'] !!}

                                                                        </textarea><br>
                                                                    </div>
                                                                    <div class="col-md-6" style="float: right">
                                                                        <div class="input-group"><p style="float: right">  لینک مطلب بعدی</p>
                                                                            <input  name="next_link[fa]" type="text" value="{{$content->next_link['fa']}}" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6" style="float: right">
                                                                        <div class="input-group"><p style="float: right">  لینک مطلب قبلی</p>
                                                                            <input  name="previous_link[fa]" type="text" value="{{$content->previous_link['fa']}}" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="tab2default">
                                                                <div >
                                                                    <div class="col-md-12"><p>  فعال </p>
                                                                        <input type="checkbox" name="active[en]" @if($content->active['en']) checked="" @endif>
                                                                    </div>
                                                                    <div class="col-md-6" style="float: right">
                                                                        <div class="input-group"><p style="float: right">  عنوان مطلب</p>
                                                                            <input required name="title[en]" type="text" value="{{$content->title['en']}}" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12"><p>  چکیده مطلب </p>
                                                                        <textarea class="form-control"  required title="intro" name="intro[en]" rows="2" cols="110" >
                                                                             {!! $content->intro['en'] !!}
                                                                        </textarea><br>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <textarea required title="text" name="text[en]" id="description_en" rows="10" cols="80" >
                                                                            {!! $content->text['en'] !!}
                                                                        </textarea><br>
                                                                    </div>
                                                                    <div class="col-md-6" style="float: right">
                                                                        <div class="input-group"><p style="float: right">  لینک مطلب بعدی</p>
                                                                            <input  name="next_link[en]" type="text" value="{{$content->next_link['en']}}" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6" style="float: right">
                                                                        <div class="input-group"><p style="float: right">  لینک مطلب قبلی</p>
                                                                            <input  name="previous_link[en]" type="text" value="{{$content->previous_link['en']}}" class="form-control">
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div id="file" style=" margin: 10px;">

                                                    <label>فایل</label>
                                                    <div>
                                                        <table class="table-striped " style="width:100%">
                                                            <thead>
                                                            <tr>
                                                                <th> محصول مرتبط</th>
                                                                <th>حذف</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody class="file_field">
                                                            @if(isset($content->related_products))
                                                            @foreach($content->related_products as $id)
                                                            <tr>
                                                                <td>
                                                                    <select class="form-control" name="related_products[]">
                                                                        @foreach($products as $product)
                                                                            <option @if($id == $product->id) selected @endif value="{{$product->id}}">{{$product->name}}</option>
                                                                        @endforeach
                                                                        </select> </td>
                                                                <td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>
                                                            @endforeach
                                                            @endif

                                                            </tbody>
                                                        </table>
                                                        <a href="javascript:void(0);" class="file_add_button btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>

                                                    </div>



                                                    <div>
                                                    </div><br>
                                                </div>
                                                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                            </div>

                                        </form>

                                        <!-- /tile -->


                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->




                            </div>
                            <!-- tab in tabs -->
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
        CKEDITOR.replace( 'description_en',{
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });

        var fileCount = @if(isset($content->related_products)){{ count($content->related_products) }} @else 0 @endif;
        var max_file=10;
        var z = 1; //Initial field counter is 1

        $('.file_add_button').click(function(){ //Once add button is clicked
            console.log('hey');
            if(z < max_file){ //Check maximum number of input fields
                z++; //Increment field counter
                $(this).siblings('table').children('.file_field').append('<tr>'+
                    '<td>'+
                    '<select class="form-control" name="related_products[]">'+
                        @foreach($products as $product) '<option '+
                    'value="{{$product->id}}">{{$product->name}}</option>'+
                        @endforeach
                            '</select> </td> '+
                    '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'); // Add field html
                fileCount++;

            }
        });


        $('.file_field').on('click', '.remove_button', function(e){ //Once remove button is clicked
            e.preventDefault();
            console.log('hey');
            $(this).parent().parent().remove(); //Remove field html
            z--; //Decrement field counter
        });


    </script>


@endsection