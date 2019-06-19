@extends('layouts.admin')
@section('content')

    <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
    <section id="content">

        <div class="page page-shop-orders">

            <div class="pageheader">

                <h2>فاکتورها <span></span></h2>

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="{{ url('/admin') }}"><i class="fa fa-home"></i> پنل مدیریت</a>
                        </li>
                        <li>
                            <a href="{{route('invoice.list')}}">لیست فاکتورها</a>
                        </li>
                    </ul>

                </div>

            </div>

            <!-- page content -->
            <div class="pagecontent">


                <!-- row -->
                <div class="row">
                    <!-- col -->
                    <div class="col-md-12">



                        <!-- tile -->
                        <section class="tile">

                            <!-- tile header -->
                            <div class="tile-header dvd dvd-btm">
                                <h1 class="custom-font"><strong>لیست </strong>فاکتورها</h1>
                                <ul class="controls">
                                    <li class="dropdown">

                                        <a role="button" tabindex="0" class="dropdown-toggle" data-toggle="dropdown">Tools <i class="fa fa-angle-down ml-5"></i></a>

                                        <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                            <li>
                                                <a href>Export to XLS</a>
                                            </li>
                                            <li>
                                                <a href>Export to CSV</a>
                                            </li>
                                            <li>
                                                <a href>Export to XML</a>
                                            </li>
                                            <li role="presentation" class="divider"></li>
                                            <li>
                                                <a href>Print Invoices</a>
                                            </li>

                                        </ul>

                                    </li>
                                    <li class="dropdown">

                                        <a role="button" tabindex="0" class="dropdown-toggle settings" data-toggle="dropdown">
                                            <i class="fa fa-cog"></i>
                                            <i class="fa fa-spinner fa-spin"></i>
                                        </a>

                                        <ul class="dropdown-menu pull-right with-arrow animated littleFadeInUp">
                                            <li>
                                                <a role="button" tabindex="0" class="tile-toggle">
                                                    <span class="minimize"><i class="fa fa-angle-down"></i>&nbsp;&nbsp;&nbsp;Minimize</span>
                                                    <span class="expand"><i class="fa fa-angle-up"></i>&nbsp;&nbsp;&nbsp;Expand</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a role="button" tabindex="0" class="tile-refresh">
                                                    <i class="fa fa-refresh"></i> Refresh
                                                </a>
                                            </li>
                                            <li>
                                                <a role="button" tabindex="0" class="tile-fullscreen">
                                                    <i class="fa fa-expand"></i> Fullscreen
                                                </a>
                                            </li>
                                        </ul>

                                    </li>
                                    <li class="remove"><a role="button" tabindex="0" class="tile-close"><i class="fa fa-times"></i></a></li>
                                </ul>
                            </div>
                            <!-- /tile header -->

                            <!-- tile body -->
                            <div class="tile-body">

                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-custom" id="orders-list">
                                        <thead>
                                        <tr>
                                            <th style="width:40px;" class="no-sort">
                                                <label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">
                                                    <input type="checkbox" id="select-all"><i></i>
                                                </label>
                                            </th>
                                            <th style="width:80px;">شماره </th>
                                            <th style="width:80px;">کد رهگیری </th>
                                            <th style="width:120px;">تاریخ</th>
                                            <th style="width:180px;">کاربر</th>
                                            <th style="width:80px;">وضعیت</th>
                                            <th style="width:100px;">جمع قیمت ها</th>
                                            <th style="width:150px;" class="no-sort">اعمال ها</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <!-- /tile body -->

                        </section>
                        <!-- /tile -->

                    </div>
                    <!-- /col -->
                </div>
                <!-- /row -->




            </div>
            <!-- /page content -->

        </div>

    </section>
    ============================================= -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script>window.jQuery || document.write('<script src="{{asset('assets/js/vendor/jquery/jquery-1.11.2.min.js')}}"><\/script>')</script>

    <script src="{{asset('assets/js/vendor/bootstrap/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/jRespond/jRespond.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/sparkline/jquery.sparkline.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/slimscroll/jquery.slimscroll.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/animsition/js/jquery.animsition.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/screenfull/screenfull.min.js')}}"></script>

    <script src="{{asset('assets/js/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/datatables/extensions/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('assets/js/vendor/datatables/extensions/Pagination/input.js')}}"></script>

    <script src="{{asset('assets/js/vendor/date-format/jquery-dateFormat.min.js')}}"></script>
    <!--/ vendor javascripts -->




    <!-- ============================================
    ============== Custom JavaScripts ===============
    ============================================= -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    <!--/ custom javascripts -->




    <!-- ===============================================
    ============== Page Specific Scripts ===============
    ================================================ -->
    <script>
        $(window).load(function(){

            //initialize datatable
//            $('#orders-list').DataTable({
//                "paging": false,
//                "drawCallback": function(settings, json) {
//                    $('#select-all').change(function() {
//                        if ($(this).is(":checked")) {
//                            $('#orders-list tbody .selectMe').prop('checked', true);
//                        } else {
//                            $('#orders-list tbody .selectMe').prop('checked', false);
//                        }
//                    });
//                }
//            });
            $('#orders-list').DataTable({
                serverSide: true,
                ajax: "{{ route('invoice.listget') }}",
                columns: [
                    { name: 'id' },
                    { name: 'tracking_code' },
                    { name: 'created_at' },
                    { name: 'user.name' },
                    { name: 'user.name' },
                    { name: 'state' },
                    { name: 'final_amount' },
                    { name: 'action', orderable: false, searchable: false }
                ]
        });
            //*initialize datatable
        });
    </script>
    <!--/ Page Specific Scripts -->

    <!--/ CONTENT -->
@endsection