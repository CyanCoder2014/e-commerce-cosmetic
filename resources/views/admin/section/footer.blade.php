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

    <div id="content">


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
                                         فوتر
                                    </div>
                                    <div class="panel-body">
                                        <div class="panel-group" id="accordion">




                                            <div class="panel panel-default">
                                                <div class="panel-heading">
                                                    <h4 class="panel-title">
                                                        <a data-toggle="collapse" data-parent="#accordion"
                                                           href="#collapse{{$text23->id}}">
                                                            @if($text23->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp; Header</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;Header </a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text23->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text23->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">



                                                            <div class=" form-group">
                                                                <label>  فارسی </label>
                                                                <textarea title="" class="form-control" name="description_fa" rows="1">
                                                                    {{$text23->description_fa}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label>  انگلیسی </label>
                                                                <textarea style="direction: ltr" title="" class="form-control" name="description" rows="1">{{$text23->description}}</textarea>
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
                                                           href="#collapse{{$text->id}}">
                                                            @if($text->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;Contact Us</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;Contact Us</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">



                                                            <div class=" form-group">
                                                                <label> توضیحات فارسی </label>
                                                                <textarea title="" class="form-control" name="description_fa" rows="1">
                                                                    {{$text->description_fa}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> توضیحات انگلیسی </label>
                                                                <textarea style="direction: ltr" title="" class="form-control" name="description" rows="1">{{$text->description}}</textarea>
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
                                                            @if($text2->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;{{$text2->title}}</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;{{$text2->title}}</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text2->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text2->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">


                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان فارسی</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text2->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان انگلیسی</label>
                                                                <input style="direction: ltr" class="form-control" name="title"
                                                                       value="{{$text2->title}}">
                                                            </div>

                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                <label>   لینک صفحه</label>
                                                                <input style="direction: ltr" class="form-control" name="link"
                                                                       value="{{$text2->link}}">
                                                            </div>

                                                            <div class=" form-group">
                                                                <label> توضیحات فارسی </label>
                                                                <textarea title="" class="form-control" name="description_fa" rows="1">
                                                                    {{$text2->description_fa}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> توضیحات انگلیسی </label>
                                                                <textarea style="direction: ltr" title="" class="form-control" name="description" rows="1">{{$text2->description}}</textarea>
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
                                                           href="#collapse{{$text3->id}}">
                                                            @if($text3->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;{{$text3->title}}</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;{{$text3->title}}</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text3->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text3->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">


                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان فارسی</label>
                                                                <input class="form-control" name="title_fa"
                                                                       value="{{$text3->title_fa}}">
                                                            </div>

                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                <label>  عنوان انگلیسی</label>
                                                                <input style="direction: ltr" class="form-control" name="title"
                                                                       value="{{$text3->title}}">
                                                            </div>

                                                            <div class="col-lg-4 col-md-4  col-sm-12 col-xs12 form-group">
                                                                <label>   لینک صفحه</label>
                                                                <input style="direction: ltr" class="form-control" name="link"
                                                                       value="{{$text3->link}}">
                                                            </div>

                                                            <div class=" form-group">
                                                                <label> توضیحات فارسی </label>
                                                                <textarea title="" class="form-control" name="description_fa" rows="1">
                                                                    {{$text3->description_fa}}</textarea>
                                                            </div>
                                                            <div class=" form-group">
                                                                <label> توضیحات انگلیسی </label>
                                                                <textarea style="direction: ltr" title="" class="form-control" name="description" rows="1">{{$text3->description}}</textarea>
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
                                                           href="#collapse{{$text4->id}}">
                                                            @if($text4->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp;Map</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;Map</a>
                                                        @endif
                                                    </h4>


                                                </div>
                                                <div id="collapse{{$text4->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text4->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">


                                                            <div class=" form-group">
                                                                <label>  لینک نقشه (Google Map) </label>
                                                                <textarea style="direction: ltr" title="" class="form-control" name="description" rows="1">
                                                                    {{$text4->description}}</textarea>
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
                                                           href="#collapse{{$text27->id}}">
                                                            @if($text27->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp; instagram</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;instagram </a>
                                                        @endif
                                                    </h4>

                                                </div>
                                                <div id="collapse{{$text27->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text27->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  لینک</label>
                                                                <input class="form-control" name="link"
                                                                       value="{{$text27->link}}">
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
                                                           href="#collapse{{$text28->id}}">
                                                            @if($text28->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp; facebook</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;facebook </a>
                                                        @endif
                                                    </h4>

                                                </div>
                                                <div id="collapse{{$text28->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text28->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  لینک</label>
                                                                <input class="form-control" name="link"
                                                                       value="{{$text28->link}}">
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
                                                           href="#collapse{{$text29->id}}">
                                                            @if($text29->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp; telegram</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;telegram </a>
                                                        @endif
                                                    </h4>

                                                </div>
                                                <div id="collapse{{$text29->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text29->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  لینک</label>
                                                                <input class="form-control" name="link"
                                                                       value="{{$text29->link}}">
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
                                                           href="#collapse{{$text30->id}}">
                                                            @if($text30->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp; tweeter</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;tweeter </a>
                                                        @endif
                                                    </h4>

                                                </div>
                                                <div id="collapse{{$text30->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text30->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  لینک</label>
                                                                <input class="form-control" name="link"
                                                                       value="{{$text30->link}}">
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
                                                           href="#collapse{{$text31->id}}">
                                                            @if($text31->state == 1)
                                                                <i style="color: #00aa00" class="icon-ok"></i>
                                                                &nbsp; linkedIn</a>
                                                        @else
                                                            <i class="icon-book"></i>
                                                            &nbsp;linkedIn </a>
                                                        @endif
                                                    </h4>

                                                </div>
                                                <div id="collapse{{$text31->id}}"
                                                     class="panel-collapse collapse ">
                                                    <div class="panel-body">

                                                        <form name="_token" method="POST"
                                                              enctype="multipart/form-data"
                                                              action="<?= Url('admin/footer/edit/' . $text31->id); ?>">
                                                            {{ csrf_field() }}
                                                            <input type="hidden" name="_token"
                                                                   value="{{ csrf_token() }} ">

                                                            <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                                                <label>  لینک</label>
                                                                <input class="form-control" name="link"
                                                                       value="{{$text31->link}}">
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


@endsection