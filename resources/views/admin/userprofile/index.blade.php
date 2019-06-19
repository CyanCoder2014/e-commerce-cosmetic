@extends('layouts.admin')

@section('content')








    <section id="content">

        <div class="page page-dashboard">

            <div class="pageheader">

                <h2><span>مدیریت مطالب</span></h2>

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="index.html"><i class="fa fa-home"></i> پنل ثبت نامی ها </a>
                        </li>
                        <li>
                            <a href="index.html">مدیریت ثبت نامی ها</a>
                        </li>
                    </ul>


                </div>

            </div>

            <!-- cards row -->
            <div class="row" >

                @if(session()->has('message'))
                    <br>
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif

                <br>
        <div class="inner" style="min-height: 565px;">
            <div class="row">

                <section id="lts_sec " class="right" style="margin: 0px auto">

                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">

                                </div>


                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>شماره</th>
                                        <th>نام شرکت</th>
                                        <th>کاربر</th>
                                        <th>تاریخ</th>
                                        <th>وضعیت</th>
                                        <th>اعمال</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($userprofiles as $userprofile)
                                        <tr>
                                            <td>{{ $userprofile->id }}</td>
                                            <td>{{ $userprofile->company }}</td>
                                            <td>{{ $userprofile->user->name??'نامعلوم' }}</td>
                                            <td>{{ to_jalali_date($userprofile->created_at) }}</td>
                                            <td>{{ $userprofile->active() }}</td>
                                            <td>
                                                <a data-toggle="modal"
                                                   data-target="#show{{ $userprofile->id }}"
                                                   class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i>&nbsp;&nbsp; نمایش </a>

                                                <a href="{{ route('admin.userprofile.delete',['userprofile' =>$userprofile->id ]) }}" onclick="return confirm('ایا از حذف اطمینان دارید؟');"
                                                   class="btn btn-danger  btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp; حذف </a>
                                                @if($userprofile->active != 2)
                                                    <a href="{{ route('admin.userprofile.accept',['userprofile' =>$userprofile->id ]) }}"
                                                       class="btn btn-success  btn-sm"><i class="fa fa-check"></i>&nbsp;&nbsp; تایید </a>
                                                @endif
                                                @if($userprofile->active != 1)
                                                    <a href="{{ route('admin.userprofile.reject',['userprofile' =>$userprofile->id ]) }}"
                                                       class="btn btn-warning  btn-sm"><i class="fa fa-times"></i>&nbsp;&nbsp; رد کردن </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>


                                {{$userprofiles->links()}}
                            </div>
                        </div>


                    </div>


                </section>
            </div>
        </div>
    </div>
        @foreach($userprofiles as $userprofile)
    <!-- modal -->
        <div class="modal fade" id="show{{ $userprofile->id }}" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">{{ $userprofile->company }}</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <span class="title">نام:</span>
                        {{ $userprofile->company }}
                    </div>
                    <div>
                        <span class="title">نوع:</span>
                        {{ $userprofile->type().' , '.$userprofile->type_sub() }}
                    </div>
                    <div>
                        <span class="title">شخصیت:</span>
                        {{ $userprofile->person() }}
                    </div>
                    <div>
                        <span class="title">شهر و استان: </span>
                        {{ $userprofile->country->name }} , {{ $userprofile->country->province->name }}
                    </div>
                    <div>
                        <span class="title">آدرس:</span>
                        {{ $userprofile->address }}
                    </div>
                    <div>
                        <span class="title">تلفن:</span>
                        {{ $userprofile->tell }}
                    </div>
                    <div>
                        <span class="title">کدپستی:</span>
                        {{ $userprofile->post_code }}
                    </div>
                    <div>
                        <span class="title">آدرس وبسایت:</span>
                        {{ $userprofile->site }}
                    </div>
                    @if($userprofile->license_img)
                    <div>
                        <span class="title">عکس مجوز: </span>
                        <img src="{{ asset($userprofile->license_img) }}" alt="" style="width: 50%;display: inline" class="img-responsive">
                    </div>
                    @endif
                    @if($userprofile->logo_img)
                    <div>
                        <span class="title">عکس لوگو: </span>
                        <img src="{{ asset($userprofile->logo_img) }}" alt="" style="width: 50%;display: inline" class="img-responsive">
                    </div>
                    @endif
                    @if($userprofile->place_img)
                    <div>
                        <span class="title">عکس محل: </span>
                        <img src="{{ asset($userprofile->place_img) }}" alt="" style="width: 50%;display: inline" class="img-responsive">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

        @endforeach



</div>
    </section>


@endsection