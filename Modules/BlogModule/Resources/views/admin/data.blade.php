@extends('layouts.admin')
@section('content')
    <div id="" class="note" style="display: none">پست شما با موفقیت ارسال گردید <a id="close">[close]</a></div>
    <div id="" class="noteError" style="background-color: #ed6b75 !important; display: none">خطا در ارسال پست! <a id="close">[close]</a></div>

    <style type="text/css">
        .ajax-load {
            width: 100%;}
    </style>



    <div class="row ">

        <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
            <a data-toggle="modal" data-target="#add" class="btn btn-primary" style="float: left;margin-top: 20px">افزودن</a>

            <div class="title_sec">
                <h1>اطلاعات کالکشن ها</h1>

            </div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-hover"
                       id="dataTables-example">
                    <thead>
                    <tr>
                        <th style="text-align: center">&nbsp; نام و نام خانوادگی</th>
                        <th style="text-align: center">&nbsp; نام شرکت</th>
                        <th style="text-align: center">&nbsp; تلفن</th>
                        <th style="text-align: center">&nbsp; موبایل</th>
                        <th style="text-align: center">&nbsp;  شهر</th>
                        <th style="text-align: center">&nbsp;ایمیل</th>
                        <th style="text-align: center">تاریخ ثبت</th>
                        <th style="text-align: center">جزئیات</th>
                        <th style="text-align: center">حذف</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        @if($user->image == Auth::id() || Auth::id() == '1' || Auth::id() == '2')

                            <tr class="odd gradeX">
                            <th style="font-weight: 100;text-align: center">
                                &nbsp; <a target="_blank" href="<?= Url('home/profile/show/137-'.$user->id.'-42-'.$user->username); ?>">{{\Illuminate\Support\Str::words($user->name, $words = 3, $end = '...') }}</a></th>
                            <th style="text-align: center">&nbsp;
                                @if(! empty($user->company))
                                    {{\Illuminate\Support\Str::words($user->company, $words = 3, $end = '...') }}

                                @endif
                            </th>
                            <th style="text-align: center"> &nbsp;
                                @if(! empty($user->tell))
                                    {{\Illuminate\Support\Str::words($user->tell, $words = 3, $end = '...') }}
                                @endif
                            </th>

                            <th style="text-align: center"> &nbsp;
                                @if(! empty($user->mobile))
                                    {{$user->mobile}}
                                @endif

                            </th>

                            <th style="text-align: center"> &nbsp; {{\Illuminate\Support\Str::words($user->city, $words = 2, $end = '...') }} </th>
                            <th style="text-align: center"> &nbsp;

                                @if(2==3)
                                @if(! empty($user->user))
                                    {{$user->user->email}}
                                @endif
                                @endif

                                {{$user->email}}
                            </th>
                            <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($user->created_at) !!}</th>

                            <th style="text-align: center; font-weight: 100; font-size: 11px">
                                <a data-toggle="modal" data-target="#{{$user->id}}"
                                   class="btn btn-warning btn-line btn-sm"
                                   href="#"><i
                                            class="fa fa-user"></i> </a>
                            </th>
                            <th style="text-align: center">
                                @if($user->image == Auth::id() || Auth::id() == '1' || Auth::id() == '2')
                                    <a onclick="return confirm('آیا از حذف این اطلاعات مطمئن هستید؟');"
                                       href="<?= Url('/admin/data/delete/'.$user->id); ?>"><i
                                                class="fa fa-remove"></i> </a>
                                @endif
                            </th>

                        </tr>


                        <div class="modal fade" id="{{$user->id}}" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel"> ویرایش مشحصات</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form name="_token" method="POST"
                                              enctype="multipart/form-data"
                                              action="<?= Url('/admin/data/update/'.$user->id); ?>">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_token"
                                                   value="{{ csrf_token() }} ">
                                            <div class="row">
                                                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">


                                                    <div class="form-group">
                                                        <label> تصویر شرکت</label>
                                                        <img src="{{'../../../producer-img/'.$user->image}}"
                                                             alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                        <input type="hidden" name="images"
                                                               value="{{ $user->image}} ">


                                                        <div><input type="file"
                                                                    name="images_u"
                                                                    value="images_u"
                                                                    accept="images/*"/>
                                                        </div>
                                                    </div>







                                                    <div class="form-group">
                                                        <label> نام و نام خانوادگی</label>
                                                        <input
                                                                @if($user->users_id != Auth::id() && Auth::id() != '1')
                                                                disabled
                                                                @endif
                                                                class="form-control" name="name"
                                                                value="{{$user->name}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>  ایمیل </label>
                                                        <input
                                                                @if($user->users_id != Auth::id() && Auth::id() != '1')
                                                                disabled
                                                                @endif
                                                                type="email" class="form-control"
                                                                name="email"
                                                                value="{{$user->email}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label> نام شرکت </label>
                                                        <input
                                                                @if($user->users_id != Auth::id() && Auth::id() != '1')
                                                                disabled
                                                                @endif
                                                                type="text" class="form-control"
                                                                name="company" value="{{$user->company}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label> تلفن </label>
                                                        <input
                                                                @if($user->users_id != Auth::id() && Auth::id() != '1')
                                                                disabled
                                                                @endif
                                                                type="text" class="form-control"
                                                                name="tell" value="{{$user->tell}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label> تلفن همراه </label>
                                                        <input
                                                                @if($user->users_id != Auth::id() && Auth::id() != '1')
                                                                disabled
                                                                @endif
                                                                type="text" class="form-control"
                                                                name="mobile" value="{{$user->mobile}}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label> شهر </label>
                                                        <input
                                                                @if($user->users_id != Auth::id() && Auth::id() != '1')
                                                                disabled
                                                                @endif
                                                                type="text" class="form-control"
                                                                name="city" value="{{$user->city}}">
                                                    </div>

                                                    <div class="form-group">
                                                        <label>  آدرس </label>
                                                        <textarea name="adress"
                                                                  @if($user->users_id != Auth::id() && Auth::id() != '1')
                                                                disabled
                                                                @endif
                                                                class="form-control" >{{$user->adress}}</textarea>
                                                    </div>
                                                    <label>  محصولات </label>
                                                    <textarea  name="product"

                                                               class="form-control" >{{$user->product}}</textarea>


                                                    <label>   مهارت ها و تجربیات </label>
                                                    <textarea  name="skill"

                                                               class="form-control" >{{$user->skill}}</textarea>



                                                <br>

                                            </div>
                                    </div><br><br>
                                    <div class="modal-footer">
                                        <button type="submit" name="_token"
                                                value="{{ csrf_token() }}"
                                                class="btn btn-primary">ذخیره تغییرات
                                        </button>
                                        <button type="button" class="btn btn-default"
                                                data-dismiss="modal">بستن
                                        </button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
@endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{$users->links()}}


    <div class="modal fade" id="add" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">  افزودن</h4>
                </div>
                <div class="modal-body">
                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('/admin/data/add/'); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">
                        <div class="row" style="width: 95%;margin-right: 2%">
                            <div class="form-group">
                                <label> تصویر شرکت</label>
                                <div><input type="file"
                                            name="images_u"
                                            value="images_u"
                                            accept="images/*"/>
                                </div>
                            </div>

                                <div class="form-group">
                                    <label> نام و نام خانوادگی</label>
                                    <input

                                            class="form-control" name="name"
                                            value="">
                                </div>
                                <div class="form-group">
                                    <label> نام شرکت </label>
                                    <input

                                            class="form-control"
                                            name="company" value="">
                                </div>
                                <div class="form-group">
                                    <label> ایمیل  </label>
                                    <input

                                            type="email" class="form-control"
                                            name="email" value="">
                                </div>
                                <div class="form-group">
                                    <label> تلفن </label>
                                    <input

                                            type="text" class="form-control"
                                            name="tell" value="">
                                </div>
                                <div class="form-group">
                                    <label> تلفن همراه </label>
                                    <input

                                            type="text" class="form-control"
                                            name="mobile" value="">
                                </div>
                                <div class="form-group">
                                    <label> شهر </label>
                                    <input

                                            type="text" class="form-control"
                                            name="city" value="">
                                </div>

                                <div class="form-group">
                                    <label>  آدرس </label>
                                    <textarea name="adress"

                                            class="form-control" ></textarea>
                                </div>


                                    <label>  محصولات </label>
                                    <textarea  name="product"

                                            class="form-control" ></textarea>


                                <label>   مهارت ها و تجربیات </label>
                                <textarea  name="skill"

                                        class="form-control" ></textarea>




                            <br>

                        </div>
                </div><br><br>
                <div class="modal-footer">
                    <button type="submit" name="_token"
                            value="{{ csrf_token() }}"
                            class="btn btn-primary">ذخیره
                    </button>
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">بستن
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

