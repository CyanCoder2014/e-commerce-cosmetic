@extends('layouts.layout')
@section('content')
    <div id="content"><br>
        <div class="inner" style="min-height: 565px;">
            <div class="row">
                <section id="lts_sec " class="right" style="margin: 10px auto;">
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">
                                    <h1>اطلاعات کاربران</h1>
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
                                            <th style="text-align: right">&nbsp; نام و نام خانوادگی</th>
                                            <th style="text-align: center">&nbsp; دسترسی</th>
                                            <th style="text-align: center">&nbsp; نام کاربری</th>
                                            <th style="text-align: center">&nbsp;ایمیل</th>
                                            <th style="text-align: right">تاریخ ثبت</th>
                                            <th style="text-align: center">  دسته تالارهای تحت نظر</th>
                                            <th style="text-align: center">جزئیات</th>
                                            <th style="text-align: center">حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr class="odd gradeX">
                                                <th style="font-weight: 100;text-align: right">
                                                    &nbsp; <a target="_blank" href="<?= Url('home/profile/show/137-'.$user->id.'-42-'.$user->username); ?>">{{\Illuminate\Support\Str::words($user->name.' '.$user->family, $words = 6, $end = '...') }}</a></th>
                                                <th style="text-align: center">&nbsp;
                                                    @if($user->roleLabel == '[]')
                                                        <a class="btn btn-default btn-line btn-sm ">  غیر فعال</a>
                                                    @elseif($user->roleLabel[0]->id == '1')
                                                        <a class="btn btn-success btn-line btn-sm"> ادمین</a>
                                                    @elseif($user->state == '2')
                                                        <a class="btn btn-danger btn-line btn-sm"> ممنوعیت</a>
                                                    @elseif($user->roleLabel[0]->id == '2')
                                                        <a class="btn btn-success btn-line btn-sm"> مدیر سایت</a>
                                                    @else
                                                        <a class="btn btn-primary btn-line btn-sm">  {{$user->roleLabel[0]->label}} سایت</a>
                                                    @endif
                                                </th>
                                                <th style="font-weight: 100; text-align: center">&nbsp; <a target="_blank" href="<?= Url('home/profile/show/137-'.$user->id.'-42-'.$user->username); ?>">{{\Illuminate\Support\Str::words($user->username, $words = 6, $end = '...') }}</a> </th>
                                                <th style="text-align: center"> &nbsp; {{$user->email}} </th>
                                                <th style="text-align: right; font-weight: 100">{!!  to_jalali_date($user->created_at) !!}</th>
                                                <th style="text-align: center; font-weight: 100; font-size: 11px">
                                                    @if($user->can('director', \App\Contents\Post::class))
                                                    @foreach($user->forumCat as $forumCat)
                                                        {{\Illuminate\Support\Str::words($forumCat->title, $words = 5, $end = '...') }}
                                                             @if(Auth::user()->can('admin', \App\Contents\Post::class) || $user->can('justDirector', \App\Contents\Post::class))
                                                            <a onclick="return confirm('آیا از حذف این دسته تالار مطمئن هستید؟');" href="<?= Url('home/admin/user/removeForumCat/'.$user->id.'/'.$forumCat->id); ?>"><i class="fa fa-remove"></i> </a>
                                                             @endif
                                                            <br>
                                                    @endforeach
                                                      @if(Auth::user()->can('admin', \App\Contents\Post::class) || $user->can('justDirector', \App\Contents\Post::class))
                                                      @if($user->forumCat->count()<2)
                                                      <a data-toggle="modal" data-target="#forum-cat{{$user->id}}"  style="padding-top: 5px" class="hover-shadow"><i class="ti-plus"></i>   افزودن دسته تالار </a>
                                                      @endif
                                                      @endif
                                                    @endif
                                                </th>
                                                <th style="text-align: center">
                                                    @if(!$user->can('admin', \App\Contents\Post::class) || $user->id == Auth::id())
                                                        <a data-toggle="modal" data-target="#{{$user->id}}"
                                                                                  class="btn btn-warning btn-line btn-sm"
                                                                                  href="#"><i
                                                                class="fa fa-user"></i> </a>
                                                    @endif
                                                </th>
                                                <th style="text-align: center">
                                                    @if(!$user->can('admin', \App\Contents\Post::class) || $user->id == Auth::id() )
                                                    @if(Auth::user()->can('admin', \App\Contents\Post::class))
                                                        <a onclick="return confirm('آیا از حذف این کاربر مطمئن هستید؟');"
                                                            href="<?= Url('home/admin/user/delete/'.$user->id); ?>"><i
                                                                class="fa fa-remove"></i> </a>
                                                        @endif
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
                                                            <h4 class="modal-title" id="myModalLabel"> ویرایش کاربر</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form name="_token" method="POST"
                                                                  enctype="multipart/form-data"
                                                                  action="<?= Url('home/admin/user/update/'.$user->id); ?>">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }} ">
                                                                <div class="row">
                                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                                                        <div class="form-group">
                                                                            <label> نام کاربری</label>
                                                                            <input disabled class="form-control" name="name"
                                                                                   value="{{$user->username}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label> ایمیل </label>
                                                                            <input disabled type="email" class="form-control"
                                                                                   name="email" value="{{$user->email}}">
                                                                        </div>
                                                                        @if(Auth::user()->can('Admin', \App\Contents\Post::class) && $user->profile !== null)
                                                                            <div class="form-group">
                                                                                <label> تلفن </label>
                                                                                <input disabled type="text" class="form-control"
                                                                                       name="tell" value="{{$user->profile->tell}}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label> تلفن همراه </label>
                                                                                <input disabled type="text" class="form-control"
                                                                                       name="mobile" value="{{$user->profile->mobile}}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label> سایت </label>
                                                                                <input disabled type="text" class="form-control"
                                                                                       name="site" value="{{$user->profile->site}}">
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <label> طریقه آشنایی </label>
                                                                                <input disabled type="text" class="form-control"
                                                                                       name="introduce" value="{{$user->profile->introduce}}">
                                                                            </div>
                                                                        @endif
                                                                        <br>
                                                                        <label> دسترسی:</label>
                                                                        @if($user->roleLabel == '[]')
                                                                            <span>  غیر فعال</span>
                                                                            <a onclick="return confirm('آیا از فعال کردن این کاربر مطمئن هستید؟');" href="<?= Url('home/admin/user/active/'.$user->id); ?>" class="btn btn-primary btn-sm ">  فعال کردن کاربر</a>
                                                                        @elseif($user->roleLabel[0]->id == '1')
                                                                            <span> ادمین</span>
                                                                        @elseif($user->state == '2')
                                                                            <span> ممنوعیت</span>
                                                                            <a onclick="return confirm('آیا از رفع ممنوعیت این کاربر مطمئن هستید؟');" href="<?= Url('home/admin/user/ok/'.$user->id); ?>" class="btn btn-danger btn-sm ">    رفع ممنوعیت کاربر</a>
                                                                        @elseif($user->roleLabel[0]->id == '2')
                                                                            <span> مدیر سایت</span>
                                                                        @else
                                                                            <span>{{$user->roleLabel[0]->label}} سایت</span>
                                                                            <a onclick="return confirm('آیا از ممنوعیت این کاربر مطمئن هستید؟');" href="<?= Url('home/admin/user/ban/'.$user->id); ?>" class="btn btn-warning btn-sm "> ممنوعیت کاربر</a>
                                                                        @endif
                                                                        <br><br>
                                                                        @if($user->network == '1' && Auth::user()->can('manager', \App\Contents\Post::class))
                                                                            <?php
                                                                            if ($user->roleLabel == '[]'){
                                                                                $roleLabel = '142';
                                                                            }else{
                                                                                $roleLabel = $user->roleLabel[0]->id;
                                                                            }?>
                                                                            @if(Auth::user()->can('Admin', \App\Contents\Post::class) ||  $roleLabel !== 2)

                                                                            <select class="form-control" name="role" >

                                                                                @foreach($roles as $role)
                                                                                    <option value="{{$role->id}}" @if($roleLabel == $role->id)
                                                                                    selected
                                                                                            @endif
                                                                                            @if($role->id == '1')
                                                                                            disabled
                                                                                            @endif
                                                                                            @if(!Auth::user()->can('Admin', \App\Contents\Post::class) &&  $role->id == '2')
                                                                                            disabled
                                                                                            @endif
                                                                                        >{{$role->label}}
                                                                                    </option>
                                                                                @endforeach
                                                                                <option disabled value="142" @if($roleLabel == '142')
                                                                                selected
                                                                                        @endif >غیر فعال
                                                                                </option>
                                                                            </select>
                                                                            @endif
                                                                        @endif
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
                                            </div>






                                            <div class="modal fade" id="forum-cat{{$user->id}}" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">  افزودن دسته تالار</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form name="_token" method="POST"
                                                                  enctype="multipart/form-data"
                                                                  action="<?= Url('home/admin/user/addForumCat/'.$user->id.'/'); ?>">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }} ">
                                                                <div class="row">
                                                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">

                                                                        <label>دسته تالار:</label>
                                                                        <br><br>
                                                                        @if(Auth::user()->can('admin', \App\Contents\Post::class))
                                                                            <select class="form-control" name="cat_id" >
                                                                                @foreach($cats12 as $forumCat)
                                                                                    <option value="{{$forumCat->id}}">
                                                                                     -> {{$forumCat->title}}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                        @elseif(Auth::user()->can('justManager', \App\Contents\Post::class))
                                                                            <select class="form-control" name="cat_id" >
                                                                                @foreach(Auth::user()->forumCat as $forumCat)
                                                                                    <option value="{{$forumCat->id}}">
                                                                                        -> {{$forumCat->title}}
                                                                                    </option>
                                                                                    @foreach($forumCat->subs($forumCat->id) as $sub)
                                                                                        <option value="{{$sub->id}}">
                                                                                            {{$sub->title}}
                                                                                        </option>
                                                                                    @endforeach
                                                                                @endforeach
                                                                            </select>
                                                                        @endif
                                                                    </div>
                                                                </div><br><br>

                                                                <div class="modal-footer">
                                                                    <button type="submit" name="_token"
                                                                            value="{{ csrf_token() }}"
                                                                            class="btn btn-primary"> ثبت دسته بندی
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



                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{$users->links()}}
                        <br><br>
                    </div>

                </section>
            </div>
        </div>
    </div>
@endsection