@extends('layouts.layout')
@section('header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/js/vendor/jquery-ui/jquery-ui.min.css">
    <style>
        /*font Variables*/
        /*Color Variables*/
        .multi_step_form {
            background: #f6f9fb;
            display: block;
            overflow: hidden;
        }
        .multi_step_form #msform {
            text-align: center;
            position: relative;
            padding-top: 50px;
            min-height: 820px;
            max-width: 810px;
            margin: 0 auto;
            background: #fff;
            z-index: 1;
        }
        .multi_step_form #msform .tittle {
            text-align: center;
            padding-bottom: 55px;
        }
        .multi_step_form #msform .tittle h2 {
            font: 500 24px/35px sans-serif;
            color: #3f4553;
            padding-bottom: 5px;
        }
        .multi_step_form #msform .tittle p {
            font: 400 16px/28px inherit, sans-serif;
            color: #5f6771;
        }
        .multi_step_form #msform fieldset {
            border: 0;
            padding: 20px 105px 0;
            position: relative;
            width: 100%;
            left: 0;
            right: 0;
        }
        .multi_step_form #msform fieldset:not(:first-of-type) {
            display: none;
        }
        .multi_step_form #msform fieldset h3 {
            font: 500 18px/35px sans-serif;
            color: #3f4553;
        }
        .multi_step_form #msform fieldset h6 {
            font: 400 15px/28px sans-serif;
            color: #5f6771;
            padding-bottom: 30px;
        }
        .multi_step_form #msform fieldset .intl-tel-input {
            display: block;
            background: transparent;
            border: 0;
            box-shadow: none;
            outline: none;
        }
        .multi_step_form #msform fieldset .intl-tel-input .flag-container .selected-flag {
            padding: 0 20px;
            background: transparent;
            border: 0;
            box-shadow: none;
            outline: none;
            width: 65px;
        }
        .multi_step_form #msform fieldset .intl-tel-input .flag-container .selected-flag .iti-arrow {
            border: 0;
        }
        .multi_step_form #msform fieldset .intl-tel-input .flag-container .selected-flag .iti-arrow:after {
            content: "\f35f";
            position: absolute;
            top: 0;
            right: 0;
            font: normal normal normal 24px/7px Ionicons;
            color: #5f6771;
        }
        .multi_step_form #msform fieldset #phone {
            padding-left: 80px;
        }
        .multi_step_form #msform fieldset .form-group {
            padding: 0 10px;
        }
        .multi_step_form #msform fieldset .fg_2, .multi_step_form #msform fieldset .fg_3 {
            padding-top: 10px;
            display: block;
            overflow: hidden;
        }
        .multi_step_form #msform fieldset .fg_3 {
            padding-bottom: 70px;
        }
        .multi_step_form #msform fieldset .form-control, .multi_step_form #msform fieldset .product_select {
            border-radius: 3px;
            border: 1px solid #d8e1e7;
            padding: 0 20px;
            height: auto;
            font: 400 15px/48px sans-serif;
            color: #5f6771;
            box-shadow: none;
            outline: none;
            width: 100%;
        }
        .multi_step_form #msform fieldset .form-control.placeholder, .multi_step_form #msform fieldset .product_select.placeholder {
            color: #5f6771;
        }
        .multi_step_form #msform fieldset .form-control:-moz-placeholder, .multi_step_form #msform fieldset .product_select:-moz-placeholder {
            color: #5f6771;
        }
        .multi_step_form #msform fieldset .form-control::-moz-placeholder, .multi_step_form #msform fieldset .product_select::-moz-placeholder {
            color: #5f6771;
        }
        .multi_step_form #msform fieldset .form-control::-webkit-input-placeholder, .multi_step_form #msform fieldset .product_select::-webkit-input-placeholder {
            color: #5f6771;
        }
        .multi_step_form #msform fieldset .form-control:hover, .multi_step_form #msform fieldset .product_select:hover, .multi_step_form #msform fieldset .form-control:focus, .multi_step_form #msform fieldset .product_select:focus {
            border-color: #5cb85c;
        }
        .multi_step_form #msform fieldset .form-control:focus.placeholder, .multi_step_form #msform fieldset .product_select:focus.placeholder {
            color: transparent;
        }
        .multi_step_form #msform fieldset .form-control:focus:-moz-placeholder, .multi_step_form #msform fieldset .product_select:focus:-moz-placeholder {
            color: transparent;
        }
        .multi_step_form #msform fieldset .form-control:focus::-moz-placeholder, .multi_step_form #msform fieldset .product_select:focus::-moz-placeholder {
            color: transparent;
        }
        .multi_step_form #msform fieldset .form-control:focus::-webkit-input-placeholder, .multi_step_form #msform fieldset .product_select:focus::-webkit-input-placeholder {
            color: transparent;
        }
        .multi_step_form #msform fieldset .product_select:after {
            display: none;
        }
        .multi_step_form #msform fieldset .product_select:before {
            content: "\f35f";
            position: absolute;
            top: 0;
            right: 20px;
            font: normal normal normal 24px/48px Ionicons;
            color: #5f6771;
        }
        .multi_step_form #msform fieldset .product_select .list {
            width: 100%;
        }
        .multi_step_form #msform fieldset .done_text {
            padding-top: 40px;
        }
        .multi_step_form #msform fieldset .done_text .don_icon {
            height: 36px;
            width: 36px;
            line-height: 36px;
            font-size: 22px;
            margin-bottom: 10px;
            background: #5cb85c;
            display: inline-block;
            border-radius: 50%;
            color: #fff;
            text-align: center;
        }
        .multi_step_form #msform fieldset .done_text h6 {
            line-height: 23px;
        }
        .multi_step_form #msform fieldset .code_group {
            margin-bottom: 60px;
        }
        .multi_step_form #msform fieldset .code_group .form-control {
            border: 0;
            border-bottom: 1px solid #a1a7ac;
            border-radius: 0;
            display: inline-block;
            width: 30px;
            font-size: 30px;
            color: #5f6771;
            padding: 0;
            margin-right: 7px;
            text-align: center;
            line-height: 1;
        }
        .multi_step_form #msform fieldset .passport {
            margin-top: -10px;
            padding-bottom: 30px;
            position: relative;
        }
        .multi_step_form #msform fieldset .passport .don_icon {
            height: 36px;
            width: 36px;
            line-height: 36px;
            font-size: 22px;
            position: absolute;
            top: 4px;
            right: 0;
            background: #5cb85c;
            display: inline-block;
            border-radius: 50%;
            color: #fff;
            text-align: center;
        }
        .multi_step_form #msform fieldset .passport h4 {
            font: 500 15px/23px 'Roboto', sans-serif;
            color: #5f6771;
            padding: 0;
        }
        .multi_step_form #msform fieldset .input-group {
            padding-bottom: 40px;
        }
        .multi_step_form #msform fieldset .input-group .custom-file {
            width: 100%;
            height: auto;
        }
        .multi_step_form #msform fieldset .input-group .custom-file .custom-file-label {
            width: 168px;
            border-radius: 5px;
            cursor: pointer;
            font: 700 14px/40px 'Roboto', sans-serif;
            border: 1px solid #99a2a8;
            text-align: center;
            transition: all 300ms linear 0s;
            color: #5f6771;
        }
        .multi_step_form #msform fieldset .input-group .custom-file .custom-file-label i {
            font-size: 20px;
            padding-right: 10px;
        }
        .multi_step_form #msform fieldset .input-group .custom-file .custom-file-label:hover, .multi_step_form #msform fieldset .input-group .custom-file .custom-file-label:focus {
            background: #5cb85c;
            border-color: #5cb85c;
            color: #fff;
        }
        .multi_step_form #msform fieldset .input-group .custom-file input {
            display: none;
        }
        .multi_step_form #msform fieldset .file_added {
            text-align: left;
            padding-left: 190px;
            padding-bottom: 60px;
        }
        .multi_step_form #msform fieldset .file_added li {
            font: 400 15px/28px 'Roboto', sans-serif;
            color: #5f6771;
        }
        .multi_step_form #msform fieldset .file_added li a {
            color: #5cb85c;
            font-weight: 500;
            display: inline-block;
            position: relative;
            padding-left: 15px;
        }
        .multi_step_form #msform fieldset .file_added li a i {
            font-size: 22px;
            padding-right: 8px;
            position: absolute;
            left: 0;
            transform: rotate(20deg);
        }
        .multi_step_form #msform #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
        }
        .multi_step_form #msform #progressbar li {
            list-style-type: none;
            color: #99a2a8;
            font-size: 9px;
            width: calc(100%/@auth 2 @elseauth 3 @endauth );
            float: left;
            position: relative;
            font: 500 13px/1 'Roboto', sans-serif;
            text-align: center;
        }
        .multi_step_form #msform #progressbar li:nth-child(2):before {
            content: "\f084";
            font-family: "Font Awesome 5 Free";

        }
        .multi_step_form #msform #progressbar li:nth-child(3):before {
            content: "\f03e";
            font-family: "Font Awesome 5 Free";
        }
        .multi_step_form #msform #progressbar li:before {
            content: "\f298";
            font: normal normal normal 30px/50px "Font Awesome 5 Free";
            width: 50px;
            height: 50px;
            line-height: 50px;
            display: block;
            background: #eaf0f4;
            border-radius: 50%;
            margin: 0 auto 10px auto;
        }
        .multi_step_form #msform #progressbar li:after {
            content: '';
            width: 100%;
            height: 10px;
            background: #eaf0f4;
            position: absolute;
            left: -50%;
            top: 21px;
            z-index: -1;
        }
        .multi_step_form #msform #progressbar li:last-child:after {
            width: 150%;
        }
        .multi_step_form #msform #progressbar li.active {
            color: #5cb85c;
        }
        .multi_step_form #msform #progressbar li.active:before, .multi_step_form #msform #progressbar li.active:after {
            background: #5cb85c;
            color: white;
        }
        .multi_step_form #msform .action-button {
            background: #5cb85c;
            color: white;
            border: 0 none;
            border-radius: 5px;
            cursor: pointer;
            min-width: 130px;
            font: 700 14px/40px 'Roboto', sans-serif;
            border: 1px solid #5cb85c;
            margin: 0 5px;
            text-transform: uppercase;
            display: inline-block;
        }
        .multi_step_form #msform .action-button:hover, .multi_step_form #msform .action-button:focus {
            background: #405867;
            border-color: #405867;
        }
        .multi_step_form #msform .previous_button {
            background: transparent;
            color: #99a2a8;
            border-color: #99a2a8;
        }
        .multi_step_form #msform .previous_button:hover, .multi_step_form #msform .previous_button:focus {
            background: #405867;
            border-color: #405867;
            color: #fff;
        }
        .dial {
            position: relative;
            width: 350px;
            height: 350px;
            background: #ececec;
            border: 12px solid #5c5c5c;
            border-radius: 50%;
            margin: 8% auto 0;
            box-shadow: 1px 14px 21px 0 rgba(0,0,0,.2);
        }


        .dot {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            margin: auto;
            width: 16px;
            height: 16px;
            border-radius: 50%;
            background: radial-gradient(ellipse 20px 15px at 50% 0, #ececec 40%, #5c5c5c 80%);
            z-index: 10;
            box-shadow: 0 2px 5px 0 rgba(0,0,0,.3);
        }

        .sec-hand {
            position: absolute;
            top: 39px;
            left: 50%;
            margin-left: -7px;
            width: 14px;
            height: 162px;
            background: url('https://themegion.github.com/AnalogClock/sec.svg') 50% 50% no-repeat;
            z-index: 9;
            transform-origin: 50% 136px;
        }

        .sec-hand.shadow {
            top: 46px;
            margin-left: -4px;
            background-image: url('https://themegion.github.com/AnalogClock/sec-shdw.svg');
            opacity: .1;
            z-index: 8;
            filter: blur(2px);
        }

        .min-hand {
            position: absolute;
            top: 41px;
            left: 50%;
            margin-left: -8px;
            width: 16px;
            height: 144px;
            background: url('https://themegion.github.com/AnalogClock/min.svg') 50% 50% no-repeat;
            z-index: 7;
            transform-origin: 50% 124px;
        }

        .min-hand.shadow {
            top: 48px;
            margin-left: -5px;
            background-image: url('https://themegion.github.com/AnalogClock/min-shdw.svg');
            opacity: .1;
            z-index: 6;
            filter: blur(2px);
        }

        .hour-hand {
            position: absolute;
            top: 75px;
            left: 50%;
            margin-left: -7px;
            width: 14px;
            height: 110px;
            background: url('https://themegion.github.com/AnalogClock/hour.svg') 50% 50% no-repeat;
            z-index: 5;
            transform-origin: 50% 90px;
        }

        .hour-hand.shadow {
            top: 82px;
            margin-left: -4px;
            background-image: url('https://themegion.github.com/AnalogClock/hour-shdw.svg');
            opacity: .1;
            z-index: 4;
            filter: blur(2px);
        }

        .twelve,
        .three,
        .six,
        .nine {
            position: absolute;
            font-family: Lato, sans-serif;
            font-size: 32px;
            color: #777;
        }

        .twelve {
            top: 35px;
            left: 145px;
        }

        .three {
            top: 156px;
            right: 39px;
        }

        .six {
            left: 155px;
            bottom: 35px;
        }

        .nine {
            top: 156px;
            left: 39px;
        }

        .diallines {
            position: absolute;
            top: 0px;
            left: 50%;
            margin-left: -1px;
            width: 2px;
            height: 10px;
            background: #b3b3b0;
            z-index: 1;
            transform-origin: 50% 160px;
        }

        .diallines:nth-of-type(5n) {
            position: absolute;
            top: 0px;
            left: 50%;
            margin-left: -2px;
            width: 4px;
            height: 25px;
            background: #b3b3b0;
            z-index: 1;
            transform-origin: 50% 160px;
        }

        .date {
            position: absolute;
            top: 242px;
            left: 50%;
            margin-left: -18px;
            width: 36px;
            height: 30px;
            background: #83837a;
            border-radius: 6px;
            font-family: 'Fjalla One', sans-serif;
            font-size: 21px;
            line-height: 30px;
            color: white;
            text-align: center;
            box-shadow: inset 0 2px 2px 0 rgba(0,0,0,.3), inset 0 -2px 2px 0 rgba(255,255,255,.2);
        }
    </style>
@endsection
@section('content')
    <section id="content">

        <div class="page page-dashboard">

            <div class="pageheader">

                <h2><span></span></h2>

                <div class="page-bar">

                    {{--                    <ul class="page-breadcrumb">--}}
                    {{--                        <li>--}}
                    {{--                            <a href="index.html"><i class="fa fa-home"></i> پنل مدیریت </a>--}}
                    {{--                        </li>--}}
                    {{--                        <li>--}}
                    {{--                            <a href="">{{ $class::getName() }}</a>--}}
                    {{--                        </li>--}}
                    {{--                    </ul>--}}


                </div>

            </div>

            <!-- cards row -->
            <div class="container" >

                @if(session()->has('message'))
                    <br>
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <br>
                <div class="inner" style="min-height: 565px;">
                    <section class="multi_step_form">
                        <form id="msform" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <!-- Tittle -->
                            <!-- progressbar -->
                            <ul id="progressbar">
                                <li class="active">اطلاعات اگهی</li>
                                @guest
                                <li>ورود/ثبت نام</li>
                                @endguest
                                <li>عکس</li>
                            </ul>

                            <!-- fieldsets -->
                            <fieldset>
                                <h3>اطلاعات اگهی</h3>
                                <div class="row">
                                    <div class="col-sm-12 form-group title">
                                        <label for="title">نام</label>
                                        <input type="text" name="title" id="title" value="{{ old('title') }}" class="form-control">
                                    </div>
                                    <div class="form-group required col-sm-4">
                                        <label for="input-zone" class="control-label">شهر / استان</label>
                                        <select id="province_id" class="form-control" name="province_id"
                                                data-action="{{ route('getcities',['id' => null]).'/' }}">
                                            <option>استان را انتخاب کنید</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->id}}"
                                                        @if($province->id == old('province_id')) selected @endif>{{$province->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group required col-sm-4">
                                        <label for="input-zone" class="control-label">شهر</label>
                                        <select id="city_id" class="form-control" name="city_id" data-selected="{{old('city_id')}}">
                                            <option>شهر را انتخاب کنید</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="brand_id">برند</label>
                                        <select name="brand_id" id="brand_id" class="form-control" tabindex="-1" aria-hidden="true">
                                            <option value="">--انتخاب--</option>
                                            @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" @if(old('brand_id') == $brand->id) selected @endif>{{ $brand->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    
                                    
                                    <div class="col-sm-4 form-group">
                                        <label for="collection_id">کالکشن</label>
                                        <select name="collection_id" id="collection_id" class="form-control" tabindex="-1" aria-hidden="true">
                                            <option value="">--انتخاب--</option>

                                        </select>
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="status">وضعیت</label>
                                        <select name="status" id="status" class="form-control" tabindex="-1" aria-hidden="true">
                                            <option value="">--انتخاب--</option>
                                            <option value="0" @if(old('status') == 0) selected @endif>نو</option>
                                            <option value="1"@if(old('status') == 1) selected @endif>در حد نو</option>
                                            <option value="2"@if(old('status') == 2) selected @endif>کارکرده</option>

                                        </select>
                                    </div>
                                    
                                    
                                    <div class="col-sm-4 form-group">
                                        <label for="product_id">محصول</label>
                                        <select name="product_id" id="product_id" class="form-control" tabindex="-1" aria-hidden="true">
                                            <option value="">--انتخاب--</option>

                                        </select>
                                    </div>
                                    
                                    
                                    <div class="col-sm-12 form-group reference">
                                        <label for="reference">رفرنس</label>
                                        <input type="text" name="reference" id="reference" value="{{ old('reference') }}" class="form-control">
                                    </div>
                                    <div class="col-sm-12 form-group serial">
                                        <label for="serial">سریال</label>
                                        <input type="text" name="serial" id="serial" value="{{ old('serial') }}" class="form-control">
                                    </div>

                                    
                                    
                                    <div class="col-sm-12 form-group">
                                        <label for="description">توضیحات</label>
                                        <textarea name="description" id="description" class="form-control" style="visibility: hidden; display: none;">{{ old('description') }}</textarea>
                                    </div>
                                    <div class="col-sm-12 form-group price">
                                        <label for="price">قیمت</label>
                                        <input type="text" name="price" id="price" value="{{ old('price') }}" class="form-control">
                                    </div>
                                    <div class="col-sm-4 form-group">
                                        <label for="guarantee">گارانتی</label>
                                        <select name="guarantee" id="guarantee" class="form-control" tabindex="-1" aria-hidden="true">
                                            <option value="">--انتخاب--</option>
                                            <option value="0" @if(old('guarantee') == 0) selected @endif>دارد</option>
                                            <option value="1" @if(old('guarantee') == 1) selected @endif>ندارد</option>

                                        </select>
                                    </div>
                                    
                                    
                                    <div class="col-sm-4 form-group">
                                        <label for="box">جعبه</label>
                                        <select name="box" id="box" class="form-control" tabindex="-1" aria-hidden="true">
                                            <option value="">--انتخاب--</option>
                                            <option value="0" @if(old('box') == 0) selected @endif>دارد</option>
                                            <option value="1" @if(old('box') == 1) selected @endif>ندارد</option>

                                        </select>
                                    </div>
                                    
                                    
                                    <div class="col-sm-12 form-group tell">
                                        <label for="tell">تلفن</label>
                                        <input type="text" name="tell" id="tell" value="{{ old('tell') }}" class="form-control">
                                    </div>
                                    @auth
                                    <div class="col-sm-12 form-group email">
                                        <label for="email">ایمیل</label>
                                        <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control">
                                    </div>
                                    @endauth


                                </div>
                                <button type="button" class="next action-button">بعدی</button>
                            </fieldset>
                            @guest
                            <fieldset>
                                <h3>ثبت نام یا ورود</h3>
                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="bg-second p-3 shadow mb-3">اگر حساب کاربری ندارید ثبت نام کنید</div>
                                        <div class="form-group required {{ $errors->has('username') ? ' has-error' : '' }}">
                                            <label for="input-firstname" class="control-label">نام کاربری</label>
                                            <input class="form-control" id="input-username" placeholder="نام کاربری"
                                                   value="{{ old('username') }}" name="username" type="text">
                                            @if ($errors->has('username'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group {{ $errors->has('firstname') ? ' has-error' : '' }}">
                                            <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                                            <input class="form-control" id="input-firstname" placeholder="نام"
                                                   value="{{ old('firstname') }}" name="firstname" type="text">
                                            @if ($errors->has('firstname'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                            @endif
                                        </div>


                                        <div class="form-group required {{ $errors->has('lastname') ? ' has-error' : '' }}">
                                            <label for="input-firstname" class="control-label"> نام خانوادگی</label>
                                            <input class="form-control" id="input-lastname" placeholder="نام خانوادگی"
                                                   value="{{ old('lastname') }}" name="lastname" type="text">
                                            @if ($errors->has('lastname'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                            @endif
                                        </div>
{{--                                        <div class="form-group required {{ $errors->has('mobile') ? ' has-error' : '' }}">--}}
{{--                                            <label for="input-lastname" class=" control-label">تلفن همراه</label>--}}
{{--                                            <input class="form-control" id="input-lastname" placeholder="تلفن همراه" name="mobile"--}}
{{--                                                   value="{{ old('mobile') }}" type="text">--}}
{{--                                            @if ($errors->has('mobile'))--}}
{{--                                                <span class="help-block">--}}
{{--                                                <strong>{{ $errors->first('mobile') }}</strong>--}}
{{--                                            </span>--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
                                        <div class="form-group required {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label for="input-email" class="control-label">آدرس ایمیل</label>
                                            <input class="form-control" id="input-email" placeholder="آدرس ایمیل" value="{{ old('email') }}"
                                                   name="email" type="email">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label for="input-fax" class="control-label">فکس</label>
                                            <input class="form-control" id="input-fax" placeholder="فکس" value="{{old('fax')}}" name="fax"
                                                   type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="input-company" class="control-label">شرکت</label>
                                            <input class="form-control" id="input-company" placeholder="شرکت" value="{{old('company')}}"
                                                   name="company" type="text">
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-address-1" class="control-label">آدرس</label>
                                            <input class="form-control" id="input-address-1" placeholder="آدرس" value="{{old('address')}}"
                                                   name="address" type="text">
                                        </div>
                                        <div class="form-group required">
                                            <label for="input-postcode" class="control-label">کد پستی</label>
                                            <input class="form-control" id="input-postcode" placeholder="کد پستی"
                                                   value="{{old('postcode')}}" name="postcode" type="text">
                                        </div>
                                        <div class="form-group required {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <label for="input-password" class="control-label">رمز عبور</label>
                                            <input class="form-control" id="input-password" placeholder="رمز عبور" value="" name="password"
                                                   type="password">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="control-label mb-2">اشتراک خبرنامه</div>
                                            <label class="radio-inline">
                                                <input value="1" name="newsletter" type="radio">
                                                بله</label>
                                            <label class="radio-inline">
                                                <input checked="checked" value="0" name="newsletter" type="radio">
                                                نه</label>
                                        </div>
                                        <div class="custom-control custom-checkbox mb-4">
                                            <input value="1" name="agree" type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                            <label class="custom-control-label" for="defaultUnchecked">من سیاست حریم خصوصی را خوانده ام و با آن موافق هستم</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">

                                        <div class="bg-second p-3 shadow mb-3">وارد شوید</div>
                                        <div class="form-group">
                                            <label class="control-label {{ $errors->has('email') ? ' has-error' : '' }}" for="input-email">ایمیل</label>
                                            <input type="text" name="email" value="{{ old('email') }}" placeholder="آدرس ایمیل"
                                                   id="input-email" class="form-control">
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label {{ $errors->has('password') ? ' has-error' : '' }}"
                                                   for="input-password">رمز ورود</label>
                                            <input type="password" name="password" value="" placeholder="رمز عبور" id="input-password"
                                                   class="form-control">
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-3 ">
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}><span
                                                                class="pr-2"> مرا بخاطر بسپار</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="{{ route('password.request') }}"
                                           class="sweep-to-left sweep-to-left-border-dark shadow d-block mt-3"> فراموشی رمز عبور </a>
                                    </div>
                                </div>
                                <button type="button" class="action-button previous previous_button">بازگشت</button>
                                <button type="button" class="next action-button">بعدی</button>
                            </fieldset>
                            @endguest
                            <fieldset>
                                <h3>تاییدیه ساعت</h3>
                                <h6>ساعت را روی ساعت های زیر تنظیم کنید و از ان عکس بگیرید</h6>
                                @foreach($clocks as $key => $clock)

                                <div class="dial" id="clock{{$key}}">
                                    <div class="dot"></div>
                                    <div class="min-hand"></div>
                                    <div class="min-hand shadow"></div>
                                    <div class="hour-hand"></div>
                                    <div class="hour-hand shadow"></div>
                                    <span class="twelve">12</span>
                                    <span class="three">3</span>
                                    <span class="six">6</span>
                                    <span class="nine">9</span>
                                    <span class="diallines"></span>
                                </div>
                                    <div class="well" data-bind="fileDrag: fileData">
                                        <div class="form-group row">
                                            <input type="file" accept="image/*" name="image[{{ $key }}]">
                                        </div>
                                    </div>
                                @endforeach
                                <button type="button" class="action-button previous previous_button">بازگشت</button>
                                <button type="submit" class="action-button">ارسال</button>
                            </fieldset>
                        </form>
                    </section>
                    <div class="row">

                        <section id="lts_sec " class="right" style="margin: 0px auto">

                            <div class="container ">
                                <div class="row ">
                                    <!-- Multi step form -->

                                    <!-- End Multi step form -->
                                </div>


                            </div>


                        </section>
                    </div>
                </div>
            </div>


            <div class="modal fade large-modal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body">
                            <p></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="c-btn large red-bg" data-dismiss="modal">بستن</button>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </section>


@endsection
@section('script')
    <script src="/assets/plugins/ckeditor/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script src="/assets/js/vendor/jquery-ui/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function () {


            function tick(id,hours,minutes) {
                var seconds = 0;
                var dialLines = $(id).find('.diallines');
                for (var i = 1; i < 60; i++) {
                    dialLines[i] = $(dialLines[i-1]).clone()
                        .insertAfter($(dialLines[i-1]));
                    $(dialLines[i]).css('transform', 'rotate(' + 6 * i + 'deg)');
                }
                var secAngle = seconds * 6;
                var minAngle = minutes * 6 + seconds * (360/3600);
                var hourAngle = hours * 30 + minutes * (360/720);

                $(id).find('.sec-hand').css('transform', 'rotate(' + secAngle + 'deg)');
                $(id).find('.min-hand').css('transform', 'rotate(' + minAngle + 'deg)');
                $(id).find('.hour-hand').css('transform', 'rotate(' + hourAngle + 'deg)');
            }
            @foreach($clocks as $key => $clock)
                tick('#clock{{ $key }}', {{ $clock['hour'] }},{{ $clock['min'] }});
            @endforeach
            $('#box').select2();
            $('#guarantee').select2();
            $('#status').select2();
            $('#product_id').select2();
            $('#brand_id').select2();
            $('#province_id').select2();
            $('#city_id').select2();
            $('#collection_id').select2();


            function getcollection_id()
            {

                selected_collection_id = {{ old('collection_id',0) }};

                $('#collection_id').html('').fadeIn(800).append('<option>لطفا کمی صبر کنید ...</option>');

                $.ajax({
                    type: "GET",
                    url: '/getcollection',
                    data: {
                        'brand_id' : $('#brand_id').val()
                    },
                    dataType : 'json',
                    async: false,
                    success: function(data)
                    {

                        $('#collection_id').html('').fadeIn(800).append('<option>انتخاب</option>');
                        $.each(data, function(i, value){
                            if(selected_collection_id == i)
                                $('#collection_id').append('<option value="' + i + '" selected>' + value + '</option>');
                            else
                                $('#collection_id').append('<option value="' + i + '">' + value + '</option>');
                        });
                    },
                    error : function(data)
                    {
                        console.log('get collection_id field has error');
                    }
                });

                return false; // avoid to execute the actual submit of the form.
            }
            @if(old('brand_id'))
                getcollection_id();
            @endif

            $(document).on('change', '#brand_id', function (e) {
                getcollection_id();

            });
            function getproduct_id()
            {

                selected_product_id = {{ old('collection_id',0) }};









                $('#product_id').html('').fadeIn(800).append('<option>لطفا کمی صبر کنید ...</option>');

                $.ajax({
                    type: "GET",
                    url: '/getproduct',
                    data: {
                        'collection_id' : $('#collection_id').val()
                    },
                    dataType : 'json',
                    async: false,
                    success: function(data)
                    {

                        $('#product_id').html('').fadeIn(800).append('<option>انتخاب</option>');
                        $.each(data, function(i, value){
                            if(selected_product_id == i)
                                $('#product_id').append('<option value="' + i + '" selected>' + value + '</option>');
                            else
                                $('#product_id').append('<option value="' + i + '">' + value + '</option>');
                        });
                    },
                    error : function(data)
                    {
                        console.log('get product_id field has error');
                    }
                });

                return false; // avoid to execute the actual submit of the form.
            }
            @if(old('collection_id'))
            getproduct_id();
            @endif
            $(document).on('change', '#collection_id', function (e) {
                getproduct_id();

            });
            function getCities(th) {

                selected_city = $('#city').attr('data-selected') || null;


                $('#city').html('').fadeIn(800).append('<option>لطفا کمی صبر کنید ...</option>');

                $.ajax({
                    type: "GET",
                    url: $(th).data('action') + $(th).val(),
                    dataType: 'json',
                    success: function (data) {

                        $('#city').html('').fadeIn(800).append('<option>انتخاب شهر</option>');
                        $.each(data, function (i, city) {
                            if (selected_city == city.id)
                                $('#city').append('<option value="' + city.id + '" selected>' + city.name + '</option>');
                            else
                                $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                        });
                    },
                    error: function (data) {
                        console.log('province_city.js#getCities function error: #line : 30');
                    }
                });


                return false; // avoid to execute the actual submit of the form.
            }
            function getCities2(th) {

                selected_city = $('#city').attr('data-selected') || null;


                $('#city_id').html('').fadeIn(800).append('<option>لطفا کمی صبر کنید ...</option>');

                $.ajax({
                    type: "GET",
                    url: $(th).data('action') + $(th).val(),
                    dataType: 'json',
                    success: function (data) {

                        $('#city_id').html('').fadeIn(800).append('<option>انتخاب شهر</option>');
                        $.each(data, function (i, city) {
                            if (selected_city == city.id)
                                $('#city_id').append('<option value="' + city.id + '" selected>' + city.name + '</option>');
                            else
                                $('#city_id').append('<option value="' + city.id + '">' + city.name + '</option>');
                        });
                    },
                    error: function (data) {
                        console.log('province_city.js#getCities function error: #line : 30');
                    }
                });


                return false; // avoid to execute the actual submit of the form.
            }


            $('#province').select2();
            $('#city').select2();
            $('#province_id').select2();
            $('#city_id').select2();
            @if(old('province_id'))
            getCities($('#province'));
            getCities2($('#province_id'));
            @endif


            $(document).on('change', '#province', function (e) {
                getCities(this);
//            $(this).siblings('.city').select2();

            });
            $(document).on('change', '#province_id', function (e) {
                getCities2(this);
//            $(this).siblings('.city').select2();

            });
            CKEDITOR.replace( 'description');
        });
        ;(function($) {
            "use strict";

            //* Form js
            function verificationForm(){
                //jQuery time
                var current_fs, next_fs, previous_fs; //fieldsets
                var left, opacity, scale; //fieldset properties which we will animate
                var animating; //flag to prevent quick multi-click glitches

                $(".next").click(function () {
                    if (animating) return false;
                    animating = true;

                    current_fs = $(this).parent();
                    next_fs = $(this).parent().next();

                    //activate next step on progressbar using the index of next_fs
                    $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                    //show the next fieldset
                    next_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function (now, mx) {
                            //as the opacity of current_fs reduces to 0 - stored in "now"
                            //1. scale current_fs down to 80%
                            scale = 1 - (1 - now) * 0.2;
                            //2. bring next_fs from the right(50%)
                            left = (now * 50) + "%";
                            //3. increase opacity of next_fs to 1 as it moves in
                            opacity = 1 - now;
                            current_fs.css({
                                'transform': 'scale(' + scale + ')',
                                'position': 'relative'
                            });
                            next_fs.css({
                                'left': left,
                                'opacity': opacity
                            });
                        },
                        duration: 800,
                        complete: function () {
                            current_fs.hide();
                            animating = false;
                        },
                        //this comes from the custom easing plugin
                        easing: 'easeInOutBack'
                    });
                });

                $(".previous").click(function () {
                    if (animating) return false;
                    animating = true;

                    current_fs = $(this).parent();
                    previous_fs = $(this).parent().prev();

                    //de-activate current step on progressbar
                    $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                    //show the previous fieldset
                    previous_fs.show();
                    //hide the current fieldset with style
                    current_fs.animate({
                        opacity: 0
                    }, {
                        step: function (now, mx) {
                            //as the opacity of current_fs reduces to 0 - stored in "now"
                            //1. scale previous_fs from 80% to 100%
                            scale = 0.8 + (1 - now) * 0.2;
                            //2. take current_fs to the right(50%) - from 0%
                            left = ((1 - now) * 50) + "%";
                            //3. increase opacity of previous_fs to 1 as it moves in
                            opacity = 1 - now;
                            current_fs.css({
                                'left': left
                            });
                            previous_fs.css({
                                'transform': 'scale(' + scale + ')',
                                'opacity': opacity
                            });
                        },
                        duration: 800,
                        complete: function () {
                            current_fs.hide();
                            animating = false;
                        },
                        //this comes from the custom easing plugin
                        easing: 'easeInOutBack'
                    });
                });

                $(".submit").click(function () {
                    return false;
                })
            };

            /*Function Calls*/
            verificationForm ();

        })(jQuery);
    </script>
@endsection