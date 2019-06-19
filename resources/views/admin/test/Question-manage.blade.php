@extends('layouts.admin')
@section('content')
    <div id="content"><br>
        <div class="inner" style="min-height: 565px;">
            <div class="row">
                <section id="lts_sec " class="right" style="margin: 10px auto;">
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">
                                    <a data-toggle="modal" data-target=".add-page" style="float: left" class="btn btn-primary"><i class="fa fa-plus"></i> افزودن سوال </a>

                                    <h1>مدیریت  سوالات </h1>
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
                                            <th style="text-align: center">&nbsp;متن</th>
                                            <th style="text-align: center"> تاریخ ایجاد</th>
                                            <th style="text-align: center"> ویرایش</th>
                                            <th style="text-align: center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contents as $content)
                                            <tr class="odd gradeX">
                                                <th style="text-align: center"> &nbsp; <strong>{{$content->title}} </strong></th>
                                                <th style="text-align: center; font-weight: 100">{{ $content->content }}</th>
                                                <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($content->created_at) !!}</th>
                                               <th style="text-align: center; font-weight: 100"><a data-toggle="modal" data-target=".edit-page-{{$content->id}}" class="btn btn-warning "><i class="fa fa-edit"></i></a></th>
                                                <th style="text-align: center; font-weight: 100">
                                                    <form method="POST" action="{{ route('Q.delete',['id' =>$content->id]) }}" id="'delete-{{$content->id}}'">
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
                      action="{{route('Q.add')}}">
                    {{ csrf_field() }}
                    <div class="modal-body">


                        <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                        <input type="hidden" name="test_id" value="{{ $id }} ">

                        <div class="col-md-12" style="margin-bottom: 30px">
                            <div class="input-group"><p style="float: right">  عنوان سوال</p>
                                <input required name="title" type="text" value="{{old('title')}}"  class="form-control">
                            </div>
                            <div class="input-group"><p style="float: right">  متن</p>
                                <textarea required name="qcontent" type="text"   class="form-control">{{old('qcontent')}}</textarea>
                            </div> <div class="input-group"><p style="float: right">  نوع</p>
                                <select required name="type"   class="type form-control">
                                    @foreach($qcat as $cat)
                                    <option value="{{$cat->id}}" @if(old('type') == $cat->id) selected @endif>{{$cat->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="input-group"><h3 style="float: right">گزینه ها</h3></div>
                        <table class="table-striped " style="width:100%">
                            <tbody class="field_wrapper">
                            <tr>
                                <th>عنوان گزینه</th>
                                <th>نوع</th>
                                <th>حذف</th>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="option[title][]"  class="form-control">
                                </td>
                                <td>
                                        <select name="option[type][]" class="option">

                                        </select>
                                </td>

                                <td>
                                    <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a>
                                </td>

                            </tr>

                            </tbody>
                        </table>

                        <a href="javascript:void(0);" class="adddbutton btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>
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
                    action="{{route('Q.update',['id'=>$content->id])}}">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="modal-body">


                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                            <div class="col-md-12" style="margin-bottom: 30px">
                                <div class="input-group"><p style="float: right">  عنوان سوال</p>
                                    <input required name="title" type="text" value="{{$content->title}}" class="form-control">
                                </div>
                                <div class="input-group"><p style="float: right"> متن</p>
                                    <input required name="qcontent" type="text" value="{{$content->content}}" class="form-control">
                                </div>
                                <div class="input-group"><p style="float: right">  نوع</p>
                                    <select required name="type"   class="type form-control">
                                    @foreach($qcat as $cat)
                                            <option value="{{$cat->id}}" @if($content->type == $cat->id) selected @endif>{{$cat->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>



                            <div class="input-group"><h3 style="float: right">گزینه ها</h3></div>
                            <table class="table-striped " style="width:100%">
                                <tbody class="field_wrapper">
                                <tr>
                                    <th>عنوان گزینه</th>
                                    <th>نوع</th>
                                    <th>حذف</th>
                                </tr>
                                @foreach($content->options as $option)
                                    <tr>
                                        <td>
                                            <input type="text" name="option[title][]" value="{{$option['title']}}" class="form-control">
                                        <td>
                                            <select name="option[type][]" class="option">
                                                <option value="{{ $option['type'] }}">{{$option['type_title']}}</option>
                                            </select>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <a href="javascript:void(0);" class="adddbutton btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>




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
            var options='';
            var maxField = 4; //Input fields increment limitation
            var addButton = $('.adddbutton'); //Add button selector
            var wrapper = $('.field_wrapper'); //Input field wrapper
            var fieldHTML ='<tr><td><input type="text" name="option[title][]"  class="form-control"><td><select class="option" name="option[type][]"  class="form-control">'+options+'</select></td><td><a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a> </td></tr>'; //New input field html
            var x = 0; //Initial field counter is 1
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


            $('.type').on('change',function (e) {


                $.post('{{route('Qcat.get')}}', { id: this.value,_token :'{{ csrf_token() }}'   },
                    function(returnedData){
                        console.log(returnedData);
                        options='';
                        for (var i=0;i<returnedData.length;i++)
                            options += '<option value="'+i+'">'+returnedData[i].title+'</option>';
                        $('.option').html(options);
                        fieldHTML ='<tr><td><input type="text" name="option[title][]"  class="form-control"><td><select class="option" name="option[type][]"  class="form-control">'+options+'</select></td><td><a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a> </td></tr>'; //New input field html
                    }, 'json');

            });

        };
        // });
    </script>
@endsection