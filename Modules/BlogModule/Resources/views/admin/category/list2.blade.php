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
                            <a href="#"> دسته بندی محتوا</a>
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
                <div class="inner" style="min-height: 300px;">
                    <div class="row">

                        <section id="lts_sec " class="right" style="margin: 0px auto">

                            <div class="container">
                                <div class="row ">
                                    <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                        <div class="title_sec">

                                        </div>


                                        <div class="panel panel-primary">
                                            <div class="panel-heading " style="background-color: #ffffff;color: #4e5760">
                                                مدیریت دسته بندی ها
                                                @can('add ccat')
                                                <a data-toggle="modal"
                                                   data-target="#{{1}}" style="float: left;margin-top: -5px"
                                                   class="btn btn-primary  btn-sm"><i class="fa fa-plus"></i>&nbsp;&nbsp; افزودن دسته بندی </a>
                                                @endcan
                                            </div>
                                            <div class="panel-body">
                                                <div class="panel-group" id="accordion">






                                                    @if($categories->first() !== null)
                                                        @foreach($categories as $category)

                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse" data-parent="#accordion"
                                                                                   href="#collapse{{$category->id}}">
                                                                                    @if($category->parent_id==0)
                                                                                        <i style="color: #00aa00" class="fa fa-check"></i>
                                                                                        &nbsp;{{$category->title['fa']}}</a>
                                                                                @else
                                                                                    <i class="fa fa-table"></i>
                                                                                    &nbsp;{{$category->title['fa']}}</a>
                                                                                @endif
                                                                            </h4>


                                                                        </div>
                                                                        <div id="collapse{{$category->id}}"
                                                                             class="panel-collapse collapse ">
                                                                            <div class="panel-body">


                                                                                <form name="_token" method="POST"
                                                                                      enctype="multipart/form-data"
                                                                                      action="<?= Url('content/admin/category5/update/' . $category->id); ?>">
                                                                                    {{ csrf_field() }}
                                                                                    <input type="hidden" name="_token"
                                                                                           value="{{ csrf_token() }} ">
                                                                                    <input type="hidden" name="state"
                                                                                           value="1">


                                                                                    <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 ">
                                                                                        <img src="{{'../../../cat-img/'.$category->image}}"
                                                                                             alt="" style="; height: 50px; border: solid 2px #0080FF">
                                                                                        <input type="hidden" name="images"
                                                                                               value="{{ $category->image}} ">


                                                                                        <div><input type="file"
                                                                                                    name="images_u"
                                                                                                    value="images_u"
                                                                                                    accept="images/*"/>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-lg-3 col-md-3  col-sm-12 col-xs12 form-group">
                                                                                        <label>   سردسته</label>
                                                                                        <select class="form-control" name="parent_id">
                                                                                            <option value="0" @if($category->parent_id == 0)
                                                                                            selected
                                                                                                    @endif > سر دسته
                                                                                            </option>

                                                                                            @foreach($categories as $category12)
                                                                                                @if($category12->parent_id == 0)
                                                                                                    <option value="{{$category12->id}}"
                                                                                                            @if($category->parent_id == $category12->id )
                                                                                                            selected
                                                                                                            @endif > {{$category12->title['fa']}}
                                                                                                    </option>
                                                                                                @endif
                                                                                            @endforeach

                                                                                        </select>
                                                                                    </div>



                                                                                    <div class="col-lg-2 col-md-2  col-sm-12 col-xs12 form-group">
                                                                                        <label>   جایگاه</label>
                                                                                        <select class="form-control" name="state">
                                                                                            <option value="0" @if($category->state == 0)
                                                                                            selected
                                                                                                    @endif >فعال
                                                                                            </option>

                                                                                            <option value="10" @if($category->state == 10)
                                                                                            selected
                                                                                                    @endif >غیر فعال
                                                                                            </option>

                                                                                            <option value="1" @if($category->state == 1)
                                                                                            selected
                                                                                                    @endif >جایگاه 1
                                                                                            </option>
                                                                                            <option value="2" @if($category->state == 2)
                                                                                            selected
                                                                                                    @endif >جایگاه 2
                                                                                            </option>
                                                                                            <option value="3" @if($category->state == 3)
                                                                                            selected
                                                                                                    @endif >جایگاه 3
                                                                                            </option>
                                                                                            <option value="4" @if($category->state == 4)
                                                                                            selected
                                                                                                    @endif >جایگاه 4
                                                                                            </option>
                                                                                            <option value="5" @if($category->state == 5)
                                                                                            selected
                                                                                                    @endif >جایگاه 5
                                                                                            </option>
                                                                                            <option value="6" @if($category->state == 6)
                                                                                            selected
                                                                                                    @endif >جایگاه 6
                                                                                            </option>
                                                                                            <option value="7" @if($category->state == 7)
                                                                                            selected
                                                                                                    @endif >جایگاه 7
                                                                                            </option>

                                                                                        </select>
                                                                                    </div>

                                                                                    <div class="row">
                                                                                        <div class="ol-md-6 col-xs-12 form-group">
                                                                                            <label> نام فارسی دسته بندی</label>
                                                                                            <input style="" class="form-control" name="title[fa]"
                                                                                                   value="{{$category->title['fa']}}">
                                                                                        </div>

                                                                                        <div class="col-md-6 col-xs-12 form-group">
                                                                                            <label> نام انگلیسی دسته بندی</label>
                                                                                            <input style="" class="form-control" name="title[en]"
                                                                                                   value="{{$category->title['en']}}">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 form-group">

                                                                                            <label> توضیحات فارسی </label>
                                                                                            <textarea class="form-control" name="intro[fa]">{{$category->intro['fa']}}</textarea>
                                                                                            <br>
                                                                                        </div>
                                                                                        <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 form-group">

                                                                                            <label> توضیحات انگلیسی </label>
                                                                                            <textarea class="form-control" name="intro[en]">{{$category->intro['en']}}</textarea>
                                                                                            <br>
                                                                                        </div>
                                                                                    </div>

                                                                                    <br><br><br><br>
                                                                                    @can('delete ccat')
                                                                                    <a type="submit" onclick="return confirm('آیا از حذف دسته بندی مطمئن هستید؟');"
                                                                                       href="<?= Url('/content/admin/category5/destroy/' . $category->id); ?>"
                                                                                       class="btn btn-primary btn-line btn-sm" style="float: left; margin-right: 4px"> حذف دسته بندی</a>
                                                                                    @endcan
                                                                                    @can('edit ccat')
                                                                                    <button  type="submit" name="_token" value="{{ csrf_token() }}"  style="float: left"
                                                                                             class="btn btn-primary  btn-sm">اعمال تغییرات</button>
                                                                                    @endcan

                                                                                </form>

                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                        @endforeach
                                                    @endif









                                                </div>
                                            </div>
                                        </div>

                                        {{$categories->links()}}
                                    </div>
                                </div>


                            </div>


                        </section>
                    </div>
                </div>
            </div>

            <!-- modal -->
            <div class="modal fade" id="{{1}}" tabindex="-1" role="dialog"
                 aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">  افزودن دسته بندی</h4>
                        </div>
                        <div class="modal-body">

                            <form name="_token" method="POST"
                                  enctype="multipart/form-data"
                                  action="<?= Url('content/admin/category5/add') ?>">
                                {{ csrf_field() }}

                                <input type="hidden" name="_token"
                                       value="{{ csrf_token() }} ">
                                <input type="hidden" name="state"
                                       value="1">

                                <div class="">

                                    <div class="col-lg-8 col-md-8  col-sm-12 col-xs12">
                                        <label> عنوان فارسی دسته بندی</label>
                                        <input class="form-control" name="title[fa]">
                                        <br>
                                        <label> عنوان انگلیسی دسته بندی</label>
                                        <input class="form-control" name="title[en]">
                                        <br>
                                        <label> توضیحات فارسی </label>
                                        <textarea class="form-control" name="intro[fa]"></textarea>
                                        <br>
                                        <label> توضیحات انگلیسی </label>
                                        <textarea class="form-control" name="intro[en]"></textarea>
                                        <br>

                                        <div class="col-lg-6 col-md-6 col-sm-12 col-xs12 form-group">
                                            <label>   سردسته</label>
                                            <select class="form-control" name="parent_id">


                                                @if(Auth::user()->can('admin', \App\Contents\Post::class))
                                                    <option value="0"
                                                            @if($categories->first() !== null)
                                                            @if($category->parent_id == 0)
                                                            selected
                                                            @endif
                                                            @endif
                                                    > سر دسته
                                                    </option>
                                                    @if($categories->first() !== null)
                                                        @foreach($categories as $category12)
                                                            @if($category12->parent_id == 0)
                                                                <option value="{{$category12->id}}"
                                                                        @if($category->parent_id == $category12->id )
                                                                        selected
                                                                        @endif > {{$category12->title['fa']}}
                                                                </option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @elseif(Auth::user()->can('justManager', \App\Contents\Post::class))
                                                    @foreach(Auth::user()->forumCat as $categoryM)
                                                        <option value="{{$categoryM->id}}" selected> {{$categoryM->title}}
                                                        </option>
                                                    @endforeach
                                                @endif

                                            </select>

                                        </div>



                                        <div class="col-lg-6 col-md-6  col-sm-12 col-xs12 form-group">
                                            <label>   جایگاه</label>
                                            <select class="form-control" name="state">
                                                <option value="0" >فعال
                                                </option>

                                                <option value="10">غیر فعال
                                                </option>

                                                <option value="1"> جایگاه 1
                                                </option>

                                                <option value="2" >جایگاه 2
                                                </option>

                                                <option value="3" >جایگاه 3
                                                </option>

                                                <option value="4" >جایگاه 4
                                                </option>

                                                <option value="5" >جایگاه 5
                                                </option>

                                                <option value="6" >جایگاه 6
                                                </option>

                                                <option value="7" >جایگاه 7
                                                </option>


                                            </select>
                                        </div>




                                        <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">


                                            <div><input type="file"
                                                        name="images_u"
                                                        value="images_u"
                                                        accept="images/*"/>
                                            </div>

                                        </div>






                                    </div>





                                </div>
                                <br><br><br><br><br><br><br><br><br>
                                <br><br><br><br><br><br><br>
                                <div class="modal-footer">
                                    <button type="submit" name="_token"
                                            value="{{ csrf_token() }}"
                                            class="btn btn-primary">افزودن
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