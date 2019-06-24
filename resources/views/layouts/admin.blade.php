<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>پنل مدیریت - CyanCommerce </title>
    <link rel="icon" type="image/ico" href="<?= Url('assets/images/favicon.ico' ); ?>"/>
    <meta name="description" content="cyan coder panel">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- ============================================
        ================= Stylesheets ===================
        ============================================= -->
    <!-- vendor css files -->
    <link rel="stylesheet" href="<?= Url('assets/css/vendor/bootstrap.min.css' ); ?>">
    <link rel="stylesheet" href="<?= Url('assets/css/vendor/animate.css' ); ?>">
    <link rel="stylesheet" href="<?= Url('assets/css/vendor/font-awesome.min.css' ); ?>">
    <link rel="stylesheet" href="<?= Url('assets/js/vendor/animsition/css/animsition.min.css' ); ?>">
    <link rel="stylesheet" href="<?= Url('assets/js/vendor/daterangepicker/daterangepicker-bs3.css' ); ?>">
    <link rel="stylesheet" href="<?= Url('assets/js/vendor/morris/morris.css' ); ?>">
    <link rel="stylesheet" href="<?= Url('assets/js/vendor/owl-carousel/owl.carousel.css' ); ?>">
    <link rel="stylesheet" href="<?= Url('assets/js/vendor/owl-carousel/owl.theme.css' ); ?>">
    <link rel="stylesheet" href="<?= Url('assets/js/vendor/rickshaw/rickshaw.min.css' ); ?>">
    <link rel="stylesheet"
          href="<?= Url('assets/js/vendor/datetimepicker/css/bootstrap-datetimepicker.min.css' ); ?>">
    <link rel="stylesheet" href="<?= Url('assets/js/vendor/datatables/css/jquery.dataTables.min.css' ); ?>">
    <link rel="stylesheet" href="<?= Url('assets/js/vendor/datatables/datatables.bootstrap.min.css' ); ?>">
    <link rel="stylesheet" href="<?= Url('assets/js/vendor/chosen/chosen.css' ); ?>">
    <link rel="stylesheet" href="<?= Url('assets/js/vendor/summernote/summernote.css' ); ?>">

    <!-- project main css files -->
    <link rel="stylesheet" href="<?= Url('assets/css/main.css' ); ?>">
    <!--/ stylesheets -->
    <!-- ==========================================
        ================= Modernizr ===================
        =========================================== -->
    <script src="<?= Url('assets/js/vendor/modernizr/modernizr-2.8.3-respond-1.4.2.min.js' ); ?>"></script>

    <script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
    <script src="<?= Url('assets/js/jquery.min.js' ); ?>"></script>

@yield('script')
    <!--/ modernizr -->
</head>

