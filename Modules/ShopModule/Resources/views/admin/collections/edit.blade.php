@extends('layouts.admin')

<?php $fileCount=0 ?>
@section('script')
    <link rel="stylesheet" href="{{asset('assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

@endsection
@section('end_script')
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>
            $('.lfm').filemanager('image');
    </script>
@endsection
@section('content')

    <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
    <section id="content">

        <div class="page page-shop-single-product">

            <div class="pageheader">

                <h2>ویرایش کالکشن<span></span></h2>

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="{{ url('/admin') }}"><i class="fa fa-home"></i> پنل مدیریت</a>
                        </li>
                        <li>
                            <a href="{{ route('providers.index') }}">مدیریت کالکشن ها</a>
                        </li>
                        <li>
                            <a href="">ویرایش کالکشن</a>
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

                <form id="productForm" class="form-horizontal ng-pristine ng-valid" role="form" method="post" action="{{route('providers.update',['id'=> $provider->id])}}">
                    {{ csrf_field() }}

                    <div class="add-nav">
                        <div class="nav-heading">
                            <h3>ویرایش  <strong class="text-greensea">{{$provider->name}}:</strong></h3>
                            <span class="controls pull-left">
                                  <a href="{{ route('providers.index') }}" class="btn btn-ef btn-ef-1 btn-ef-1-default btn-ef-1a btn-rounded-20 mr-5" data-toggle="tooltip" title="بازگشت"><i class="fa fa-times"></i></a>
                                  <a href="javascript:;" onclick="document.getElementById('productForm').submit();" class="btn btn-ef btn-ef-1 btn-ef-1-success btn-ef-1a btn-rounded-20 mr-5" data-toggle="tooltip" title="ذخیره"><i class="fa fa-check"></i></a>
                        </span>
                        </div>

                        <div role="tabpanel">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist">
                                <!--<li role="presentation"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">Details</a></li>-->
                                <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">عمومی</a></li>
                            </ul>

                            <div class="tab-content">

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




                                                    <div class="form-group">
                                                        <label for="brand_id" class="col-sm-2 control-label">برند: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">


                                                            <select  class="form-control" id="brand_id" name="brand_id">

                                                                @foreach($brands as $brand)
                                                                <option
                                                                        @if($provider->brand_id == $brand->id)
                                                                        selected
                                                                        @endif
                                                                        value="{{$brand->id}}">{{$brand->name}}</option>
                                                                @endforeach


                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="name" class="col-sm-2 control-label">عنوان: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="name" placeholder="عنوان" name="name" value="{{$provider->name}}">
                                                        </div>
                                                    </div>

                                                    <!--
                                                    <div class="form-group">
                                                        <label for="phone" class="col-sm-2 control-label"> توضیح کلی: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="phone" placeholder=" " name="phone" value="{{$provider->phone}}">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sdescription" class="col-sm-2 control-label">  مشخصات : <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                                        <textarea class="form-control" id="sdescription" placeholder="Short Item Description" title="details" name="address">
                                                                            {{$provider->address}}
                                                                        </textarea>
                                                        </div>
                                                    </div>
                                                    -->


                                                    <div class="form-group">
                                                        <label for="description" class="col-sm-2 control-label"> توضیحات : <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <textarea class="form-control" id="description" placeholder="Short Item Description" title="details" name="description">{{$provider->description}}</textarea>
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="sdescription" class="col-sm-2 control-label"> تصویر : <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10 row">
                                                            <input id="Image" class="form-control" type="text" name="image" value="{{$provider->image}}">
                                                            <a data-input="Image" data-preview="holder"  class="lfm btn btn-primary">
                                                                <i class="fa fa-picture-o"></i>انتخاب
                                                            </a>
                                                            <img id="holder" style="margin-top:15px;max-height:100px;" @if($provider->image) src="{{$provider->image}}" @endif>
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
                            </div>
                        </div>
                    </div>
                </form>


            </div>

        </div>

    </section>
    <!--/ CONTENT -->


    <script type="text/javascript">
        // $(document).ready(function(){

        window.onload = function() {

            $('.lfm').filemanager('image');

        };
        // });


    </script>


@endsection