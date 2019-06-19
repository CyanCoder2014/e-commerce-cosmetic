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
                            <a href="#"> مدیریت محتوا</a>
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
                                    @can('add content')
                                    <a data-toggle="modal" href="{{route('content.add')}}" style="float: left" class="btn btn-primary"><i class="fa fa-plus"></i> افزودن صفحه </a>
                                    @endcan
                                    <h3>مدیریت  مطالب </h3>
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
                                            <th style="text-align: center">&nbsp;عنوان مطلب</th>
                                            <th style="text-align: center">&nbsp;تاریخ انتشار</th>
                                            <th style="text-align: center"> لینک مطلب</th>
                                            <th style="text-align: center"> ویرایش</th>
                                            <th style="text-align: center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($contents as $content)
                                            <tr class="odd gradeX">
                                                <th style="text-align: center"> &nbsp;
                                                    <ul>
                                                        <li>
                                                            <a target="_blank" href="{{ '/fa/content/show/'.'321'.'-'.$content->id.'-'.str_replace(" ","-",$content->title['fa']) }}">{{$content->title['fa']}} </a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="{{ '/en/content/show/'.'321'.'-'.$content->id.'-'.str_replace(" ","-",$content->title['en']) }}">{{$content->title['en']}} </a>
                                                        </li>
                                                    </ul>
                                                </th>
                                                <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($content->created_at) !!}</th>
                                                <th style="text-align: center; font-weight: 100">
                                                    <ul>
                                                        <li>
                                                            <a target="_blank" href="{{ '/fa/content/show/'.'321'.'-'.$content->id.'-'.str_replace(" ","-",$content->title['fa']) }}">فارسی</a>
                                                        </li>
                                                        <li>
                                                            <a target="_blank" href="{{ '/en/content/show/'.'321'.'-'.$content->id.'-'.str_replace(" ","-",$content->title['en']) }}">انگلیسی </a>
                                                        </li>
                                                    </ul>
                                                </th>
                                               <th style="text-align: center; font-weight: 100">
                                                   @can('edit content')
                                                   <a data-toggle="modal" href="{{route('content.edit' , ['id' => $content->id])}}" class="btn btn-warning "><i class="fa fa-edit"></i></a>
                                                   @endcan
                                               </th>
                                                <th style="text-align: center; font-weight: 100">
                                                    @can('delete content')
                                                    @if($content->id >= 4)
                                                    <a onclick="return confirm('آیا از حذف این مطلب مطمئن هستید؟');"  href="<?= Url('content/admin/content/delete/'.$content->id); ?>" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                                    @endif
                                                    @endcan
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









@endsection