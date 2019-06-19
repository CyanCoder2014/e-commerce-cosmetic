@extends($class::getLayout())
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
    <section id="content" style="text-align: right">

        <div class="page page-shop-single-product">

            <div class="pageheader">

                <h2>افزودن<span></span></h2>

                <div class="page-bar">

{{--                    <ul class="page-breadcrumb">--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('/admin') }}"><i class="fa fa-home"></i> پنل مدیریت</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="{{ url('/admin') }}">مدیریت</a>--}}
{{--                        </li>--}}
{{--                        <li>--}}
{{--                            <a href="">افزودن{{ $class::getName() }} </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}

                </div>

            </div>

            <div class="container">

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

            <form id="productForm" class="form-horizontal ng-pristine ng-valid" role="form" method="post" action="{{ $class::route('store') }}"  enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    @foreach($class::getform() as $form)
                        @if(isset($form['addable']) && $form['addable'])
                            @include('crud.widgets.addable.'.$form['type'],['fiels' => $form,'value' => old($form['name']),'class' =>$class ])
                        @else
                            @include('crud.widgets.'.$form['type'],['fiels' => $form,'value' => old($form['name']), 'class' => $class ])
                        @endif
                    @endforeach
                </div>
                <button type="submit" class="btm btn-success">ثبت</button>

            </form>


            </div>

        </div>

    </section>
    <!--/ CONTENT -->




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