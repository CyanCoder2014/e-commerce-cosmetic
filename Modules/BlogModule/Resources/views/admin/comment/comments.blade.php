@extends('layouts.admin')

@section('content')



    <!--PAGE CONTENT -->
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
                            <a href="#"> مدیریت نظرات مطالب</a>
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
                                        <h3>مدیریت  نظرات مطالب </h3>
                                    </div>
                                    @if(session()->has('message'))
                                        <div class="alert alert-success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    <br>
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li role="presentation" class="active"><a href="#notaccepted" aria-controls="notaccepted" role="tab" data-toggle="tab">تایید نشده</a></li>
                                        <li role="presentation"><a href="#accepted" aria-controls="accepted" role="tab" data-toggle="tab">تایید شده</a></li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="notaccepted">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-custom"
                                                       id="dataTables-example">
                                                    <thead>
                                                    <tr>
                                                        <th style="text-align: center">&nbsp;شماره</th>
                                                        <th style="text-align: center">&nbsp;نام</th>
                                                        <th style="text-align: center">&nbsp;تاریخ انتشار</th>
                                                        <th style="text-align: center">&nbsp;متن</th>
                                                        <th style="text-align: center">  پاسخ</th>
                                                        <th style="text-align: center">مطلب</th>
                                                        <th style="text-align: center">تایید کردن</th>
                                                        <th style="text-align: center">حذف</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($comments as $comment)
                                                        @if($comment->approved == 0)
                                                        <tr class="odd gradeX">
                                                            <th style="text-align: center">{{ $comment->id }}</th>
                                                            <th style="text-align: center"> &nbsp; @if(isset($comment->name)){{$comment->name}}@else{{$comment->user->name}}@endif </th>
                                                            <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($comment->created_at) !!}</th>
                                                            <th style="text-align: center; font-weight: 100">{{ $comment->comment }}</th>
                                                            <th style="text-align: center; font-weight: 100">
                                                                @can('reply ccomment')
                                                                <a data-toggle="modal" data-target="#reply" data-parent="{{ $comment->id }}" data-product="{{ $comment->post_id }}" class="btn btn-info replybtn"><i class="fa fa-comment"></i></a>
                                                                @endcan
                                                            </th>
                                                            <th style="text-align: center; font-weight: 100">
                                                                @if($comment->post)
                                                                <?php $post=$comment->post;?>
                                                                <a href="{{ route('content.show',['id'=>'353-'.$post->id.'-'.$post->title['fa']])}}">{{$post->title['fa']}}</a>
                                                                @endif
                                                            </th>
                                                            <th style="text-align: center; font-weight: 100">
                                                                @can('apply ccomment')
                                                                @if($comment->approved == 0)
                                                                    <a   href="{{ route('content.comment.accept',['id' =>$comment->id]) }}" class="btn btn-success"><i class="fa fa-check"></i> تایید</a>
                                                                @elseif($comment->approved == 1)
                                                                    <a   href="{{ route('content.comment.deny',['id' =>$comment->id]) }}" class="btn btn-warning"><i class="fa fa-remove"></i>رد</a>
                                                                @endif
                                                                @endcan

                                                            </th>
                                                            <th style="text-align: center; font-weight: 100">
                                                                @can('delete ccomment')

                                                                <a onclick="return confirm('آیا از حذف این محصول مطمئن هستید؟');"  href="{{ route('content.comment.delete',['id' =>$comment->id]) }}" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                                                @endcan
                                                            </th>



                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane" id="accepted">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-custom"
                                                       id="dataTables-example">
                                                    <thead>
                                                    <tr>
                                                        <th style="text-align: center">&nbsp;شماره</th>
                                                        <th style="text-align: center">&nbsp;نام</th>
                                                        <th style="text-align: center">&nbsp;تاریخ انتشار</th>
                                                        <th style="text-align: center">&nbsp;متن</th>
                                                        <th style="text-align: center">  پاسخ</th>
                                                        <th style="text-align: center">مطلب</th>
                                                        <th style="text-align: center">رد کردن</th>
                                                        <th style="text-align: center">حذف</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($comments as $comment)
                                                        @if($comment->approved == 1)
                                                        <tr class="odd gradeX">
                                                            <th style="text-align: center">{{ $comment->id }}</th>
                                                            <th style="text-align: center"> &nbsp; @if(isset($comment->name)){{$comment->name}}@else{{$comment->user->name}}@endif </th>
                                                            <th style="text-align: center; font-weight: 100">{!!  to_jalali_date($comment->created_at) !!}</th>
                                                            <th style="text-align: center; font-weight: 100">{{ $comment->comment }}</th>
                                                            <th style="text-align: center; font-weight: 100">
                                                                @can('reply ccomment')
                                                                <a data-toggle="modal" data-target="#reply" data-parent="{{ $comment->id }}" data-product="{{ $comment->post_id }}" class="btn btn-info replybtn"><i class="fa fa-comment"></i></a>
                                                                @endcan
                                                            </th>

                                                            <th style="text-align: center; font-weight: 100">
                                                                @if($comment->post)
                                                                <?php $post=$comment->post;?>
                                                                <a href="{{ route('content.show',['id'=>'353-'.$post->id.'-'.$post->title['fa']])}}">{{$post->title['fa']}}</a>
                                                                @endif
                                                            </th>
                                                            <th style="text-align: center; font-weight: 100">
                                                                @can('apply ccomment')
                                                                @if($comment->approved == 0)
                                                                    <a   href="{{ route('content.comment.accept',['id' =>$comment->id]) }}" class="btn btn-success"><i class="fa fa-check"></i> تایید</a>
                                                                @elseif($comment->approved == 1)
                                                                    <a   href="{{ route('content.comment.deny',['id' =>$comment->id]) }}" class="btn btn-warning"><i class="fa fa-remove"></i>رد</a>
                                                                @endif
                                                                @endcan

                                                            </th>
                                                            <th style="text-align: center; font-weight: 100">
                                                                @can('delete ccomment')
                                                                <a onclick="return confirm('آیا از حذف این محصول مطمئن هستید؟');"  href="{{ route('content.comment.delete',['id' =>$comment->id]) }}" class="btn btn-danger"><i class="fa fa-remove"></i></a>
                                                                @endcan
                                                            </th>



                                                        </tr>
                                                        @endif
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            {{$comments->links()}}
                            <br><br>
                        </div>

                    </section>
                </div>
            </div>
        </div>







        @can('reply ccomment')
        <div class="modal fade " id="reply" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"></h4>
                    </div>

                    <form name="_token" method="POST" enctype="multipart/form-data"
                          action="{{ route('content.comment.reply') }}">
                        {{ csrf_field() }}
                        <div class="modal-body">


                            <input type="hidden" name="users_id" value="{{Auth::id()}} ">
                            <input type="hidden" name="parent_id" id="parentid" value="">
                            <input type="hidden" name="post_id" id="productid" value="">
                            <label for="comment">پاسخ</label>
                            <textarea class="form-control" name="comment"></textarea>


                            <div class="modal-footer" >
                                <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                                <button  type="submit"  name="_token" value="{{ csrf_token() }}" class="btn  blue-bg">ثبت</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endcan



    </section>

    <script type="text/javascript">
        // $(document).ready(function(){

        window.onload = function() {

            $('.replybtn').on('click', function(e){ //Once remove button is clicked

                $('#productid').val($(this).attr('data-product')); //Remove field html
                $('#parentid').val($(this).attr('data-parent')); //Remove field html

            });



        };
        // });
    </script>

@endsection