<body id="minovate" class="appWrapper rtl hz-menu header-fixed">
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a
        href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="wrap" class="animsition" >
    <section id="header">
        <header class="clearfix"  style="width: 100%">

            <!-- Branding -->
            <div class="branding">
                <a title="Branding & Business Marketing | website & Mobile App Development" target="_blank"
                   class="brand" href="http://cyancoder.co/">
                    <span><strong>Cyan</strong>Commerce</span>
                </a>
                <a role="button" tabindex="0" class="offcanvas-toggle visible-xs-inline"><i
                            class="fa fa-bars"></i></a>
            </div>
            <!-- Branding end -->


            <!-- Left-side navigation -->
            <ul class="nav-left pull-left list-unstyled list-inline">
                <li class="sidebar-collapse divided-right">
                    <a role="button" tabindex="0" class="collapse-sidebar">
                        <i class="fa fa-outdent"></i>
                    </a>
                </li>

                <!--


                <li class="dropdown divided-right settings">
                    <a role="button" tabindex="0" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-cog"></i>
                    </a>


                    <ul class="dropdown-menu with-arrow animated littleFadeInUp" role="menu">


                        <li>
                            <div class="form-group">
                                <div class="row">
                                    <label class="col-xs-8 control-label">تولبار ثابت </label>
                                    <div class="col-xs-4 control-label">
                                        <div class="onoffswitch lightred small">
                                            <input type="checkbox" name="onoffswitch"
                                                   class="onoffswitch-checkbox" id="fixed-header"
                                                   checked="">
                                            <label class="onoffswitch-label" for="fixed-header">
                                                <span class="onoffswitch-inner"></span>
                                                <span class="onoffswitch-switch"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>


                    </ul>
                </li>


                -->
            </ul>
            <!-- Left-side navigation end -->


            <!-- Search
            <div class="search" id="main-search">
                <input type="text" class="form-control underline-input" placeholder="جستجو ...">
            </div>
         Search end -->


            <!-- Right-side navigation -->
            <ul class="nav-right pull-right list-inline">

                <li class="dropdown messages">

                    <a href class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                        <span class="badge bg-lightred">4</span>
                    </a>

                    <div class="dropdown-menu pull-right with-arrow panel panel-default animated littleFadeInDown"
                         role="menu">

                        <div class="panel-heading">
                            شما  <strong>4</strong> پیام جدید دارید
                        </div>

                        <ul class="list-group">

                            <li class="list-group-item">
                                <a role="button" tabindex="0" class="media">
                                            <span class="pull-left media-object thumb thumb-sm">
                                                <img src="assets/images/ici-avatar.jpg" alt=""
                                                     class="img-circle">
                                            </span>
                                    <div class="media-body">
                                        <span class="block">پیام نمونه</span>
                                        <small class="text-muted">شنبه 23 خرداد  </small>
                                    </div>
                                </a>
                            </li>



                        </ul>

                        <div class="panel-footer">
                            <a role="button" tabindex="0">صندوق پیام  <i
                                        class="pull-right fa fa-angle-right"></i></a>
                        </div>

                    </div>

                </li>

                <li class="dropdown notifications">

                    <a href class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell"></i>
                        <span class="badge bg-lightred">3</span>
                    </a>

                    <div class="dropdown-menu pull-right with-arrow panel panel-default animated littleFadeInLeft">

                        <div class="panel-heading">
                           شما <strong>3</strong> اعلان جدید دارید
                        </div>

                        <ul class="list-group">

                            <li class="list-group-item">
                                <a role="button" tabindex="0" class="media">
                                            <span class="pull-left media-object media-icon bg-danger">
                                                <i class="fa fa-ban"></i>
                                            </span>
                                    <div class="media-body">
                                        <span class="block">اعلان نمونه   </span>
                                        <small class="text-muted">دوشنبه 14 تیر </small>
                                    </div>
                                </a>
                            </li>





                        </ul>

                        <div class="panel-footer">
                            <a role="button" tabindex="0">اعلانات پیشین <i
                                        class="fa fa-angle-right pull-right"></i></a>
                        </div>

                    </div>

                </li>

                <li class="dropdown nav-profile">

                    <a href class="dropdown-toggle" data-toggle="dropdown">
                        <img src="assets/images/profile-photo.jpg" alt=""
                             class="img-circle size-30x30">
                        <span>نام  کاربری  <i class="fa fa-angle-down"></i></span>
                    </a>

                    <ul class="dropdown-menu animated littleFadeInRight" role="menu">

                        <li>
                            <a role="button" tabindex="0">
                                <i class="fa fa-user"></i>مشخصات
                            </a>
                        </li>
                        <li>
                            <a role="button" tabindex="0">
                                <i class="fa fa-cog"></i>تنظیمات
                            </a>
                        </li>
                        <li class="divider"></li>

                        <li>
                            <a role="button" tabindex="0" href="<?= Url('/home/admin' ); ?>">
                                <i class="fa fa-sign-out"></i>خروج
                            </a>
                        </li>

                    </ul>

                </li>
                <!--
                                <li class="toggle-right-sidebar">
                                    <a role="button" tabindex="0">
                                        <i class="fa fa-comments"></i>
                                    </a>
                                </li>
                                 -->


            </ul>

            <!-- Right-side navigation end -->

        </header>

    </section>
    <div id="controls">

        <aside id="sidebar">


            <div id="sidebar-wrap">

                <div class="panel-group slim-scroll" role="tablist">
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#sidebarNav">
                                    Navigation <i class="fa fa-angle-up"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="sidebarNav" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">


                                <!-- ===================================================
                                        ================= NAVIGATION Content ===================
                                        ==================================================== -->
                                <ul id="navigation">
                                    <!--
                                    <li class="active"><a href="<?= Url('/admin' ); ?>"><i
                                                    class="fa fa-dashboard"></i> <span>پنل مدیریت</span></a>
                                    </li>
                                    <li>
                                        <a role="button" tabindex="0"><i
                                                    class="fa fa-ticket"></i> <span>پیام ها</span>
                                            <span class="badge bg-lightred">0</span></a>
                                        <ul>
                                            <li><a href="<?= Url('/ticket/admin/create' ); ?>"><i
                                                            class="fa fa-caret-right"></i> ارسال پیام</a></li>
                                            <li><a href="<?= Url('/ticket/admin/manage' ); ?>"><i
                                                            class="fa fa-caret-right"></i>  مدیریت پیام ها</a>
                                            </li>

                                        </ul>
                                    </li>
                                    -->


                                    @if(2==3)
                                    <li>
                                        <a role="button" tabindex="0"><i class="fa fa-pencil"></i>
                                            <span>تنظیم فاکتور </span>   <span class="label label-success">new</span>
                                        </a>
                                        <ul>

                                            <li><a href="<?= Url('/home/admin/deny') ?>"><i
                                                            class="fa fa-caret-right"></i> مدیریت تخفیفات</a></li>
                                            <li><a href="<?= Url('/home/admin/deny') ?>"><i
                                                            class="fa fa-caret-right"></i> تنظیم مالیات</a></li>
                                            <li><a href="<?= Url('/home/admin/deny') ?>"><i
                                                            class="fa fa-caret-right"></i> هزینه حمل و نقل </a></li>

                                        </ul>
                                    </li>
                                    @endif





                                    <li>
                                        <a role="button" tabindex="0"><i
                                                    class="fa fa-shopping-cart"></i> <span>  محصولات</span>
                                          </a>
                                        <ul>
                                            @can('add product','edit product','delete product')
                                            <li><a href="<?= route('product.index') ?>"><i
                                                            class="fa fa-caret-right"></i> مدیریت محصولات </a>
                                            </li>
                                            @endcan
                                            @can('add pcat','edit pcat','delete pcat')
                                            <li><a href="<?= route('pcategory.list') ?>"><i
                                                            class="fa fa-caret-right"></i>  مدیریت دسته بندی ها</a></li>
                                            @endcan
                                            @can('apply pcomment','reply pcomment','delete pcomment')
                                            <li><a href="<?= route('product.comment.list') ?>"><i
                                                            class="fa fa-caret-right"></i>  مدیریت نظرات محصول</a></li>

                                            @endcan
                                            @can('add pshipping','edit pshipping','delete pshipping')
                                            <li>
                                                <a href="<?= Url('/shop/admin/shipping') ?>">
                                                    <i class="fa fa-caret-right"></i> سیستم های حمل و نقل
                                                </a>
                                            </li>
                                            @endcan
                                            @can('add provider','edit provider','delete provider')
                                            <li>
                                                <a href="<?= Url('/shop/admin/providers') ?>">
                                                    <i class="fa fa-caret-right"></i>تولید کننده ها محصولات
                                                </a>
                                            </li>
                                            @endcan
                                            @can('add brand','edit brand','delete brand')
                                            <li>
                                                <a href="<?= Url('/shop/admin/brands') ?>">
                                                    <i class="fa fa-caret-right"></i>برند محصولات
                                                </a>
                                            </li>
                                            @endcan

                                        </ul>
                                    </li>


                                    <li>
                                        <a role="button" tabindex="0"><i
                                                    class="fa fa-file-text"></i>
                                            <span>    مدیریت فروشگاه  </span>
                                       </a>
                                        <ul>
                                            @can('order')
                                            <li><a href="{{ route('order.list') }}"><i
                                                            class="fa fa-caret-right"></i>  سفارشات </a>
                                            </li>
                                            @endcan
                                            @can('invoice','edit invoice')
                                            <li><a href="{{ route('invoice.list') }}"><i
                                                            class="fa fa-caret-right"></i> فاکتورها </a>
                                            </li>
                                            @endcan
                                        </ul>
                                    </li>


                                    <li>
                                        <a role="button" tabindex="0"><i class="fa fa-user"></i>
                                            <span>مدیریت کاربران</span></a>
                                        <ul>
                                            @can('add user','edit user','delete user')
                                            <li><a href="<?= Url('/home/admin/users' ); ?>"><i
                                                            class="fa fa-caret-right"></i>  کاربران سایت</a>
                                            </li>
                                            @endcan
                                            @can('add manager','edit manager','delete manager')
                                            <li><a href="<?= Url('/home/admin/managers' ); ?>"><i
                                                            class="fa fa-caret-right"></i> کاربران پنل</a>
                                            </li>
                                            @endcan
                                            @can('add role','edit role','delete role')
                                            <li><a href="<?= route('role.index') ?>"><i
                                                            class="fa fa-caret-right"></i>نقش های کاربران پنل</a>
                                            </li>
                                            @endcan

                                        </ul>
                                    </li>



                                    @if(2==3)
                                    <li>
                                        <a role="button" tabindex="0"><i
                                                    class="fa fa-map-marker"></i> <span> ارسال ها</span></a>
                                        <ul>
                                            <li><a href="<?= Url('/home/admin/deny') ?>"><i
                                                            class="fa fa-caret-right"></i> وضعیت ارسال ها </a>
                                            </li>
                                            <li><a href="<?= Url('/home/admin/deny') ?>"><i
                                                            class="fa fa-caret-right"></i> مدیریت ارسال </a>
                                            </li>
                                        </ul>
                                    </li>



                                    <li><a href="<?= Url('/home/admin/chart' ); ?>"><i class="fa fa-bar-chart-o"></i>
                                            <span>آنالیز فروش  </span>
                                            <span class="label label-success">new</span>

                                        </a>
                                    </li>
                                    @endif



                                    <li>
                                        <a role="button" tabindex="0"><i
                                                    class="fa fa-file-text"></i> <span> مدیریت محتوا </span></a>
                                        <ul>
                                            @can('add content','edit content','delete content')
                                            <li><a href="<?= Url('/content/admin/content/manage' ); ?>"><i
                                                            class="fa fa-caret-right"></i> مدیریت مطالب </a>
                                            </li>
                                            @endcan
                                            @can('add ccat','edit ccat','delete ccat')
                                            <li><a href="<?= Url('/content/admin/category/manage' ); ?>"><i
                                                            class="fa fa-caret-right"></i> دسته بندی مطالب </a>
                                            </li>
                                            @endcan
                                            @can('apply ccomment','reply ccomment','delete ccomment')
                                                    <li><a href="<?= route('content.comment.list') ?>"><i
                                                            class="fa fa-caret-right"></i>  مدیریت نظرات محتوا</a></li>
                                            @endcan
                                        </ul>
                                    </li>
                                    <!--
                                    <li>
                                        <a role="button" tabindex="0"><i
                                                    class="fa fa-comments-o"></i> <span> نظرات </span></a>
                                        <ul>
                                            <li><a href="<?= Url('/shop/admin/comment' ); ?>"><i
                                                            class="fa fa-caret-right"></i> نظرات محصولات </a>
                                            </li>
                                            <li><a href="<?= Url('/content/admin/comment') ?>"><i
                                                            class="fa fa-caret-right"></i>  نظرات محتوا</a>
                                            </li>
                                        </ul>
                                    </li>
                                    -->



                                    <li>
                                        <a role="button" tabindex="0"><i
                                                    class="fa fa-newspaper-o"></i> <span>خبرنامه  </span></a>
                                        <ul>
                                            @can('newsletter')
                                            <li><a href="<?= Url('/home/admin/newsletter' ); ?>"><i
                                                            class="fa fa-caret-right"></i> ارسال ایمیل / اعلان </a>
                                            </li>
                                            @endcan

                                        </ul>
                                    </li>



                                    <!--
                                    <li><a href="<?= Url('/home/admin/slide/manage' ); ?>"><i class="fa fa-sliders"></i>
                                            <span> اسلایدشو  </span>
                                            <span class="label label-success">new</span>

                                        </a>
                                    </li>
                                    -->
                                    @can('newsletter')
                                    <li><a href=""><i class="fa fa-gears"></i>
                                            <span> تنظیمات  </span>
                                            <span class="label label-success">new</span>
                                        </a>
                                            <ul>
                                                <li>
                                                    <a>صفحات</a>
                                                    <ul>
                                                        @foreach(config('utility.names') as $key => $value)
                                                            <li><a href="{{ route('utility.index',['name' => $key]) }}"><i class="fa fa-arrow-circle-left"></i>{{ $value }}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            </ul>


                                    </li>
                                    @endcan
                                    @can('reply contactus','delete contactus')
                                    <li><a href="{{ route('contactus') }}"><i class="fa fa-sliders"></i>
                                            <span>  تماس با ما  </span>

                                        </a>
                                    </li>
                                    @endcan

                                    <li><a href="{{ route('admin.advertising') }}"><i class="fa fa-shekel"></i>
                                            <span>  مدیریت اگهی های  </span>

                                        </a>
                                    </li>
                                    <li><a href="{{ route('admin.userprofile') }}"><i class="fa fa-newspaper-o"></i>
                                            <span>  مدیریت فروشگاه ها و تعمیرگاه ها  </span>

                                        </a>
                                    </li>



                                    <!--
                                    <li>
                                        <a role="button" tabindex="0"><i
                                                    class="fa fa-file-text"></i>
                                            <span>    مدیریت آزمون ها  </span>
                                            <span class="label label-success">new</span></a>
                                        <ul>

                                            <li><a href="<?= Url('/home/admin/Test' ); ?>"><i
                                                            class="fa fa-caret-right"></i>  آزمون ها </a>
                                            </li>
                                            <li><a href="<?= Url('/home/admin/Qcat' ); ?>"><i
                                                            class="fa fa-caret-right"></i> دسته بندی سوالات </a>
                                            </li>
                                        </ul>
                                    </li>
                                    -->


                                </ul>
                                <!--/ NAVIGATION Content -->


                            </div>
                        </div>
                    </div>

                    @if(2==3)
                    <div class="panel charts panel-default">
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#sidebarCharts">
                                    Orders Summary <i class="fa fa-angle-up"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="sidebarCharts" class="panel-collapse collapse in" role="tabpanel">
                            <div class="panel-body">
                                <div class="summary">

                                    <div class="media">
                                        <a class="pull-right" role="button" tabindex="0">
                                                    <span class="sparklineChart"
                                                          values="5, 8, 3, 4, 6, 2, 1, 9, 7"
                                                          sparkType="bar"
                                                          sparkBarColor="#92424e"
                                                          sparkBarWidth="6px"
                                                          sparkHeight="36px">
                                                    Loading...</span>
                                        </a>
                                        <div class="media-body">
                                            This week sales
                                            <h4 class="media-heading">26, 149</h4>
                                        </div>
                                    </div>

                                    <div class="media">
                                        <a class="pull-right" role="button" tabindex="0">
                                                    <span class="sparklineChart"
                                                          values="2, 4, 5, 3, 8, 9, 7, 3, 5"
                                                          sparkType="bar"
                                                          sparkBarColor="#397193"
                                                          sparkBarWidth="6px"
                                                          sparkHeight="36px">
                                                    Loading...</span>
                                        </a>
                                        <div class="media-body">
                                            This week balance
                                            <h4 class="media-heading">318, 651</h4>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel settings panel-default">
                        <div class="panel-heading" role="tab">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#sidebarControls">
                                    General Settings <i class="fa fa-angle-up"></i>
                                </a>
                            </h4>
                        </div>
                        <div id="sidebarControls" class="panel-collapse collapse in"
                             role="tabpanel">
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-xs-8 control-label">Switch ON</label>
                                        <div class="col-xs-4 control-label">
                                            <div class="onoffswitch greensea">
                                                <input type="checkbox" name="onoffswitch"
                                                       class="onoffswitch-checkbox" id="switch-on"
                                                       checked="">
                                                <label class="onoffswitch-label" for="switch-on">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="row">
                                        <label class="col-xs-8 control-label">Switch OFF</label>
                                        <div class="col-xs-4 control-label">
                                            <div class="onoffswitch greensea">
                                                <input type="checkbox" name="onoffswitch"
                                                       class="onoffswitch-checkbox" id="switch-off">
                                                <label class="onoffswitch-label" for="switch-off">
                                                    <span class="onoffswitch-inner"></span>
                                                    <span class="onoffswitch-switch"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif




                </div>

            </div>


        </aside>


        @yield('content')


    </div>
