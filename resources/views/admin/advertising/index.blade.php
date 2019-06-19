@extends('layouts.admin')

@section('content')








    <section id="content">

        <div class="page page-dashboard">

            <div class="pageheader">

                <h2><span>مدیریت مطالب</span></h2>

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="index.html"><i class="fa fa-home"></i> پنل آگهی ها </a>
                        </li>
                        <li>
                            <a href="index.html">مدیریت آگهی ها</a>
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
                                        <th>عنوان</th>
                                        <th>کاربر</th>
                                        <th>تاریخ</th>
                                        <th>وضعیت</th>
                                        <th>اعمال</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($advertisings as $advertising)
                                        <tr>
                                            <td>{{ $advertising->id }}</td>
                                            <td>{{ $advertising->title }}</td>
                                            <td>{{ $advertising->user->name }}</td>
                                            <td>{{ to_jalali_date($advertising->created_at) }}</td>
                                            <td>{{ $advertising->active() }}</td>
                                            <td>
                                                <a data-toggle="modal"
                                                   data-target="#show{{ $advertising->id }}"
                                                   class="btn btn-primary  btn-sm"><i class="fa fa-eye"></i>&nbsp;&nbsp; نمایش </a>

                                                <a href="{{ route('admin.advertising.delete',['advertising' =>$advertising->id ]) }}" onclick="return confirm('ایا از حذف اطمینان دارید؟');"
                                                   class="btn btn-danger  btn-sm"><i class="fa fa-trash"></i>&nbsp;&nbsp; حذف </a>
                                                @if($advertising->active != 2)
                                                    <a href="{{ route('admin.advertising.accept',['advertising' =>$advertising->id ]) }}"
                                                       class="btn btn-success  btn-sm"><i class="fa fa-check"></i>&nbsp;&nbsp; تایید </a>
                                                @endif
                                                @if($advertising->active != 1)
                                                    <a href="{{ route('admin.advertising.reject',['advertising' =>$advertising->id ]) }}"
                                                       class="btn btn-warning  btn-sm"><i class="fa fa-times"></i>&nbsp;&nbsp; رد کردن </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                </table>


                                {{$advertisings->links()}}
                            </div>
                        </div>


                    </div>


                </section>
            </div>
        </div>
    </div>
        @foreach($advertisings as $advertising)
    <!-- modal -->
        <div class="modal fade" id="show{{ $advertising->id }}" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">{{ $advertising->title }}</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <span class="title">عنوان:</span>
                        {{ $advertising->title }}
                    </div>
                    <div>
                        <span class="title">شهر و استان: </span>
                        {{ $advertising->city->name }} , {{ $advertising->province->name }}
                    </div>
                    @if($advertising->brand)
                    <div>
                        <span class="title">برند: </span>
                        {{ $advertising->brand->name }}
                    </div>
                    @endif
                    @if($advertising->collection)
                    <div>
                        <span class="title">کالکشن: </span>
                        {{ $advertising->collection->name }}
                    </div>
                    @endif
                    @if($advertising->product)
                    <div>
                        <span class="title">محصول: </span>
                        {{ $advertising->product->name }}
                    </div>
                    @endif
                    <div>
                        <span class="title">رفرنس: </span>
                        {{ $advertising->reference }}
                    </div>
                    <div>
                        <span class="title">سریال: </span>
                        {{ $advertising->serial }}
                    </div>
                    <div>
                        <span class="title">ایمیل: </span>
                        {{ $advertising->email }}
                    </div>
                    <div>
                        <span class="title">تلفن: </span>
                        {{ $advertising->tell }}
                    </div>
                    <div>
                        <span class="title">وضعیت: </span>
                        {{ $advertising->status() }}
                    </div>
                    <div>
                        <span class="title">قیمت: </span>
                        {{ $advertising->price }}
                    </div>
                    <div>
                        <span class="title">توضیحات: </span>
                        {!! $advertising->description !!}
                    </div>
                    <div>
                        <span class="title">گارانتی: </span>
                        {{ $advertising->guarantee() }}
                    </div>
                    <div>
                        <span class="title">جعبه: </span>
                        {{ $advertising->box() }}
                    </div>
                    <div class="row">
                        @if(isset($advertising->images))
                        @foreach($advertising->images as $image)
                            <div>
                                <img src="{{ asset($image) }}" alt="" style="width: 25%;display: inline" class="img-responsive">
                                <p>{{ basename($image) }}</p>
                            </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

        @endforeach



</div>
    </section>


@endsection