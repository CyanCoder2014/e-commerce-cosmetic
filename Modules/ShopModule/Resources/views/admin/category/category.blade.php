@extends('layouts.admin')
@section('content')


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
                            <a href="#"> مدیریت دسته بندی محصولات</a>
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
                                        @can('add brand')
                                        <a data-toggle="modal" data-target=".add-page" style="float: left" class="btn btn-primary"><i class="fa fa-plus"></i> افزودن دسته بندی </a>
                                        @endcan
                                        <h3>مدیریت  دسته بندی محصولات </h3>
                                    </div>
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    <br>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover"
                                               id="dataTables-example">
                                            <thead>
                                            <tr>
                                                <th style="text-align: center">&nbsp;نام</th>
                                                <th style="text-align: center">&nbsp;تاریخ انتشار</th>
                                                <th style="text-align: center"> سر دسته</th>
                                                <th style="text-align: center"> ویرایش</th>
                                                <th style="text-align: center">حذف</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($categories as $cat)
                                                <tr class="odd gradeX">
                                                    <th style="text-align: center"> &nbsp; {{$cat->name}}</th>
                                                    <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($cat->created_at) !!}</th>
                                                    <th style="text-align: center; font-weight: 100">
                                                        @if($cat->parent_id != 0)
                                                            @foreach($categories as $parent)
                                                                @if($cat->parent_id == $parent->id)
                                                                    {{$parent->name}}
                                                                @endif
                                                            @endforeach
                                                        @endif
                                                    </th>
                                                    <th style="text-align: center; font-weight: 100">
                                                        @can('edit brand')
                                                        <a data-toggle="modal" data-target=".edit-page-{{$cat->id}}" class="btn btn-warning "><i class="fa fa-edit"></i></a>
                                                        @endcan
                                                    </th>
                                                    <th style="text-align: center; font-weight: 100">
                                                        @can('delete brand')
                                                        <a onclick="return confirm('آیا از حذف این دسته بندی مطمئن هستید؟');"  href="{{ route('pcategory.delete',['id' =>$cat->id]) }}" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                                        @endcan
                                                    </th>



                                                </tr>





                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <br><br>
                        </div>

                    </section>
                </div>
            </div>
        </div>







        @can('add brand')
        <div class="modal fade add-page" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>

                    <form name="_token" method="POST" enctype="multipart/form-data"
                          action="{{route('pcategory.add')}}">
                        {{ csrf_field() }}
                        <div class="modal-body" >

                            <input type="hidden" name="_token" value="{{ csrf_token() }} ">


                            <div class="col-md-6" style="float: right">
                                <div class="input-group"><p style="float: right">  عنوان دسته بندی</p>
                                    <input required name="name" type="text" value="" class="form-control">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="sec"><p> دسته </p>
                                    <select class="form-control" name="parent_id">
                                        <option value="0" >سر دسته </option>
                                        @foreach($categories as $parent)
                                            <option value="{{$parent->id}}">{{$parent->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

                        </div>
                        <div class="modal-footer" >
                            <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                            <button  type="submit"  name="_token" value="{{ csrf_token() }}" class="btn  blue-bg">ثبت</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endcan




        @can('edit brand')
        @foreach($categories as $cat)

            <div class="modal fade edit-page-{{$cat->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>

                        <form name="_token" method="POST" enctype="multipart/form-data"
                              action="{{ route('pcategory.update',['id' =>$cat->id]) }}">
                            {{ csrf_field() }}
                            <div class="modal-body">


                                <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                                <div class="col-md-6" style="float: right">
                                    <div class="input-group"><p style="float: right">  عنوان فارسی دسته بندی</p>
                                        <input required name="name" type="text" value="{{$cat->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="sec"><p> دسته</p>
                                        <select class="form-control" name="parent_id">
                                            <option value="0"> سر دسته</option>
                                            @foreach($categories as $parent)
                                                @if($parent->id != $cat->id)
                                                    <option @if($parent->id == $cat->parent_id) selected @endif
                                                    value="{{$parent->id}}">{{$parent->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                            </div>
                            <div class="modal-footer" >
                                <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                                <button  type="submit"  name="_token" value="{{ csrf_token() }}" class="btn  blue-bg">ثبت</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

    </section>



    @endforeach
    @endcan
@endsection