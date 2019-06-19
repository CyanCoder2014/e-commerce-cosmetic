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

                <h2>ویرایش محصول<span></span></h2>

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="{{ url('/admin') }}"><i class="fa fa-home"></i> پنل مدیریت</a>
                        </li>
                        <li>
                            <a href="{{ route('brands.index') }}">مدیریت کالکشن ها</a>
                        </li>
                        <li>
                            <a href="">ویرایش تولیدکننده</a>
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

                <form id="productForm" class="form-horizontal ng-pristine ng-valid" role="form" method="post" action="{{route('brands.update',['id'=> $brand->id])}}">
                    {{ csrf_field() }}

                    <div class="add-nav">
                        <div class="nav-heading">
                            <h3>ویرایش  <strong class="text-greensea">{{$brand->name}}:</strong></h3>
                            <span class="controls pull-left">
                                  <a href="{{ route('brands.index') }}" class="btn btn-ef btn-ef-1 btn-ef-1-default btn-ef-1a btn-rounded-20 mr-5" data-toggle="tooltip" title="بازگشت"><i class="fa fa-times"></i></a>
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
                                                        <label for="name" class="col-sm-2 control-label">نام: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="name" placeholder="نام" name="name" value="{{$brand->name}}">
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="founder" class="col-sm-2 control-label">موسس: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="founder" placeholder="موسس" name="founder" value="{{$brand->founder}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="country" class="col-sm-2 control-label">کشور سازنده: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="country" placeholder="کشور" name="country" value="{{$brand->country}}">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="year" class="col-sm-2 control-label">سال تاسیس: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="year" placeholder="نام" name="year" value="{{$brand->year}}">
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="variety" class="col-sm-2 control-label">تنوع محصول: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="variety" placeholder="تنوع محصول" name="variety" value="{{$brand->variety}}">
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="site" class="col-sm-2 control-label">وب سایت: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="site" placeholder="وب سایت" name="site" value="{{$brand->site}}">
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="company" class="col-sm-2 control-label">شرکت: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="company" placeholder="شرکت " name="company" value="{{$brand->company}}">
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="classification" class="col-sm-2 control-label">رده بندی: <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                            <select  class="form-control" id="classification" name="classification">
                                                                <option value="1"
                                                                        @if($brand->classification == '1')
                                                                selected
                                                                        @endif
                                                                >لوکس ++</option >
                                                                <option value="2"
                                                                        @if($brand->classification == '2')
                                                                        selected
                                                                        @endif
                                                                >لوکس +</option >
                                                                <option value="3"
                                                                        @if($brand->classification == '3')
                                                                        selected
                                                                        @endif
                                                                >لوکس</option >
                                                                <option value="4"
                                                                        @if($brand->classification == '4')
                                                                        selected
                                                                        @endif
                                                                >معمولی</option >
                                                                <option value="5"
                                                                        @if($brand->classification == '5')
                                                                        selected
                                                                        @endif
                                                                >سایر</option >
                                                            </select>

                                                        </div>
                                                    </div>




                                                    <div class="form-group">
                                                        <label for="description" class="col-sm-2 control-label"> توضیحات : <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10">
                                                                        <textarea class="form-control" id="description" placeholder="Short Item Description" title="details" name="description">{{$brand->description}}</textarea>
                                                        </div>
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="image" class="col-sm-2 control-label"> تصویر : <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10 row">
                                                            <input id="dfsd" class="form-control" type="text" name="image" value="{{$brand->image}}">
                                                            <a data-input="dfsd" data-preview="holder"  class="lfm btn btn-primary">
                                                                <i class="fa fa-picture-o"></i>انتخاب
                                                            </a>
                                                            <img id="holder" style="margin-top:15px;max-height:100px;" @if($brand->image) src="{{$brand->image}}" @endif>
                                                        </div>
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="logo" class="col-sm-2 control-label"> لوگو : <span class="text-lightred text-md">*</span></label>
                                                        <div class="col-sm-10 row">
                                                            <input id="logo" class="form-control" type="text" name="logo" value="{{$brand->logo}}">
                                                            <a data-input="logo" data-preview="holder-2"  class="lfm btn btn-primary">
                                                                <i class="fa fa-picture-o"></i>انتخاب
                                                            </a>
                                                            <img id="holder-2" style="margin-top:15px;max-height:100px;" @if($brand->logo) src="{{$brand->logo}}" @endif>
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