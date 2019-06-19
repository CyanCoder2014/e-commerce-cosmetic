@extends('layouts.layout')


@section('header')
    <title>مدیر جو | مدیریت انگیزه</title>
    <meta name="description"
          content="فروش بسته های آموزشی انگیره | شناخت اهمیت انگیزه و راهکارهای آموزشی افزایش انگیزه مدیران، دانشجویان، دانش آموزان و ..."/>
@endsection



@section('content')

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>



        .content {
            margin: 250px 0px 300px 0px;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            font-weight: 100;
            font-family: 'Lato';
            vertical-align: middle;
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
            line-height: 1;
        }
    </style>

    <div id="container mb-5 ">
        <div class="container mt-4 mb-5 pb-5">
            <div class="row">
                <!--Middle Part Start-->
                <div id="content" class="col-sm-12">
                    <h1 class="title-404 text-center">404</h1>
                    <p class="text-center lead">با عرض پوزش!<br>
                        صفحه ی مورد نظرتان را پیدا نکردیم! </p>
                    <div class="buttons text-center"> <a class="btn btn-primary btn-lg" href="{{url('/')}}">ادامه</a> </div>
                </div>
                <!--Middle Part End -->
            </div>
        </div>
    </div>


    @endsection