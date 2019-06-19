@extends('layouts.admin')

@section('content')


    <section id="content">

        <div class="page page-dashboard">

            <div class="pageheader">

                <h2>داشبورد <span></span></h2>

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="#"><i class="fa fa-home"></i> پنل مدیریت</a>
                        </li>
                        <li>
                            <a href="#">داشبورد</a>
                        </li>
                    </ul>



                </div>

            </div>

            <!-- cards row -->

            <!-- /row -->


            <!-- row -->
            <div class="row">


                <!-- col -->
                <div class="col-md-8">

                    <!-- tile -->
                    <section class="tile">




                        <!-- tile body -->
                        <div class="tile-body">

                            <!-- row -->
                            <div class="row">


                                <!-- col -->
                                <div class="col-md-8 col-sm-12">

                                    <h4 class="underline custom-font mb-20"><strong>خلاصه</strong>
                                        آمار</h4>

                                    <!-- row -->
                                    <div class="row">
                                        <!-- col -->
                                        <div class="col-lg-4 text-center">
                                            <div class="easypiechart"
                                                 data-percent="{{ $sell['month']/$sell['all']*100 }}"
                                                 data-size="140"
                                                 data-bar-color="#418bca"
                                                 data-scale-color="false"
                                                 data-line-cap="round"
                                                 data-line-width="4"
                                                 style="width: 140px; height: 140px;">

                                                <i class="fa fa-usd fa-4x text-blue"
                                                   style="line-height: 140px;"></i>

                                            </div>
                                            <p class="text-uppercase text-elg mt-20 mb-0"><strong
                                                        class="text-blue">{{$sell['all']}}</strong>
                                                <small class="text-lg text-light text-default lt">
                                                    فروش
                                                </small>
                                            </p>
                                            <p class="text-light">
                                                {{--<i class="fa fa-caret-up text-success"></i> --}}
                                                {{$sell['month']}}
                                                ماه اخیر</p>
                                        </div>
                                        <!-- /col
                                                <!-- col -->
                                        <div class="col-lg-4 text-center">
                                            <div class="easypiechart"
                                                 data-percent="{{ $view['month']/$view['all']*100 }}"
                                                 data-size="140"
                                                 data-bar-color="#e05d6f"
                                                 data-scale-color="false"
                                                 data-line-cap="round"
                                                 data-line-width="4"
                                                 style="width: 140px; height: 140px;">

                                                <i class="fa fa-eye fa-4x text-lightred"
                                                   style="line-height: 140px;"></i>
                                                <p class="text-uppercase text-elg mt-20 mb-0">
                                                    <strong class="text-lightred">{{ $view['all'] }}</strong>
                                                    <small class="text-lg text-light text-default lt">
                                                        بازدید
                                                    </small>
                                                </p>
                                                <p class="text-light">
                                                    {{--<i class="fa fa-caret-down text-warning"></i>--}}
                                                    {{$view['month']}} در ماه اخیر </p>
                                            </div>
                                        </div>
                                        <!-- /col -->
                                        <!-- col -->
                                        <div class="col-lg-4 text-center">
                                            <div class="easypiechart"
                                                 data-percent="{{ $register['month']/$register['all']*100 }}"
                                                 data-size="140"
                                                 data-bar-color="#16a085"
                                                 data-scale-color="false"
                                                 data-line-cap="round"
                                                 data-line-width="4"
                                                 style="width: 140px; height: 140px;">

                                                <i class="fa fa-user fa-4x text-greensea"
                                                   style="line-height: 140px;"></i>
                                                <p class="text-uppercase text-elg mt-20 mb-0">
                                                    <strong class="text-greensea">{{$register['all']}}</strong>
                                                    <small class="text-lg text-light text-default lt">
                                                        مشتریان
                                                    </small>
                                                </p>
                                                <p class="text-light">
                                                    {{--<i class="fa fa-caret-down text-danger"></i>--}}
                                                    {{$register['month']}}  کاربر در ماه اخیر</p>
                                            </div>
                                        </div>
                                        <!-- /col -->
                                    </div>
                                    <!-- /row -->

                                </div>
                                <!-- /col -->


                                <!-- col -->
                                <div class="col-md-4 col-sm-12">

                                    <h4 class="underline custom-font"><strong>آمار</strong>
                                        فروش</h4>
                                    @foreach($cats as $cat)
                                        <div class="progress-list">
                                            <div class="details">
                                                <div class="title">{{ $cat->name }}</div>
                                            </div>
                                            <div class="status pull-right">
                                                <span>{{number_format($cat_percent[$cat->id],2)}}</span>%
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="progress-xs not-rounded progress">
                                                <div class="progress-bar progress-bar-dutch"
                                                     role="progressbar" aria-valuenow="40"
                                                     aria-valuemin="0" aria-valuemax="100"
                                                     style="width: {{number_format($cat_percent[$cat->id],2)}}%">
                                                    <span class="sr-only">{{number_format($cat_percent[$cat->id],2)}}%</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- /col -->


                            </div>
                            <!-- /row -->

                        </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                </div>
                <!-- /col -->


                <!-- col -->
                <div class="col-md-4">

                    <!-- tile -->
                    <section class="tile" fullscreen="isFullscreen02">




                        <!-- tile body -->
                        <div class="tile-body p-0">

                            <div class="panel-group icon-plus" id="accordion" role="tablist"
                                 aria-multiselectable="true">
                                <div class="panel panel-default panel-transparent">
                                    <div class="panel-heading" role="tab" id="headingOne">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapseOne" aria-expanded="true"
                                               aria-controls="collapseOne">
                                                <span><i class="fa fa-minus text-sm mr-5"></i>  ماه اخیر</span>
                                                {{--<span class="badge pull-right bg-lightred">3</span>--}}
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="panel-collapse collapse in"
                                         role="tabpanel" aria-labelledby="headingOne">
                                        <div class="panel-body">
                                            <table class="table table-no-border m-0">
                                                <tbody>
                                                @foreach($product['month'] as $key => $record)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{ $record->name }}</td>
                                                        <td>{{ $record->total }}</td>
                                                        <td>
                                                            {{--<i class="fa fa-caret-up text-success"></i>--}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default panel-transparent">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseTwo"
                                               aria-expanded="false" aria-controls="collapseTwo">
                                                <span><i class="fa fa-minus text-sm mr-5"></i> ماه گذشته </span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseTwo" class="panel-collapse collapse"
                                         role="tabpanel" aria-labelledby="headingTwo">
                                        <div class="panel-body">
                                            <table class="table table-no-border m-0">
                                                <tbody>
                                                @foreach($product['lastmonth'] as $key => $record)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{ $record->name }}</td>
                                                        <td>{{ $record->total }}</td>
                                                        <td>
                                                            {{--<i class="fa fa-caret-up text-success"></i>--}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default panel-transparent">
                                    <div class="panel-heading" role="tab" id="headingThree">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse"
                                               data-parent="#accordion" href="#collapseThree"
                                               aria-expanded="false" aria-controls="collapseThree">
                                                <span><i class="fa fa-minus text-sm mr-5"></i> یکسال اخیر </span>
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseThree" class="panel-collapse collapse"
                                         role="tabpanel" aria-labelledby="headingThree">
                                        <div class="panel-body">
                                            <table class="table table-no-border m-0">
                                                <tbody>
                                                @foreach($product['year'] as $key => $record)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{ $record->name }}</td>
                                                        <td>{{ $record->total }}</td>
                                                        <td>
                                                            {{--<i class="fa fa-caret-up text-success"></i>--}}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->

                </div>
                <!-- /col -->


            </div>
            <!-- /row -->



            <!-- row -->
            <div class="row">
                <!-- col -->
                <div class="col-md-8">
                    <!-- tile -->
                    <section class="tile">

                        <!-- tile header -->
                        <div class="tile-header dvd dvd-btm">
                            <h1 class="custom-font"><strong> </strong>محصولات</h1>
                            <ul class="controls">
                                <li>
                                    <a role="button" tabindex="0" class="pickDate">
                                        <span></span>&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
                                    </a>
                                </li>
                                <li class="dropdown">

                                    <a role="button" tabindex="0" class="dropdown-toggle settings"
                                       data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </a>

                                    <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                        <li>
                                            <a role="button" tabindex="0" class="tile-toggle">
                                                <span class="minimize"><i
                                                            class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;بستن</span>
                                                <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;تمام صفحه</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a role="button" tabindex="0" class="tile-refresh">
                                                <i class="fa fa-refresh"></i> رفرش
                                            </a>
                                        </li>
                                        <li>
                                            <a role="button" tabindex="0" class="tile-fullscreen">
                                                <i class="fa fa-expand"></i> تمام صفحه
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="remove"><a role="button" tabindex="0" class="tile-close"><i
                                                class="fa fa-times"></i></a></li>
                            </ul>
                        </div>
                        <!-- /tile header -->

                        <!-- tile body -->
                        <div class="tile-body table-custom">

                            <div class="table-responsive">
                                <table class="table table-custom" id="project-progress">
                                    <thead>
                                    <tr>
                                        <th>کد</th>
                                        <th>محصول</th>
                                        <th>دسته بندای</th>
                                        <th style="width: 200px;">درصد فروش</th>
                                        <th style="width: 60px;" class="text-right no-sort">فروش
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $pr)
                                        <tr>
                                            <td>{{$pr->id}}</td>
                                            <td>{{$pr->name}}</td>
                                            <td>
                                                <small class="text-danger">{{$pr->cat_name}} </small>
                                            </td>
                                            <td>
                                                <div class="progress-xxs not-rounded mb-0 inline-block progress"
                                                     style="width: 150px; margin-right: 5px">
                                                    <div class="progress-bar progress-bar-greensea"
                                                         role="progressbar" aria-valuenow="{{number_format($product_percent[$pr->id],2)}}"
                                                         aria-valuemin="0" aria-valuemax="100"
                                                         style="width: {{number_format($product_percent[$pr->id],2)}}%;"></div>
                                                </div>
                                                <small>{{number_format($product_percent[$pr->id],2)}}%</small>
                                            </td>
                                            <td class="text-right">
                                                    <span class="sparklineChart"
                                                          values="@foreach($product_sell[$pr->id] as $key => $month){{ $month->total }} @if(isset($product_sell[$pr->id][$key+1])),@endif @endforeach"
                                                          sparkType="bar"
                                                          sparkBarColor="#cd97eb"
                                                          sparkBarWidth="4px"
                                                          sparkHeight="18px">
                                                    Loading...</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /tile body -->

                    </section>
                    <!-- /tile -->
                </div>
                <!-- /col -->


                <!-- col -->
                <div class="col-md-4">
                    <!-- tile -->
                    <section class="tile">

                        <!-- tile header -->
                        <div class="tile-header dvd dvd-btm">
                            <h1 class="custom-font"><strong>ارسال ها </strong></h1>
                            <ul class="controls">
                                <li class="dropdown">

                                    <a role="button" tabindex="0" class="dropdown-toggle settings"
                                       data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </a>

                                    <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                        <li>
                                            <a role="button" tabindex="0" class="tile-toggle">
                                                <span class="minimize"><i
                                                            class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;بستن</span>
                                                <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;نمایش</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a role="button" tabindex="0" class="tile-refresh">
                                                <i class="fa fa-refresh"></i> رفرش
                                            </a>
                                        </li>
                                        <li>
                                            <a role="button" tabindex="0" class="tile-fullscreen">
                                                <i class="fa fa-expand"></i> تمام صفحه
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="remove"><a role="button" tabindex="0" class="tile-close"><i
                                                class="fa fa-times"></i></a></li>
                            </ul>
                        </div>
                        <!-- /tile header -->









                    </section>




                    <!-- tile -->
                    <section class="tile bg-greensea">

                        <!-- tile header -->
                        <div class="tile-header dvd dvd-btm">
                            <h1 class="custom-font"><strong> اعلان های جدید </strong></h1>
                            <ul class="controls">
                                <li class="dropdown">

                                    <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                        <i class="fa fa-cog"></i>
                                        <i class="fa fa-spinner fa-spin"></i>
                                    </a>

                                    <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                        <li>
                                            <a role="button" tabindex="0" class="tile-toggle">
                                                <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;بستن</span>
                                                <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;نمایش</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a role="button" tabindex="0" class="tile-refresh">
                                                <i class="fa fa-refresh"></i> رفرش
                                            </a>
                                        </li>
                                        <li>
                                            <a role="button" tabindex="0" class="tile-fullscreen">
                                                <i class="fa fa-expand"></i> تمام صفحه
                                            </a>
                                        </li>
                                    </ul>

                                </li>
                                <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                            </ul>
                        </div>
                        <!-- /tile header -->

                        <!-- tile widget -->
                        <div class="tile-widget">
                            <p>اعلان نمونه</p>
                        </div>
                        <!-- /tile widget -->

                        <!-- tile body -->
                        <div class="tile-body">
                            <p>اعلان نمونه</p>
                        </div>
                        <!-- /tile body -->

                        <!-- tile footer -->
                        <div class="tile-footer">
                            <p>اعلان نمونه</p>
                        </div>
                        <!-- /tile footer -->

                    </section>
                    <!-- /tile -->

                    <!-- /tile -->
                </div>
                <!-- /col -->


            </div>
            <!-- /row -->



        </div>


    </section>


@endsection