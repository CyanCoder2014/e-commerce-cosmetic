@extends('layouts.admin')
@section('content')






    <section id="content">

        <div class="page page-dashboard">

            <div class="pageheader">

                <h2><span> </span></h2>

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="<?= Url('/admin' ); ?>"><i class="fa fa-home"></i> پنل مدیریت </a>
                        </li>
                        <li>
                            <a href="#"> مدیریت کاربران</a>
                        </li>
                    </ul>


                </div>

            </div>


        <div class="inner" style="min-height: 565px;">
            <div class="row">
                <section id="lts_sec " class="right" style="margin: -20px auto;">
                    <div class="container ">
                        <div class="row ">
                            <div class="col-lg-12 col-md-12  col-sm-12 col-xs12 ">
                                <div class="title_sec">
                                    <a  data-toggle="modal" data-target="#newsletter" style="float: left" class="btn btn-primary skyblue-bg"> <i class="fa fa-send-o"></i> ارسال پیام گروهی  </a>

                                    <h3>اطلاعات کاربران</h3>
                                </div>
                                @if(session()->has('message'))
                                    <div class="alert alert-success">
                                        {{ session()->get('message') }}
                                    </div>
                                @endif
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover"
                                           id="dataTables-example">
                                        <thead>
                                        <tr>
                                            <th style="text-align: center">&nbsp; پیام</th>
                                            <th style="text-align: center">&nbsp; نام و نام خانوادگی</th>
                                            <th style="text-align: center">&nbsp; نام کاربری</th>
                                            <th style="text-align: center">&nbsp;ایمیل</th>
                                            <th style="text-align: right">تاریخ ثبت</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr class="odd gradeX">
                                                <th style="text-align: center">
                                                        <a data-toggle="modal" data-target="#message{{$user->id}}"
                                                        class="btn btn-primary btn-line btn-sm skyblue-bg"
                                                        href="#"><i
                                                                class="fa fa-send"></i> </a>
                                                </th>
                                                <th style="font-weight: 100;text-align: center">
                                                    &nbsp; <a target="_blank" href="<?= Url('home/profile/show/137-'.$user->id.'-42-'.$user->username); ?>">{{\Illuminate\Support\Str::words($user->name.' '.$user->family, $words = 6, $end = '...') }}</a></th>

                                                <th style="font-weight: 100; text-align: center">&nbsp; <a target="_blank" href="<?= Url('home/profile/show/137-'.$user->id.'-42-'.$user->username); ?>">{{\Illuminate\Support\Str::words($user->username, $words = 6, $end = '...') }}</a> </th>
                                                <th style="text-align: center"> &nbsp; {{$user->email}} </th>
                                                <th style="text-align: right; font-weight: 100">{!!  to_jalali_date($user->created_at) !!}</th>

                                            </tr>

                                            <div class="modal fade" id="message{{$user->id}}" tabindex="-1" role="dialog"
                                                 aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">  ارسال پیام</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form name="_token" method="POST"
                                                                  enctype="multipart/form-data"
                                                                  action="<?= Url('home/admin/message/'.$user->id); ?>">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="_token"
                                                                       value="{{ csrf_token() }} ">
                                                                <div class="row">
                                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                        <div class="form-group">
                                                                            <label>  عنوان پیام</label>
                                                                            <input  class="form-control" name="title"
                                                                                   value="">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label> متن پیام </label>

                                                                        </div>
                                                                            <textarea required title="text" name="message" id="editor{{$user->id}}" rows="10" cols="80"> </textarea>
                                                                            <br>
                                                                                <select class="form-control" name="type" >
                                                                                        <option value="1">اعلان پیام</option>
                                                                                        <option value="2">ایمیل پیام</option>
                                                                                        <option value="3">اعلان و ایمیل پیام</option>

                                                                                </select>




                                                                    </div>
                                                                </div><br><br>
                                                                <div class="modal-footer">
                                                                    <button type="submit" name="_token"
                                                                            value="{{ csrf_token() }}"
                                                                            class="btn btn-primary">ارسال
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


                                            <script>
                                                CKEDITOR.replace( 'editor{{$user->id}}',{
                                                    filebrowserBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
                                                    filebrowserImageBrowseUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
                                                    filebrowserFlashBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
                                                    filebrowserUploadUrl  :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=File',
                                                    filebrowserImageUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
                                                    filebrowserFlashUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
                                                });
                                            </script>

                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        {{$users->render()}}

                        <br><br>
                    </div>

                </section>
            </div>
        </div>
    </div>





    <div class="modal fade" id="newsletter" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">  ارسال پیام گروهی</h4>
                </div>
                <div class="modal-body">
                    <form name="_token" method="POST"
                          enctype="multipart/form-data"
                          action="<?= Url('home/admin/send/group'); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token"
                               value="{{ csrf_token() }} ">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <label>  عنوان پیام</label>
                                    <input  class="form-control" name="title"
                                            value="">
                                </div>
                                <div class="form-group">
                                    <label> متن پیام </label>

                                </div>
                                <textarea required title="text" name="message" id="editor" rows="10" cols="80"> </textarea>
                                <br>
                                <label>  نوع ارسال</label>

                                <select class="form-control" name="type" >
                                    <option value="1">اعلان گروهی پیام</option>
                                    <option value="2">ایمیل گروهی پیام</option>
                                    <option value="3">اعلان و ایمیل پیام</option>
                                </select>

                                <br>
                                <br>

                                <label>   ارسال به:</label>
                                <select class="form-control" name="all" >
                                    <option value="1">  همه اعضای سایت</option>
                                    <option value="2">اعضای فعال</option>
                                    <option value="3">   اعضای انتخابی:</option>
                                </select>
                                <div class="example example_typeahead"><br>
                                    <p>نام کاربری مخاطبین مورد نظر را انتخاب نمایید:</p>
                                    <div class="bs-example">
                                        <input type="text" name="usernames" value="" />
                                    </div>
                                    <div class="accordion ">
                                        <div class="accordion-group">

                                        </div>
                                        <!--<input type="text" value="" data-role="tagsinput" />-->
                                    </div>
                                </div>


                            </div>
                        </div><br><br>
                        <div class="modal-footer">
                            <button type="submit" name="_token"
                                    value="{{ csrf_token() }}"
                                    class="btn btn-primary">ارسال به مخاطبین
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






    </section>
    <script>
        CKEDITOR.replace( 'editor',{
            filebrowserBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
            filebrowserImageBrowseUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Image&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
            filebrowserFlashBrowseUrl :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/browser/default/browser.html?Type=Flash&Connector=<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/connector.php',
            filebrowserUploadUrl  :'<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=File',
            filebrowserImageUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Image',
            filebrowserFlashUploadUrl : '<?= Url('/'); ?>/assets/plugins/ckeditor/filemanager/connectors/php/upload.php?Type=Flash'
        });
    </script>
@endsection