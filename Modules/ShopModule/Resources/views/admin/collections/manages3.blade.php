@extends('layouts.admin')

<?php $fileCount=0 ?>
@section('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
    <script src="/vendor/laravel-filemanager/js/lfm.js"></script>
    <script>
$('.lfm').filemanager('file');
    </script>
@endsection
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
                        <a href="#"> مدیریت کالکشن ها</a>
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
                                    @can('add provider')
                                    <a href="{{route('providers.create')}}" style="float: left" class="btn btn-primary"><i class="fa fa-plus"></i> افزودن کالکشن </a>
                                    @endcan
                                    <h3>مدیریت  کالکشن ها </h3>
                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-custom"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">&nbsp;شماره</th>
                                            <th style="text-align: center">&nbsp;عنوان کالکشن</th>

                                            <th style="text-align: center"> ویرایش</th>
                                            <th style="text-align: center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($providers as $provider)
                                            <tr class="odd gradeX">
                                                <th style="text-align: center">{{ $provider->id }}</th>
                                                <th style="text-align: center">
                                                    {{$provider->name}}
                                                </th>

                                                <th style="text-align: center; font-weight: 100">
                                                    @can('edit provider')
                                                    <a href="{{route('providers.edit', $provider->id)}}" class="btn btn-warning "><i class="fa fa-edit"></i></a>
                                                    @endcan
                                                </th>
                                                <th style="text-align: center; font-weight: 100">
                                                    @can('delete provider')
                                                    <a onclick="return confirm('آیا از حذف این تولیدکننده مطمئن هستید؟');"  href="{{ route('providers.delete',['id' =>$provider->id]) }}" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                                    @endcan

                                                </th>



                                            </tr>





                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{$providers->links()}}
                        <br><br>
                    </div>

                </section>
            </div>
        </div>
    </div>












</section>
@endsection