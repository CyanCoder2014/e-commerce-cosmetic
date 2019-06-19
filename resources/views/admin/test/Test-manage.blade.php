@extends('layouts.admin')
@section('end_script')
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script>

        $('.lfm').filemanager('image');

    </script>
@endsection
@section('content')
    <div id="content"><br>
        <div class="inner" style="min-height: 565px;">
            <div class="row">
                <section id="lts_sec " class="right" style="margin: 10px auto;">
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">
                                    <a data-toggle="modal" data-target=".add-page" style="float: left" class="btn btn-primary"><i class="fa fa-plus"></i> افزودن آزمون </a>

                                    <h1>مدیریت  آزمون </h1>
                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">&nbsp;عنوان</th>
                                            <th style="text-align: center">&nbsp;تاریخ ایجاد</th>
                                            <th style="text-align: center"> ویرایش</th>
                                            <th style="text-align: center"> ویرایش سوالات آزمون</th>
                                            <th style="text-align: center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contents as $content)
                                            <tr class="odd gradeX">
                                                <th style="text-align: center"> &nbsp; <strong >{{$content->title}} </strong></th>
                                                <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($content->created_at) !!}</th>
                                               <th style="text-align: center; font-weight: 100"><a data-toggle="modal" data-target=".edit-page-{{$content->id}}" class="btn btn-warning "><i class="fa fa-edit"></i></a></th>
                                               <th style="text-align: center; font-weight: 100"><a href="{{ route('Q.index',['id' => $content->id ]) }}" class="btn btn-warning "><i class="fa fa-edit"></i></a></th>
                                                <th style="text-align: center; font-weight: 100">
                                                    <form method="POST" action="{{ route('Test.delete',['id' =>$content->id]) }}" id="'delete-{{$content->id}}'">
                                                        <button onclick="return confirm('آیا از حذف این صفحه مطمئن هستید؟');"   class="btn btn-danger"><i class="fa fa-remove"></i></button>
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                    </form>
                                                </th>



                                            </tr>





                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{$contents->links()}}
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
                      action="{{route('Test.add')}}">
                    {{ csrf_field() }}
                    <div class="modal-body">


                        <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                        <div class="col-md-12" style="margin-bottom: 30px">
                            <div class="input-group"><p style="float: right">  عنوان آزمون</p>
                                <input required name="title" type="text" value="{{old('title')}}"  class="form-control">
                            </div>
                            <div class="input-group"><p style="float: right"> توضیحات</p>
                                <textarea required name="description" type="text"  class="form-control">{{old('description')}}</textarea>
                            </div>
                            <div class="input-group"><p style="float: right">عنوان لینک</p>
                                <input required name="link_name" type="text" value="{{old('link_name')}}"  class="form-control">
                            </div>
                            <div class="input-group"><p style="float: right">لینک</p>
                                <input required name="link" type="text" value="{{old('link')}}"  class="form-control">
                            </div>
                            <div class="input-group"><p style="float: right">لینک</p>
                                <input required name="link" type="text" value="{{old('link')}}"  class="form-control">
                            </div>
                            <div class="input-group"><p style="float: right">عکس</p>
                                <a data-input="Image" data-preview="holder"  class="lfm btn btn-primary">
                                    <i class="fa fa-picture-o"></i>انتخاب</a>
                                <input id="Image" name="image" type="text" value="{{old('image')}}" class="form-control">
                                <img id="holder"  style="margin-top:15px;max-height:100px;">
                            </div>
                            <div class="input-group"><p style="float: right"> توضیحات پایان ازمون</p>
                                <textarea required name="final_desc" type="text"  class="form-control">{{old('final_desc')}}</textarea>
                            </div>
                        </div>



                        {{--<div class="input-group"><h3 style="float: right">سوال ها</h3></div>--}}
                            {{--<table class="table-striped " style="width:100%">--}}
                            {{--<tbody class="field_wrapper">--}}
                            {{--<tr>--}}
                                {{--<th>عنوان سوال</th>--}}
                                {{--<th>حذف</th>--}}
                            {{--</tr>--}}
                            {{--<?php $old =old('questions');?>--}}
                            {{--@if($old)--}}
                                {{--@foreach($old as $ques)--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<select name="questions[]"  class="form-control">--}}
                                                {{--@foreach($questions as $q)--}}
                                                    {{--<option value="{{$q->id}}" @if($ques == $q->id) selected @endif>{{$q->title}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--<a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a>--}}
                                        {{--</td>--}}

                                    {{--</tr>--}}
                                {{--@endforeach--}}
                            {{--@endif--}}

                            {{--</tbody>--}}
                        {{--</table>--}}

                        {{--<a href="javascript:void(0);" class="adddbutton btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>--}}

                    </div>
                    <div class="modal-footer" >
                        <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                        <button  type="submit"  name="_token" value="{{ csrf_token() }}" class="btn  blue-bg">ثبت</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



    @foreach($contents as $content)


        <div class="modal fade edit-page-{{$content->id}}" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>

                    <form name="_token" method="POST" enctype="multipart/form-data"
                          action="{{route('Test.update',['id'=>$content->id])}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="modal-body">


                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                            <div class="col-md-12" style="margin-bottom: 30px">
                                <div class="input-group"><p style="float: right">  عنوان آزمون</p>
                                    <input required name="title" type="text" value="{{$content->title}}" class="form-control">
                                </div>
                                <div class="input-group"><p style="float: right">  توضیحات</p>
                                    <textarea required name="description" type="text"  class="form-control">{{$content->description}}</textarea>
                                </div>
                                <div class="input-group"><p style="float: right">عنوان لینک</p>
                                    <input required name="link_name" type="text" value="{{$content->link_name}}"  class="form-control">
                                </div>
                                <div class="input-group"><p style="float: right">لینک</p>
                                    <input required name="link" type="text" value="{{$content->link}}"  class="form-control">
                                </div>
                                <div class="input-group"><p style="float: right">عکس</p>
                                    <ul>
                                        <li class="row">
                                            <input id="Image{{$content->id}}" class="form-control" type="text" name="image" value="{{$content->image}}">
                                            <a data-input="Image{{$content->id}}" data-preview="holder{{$content->id}}" class="lfm btn btn-primary"> <i class="fa fa-file-o"></i>انتخاب</a>
                                            <img id="holder{{$content->id}}" @if($content->image)src="{{asset($content->image)}}"@endif  style="margin-top:15px;max-height:100px;">


                                        </li>
                                    </ul>
                                </div>
                                <div class="input-group"><p style="float: right"> توضیحات پایان ازمون</p>
                                    <textarea required name="final_desc" type="text"  class="form-control">{{$content->final_desc}}</textarea>
                                </div>
                            </div>


                            <div class="col-md-3">
                            </div>


                            <div class="input-group"><h3 style="float: right">سوال ها</h3></div>
                            {{--<table class="table-striped " style="width:100%">--}}
                                {{--<tbody class="field_wrapper">--}}
                                {{--<tr>--}}
                                    {{--<th>عنوان سوال</th>--}}
                                    {{--<th>حذف</th>--}}
                                {{--</tr>--}}
                                {{--@foreach($content->questions as $ques)--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--<select name="questions[]"  class="form-control">--}}
                                                {{--@foreach($questions as $q)--}}
                                                    {{--<option value="{{$q->id}}" @if($ques->q_id == $q->id) selected @endif>{{$q->title}}</option>--}}
                                                {{--@endforeach--}}
                                            {{--</select>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--<a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a>--}}
                                        {{--</td>--}}

                                    {{--</tr>--}}
                                {{--@endforeach--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                            {{--<a href="javascript:void(0);" class="adddbutton btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>--}}

                        </div>
                        <div class="modal-footer" >
                            <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                            <button  type="submit"  name="_token" value="{{ csrf_token() }}" class="btn  blue-bg">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    @endforeach
        <script type="text/javascript">
            // $(document).ready(function(){

            window.onload = function() {
                var maxFile=10;
                var filebutton=$('.filebutton')
                var filewrapper=$('.filewrapper')
                var y = 1; //Initial field counter is 1
                var maxField = 10; //Input fields increment limitation
                var addButton = $('.adddbutton'); //Add button selector
                var wrapper = $('.field_wrapper'); //Input field wrapper
                var fieldHTML ='<tr><td>' +
                    '<select name="questions[]"  class="form-control">' +
                        @foreach($questions as $q)
                        '<option value="{{$q->id}}">{{$q->title}}</option>'+
                        @endforeach
                    '</select></td>' +
                    '<td><a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a> </td></tr>'; //New input field html
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

            };
            // });
        </script>


@endsection