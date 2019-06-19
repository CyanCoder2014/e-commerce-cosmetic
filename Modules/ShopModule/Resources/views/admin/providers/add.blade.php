@extends('layouts.admin')

<?php $fileCount=0 ?>
@section('script')
    <link rel="stylesheet" href="{{asset('assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.css')}}">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
@endsection
@section('end_script')
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>
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

                <h2>افزودن محصول<span></span></h2>

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="{{ url('/admin') }}"><i class="fa fa-home"></i> پنل مدیریت</a>
                        </li>
                        <li>
                            <a href="{{ route('providers.index') }}">مدیریت کالکشن ها</a>
                        </li>
                        <li>
                            <a href="">افزودن کالکشن </a>
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

            <form id="productForm" class="form-horizontal ng-pristine ng-valid" role="form" method="post" action="{{route('providers.add')}}">
                {{ csrf_field() }}

                <div class="add-nav">
                    <div class="nav-heading">
                        <h3>کالکشن  <strong class="text-greensea">جدید:</strong></h3>
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
                            {{--<li role="presentation"><a href="#meta" aria-controls="meta" role="tab" data-toggle="tab">مشخصات</a></li>--}}
                            {{--<li role="presentation"><a href="#images" aria-controls="images" role="tab" data-toggle="tab">عکس</a></li>--}}
                            {{--<li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">ویدیو</a></li>--}}
                            {{--<li role="presentation"><a href="#historyTab" aria-controls="history" role="tab" data-toggle="tab">پکیج</a></li>--}}
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

                                                <div class="form-group">
                                                    <label for="name" class="col-sm-2 control-label">عنوان: <span class="text-lightred text-md">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="name" placeholder="نام" name="name" value="{{old('name')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="phone" class="col-sm-2 control-label"> توضیح کلی: <span class="text-lightred text-md">*</span></label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control" id="phone" placeholder="توضیح کلی " name="phone" value="{{old('phone')}}">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sdescription" class="col-sm-2 control-label"> مشخصات : <span class="text-lightred text-md">*</span></label>
                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" id="sdescription" placeholder="Short Item Description" title="details" name="address">
                                                                            {{old('address')}}
                                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="col-sm-2 control-label"> توضیحات : <span class="text-lightred text-md">*</span></label>
                                                    <div class="col-sm-10">
                                                                        <textarea class="form-control" id="description" placeholder="Short Item Description" title="details" name="description">
                                                                            {{old('description')}}
                                                                        </textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="sdescription" class="col-sm-2 control-label"> تصویر : <span class="text-lightred text-md">*</span></label>
                                                    <div class="col-sm-10 row">
                                                        <input id="Image" class="form-control" type="text" name="logo" value="{{old('logo')}}">
                                                        <a data-input="Image" data-preview="holder"  class="lfm btn btn-primary">
                                                            <i class="fa fa-picture-o"></i>انتخاب
                                                        </a>
                                                        <img id="holder" style="margin-top:15px;max-height:100px;" @if(old('logo')) src="{{old('logo')}}" @endif>
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


    {{--<script>--}}
        {{--CKEDITOR.replace( 'description',{--}}
            {{--filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',--}}
            {{--filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',--}}
            {{--filebrowserBrowseUrl: '/laravel-filemanager?type=Files',--}}
            {{--filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='--}}
        {{--});--}}

    {{--</script>--}}
      {{--<script>--}}
        {{--CKEDITOR.replace( 'description_en',{--}}
            {{--filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',--}}
            {{--filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',--}}
            {{--filebrowserBrowseUrl: '/laravel-filemanager?type=Files',--}}
            {{--filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='--}}
        {{--});--}}

    {{--</script>--}}
    <script type="text/javascript">
        // $(document).ready(function(){

        window.onload = function() {
            $('.lfm').filemanager('image');
            {{--var maxFile=10;--}}
            {{--var filebutton=$('.filebutton');--}}
            {{--var filewrapper=$('.filewrapper');--}}
            {{--var maxField = 10; //Input fields increment limitation--}}
            {{--var addButton = $('.adddbutton'); //Add button selector--}}
            {{--var wrapper = $('.field_wrapper'); //Input field wrapper--}}
            {{--var fieldHTML ='<tr>'+--}}
                {{--'<td> <input type="text" name="detail_price[]" class="form-control"> </td>'+--}}
                {{--'<td><input type="text" id="dname_fa" name="detail_name[fa][]" class="form-control"></td>' +--}}
                {{--'<td><input type="text" id="ddesc_fa" name="detail_description[fa][]" class="form-control">' +--}}
                {{--'<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'; //New input field html--}}


            {{--var x = 1; //Initial field counter is 1--}}
            {{--$(addButton).click(function(){ //Once add button is clicked--}}
                {{--if(x < maxField){ //Check maximum number of input fields--}}
                    {{--x++; //Increment field counter--}}
                    {{--$(wrapper).append(fieldHTML); // Add field html--}}

                {{--}--}}
            {{--});--}}
            {{--$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked--}}
                {{--e.preventDefault();--}}
                {{--$(this).parent().parent().remove(); //Remove field html--}}
                {{--x--; //Decrement field counter--}}
            {{--});--}}



            {{--var picCount = 0;--}}
            {{--var max_pic=10;--}}
            {{--var y = 1; //Initial field counter is 1--}}
            {{--$('.addpic').click(function(){ //Once add button is clicked--}}
                {{--console.log('hey');--}}
                {{--if(y < max_pic){ //Check maximum number of input fields--}}
                    {{--y++; //Increment field counter--}}
                    {{--$(this).siblings('table').children('.pic_wrapper').append('<tr>'+--}}
                        {{--'<td>'+--}}
                        {{--'<a data-input="Image'+picCount+'" data-preview="holder'+picCount+'"  class="lfm btn btn-primary">' +--}}
                        {{--'<i class="fa fa-picture-o"></i>انتخاب</a>'+--}}
                        {{--'<td> <input id="Image'+picCount+'" class="form-control" type="text" name="Images[]"> </td>'+--}}
                        {{--'<td><img id="holder'+picCount+'" style="margin-top:15px;max-height:100px;"></td>'+--}}
                        {{--'<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'); // Add field html--}}
                    {{--picCount++;--}}
                    {{--$('.lfm').filemanager('image');--}}
                {{--}--}}
            {{--});--}}
            {{--$('.pic_wrapper').on('click', '.remove_button', function(e){ //Once remove button is clicked--}}
                {{--e.preventDefault();--}}
                {{--$(this).parent().parent().remove(); //Remove field html--}}
                {{--y--; //Decrement field counter--}}
            {{--});--}}


            {{--$(filebutton).click(function(){ //Once add button is clicked--}}
                {{--console.log('hey');--}}
                {{--if(y < maxFile){ //Check maximum number of input fields--}}
                    {{--y++; //Increment field counter--}}
                    {{--$(filewrapper).append('<input type="file" name="Images[]" accept="image/example" >'); // Add field html--}}

                {{--}--}}
            {{--});--}}
            {{--$(filewrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked--}}
                {{--e.preventDefault();--}}
                {{--$(this).parent().remove(); //Remove field html--}}
                {{--y--; //Decrement field counter--}}
            {{--});--}}


            {{--var fileCount = {{$fileCount}};--}}
            {{--var max_file=10;--}}
            {{--var z = 1; //Initial field counter is 1--}}

            {{--$('.file_add_button').click(function(){ //Once add button is clicked--}}
                {{--console.log('hey');--}}
                {{--if(z < max_file){ //Check maximum number of input fields--}}
                    {{--z++; //Increment field counter--}}
                    {{--$(this).siblings('table').children('.file_field').append('<tr>'+--}}
                        {{--'<td>'+--}}
                        {{--'<select class="form-control" name="file_type[]">'+--}}
                            {{--@foreach(config('file_type') as $key => $cat) '<option '+--}}
                        {{--'value="{{$key}}">{{$cat}}</option>'+--}}
                            {{--@endforeach--}}
                                {{--'</select> </td> '+--}}
                        {{--'<td> <input id="fa_name" type="text" name="file_name[fa][]" class="form-control"></td>'+--}}
                        {{--'<td><input id="file'+z+'"  class="form-control" type="text" name="file_file[]">'+--}}
                        {{--'<a data-input="file'+z+'" class="filelfm btn btn-primary"> <i class="fa fa-file-o"></i>انتخاب</a></td>'+--}}
                        {{--' <td> <input type="text" name="file_time[]" class="form-control"> </td>' +--}}
                        {{--'<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'); // Add field html--}}
                    {{--fileCount++;--}}
                    {{--$('.filelfm').filemanager('file');--}}

                {{--}--}}
            {{--});--}}


            {{--$('.file_field').on('click', '.remove_button', function(e){ //Once remove button is clicked--}}
                {{--e.preventDefault();--}}
                {{--$(this).parent().parent().remove(); //Remove field html--}}
                {{--z--; //Decrement field counter--}}
            {{--});--}}



            {{--var packageCount = 0;--}}
            {{--var max_package=10;--}}
            {{--var packag = 1; //Initial field counter is 1--}}

            {{--$('.addpackage').click(function(){ //Once add button is clicked--}}
                {{--console.log('hey');--}}
                {{--if(packag < max_package){ //Check maximum number of input fields--}}
                    {{--packag++; //Increment field counter--}}
                    {{--$(this).siblings('table').children('.package_wrapper').append('<tr>'+--}}
                        {{--'<td><input id="pname_fa" type="text" name="package_name[fa][]" class="form-control"></td> '+--}}
                        {{--'<td><input id="pdesc_fa" type="text" name="package_desc[fa][]" class="form-control"></td>'+--}}
                        {{--'<td> <input type="text" name="package_price[]" class="form-control" disabled> </td>'+--}}
                        {{--'<td><a data-input="packImage'+packag+'" data-preview="packholder'+packag+'"  class="lfm btn btn-primary">' +--}}
                        {{--'<i class="fa fa-picture-o"></i>انتخاب</a>'+--}}
                        {{--'<input id="packImage'+packag+'" class="form-control" type="text" name="package_image[]"> </td>'+--}}
                        {{--'<td></td> '+--}}
                        {{--'<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'); // Add field html--}}
                    {{--$('.lfm').filemanager('image');--}}

                {{--}--}}
            {{--});--}}


            {{--$('.package_wrapper').on('click', '.remove_button', function(e){ //Once remove button is clicked--}}
                {{--e.preventDefault();--}}
                {{--$(this).parent().parent().remove(); //Remove field html--}}
                {{--packag--; //Decrement field counter--}}
            {{--});--}}

        };
        // });
    </script>

@endsection