</div>


<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery/jquery-1.11.2.min.js"><\/script>')</script>

<script src="<?= Url('assets/js/vendor/bootstrap/bootstrap.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/jRespond/jRespond.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/d3/d3.min.js' ); ?>"></script>
<script src="<?= Url('assets/js/vendor/d3/d3.layout.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/rickshaw/rickshaw.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/sparkline/jquery.sparkline.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/slimscroll/jquery.slimscroll.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/animsition/js/jquery.animsition.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/daterangepicker/moment.min.js' ); ?>"></script>
<script src="<?= Url('assets/js/vendor/daterangepicker/daterangepicker.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/screenfull/screenfull.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/flot/jquery.flot.min.js' ); ?>"></script>
<script src="<?= Url('assets/js/vendor/flot-tooltip/jquery.flot.tooltip.min.js' ); ?>"></script>
<script src="<?= Url('assets/js/vendor/flot-spline/jquery.flot.spline.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/easypiechart/jquery.easypiechart.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/raphael/raphael-min.js' ); ?>"></script>
<script src="<?= Url('assets/js/vendor/morris/morris.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/owl-carousel/owl.carousel.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/datetimepicker/js/bootstrap-datetimepicker.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/datatables/js/jquery.dataTables.min.js' ); ?>"></script>
<script src="<?= Url('assets/js/vendor/datatables/extensions/dataTables.bootstrap.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/chosen/chosen.jquery.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/summernote/summernote.min.js' ); ?>"></script>

