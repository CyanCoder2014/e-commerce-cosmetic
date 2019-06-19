@extends('layouts.admin')

@section('content')
    <link rel="stylesheet" href="<?= Url('assets/admin/plugins/Font-Awesome/css/font-awesome.css'); ?>"/>

    <style>
        div {
            direction: rtl;

        }

        th {
            text-align: right;
        }


    </style>

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
                            <a href="#">  مدیریت اسلایدشو</a>
                        </li>
                    </ul>


                </div>

            </div>


        <div class="inner" style="min-height: 700px;">
            <div class="row">

                <section id="lts_sec " class="right" style="margin: 0px auto">

                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">

                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif


                                <div class="panel panel-primary">
                                    <div class="panel-heading ">
                                         اسلایدشو
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">









                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse{{$text->id}}">
                                                            @if($text->state == '1')
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;اسلاید اول</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;اسلاید اول</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('/home/admin/slide/' . $text->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 ">
                                                                <img src="{{'../../../teachers-img/'.$text->image}}"
                                                                     alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                                <input type="hidden" name="images"
                                                                       value="{{ $text->image}} ">


                                                                <div><input type="file"
                                                                            name="images_u"
                                                                            value="images_u"
                                                                            accept="images/*"/>
                                                                </div>

                                                            </div>



                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان خط اول</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                <label>   عنوان خط دوم </label>
                                                                <input  class="form-control" name="title"
                                                                       value="{{$text->title}}  " disabled>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان رنگی </label>
                                                                <input class="form-control" name="subtitle_fa"
                                                                       value="{{$text->subtitle_fa}}" placeholder="حداکثر ۲ کلمه">
                                                            </div>

                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>   عنوان مشکی </label>
                                                                <input  class="form-control" name="colored"
                                                                       value="{{$text->colored}}" placeholder="حداکثر ۲ کلمه">
                                                            </div>
                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>    توضیح تبلیغاتی اول </label>
                                                                <input class="form-control" name="colored_fa"
                                                                       value="{{$text->colored_fa}}">
                                                            </div>

                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>    توضیح تبلیغاتی دوم</label>
                                                                <input  class="form-control" name="subtitle"
                                                                       value="{{$text->subtitle}}" placeholder="حداکثر ۳ کلمه">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان دکمه </label>
                                                                <input class="form-control" name="link_fa"
                                                                       value="{{$text->link_fa}}">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label> لینک دکمه </label>
                                                                <input style="direction: ltr" class="form-control" name="link"
                                                                       value="{{$text->link}}">
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> توضیحات خط اول </label>
                                                                <textarea title="" class="form-control" name="description_fa" rows="1">{{$text->description_fa}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> توضیحات خط دوم </label>
                                                                <textarea  title="" class="form-control" name="description" rows="1">{{$text->description}}</textarea>
                                                            </div>



                                                            <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                     class="btn btn-primary  btn-sm">اعمال تغییرات</button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse{{$text1->id}}">
                                                            @if($text1->state == '1')
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;اسلاید دوم</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;اسلاید دوم</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text1->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('/home/admin/slide/' . $text1->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">



                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 ">
                                                                <img src="{{'../../../teachers-img/'.$text1->image}}"
                                                                     alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                                <input type="hidden" name="images"
                                                                       value="{{ $text1->image}} ">


                                                                <div><input type="file"
                                                                            name="images_u"
                                                                            value="images_u"
                                                                            accept="images/*"/>
                                                                </div>

                                                            </div>



                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان خط اول</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text1->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                <label>   عنوان خط دوم </label>
                                                                <input  class="form-control" name="title"
                                                                        value="{{$text1->title}}  " disabled>
                                                            </div>
                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان رنگی </label>
                                                                <input class="form-control" name="subtitle_fa"
                                                                       value="{{$text1->subtitle_fa}}" placeholder="حداکثر ۲ کلمه">
                                                            </div>

                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>   عنوان مشکی </label>
                                                                <input  class="form-control" name="colored"
                                                                        value="{{$text1->colored}}" placeholder="حداکثر ۲ کلمه">
                                                            </div>
                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>    توضیح تبلیغاتی اول </label>
                                                                <input class="form-control" name="colored_fa"
                                                                       value="{{$text1->colored_fa}}" disabled>
                                                            </div>

                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>    توضیح تبلیغاتی دوم</label>
                                                                <input  class="form-control" name="subtitle"
                                                                        value="{{$text1->subtitle}}" placeholder="حداکثر ۳ کلمه">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان دکمه </label>
                                                                <input class="form-control" name="link_fa"
                                                                       value="{{$text1->link_fa}}">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label> لینک دکمه </label>
                                                                <input style="direction: ltr" class="form-control" name="link"
                                                                       value="{{$text1->link}}">
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> توضیحات خط اول </label>
                                                                <textarea title="" class="form-control" name="description_fa" rows="1">{{$text1->description_fa}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> توضیحات خط دوم </label>
                                                                <textarea  title="" class="form-control" name="description" rows="1">{{$text1->description}}</textarea>
                                                            </div>


                                                            <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                     class="btn btn-primary  btn-sm">اعمال تغییرات</button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse{{$text2->id}}">
                                                            @if($text2->state == '1')
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;اسلاید سوم</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;اسلاید سوم</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text2->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('/home/admin/slide/' . $text2->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">



                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 ">
                                                                <img src="{{'../../../teachers-img/'.$text2->image}}"
                                                                     alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                                <input type="hidden" name="images"
                                                                       value="{{ $text2->image}} ">


                                                                <div><input type="file"
                                                                            name="images_u"
                                                                            value="images_u"
                                                                            accept="images/*"/>
                                                                </div>

                                                            </div>



                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان خط اول</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text2->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                <label>   عنوان خط دوم </label>
                                                                <input  class="form-control" name="title"
                                                                        value="{{$text2->title}}  " disabled >
                                                            </div>
                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان رنگی </label>
                                                                <input class="form-control" name="subtitle_fa"
                                                                       value="{{$text2->subtitle_fa}}" placeholder="حداکثر ۲ کلمه">
                                                            </div>

                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>   عنوان مشکی </label>
                                                                <input  class="form-control" name="colored"
                                                                        value="{{$text2->colored}}" placeholder="حداکثر ۲ کلمه">
                                                            </div>
                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>    توضیح تبلیغاتی اول </label>
                                                                <input class="form-control" name="colored_fa"
                                                                       value="{{$text2->colored_fa}}" disabled>
                                                            </div>

                                                            <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                <label>    توضیح تبلیغاتی دوم</label>
                                                                <input  class="form-control" name="subtitle"
                                                                        value="{{$text2->subtitle}}" placeholder="حداکثر ۳ کلمه">
                                                            </div>

                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان دکمه </label>
                                                                <input class="form-control" name="link_fa"
                                                                       value="{{$text2->link_fa}}">
                                                            </div>
                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label> لینک دکمه </label>
                                                                <input style="direction: ltr" class="form-control" name="link"
                                                                       value="{{$text2->link}}">
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> توضیحات خط اول </label>
                                                                <textarea title="" class="form-control" name="description_fa" rows="1">{{$text2->description_fa}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> توضیحات خط دوم </label>
                                                                <textarea  title="" class="form-control" name="description" rows="1">{{$text2->description}}</textarea>
                                                            </div>


                                                            <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                     class="btn btn-primary  btn-sm">اعمال تغییرات</button>

                                                        </form>

                                                    </div>
                                                </div>
                                            </div>












                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>


                </section>
            </div>
        </div>
    </div>

    <!-- modal -->

    </section>
@endsection