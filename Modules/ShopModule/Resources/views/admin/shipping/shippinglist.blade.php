@extends('layouts.admin')
@section('content')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <!-- ====================================================
            ================= CONTENT ===============================
            ===================================================== -->
    <section id="content">

        <div class="page page-shop-orders">

            <div class="pageheader">

                <h2>سفارشات</h2>

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="{{ url('/admin') }}"><i class="fa fa-home"></i> پنل مدیریت</a>
                        </li>
                        <li>
                            <a href="">حمل و نقل</a>
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
                                <h1 class="custom-font"><strong>لیست </strong>حمل و نقل</h1>
                                <ul class="controls">
                                    <!--
                                    <li><a href="javascipt:;"><i class="fa fa-plus mr-5"></i>اضافه کردن</a></li>
                                    -->

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
                                        @can('add pshipping')
                                        <a data-toggle="modal" data-target=".add-page">
                                            <i class="fa fa-cog"></i>افزودن
                                            <i class="fa fa-plus"></i>

                                        </a>
                                        @endcan

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
                                            <th style="width:120px;">نام</th>
                                            <th style="width:120px;">قیمت ثابت</th>
                                            <th style="width:180px;">قیمت واحد وزن</th>
                                            <th style="width:80px;">استانهای تحت پوشش</th>
                                            <th style="width:100px;">ابعادها</th>
                                            <th style="width:150px;" class="no-sort">اعمال ها</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($shippings as $shipping)
                                                <tr>
                                                    <td>
                                                        <label class="checkbox checkbox-custom-alt checkbox-custom-sm m-0">
                                                            <input class="selectMe" type="checkbox" name="checked[]" value="{{$shipping->id}}"><i></i>
                                                        </label>
                                                    </td>
                                                    <td>{{$shipping->id}}</td>
                                                    <td>{{ $shipping->name }}</td>
                                                    <td>{{ $shipping->base_price }}</td>
                                                    <td>{{ $shipping->unit_price_weight }}</td>
                                                    <td>
                                                        @foreach($shipping->province as $province)
                                                            <span class="badge badge-primary">{{ $province->name }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <table>
                                                            <thead>
                                                                <tr>
                                                                    <th>از</th>
                                                                    <th>تا</th>
                                                                    <th>قیمت</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($shipping->size as $size)
                                                                <tr>
                                                                    <td>{{ $size->from_length }},{{ $size->from_width }},{{ $size->from_height }}</td>
                                                                    <td>{{ $size->to_length }},{{ $size->to_width }},{{ $size->to_height }}</td>
                                                                    <td>{{ $size->price }}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>

                                                    </td>
                                                    <td>
                                                        @can('edit pshipping')
                                                        <a data-toggle="modal" data-target=".edit-page-{{$shipping->id}}" class="btn btn-warning "><i class="fa fa-edit"></i>ویرایش</a>
                                                        @endcan
                                                        @can('delete pshipping')
                                                            <form action="{{ route('shipping.destroy',['shipping'=> $shipping]) }}" method="post" id="delete-{{$shipping->id}}">{{ method_field('delete') }}</form>
                                                        <a href="" onclick="document.getElementById('delete-{{$shipping->id}}').submit();" class="btn btn-danger">
                                                            <i class="fa fa-search"></i>حذف</a>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {!! $shippings->links() !!}
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
            $('#orders-list').DataTable({
                "paging": false,
                "drawCallback": function(settings, json) {
                    $('#select-all').change(function() {
                        if ($(this).is(":checked")) {
                            $('#orders-list tbody .selectMe').prop('checked', true);
                        } else {
                            $('#orders-list tbody .selectMe').prop('checked', false);
                        }
                    });
                }
            });
            //*initialize datatable
        });
    </script>
    <!--/ Page Specific Scripts -->
    @can('add pshipping')
        <div class="modal fade add-page" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>

                <form name="_token" method="POST" enctype="multipart/form-data"
                      action="{{ route('shipping.store') }}">
                    {{ csrf_field() }}
                    <div class="modal-body">


                        <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                        <input type="hidden" name="users_id" value="{{Auth::id()}} ">
                        <div class="col-md-6" style="float: right">
                            <div class="input-group"><p style="float: right">  نام واحد حمل و نقل</p>
                                <input required name="name" type="text"  class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="sec"><p>قیمت ثابت </p>
                                <input required name="base_price" type="text"  class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="sec"><p>قیمت واحد وزن </p>
                                <input required name="unit_price_weight" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="sec"><p>استان های تحت پوشش </p>
                                <select id="" name="province_list[]" class="form-control province_list" multiple>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="sec"><p>شهر های تحت پوشش </p>
                                <select name="city_list[]" class="form-control city_list" multiple>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <label for="picp">ابعاد های مورد تایید</label>
                            <table id="size">
                                <thead>
                                <tr>
                                    <th>از طول</th>
                                    <th>تا طول</th>
                                    <th>از عرض</th>
                                    <th>تا عرض</th>
                                    <th>از ارتفاع</th>
                                    <th>تا ارتفاع</th>
                                    <th>قیمت</th>
                                    <th>حذف</th>
                                </tr>
                                </thead>
                                <tbody class="size_wrapper" data-content="0">
                                </tbody>
                            </table>
                            <a href="javascript:void(0);" id="" class="btn btn-success addsize" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>

                        </div>

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
    @can('edit pshipping')
        @foreach($shippings as $shipping)
            <div class="modal fade edit-page-{{$shipping->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>

                        <form name="_token" method="POST" enctype="multipart/form-data"
                              action="{{ route('shipping.update',['id' =>$shipping->id]) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <div class="modal-body">


                                <input type="hidden" name="_token" value="{{ csrf_token() }} ">
                                <input type="hidden" name="users_id" value="{{Auth::id()}} ">
                                <div class="col-md-6" style="float: right">
                                    <div class="input-group"><p style="float: right">  نام واحد حمل و نقل</p>
                                        <input required name="name" type="text" value="{{$shipping->name}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="sec"><p>قیمت ثابت </p>
                                        <input required name="base_price" type="text" value="{{$shipping->base_price}}" class="form-control">
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <div class="sec"><p>قیمت واحد وزن </p>
                                        <input required name="unit_price_weight" type="text" value="{{$shipping->unit_price_weight}}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="sec"><p>استان های تحت پوشش </p>
                                        <select name="province_list[]" class="form-control province_list" multiple>
                                            @foreach($shipping->province as $province)
                                                <option value="{{ $province->id }}" selected="selected"> {{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="sec"><p>شهر های تحت پوشش </p>
                                        <select name="city_list[]" class="form-control city_list" multiple>
                                            @foreach($shipping->city as $city)
                                                <option value="{{ $city->id }}" selected="selected"> {{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <label for="picp">ابعاد های مورد تایید</label>
                                    <table id="size">
                                        <thead>
                                        <tr>
                                            <th>از طول</th>
                                            <th>تا طول</th>
                                            <th>از عرض</th>
                                            <th>تا عرض</th>
                                            <th>از ارتفاع</th>
                                            <th>تا ارتفاع</th>
                                            <th>قیمت</th>
                                            <th>حذف</th>
                                        </tr>
                                        </thead>
                                        <tbody class="size_wrapper" data-content="{{ count($shipping->size) }}">
                                        @foreach($shipping->size as $key => $size)
                                            <tr>
                                                <td><input class="form-control" type="text" value="{{ $size->from_length }}" name="from_length[{{$key}}]"></td>
                                                <td><input class="form-control" type="text" value="{{ $size->to_length }}" name="to_length[{{$key}}]"></td>
                                                <td><input class="form-control" type="text" value="{{ $size->from_width }}" name="from_width[{{$key}}]"></td>
                                                <td><input class="form-control" type="text" value="{{ $size->to_width }}" name="to_width[{{$key}}]"></td>
                                                <td><input class="form-control" type="text" value="{{ $size->from_height }}" name="from_height[{{$key}}]"></td>
                                                <td><input class="form-control" type="text" value="{{ $size->to_height }}" name="to_height[{{$key}}]"></td>
                                                <td><input class="form-control" type="text" value="{{ $size->price }}" name="price[{{$key}}]"></td>
                                                <td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <a href="javascript:void(0);" id="" class="btn btn-success addsize" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>

                                </div>



                                {{--<div class="panel with-nav-tabs panel-default">--}}
                                    {{--<div class="panel-heading">--}}
                                        {{--<ul class="nav nav-tabs">--}}
                                            {{--<li class="active"><a href="#tab1default{{$shipping->id}}" data-toggle="tab">عمومی</a></li>--}}
                                            {{--<li><a href="#tab2default{{$shipping->id}}" data-toggle="tab">عکس</a></li>--}}
                                            {{--<li><a href="#tab3default{{$shipping->id}}" data-toggle="tab">فایل</a></li>--}}
                                            {{--<li><a href="#tab4default{{$shipping->id}}" data-toggle="tab">مشخصات</a></li>--}}

                                        {{--</ul>--}}
                                    {{--</div>--}}
                                    {{--<div class="panel-body">--}}
                                        {{--<div class="tab-content">--}}
                                            {{--<div class="tab-pane fade in active" id="tab1default{{$shipping->id}}">--}}
                                                {{----}}
                                            {{--</div>--}}
                                            {{--<div class="tab-pane fade" id="tab2default{{$shipping->id}}">--}}
                                                {{--<div id="image-post-store" style=" margin: 10px;">--}}

                                                    {{----}}

                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="tab-pane fade" id="tab3default{{$product->id}}">--}}
                                                {{--<div class="col-md-12">--}}

                                                    {{--<div class="border-bottom margin_bottom1 border-dark" style="border-bottom-width: 1px">--}}
                                                        {{--<label>ویدیو اول محصول</label>--}}
                                                        {{--<ul>--}}
                                                            {{--<li>--}}
                                                                {{--@if($product->file)--}}
                                                                    {{--<label>:لینک ویدیو</label>--}}
                                                                    {{--<a href="{{ asset($product->file) }}">file</a>--}}
                                                                {{--@endif--}}
                                                            {{--</li>--}}
                                                            {{--<li>--}}
                                                                {{--<input type="file" name="file" >--}}

                                                            {{--</li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                    {{--<div id="file" style=" margin: 10px;">--}}

                                                        {{--<label>فایل</label>--}}
                                                        {{--<div>--}}
                                                            {{--<table class="table-striped " style="width:100%">--}}
                                                                {{--<tbody class="file_field">--}}
                                                                {{--<tr>--}}
                                                                    {{--<th>نوع</th>--}}
                                                                    {{--<th>نام</th>--}}
                                                                    {{--<th>فایل</th>--}}
                                                                    {{--<th>زمان</th>--}}
                                                                    {{--<th>حذف</th>--}}
                                                                {{--</tr>--}}
                                                                {{--@foreach($products_file as $k1 => $item)--}}
                                                                    {{--@if( $product->id == $item->product_id)--}}
                                                                        {{--<tr>--}}
                                                                            {{--<input type="hidden" name="pre_ids[]" value="{{$item->id}}">--}}
                                                                            {{--<td>--}}
                                                                                {{--<select class="form-control" name="pre_file_type[{{$item->id}}]">--}}
                                                                                    {{--@foreach(config('file_type') as $key => $cat)--}}
                                                                                        {{--<option--}}
                                                                                                {{--@if($key == $item->group_id)--}}
                                                                                                {{--selected--}}
                                                                                                {{--@endif--}}
                                                                                                {{--value="{{$key}}">{{$cat}}</option>--}}

                                                                                    {{--@endforeach--}}
                                                                                {{--</select>--}}
                                                                            {{--</td>--}}
                                                                            {{--<td>--}}
                                                                                {{--<input type="text" name="pre_file_name[{{$item->id}}]" class="form-control" value="{{$item->name}}">--}}
                                                                            {{--</td>--}}
                                                                            {{--<td>--}}

                                                                                {{--<input id="pri_file{{$item->id}}{{$k1}}" class="form-control" type="text" name="pre_file_file[{{$item->id}}]" value="{{$item->file}}">--}}
                                                                                {{--<a data-input="pri_file{{$item->id}}{{$k1}}" class="filelfm btn btn-primary"> <i class="fa fa-file-o"></i>انتخاب</a></td>--}}

                                                                            {{--</td>--}}
                                                                            {{--<td>--}}
                                                                                {{--<input type="text" name="pre_file_time[{{$item->id}}]" class="form-control" value="{{$item->time}}">--}}
                                                                            {{--</td>--}}
                                                                            {{--<td>--}}
                                                                                {{--<a href="javascript:void(0);" class="file_remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a>--}}
                                                                            {{--</td>--}}

                                                                        {{--</tr>--}}
                                                                    {{--@endif--}}
                                                                {{--@endforeach--}}
                                                                {{--</tbody>--}}
                                                            {{--</table>--}}
                                                            {{--<a href="javascript:void(0);" class="file_add_button btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>--}}

                                                        {{--</div>--}}



                                                        {{--<div>--}}
                                                        {{--</div><br>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            {{--<div class="tab-pane fade" id="tab4default{{$product->id}}">--}}
                                                {{--<table class="table-striped " style="width:100%">--}}
                                                    {{--<tbody class="field_wrapper">--}}
                                                    {{--<tr>--}}
                                                        {{--<th>دسته بندی</th>--}}
                                                        {{--<th>عنوان</th>--}}
                                                        {{--<th>توضیحات</th>--}}
                                                        {{--<th>حذف</th>--}}
                                                    {{--</tr>--}}
                                                    {{--@foreach($productsDetail as $item)--}}
                                                        {{--@if( $product->id == $item->product_id)--}}
                                                            {{--<tr>--}}
                                                                {{--<td>--}}
                                                                    {{--<select class="form-control" name="datail_group[]">--}}
                                                                        {{--<option value="0">بدون دسته</option>--}}
                                                                        {{--@foreach($detailgroup as $cat)--}}
                                                                            {{--<option--}}
                                                                                    {{--@if($cat->id == $item->group_id)--}}
                                                                                    {{--selected--}}
                                                                                    {{--@endif--}}
                                                                                    {{--@if($cat->parent_id == 0)--}}
                                                                                    {{--style="font-weight: 600;color: #2C3E50"--}}
                                                                                    {{--@endif--}}
                                                                                    {{--value="{{$cat->id}}">{{$cat->title}}</option>--}}

                                                                        {{--@endforeach--}}
                                                                    {{--</select>--}}
                                                                {{--</td>--}}
                                                                {{--<td>--}}
                                                                    {{--<input type="text" name="detail_name[]" class="form-control" value="{{$item->title}}">--}}
                                                                {{--</td>--}}
                                                                {{--<td>--}}
                                                                    {{--<input type="text" name="detail_description[]" class="form-control" value="{{$item->description}}">--}}
                                                                {{--</td>--}}
                                                                {{--<td>--}}
                                                                    {{--<a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a>--}}
                                                                {{--</td>--}}

                                                            {{--</tr>--}}
                                                        {{--@endif--}}
                                                    {{--@endforeach--}}
                                                    {{--</tbody>--}}
                                                {{--</table>--}}
                                                {{--<a href="javascript:void(0);" class="adddbutton btn btn-success" style="margin-top: 10px" title="Add field"><span class="glyphicon glyphicon-plus"></span></a>--}}

                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                                <div class="modal-footer" >
                                    <a type="button" class="btn red-bg" data-dismiss="modal">بستن</a>
                                    <button  type="submit"  name="_token" value="{{ csrf_token() }}" class="btn  blue-bg">ثبت</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    @endcan
    <script type="text/javascript">
        // $(document).ready(function(){

        window.onload = function() {
            var key=0;
            $('.addsize').click(function(){ //Once add button is clicked
                console.log('hey');
                key=$(this).siblings('table').children('.size_wrapper').attr('data-content');
                $(this).siblings('table').children('.size_wrapper').append('<tr>'+
                    '<td><input class="form-control" type="text"  name="from_length['+key+']"></td>'+
                    '<td><input class="form-control" type="text"  name="to_length['+key+']"></td>'+
                    '<td><input class="form-control" type="text" name="from_width['+key+']"></td>'+
                    '<td><input class="form-control" type="text" name="to_width['+key+']"></td>'+
                    '<td><input class="form-control" type="text" name="from_height['+key+']"></td>'+
                    '<td><input class="form-control" type="text" name="to_height['+key+']"></td>'+
                    '<td><input class="form-control" type="text" name="price['+key+']"></td>'+
                    '<td> <a href="javascript:void(0);" class="remove_button" title="Remove field"><span class="glyphicon glyphicon-remove"></span></a></td> </tr>'+
                    '</tr>'); // Add field html
                key++;
                $(this).siblings('table').children('.size_wrapper').attr('data-content',key);

            });
            $('.size_wrapper').on('click', '.remove_button', function(e){ //Once remove button is clicked
                e.preventDefault();
                $(this).parent().parent().remove(); //Remove field html
                key=$(this).parent().parent().parent().attr('data-content');
                key--;
                $(this).parent().parent().parent().attr('data-content',key);
            });


        };
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $('.province_list').select2({
            placeholder: "استان ها را انتخاب کنید...",
            minimumInputLength: 2,
            width: '100%',
            ajax: {
                url: '/admin/provinces/find',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });

        $('.city_list').select2({
            placeholder: "استان ها را انتخاب کنید...",
            minimumInputLength: 2,
            width: '100%',
            ajax: {
                url: '/admin/city/find',
                dataType: 'json',
                data: function (params) {
                    return {
                        q: $.trim(params.term)
                    };
                },
                processResults: function (data) {
                    return {
                        results: data
                    };
                },
                cache: true
            }
        });
    </script>
    <!--/ CONTENT -->
@endsection