<script src="<?= Url('assets/js/vendor/coolclock/coolclock.js' ); ?>"></script>
<script src="<?= Url('assets/js/vendor/coolclock/excanvas.js' ); ?>"></script>
<script src="{{asset('assets/js/vendor/touchspin/jquery.bootstrap-touchspin.min.js')}}"></script>
<!--/ vendor javascripts -->


<!-- ============================================
        ============== Custom JavaScripts ===============
        ============================================= -->
<script src="<?= Url('assets/js/main.js' ); ?>"></script>
<!--/ custom javascripts -->


<script>
    $(window).load(function () {
        // Initialize Statistics chart
        var data = [{
            data: [[1, 15], [2, 40], [3, 35], [4, 39], [5, 42], [6, 50], [7, 46], [8, 49], [9, 59], [10, 60], [11, 58], [12, 74]],
            label: 'Unique Visits',
            points: {
                show: true,
                radius: 4
            },
            splines: {
                show: true,
                tension: 0.45,
                lineWidth: 4,
                fill: 0
            }
        }, {
            data: [[1, 50], [2, 80], [3, 90], [4, 85], [5, 99], [6, 125], [7, 114], [8, 96], [9, 130], [10, 145], [11, 139], [12, 160]],
            label: 'Page Views',
            bars: {
                show: true,
                barWidth: 0.6,
                lineWidth: 0,
                fillColor: {colors: [{opacity: 0.3}, {opacity: 0.8}]}
            }
        }];

        var options = {
            colors: ['#e05d6f', '#61c8b8'],
            series: {
                shadowSize: 0
            },
            legend: {
                backgroundOpacity: 0,
                margin: -7,
                position: 'ne',
                noColumns: 2
            },
            xaxis: {
                tickLength: 0,
                font: {
                    color: '#fff'
                },
                position: 'bottom',
                ticks: [
                    [1, 'JAN'], [2, 'FEB'], [3, 'MAR'], [4, 'APR'], [5, 'MAY'], [6, 'JUN'], [7, 'JUL'], [8, 'AUG'], [9, 'SEP'], [10, 'OCT'], [11, 'NOV'], [12, 'DEC']
                ]
            },
            yaxis: {
                tickLength: 0,
                font: {
                    color: '#fff'
                }
            },
            grid: {
                borderWidth: {
                    top: 0,
                    right: 0,
                    bottom: 1,
                    left: 1
                },
                borderColor: 'rgba(255,255,255,.3)',
                margin: 0,
                minBorderMargin: 0,
                labelMargin: 20,
                hoverable: true,
                clickable: true,
                mouseActiveRadius: 6
            },
            tooltip: true,
            tooltipOpts: {
                content: '%s: %y',
                defaultTheme: false,
                shifts: {
                    x: 0,
                    y: 20
                }
            }
        };

        var plot = $.plot($("#statistics-chart"), data, options);

        $(window).resize(function () {
            // redraw the graph in the correctly sized div
            plot.resize();
            plot.setupGrid();
            plot.draw();
        });
        // * Initialize Statistics chart

        //Initialize morris chart
        Morris.Donut({
            element: 'browser-usage',
            data: [
                {label: 'Chrome', value: 25, color: '#00a3d8'},
                {label: 'Safari', value: 20, color: '#2fbbe8'},
                {label: 'Firefox', value: 15, color: '#72cae7'},
                {label: 'Opera', value: 5, color: '#d9544f'},
                {label: 'Internet Explorer', value: 10, color: '#ffc100'},
                {label: 'Other', value: 25, color: '#1693A5'}
            ],
            resize: true
        });
        //*Initialize morris chart


        // Initialize owl carousels
        $('#todo-carousel, #feed-carousel, #notes-carousel').owlCarousel({
            autoPlay: 5000,
            stopOnHover: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            responsive: true
        });

        $('#appointments-carousel').owlCarousel({
            autoPlay: 5000,
            stopOnHover: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            navigation: true,
            navigationText: ['<i class=\'fa fa-chevron-left\'></i>', '<i class=\'fa fa-chevron-right\'></i>'],
            singleItem: true
        });
        //* Initialize owl carousels


        // Initialize rickshaw chart
        var graph;

        var seriesData = [[], []];
        var random = new Rickshaw.Fixtures.RandomData(50);

        for (var i = 0; i < 50; i++) {
            random.addData(seriesData);
        }

        graph = new Rickshaw.Graph({
            element: document.querySelector("#realtime-rickshaw"),
            renderer: 'area',
            height: 133,
            series: [{
                name: 'Series 1',
                color: 'steelblue',
                data: seriesData[0]
            }, {
                name: 'Series 2',
                color: 'lightblue',
                data: seriesData[1]
            }]
        });

        var hoverDetail = new Rickshaw.Graph.HoverDetail({
            graph: graph,
        });

        graph.render();

        setInterval(function () {
            random.removeData(seriesData);
            random.addData(seriesData);
            graph.update();

        }, 1000);
        //* Initialize rickshaw chart

        //Initialize mini calendar datepicker
        $('#mini-calendar').datetimepicker({
            inline: true
        });
        //*Initialize mini calendar datepicker


        //todo's
        $('.widget-todo .todo-list li .checkbox').on('change', function () {
            var todo = $(this).parents('li');

            if (todo.hasClass('completed')) {
                todo.removeClass('completed');
            } else {
                todo.addClass('completed');
            }
        });
        //* todo's


        //initialize datatable
        $('#project-progress').DataTable({
            "aoColumnDefs": [
                {'bSortable': false, 'aTargets': ["no-sort"]}
            ],
        });
        //*initialize datatable

        //load wysiwyg editor
        $('#summernote').summernote({
            toolbar: [
                //['style', ['style']], // no style button
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']],
                //['insert', ['picture', 'link']], // no insert buttons
                //['table', ['table']], // no table button
                //['help', ['help']] //no help button
            ],
            height: 143   //set editable area's height
        });
        //*load wysiwyg editor
    });
</script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID.
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>

-->

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": 10000,
        "extendedTimeOut": 0,
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut",
        "tapToDismiss": false
    }

    @if(Session::has('message'))
  		toastr.info("{{ Session::get('message') }}");
    @endif

    @if(Session::has('success'))
  		toastr.success("{{ Session::get('success') }}");
    @endif


    @if(Session::has('info'))
toastr.info("{{ Session::get('info') }}");
    @endif


    @if(Session::has('warning'))
toastr.warning("{{ Session::get('warning') }}");
    @endif


    @if(Session::has('error'))
toastr.error("{{ Session::get('error') }}");
    @endif


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{  $error }}")
    @endforeach
    @endif


</script>
@yield('end_script')
</body>
</html>