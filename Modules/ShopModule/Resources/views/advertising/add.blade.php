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

    <script src="/new/js/jquery.min.js"></script>
    <script src="/new/js/popper.min.js"></script>
    <script src="/new/js/bootstrap.min.js"></script>
    <script src="/new/js/navbar.js"></script>




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

    <div class="shadow pt-menu pb-4">
        <div class="progress">
            <div class="progress-bar bg-gold" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0"
                 aria-valuemax="100"></div>
        </div>
        <div class="row pr-5 pl-5">
            <div class="col-3 text-grey">
                ورود کاربر
            </div>
            <div class="col-3  step-active">
                درج اطلاعات
            </div>
            <div class="col-3 text-grey">
                تایید آگهی
            </div>
            <div class="col-3 text-grey">
                انتشار آگهی
            </div>
        </div>


    </div>
    <div class="select2-container" ></div>
    <div class="pagecontent">

        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
    </div>
    <form id="productForm" class="form-horizontal ng-pristine ng-valid" role="form" method="post" action="{{route('advertising.add')}}">
        {{ csrf_field() }}
        <input type="hidden" name="users_id" value="{{Auth::id()}} ">
        <input type="hidden" name="state" value="1">
    <div class="container pt-5">

            </div>
        <div class="row justify-content-center"  >
            <div class="col-md-8">
                <div class="text-right shadow p-4">
                    <div class="bg-second p-3 shadow mb-3" style="font-size: 22px ; text-align: center">آگهی خود را ثبت کنید</div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-3 mt-2 shadow">
                                        <label for="id">دسته بندی آگهی :</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 mt-2 shadow">
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
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-3 mt-2 shadow">
                                        <label for="id">نوع آگهی :</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 mt-2 shadow">
                                        <select class="form-control" name="type">
                                            <option value="2">  فروش</option>
                                            <option value="1"> خرید</option>
                                            <option value="3"> تعمیر </option>
                                            <option value="0"> عدم نمایش</option>
                                        </select>                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-3 mt-2 shadow">
                                        <label data-toggle="tooltip" data-placement="left" title="برند مورد نظر را انتخاب کنید" for="id">برند :</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 mt-2 shadow">
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
                            </div>
                        </div>

{{--city--}}
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-3 mt-2 shadow">
                                        <span>شهر :</span>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 mt-2 shadow">
                                        <span class=" text-gold">لللللللل</span>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--city--}}
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-3 mt-2 shadow">
                                        <label for="id">تولیدکننده :</label>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 mt-2 shadow">
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
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-3 mt-2 shadow">
                                        <label  data-toggle="tooltip" data-placement="left" title="نام آگهی خود را به صورت دقیق وارد نمایید" for="name">نام آگهی :</label>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 mt-2 shadow">
                                        <input type="text" class="form-control" id="name" placeholder="نام" name="name" value="{{old('name')}}">                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-3 mt-2 shadow">
                                        <label  data-toggle="tooltip" data-placement="left" title="اطلاعات تماس شما به پیگیری آگهی شما کمک می کند" for="sdescription">اطلاعات تماس:</label>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 mt-2 shadow">
                                        <textarea class="form-control" id="sdescription" placeholder="Short Item Description" title="details" name="details"></textarea>                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-3 mt-2 shadow">
                                        <label  data-toggle="tooltip" data-placement="left" title="مشخصات آگهی به انتخاب درست دیگران کمک می کند" for="description">مشخصات آگهی:</label>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 mt-2 shadow">
                                        <textarea class="form-control" id="description" name="description" placeholder="Item Description" rows="5">{{old('description')}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-3 mt-2 shadow">
                                        <label  data-toggle="tooltip" data-placement="left" title="قیمت را به تومان وارد نمایید" for="price">قیمت:</label>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 mt-2 shadow">
                                        <input type="text" required name="price"  value="{{old('price')}}" id="price" class="form-control touchspin" data-min='0' data-max="1000000000" data-stepinterval="50" data-maxboostedstep="100000" data-prefix="تومان">                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-3 mt-2 shadow">
                                        <label  data-toggle="tooltip" data-placement="left" title="میزان تخفیف را به تومان وارد نمایید" for="discount">تخفیف:</label>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 mt-2 shadow">
                                        <input type="text" name="discount" value=@if(old('discount')) {{old('discount')}}@else"0" @endif id="discount" class="form-control touchspin" data-min='0' data-max="100" data-boostat="5" data-maxboostedstep="10" data-postfix="%">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-3 mt-2 shadow">
                                        <label  data-toggle="tooltip" data-placement="left" title="قیمت را به تومان وارد نمایید" for="id">تعداد</label>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 mt-2 shadow">
                                        <input type="text" class="form-control touchspin" data-min='0' name="quantity" value="0">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="p-3 mt-2 shadow">
                                        <label  data-toggle="tooltip" data-placement="left" title="آگهی شما بلافاصله فعال می گردد" for="discount">فعال</label>
                                    </div>

                                </div>
                                <div class="col-md-8">
                                    <div class="p-3 mt-2 shadow">
                                        <input type="checkbox" name="active[fa]" checked>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <a href="#" class="sweep-to-left sweep-to-left-border-dark shadow d-block m-0 w-100">
                                        ویرایش   </a>
                                </div>
                                <div class="col-md-3">
                                    <a href="javascript:;" onclick="document.getElementById('productForm').submit();" class="sweep-to-left sweep-to-left-border-dark shadow d-block m-0 w-100">
                                        ادامه   </a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

        </div>




    </form>



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


            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })


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
                        '<td> <input id="fa_name" type="text" name="file_name[]" class="form-control"></td>'+
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
            var packag = 1; //Initial field counter is 1

            $('.addpackage').click(function(){ //Once add button is clicked
                console.log('hey');
                if(packag < max_package){ //Check maximum number of input fields
                    packag++; //Increment field counter
                    $(this).siblings('table').children('.package_wrapper').append('<tr>'+
                        '<td><input id="pname_fa" type="text" name="package_name[]" class="form-control"></td> '+
                        '<td><input id="pdesc_fa" type="text" name="package_desc[]" class="form-control"></td>'+
                        '<td> <input type="text" name="package_price[]" class="form-control" disabled> </td>'+
                        '<td><a data-input="packImage'+packag+'" data-preview="packholder'+packag+'"  class="lfm btn btn-primary">' +
                        '<i class="fa fa-picture-o"></i>انتخاب</a>'+
                        '<input id="packImage'+packag+'" class="form-control" type="text" name="package_image[]"> </td>'+
                        '<td></td> '+
                        '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'); // Add field html
                    $('.lfm').filemanager('image');

                }
            });


            $('.package_wrapper').on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent().parent().remove(); //Remove field html
                packag--; //Decrement field counter
            });
            $

        };
        // });
    </script>

@endsection