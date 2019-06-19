@extends('layouts.admin')
@section('content')

    <!-- ====================================================
    ================= CONTENT ===============================
    ===================================================== -->
    <section id="content">

        <div class="page page-shop-single-order">

            <div class="pageheader">

                <h2>فاکتور شماره #{{ $invoice->id }}</h2>

                <div class="page-bar">

                    <ul class="page-breadcrumb">
                        <li>
                            <a href="{{ url('/admin') }}"><i class="fa fa-home"></i> پنل مدیریت</a>
                        </li>
                        <li>
                            <a href="{{route('invoice.list')}}">لیست فاکتورها</a>
                        </li>
                        <li>
                            <a href="">فاکتور</a>
                        </li>
                    </ul>

                </div>

            </div>

            <div class="pagecontent">


                <div class="add-nav">
                    <div class="nav-heading">
                        <h3>جزئیات فاکتور : <strong class="text-greensea">#{{ $invoice->id }}</strong></h3>
                        <span class="controls pull-left">
                                  <a href="shop-orders.html" class="btn btn-ef btn-ef-1 btn-ef-1-default btn-ef-1a btn-rounded-20 mr-5" data-toggle="tooltip" title="Back"><i class="fa fa-times"></i></a>
                                  <a href="javascript:;" class="btn btn-ef btn-ef-1 btn-ef-1-default btn-ef-1a btn-rounded-20 mr-5" data-toggle="tooltip" title="Send"><i class="fa fa-envelope"></i></a>
                                  <a href="javascript:window.print()" class="btn btn-ef btn-ef-1 btn-ef-1-default btn-ef-1a btn-rounded-20" data-toggle="tooltip" title="Print"><i class="fa fa-print"></i></a>
                                </span>
                    </div>

                    <div role="tabpanel">

                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#details" aria-controls="details" role="tab" data-toggle="tab">جزئیات</a></li>
                            <li role="presentation"><a href="#invoices" aria-controls="invoices" role="tab" data-toggle="tab">حمل و نقل</a></li>
                            <!--
                            <li role="presentation"><a href="#payments" aria-controls="payments" role="tab" data-toggle="tab">Payments</a></li>
                            <li role="presentation"><a href="#notes" aria-controls="notes" role="tab" data-toggle="tab">Notes</a></li>
                            <li role="presentation"><a href="#historyTab" aria-controls="history" role="tab" data-toggle="tab">History</a></li>
                            -->
                        </ul>

                        <div class="tab-content">
                            <!-- tab in tabs -->
                            <div role="tabpanel" class="tab-pane active" id="details">



                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-12">


                                        <!-- tile -->
                                        <section class="tile time-simple">


                                            <!-- tile body -->
                                            <div class="tile-body">


                                                <!-- row -->
                                                <div class="row">

                                                    <!-- col -->
                                                    <div class="col-md-9">
                                                        <p class="text-default lt">ایجاد شده: {!!  to_jalali($invoice->created_at)!!}</p>
                                                        <p class="text-uppercase text-strong mt-40 mb-0 custom-font">وضعیت</p>
                                                        @if($invoice->state == 0)
                                                            <h3 class="text-uppercase text-danger mt-0 mb-20">پرداخت نشده</h3>
                                                        @elseif($invoice->state == 1)
                                                            <h3 class="text-uppercase text-success mt-0 mb-20">پرداخت شده</h3>
                                                        @endif
                                                        <p class="text-uppercase text-strong mt-40 mb-0 custom-font">:کد رهگیری</p>
                                                        <h3 class="mt-0 mb-20">{{$invoice->tracking_code}}</h3>
                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-3">
                                                        <p class="text-uppercase text-strong mb-10 custom-font">مشتری</p>
                                                        <ul class="list-unstyled text-default lt mb-20">
                                                            <?php $user =$invoice->user ?>
                                                            <li><strong class="inline-block w-xs">نام:</strong>{{ $user->name }}</li>
                                                            <li><strong class="inline-block w-xs">ایمیل:</strong> <a href="javascript:;">{{ $user->email }}</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /col -->

                                                </div>
                                                <!-- /row -->

                                                <!-- row -->
                                                <div class="row b-t pt-20">

                                                    <!-- col -->
                                                    <div class="col-md-3 b-r">
                                                        <p class="text-uppercase text-strong mb-10 custom-font">جزئیات سفارش</p>
                                                        <ul class="list-unstyled text-default lt mb-20">
                                                            <li><strong>شماره:</strong> <a href="javascript:;">{{ $invoice->id }}</a></li>
                                                            <li>{!!  to_jalali($invoice->created_at)!!}</li>
                                                            <li>{{ $user->name }}</li>
                                                        </ul>
                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-6 b-r">

                                                            <p class="text-uppercase text-strong mb-10 custom-font">
                                                                توضیحات کاربر
                                                                <a href="javascript:;" class="btn btn-default btn-rounded-20 btn-xs pull-right"><i class="fa fa-pencil"></i></a>
                                                            </p>

                                                            <!-- col -->
                                                        <div class="col-md-6">

                                                           <ul class="list-unstyled text-default lt mb-20">
                                                                <li>{{ $user->detail }}</li>
                                                            </ul>

                                                        </div>
                                                        <!-- /col -->

                                                        <!-- col -->
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled text-default lt mb-20">
                                                                <li>{{ $user->email }}</li>
                                                            </ul>
                                                        </div>
                                                        <!-- /col -->

                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-3">
                                                        <!--<p class="text-uppercase text-strong mb-10 custom-font">Delivery &amp; Payment</p>
                                                        <ul class="list-unstyled text-default lt mb-20">
                                                            <li><strong>Delivery:</strong> Pick-Up</li>
                                                            <li><strong>Payment:</strong> Cash</li>
                                                        </ul>
                                                        -->
                                                    </div>
                                                    <!-- /col -->

                                                </div>
                                                <!-- /row -->


                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->


                                        <!-- tile -->
                                        <section class="tile tile-simple">

                                            <!-- tile body -->
                                            <div class="tile-body p-0">

                                                <div class="table-responsive">
                                                    <table class="table table-hover table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>شماره</th>
                                                            <th>نام محصول</th>
                                                            <th>قیمت واحد</th>
                                                            <th>تعداد</th>
                                                            <th>تخفیف %</th>
                                                            <th>مقدار تخفیف</th>
                                                            <th>قیمت نهایی</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($invoice->items as $item)
                                                        <tr>
                                                            <?php $product=$item->product ?>
                                                            <td><a href="javascript:;">{{ $product->id }}</a></td>
                                                            <td>{{ $product->name }}</td>
                                                            <td class="ng-binding">{{ $product->price }}</td>
                                                            <td>{{ $item->number }}</td>
                                                            <td>{{ $item->discount }}%</td>
                                                            <td class="ng-binding">{{ $item->discount*$product->price/100 }}</td>
                                                            <td class="ng-binding">{{ $item->amount }}</td>
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
                                </div>
                                <!-- /row -->

                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-3 col-md-offset-9 price-total">

                                        <!-- tile -->
                                        <section class="tile tile-simple bg-tr-black lter">

                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <ul class="list-unstyled">
                                                    <li class="ng-binding"><strong class="inline-block w-sm mb-5">جمع:</strong>{{$invoice->order->amount}}</li>
                                                    <li class="ng-binding"><strong class="inline-block w-sm mb-5">مالیت:</strong>{{$invoice->tax}}</li>
                                                    <li><strong class="inline-block w-sm">کل:</strong> <h3 class="inline-block text-success">{{$invoice->final_amount}}</h3></li>
                                                </ul>

                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->

                                    </div>
                                    <!-- /col -->
                                </div>
                                <!-- /row -->



                            </div>

                            <!-- tab in tabs -->
                            <div role="tabpanel" class="tab-pane" id="invoices">




                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-12">


                                        <!-- tile -->
                                        <section class="tile time-simple">


                                            <!-- tile body -->
                                            <div class="tile-body">


                                                <!-- row -->
                                                <div class="row">

                                                    <!-- col -->
                                                    <div class="col-md-9">
                                                        <p class="text-default lt">ایجاد شده: {!!  to_jalali($invoice->created_at)!!}</p>
                                                        <p class="text-uppercase text-strong mt-40 mb-0 custom-font">وضعیت</p>
                                                        @if($invoice->state == 0)
                                                            <h3 class="text-uppercase text-danger mt-0 mb-20">پرداخت نشده</h3>
                                                        @elseif($invoice->state == 1)
                                                            <h3 class="text-uppercase text-success mt-0 mb-20">پرداخت شده</h3>
                                                        @endif
                                                        <p class="text-uppercase text-strong mt-40 mb-0 custom-font">:کد رهگیری</p>
                                                        <h3 class="mt-0 mb-20">{{$invoice->tracking_code}}</h3>
                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-3">
                                                        <p class="text-uppercase text-strong mb-10 custom-font">مشتری</p>
                                                        <ul class="list-unstyled text-default lt mb-20">
                                                            <?php $user =$invoice->user ?>
                                                            <li><strong class="inline-block w-xs">نام:</strong>{{ $user->name }}</li>
                                                            <li><strong class="inline-block w-xs">ایمیل:</strong> <a href="javascript:;">{{ $user->email }}</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /col -->

                                                </div>
                                                <!-- /row -->

                                                <!-- row -->
                                                <div class="row b-t pt-20">

                                                    <!-- col -->
                                                    <div class="col-md-3 b-r">
                                                        <p class="text-uppercase text-strong mb-10 custom-font">جزئیات سفارش</p>
                                                        <ul class="list-unstyled text-default lt mb-20">
                                                            <li><strong>شماره:</strong> <a href="javascript:;">{{ $invoice->id }}</a></li>
                                                            <li>{!!  to_jalali($invoice->created_at)!!}</li>
                                                            <li>{{ $user->name }}</li>
                                                        </ul>
                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-6 b-r">

                                                        <p class="text-uppercase text-strong mb-10 custom-font">
                                                            توضیحات کاربر
                                                            <a href="javascript:;" class="btn btn-default btn-rounded-20 btn-xs pull-right"><i class="fa fa-pencil"></i></a>
                                                        </p>

                                                        <!-- col -->
                                                        <div class="col-md-6">

                                                            <ul class="list-unstyled text-default lt mb-20">
                                                                <li>{{ $user->detail }}</li>
                                                            </ul>

                                                        </div>
                                                        <!-- /col -->

                                                        <!-- col -->
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled text-default lt mb-20">
                                                                <li>{{ $user->email }}</li>
                                                            </ul>
                                                        </div>
                                                        <!-- /col -->

                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-3">
                                                        <!--<p class="text-uppercase text-strong mb-10 custom-font">Delivery &amp; Payment</p>
                                                        <ul class="list-unstyled text-default lt mb-20">
                                                            <li><strong>Delivery:</strong> Pick-Up</li>
                                                            <li><strong>Payment:</strong> Cash</li>
                                                        </ul>
                                                        -->
                                                    </div>
                                                    <!-- /col -->

                                                </div>
                                                <!-- /row -->


                                            </div>
                                            <!-- /tile body -->

                                        </section>

                                        <!-- /tile -->


                                        <!-- tile -->
                                        <section class="tile tile-simple">

                                            <!-- tile body -->
                                            <div class="tile-body p-0">

                                                <div class="table-responsive">
                                                    <table class="table table-hover table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>شماره محموله</th>
                                                            <th>نوع ارسال</th>
                                                            <th>محصولات</th>
                                                            <th>وضعیت</th>
                                                            <th style="width: 260px">اعمال</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($invoice->loadings as $loading)
                                                        <tr>
                                                            <td><a href="javascript:;">{{ $loading->id }}</a></td>
                                                            <td>{{ $loading->shipping->name }}</td>
                                                            <td>
                                                            @foreach($invoice->items as $item)
                                                                @if(in_array($item->id, $loading->items))
                                                                    <span class="label label-primary">{{ $item->product->name }}</span>
                                                                @endif
                                                            @endforeach

                                                            </td>
                                                            <td class="ng-binding"><span class="label label-success">{{ $loading->statusName() }}</span></td>
                                                            <td>
                                                                @if($loading->nextStatus())
                                                                    <a href="{{ route('loading.next',['id'=> $loading->id]) }}" onclick="return confirm('آیا از تغییر وضعیت به {{ $loading->nextStatus() }} مطمئن هستید؟ ')" class="btn btn-xs btn-primary"><i class="fa fa-arrow-circle-right"></i>تغییر وضعیت به {{ $loading->nextStatus() }}</a>
                                                                @endif
                                                                @if($loading->previousStatus())
                                                                    <a href="{{ route('loading.previous',['id'=> $loading->id]) }}" onclick="return confirm('آیا از تغییر وضعیت به {{ $loading->previousStatus() }} مطمئن هستید؟ ')" class="btn btn-xs btn-default"><i class="fa fa-arrow-circle-left"></i>تغییر وضعیت به {{ $loading->previousStatus() }}</a>
                                                                @endif
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
                                </div>
                                <!-- /row -->




                            </div>

                            <!-- tab in tabs -->
                            <div role="tabpanel" class="tab-pane" id="payments">



                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-12">


                                        <!-- tile -->
                                        <section class="tile time-simple">


                                            <!-- tile body -->
                                            <div class="tile-body">


                                                <!-- row -->
                                                <div class="row">

                                                    <!-- col -->
                                                    <div class="col-md-9">
                                                        <p class="text-default lt">Created: January 29, 2015 at 16:58</p>
                                                        <p class="text-uppercase text-strong mt-40 mb-0 custom-font">Status</p>
                                                        <h3 class="text-uppercase text-success mt-0 mb-20">Completed</h3>
                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-3">
                                                        <p class="text-uppercase text-strong mb-10 custom-font">Customer</p>
                                                        <ul class="list-unstyled text-default lt mb-20">
                                                            <li><strong class="inline-block w-xs">Name:</strong> John Douey</li>
                                                            <li><strong class="inline-block w-xs">State:</strong> Ukraine</li>
                                                            <li><strong class="inline-block w-xs">Phone:</strong> 069 654 5662</li>
                                                            <li><strong class="inline-block w-xs">Email:</strong> <a href="javascript:;">john.douey@gmail.com</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /col -->

                                                </div>
                                                <!-- /row -->

                                                <!-- row -->
                                                <div class="row b-t pt-20">

                                                    <!-- col -->
                                                    <div class="col-md-3 b-r">
                                                        <p class="text-uppercase text-strong mb-10 custom-font">Order Details</p>
                                                        <ul class="list-unstyled text-default lt mb-20">
                                                            <li><strong>ID:</strong> <a href="javascript:;">35651</a></li>
                                                            <li>January 29, 2015 at 16:58</li>
                                                            <li>John Douey</li>
                                                            <li>Ukraine</li>
                                                        </ul>
                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-6 b-r">
                                                        <p class="text-uppercase text-strong mb-10 custom-font">
                                                            Address
                                                            <a href="javascript:;" class="btn btn-default btn-rounded-20 btn-xs pull-right"><i class="fa fa-pencil"></i></a>
                                                        </p>

                                                        <!-- col -->
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled text-default lt mb-20">
                                                                <li>John Douey</li>
                                                                <li>Vajnorska 512</li>
                                                                <li>Bratislava, Bratislava 1</li>
                                                                <li>811 09</li>
                                                            </ul>
                                                        </div>
                                                        <!-- /col -->

                                                        <!-- col -->
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled text-default lt mb-20">
                                                                <li>john.douey@gmail.com</li>
                                                                <li>655 169 4599</li>
                                                            </ul>
                                                        </div>
                                                        <!-- /col -->

                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-3">
                                                        <p class="text-uppercase text-strong mb-10 custom-font">Delivery &amp; Payment</p>
                                                        <ul class="list-unstyled text-default lt mb-20">
                                                            <li><strong>Delivery:</strong> Pick-Up</li>
                                                            <li><strong>Payment:</strong> Cash</li>
                                                        </ul>
                                                    </div>
                                                    <!-- /col -->

                                                </div>
                                                <!-- /row -->


                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->


                                        <!-- tile -->
                                        <section class="tile tile-simple">

                                            <!-- tile body -->
                                            <div class="tile-body p-0">

                                                <div class="table-responsive">
                                                    <table class="table table-hover table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>Payment ID</th>
                                                            <th>Payment Note</th>
                                                            <th>Payment Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><a href="javascript:;">201500156</a></td>
                                                            <td>Payment received for invoice 201500156</td>
                                                            <td>Jan 27, 2015</td>
                                                            <td><span class="label label-success">Received</span></td>
                                                            <td class="ng-binding">$264.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:;">201500156</a></td>
                                                            <td>Payment request sent for invoice 201500156</td>
                                                            <td>Jan 26, 2015</td>
                                                            <td><span class="label label-default">Sent</span></td>
                                                            <td class="ng-binding">$264.00</td>
                                                        </tr>
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

                            <!-- tab in tabs -->
                            <div role="tabpanel" class="tab-pane" id="notes">



                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-3">

                                        <!-- tile -->
                                        <section class="tile tile-simple">

                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <header class="mb-20">
                                                    <span class="text-sm text-default lt">Created at: 26 Jan, 2015</span>
                                                    <span class="pull-right text-sm text-default lt">ID: 266946</span>
                                                </header>

                                                <h4 class="mt-10">This is Note</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->
                                    </div>
                                    <!-- /col -->

                                    <!-- col -->
                                    <div class="col-md-3">

                                        <!-- tile -->
                                        <section class="tile tile-simple">

                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <header class="mb-20">
                                                    <span class="text-sm text-default lt">Created at: 26 Jan, 2015</span>
                                                    <span class="pull-right text-sm text-default lt">ID: 266946</span>
                                                </header>

                                                <h4 class="mt-10">This is Note</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->
                                    </div>
                                    <!-- /col -->

                                    <!-- col -->
                                    <div class="col-md-3">

                                        <!-- tile -->
                                        <section class="tile tile-simple">

                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <header class="mb-20">
                                                    <span class="text-sm text-default lt">Created at: 26 Jan, 2015</span>
                                                    <span class="pull-right text-sm text-default lt">ID: 266946</span>
                                                </header>

                                                <h4 class="mt-10">This is Note</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->
                                    </div>
                                    <!-- /col -->

                                    <!-- col -->
                                    <div class="col-md-3">

                                        <!-- tile -->
                                        <section class="tile tile-simple">

                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <header class="mb-20">
                                                    <span class="text-sm text-default lt">Created at: 26 Jan, 2015</span>
                                                    <span class="pull-right text-sm text-default lt">ID: 266946</span>
                                                </header>

                                                <h4 class="mt-10">This is Note</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->
                                    </div>
                                    <!-- /col -->

                                    <!-- col -->
                                    <div class="col-md-3">

                                        <!-- tile -->
                                        <section class="tile tile-simple">

                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <header class="mb-20">
                                                    <span class="text-sm text-default lt">Created at: 26 Jan, 2015</span>
                                                    <span class="pull-right text-sm text-default lt">ID: 266946</span>
                                                </header>

                                                <h4 class="mt-10">This is Note</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->
                                    </div>
                                    <!-- /col -->

                                    <!-- col -->
                                    <div class="col-md-3">

                                        <!-- tile -->
                                        <section class="tile tile-simple">

                                            <!-- tile body -->
                                            <div class="tile-body">

                                                <header class="mb-20">
                                                    <span class="text-sm text-default lt">Created at: 26 Jan, 2015</span>
                                                    <span class="pull-right text-sm text-default lt">ID: 266946</span>
                                                </header>

                                                <h4 class="mt-10">This is Note</h4>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->
                                    </div>
                                    <!-- /col -->

                                    <!-- col -->
                                    <div class="col-md-3">

                                        <!-- tile -->
                                        <section class="tile tile-simple no-bg">

                                            <!-- tile body -->
                                            <div class="tile-body p-0">

                                                <a href="javascript:;" class="tile-button bg-white"><i class="fa fa-plus"></i> Add Note</a>

                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->
                                    </div>
                                    <!-- /col -->

                                </div>
                                <!-- /row -->



                            </div>

                            <!-- tab in tabs -->
                            <div role="tabpanel" class="tab-pane" id="historyTab">





                                <!-- row -->
                                <div class="row">
                                    <!-- col -->
                                    <div class="col-md-12">


                                        <!-- tile -->
                                        <section class="tile time-simple">


                                            <!-- tile body -->
                                            <div class="tile-body">


                                                <!-- row -->
                                                <div class="row">

                                                    <!-- col -->
                                                    <div class="col-md-9">
                                                        <p class="text-default lt">Created: January 29, 2015 at 16:58</p>
                                                        <p class="text-uppercase text-strong mt-40 mb-0 custom-font">Status</p>
                                                        <h3 class="text-uppercase text-success mt-0 mb-20">Completed</h3>
                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-3">
                                                        <p class="text-uppercase text-strong mb-10 custom-font">Customer</p>
                                                        <ul class="list-unstyled text-default lt mb-20">
                                                            <li><strong class="inline-block w-xs">Name:</strong> John Douey</li>
                                                            <li><strong class="inline-block w-xs">State:</strong> Ukraine</li>
                                                            <li><strong class="inline-block w-xs">Phone:</strong> 069 654 5662</li>
                                                            <li><strong class="inline-block w-xs">Email:</strong> <a href="javascript:;">john.douey@gmail.com</a></li>
                                                        </ul>
                                                    </div>
                                                    <!-- /col -->

                                                </div>
                                                <!-- /row -->

                                                <!-- row -->
                                                <div class="row b-t pt-20">

                                                    <!-- col -->
                                                    <div class="col-md-3 b-r">
                                                        <p class="text-uppercase text-strong mb-10 custom-font">Order Details</p>
                                                        <ul class="list-unstyled text-default lt mb-20">
                                                            <li><strong>ID:</strong> <a href="javascript:;">35651</a></li>
                                                            <li>January 29, 2015 at 16:58</li>
                                                            <li>John Douey</li>
                                                            <li>Ukraine</li>
                                                        </ul>
                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-6 b-r">
                                                        <p class="text-uppercase text-strong mb-10 custom-font">
                                                            Address
                                                            <a href="javascript:;" class="btn btn-default btn-rounded-20 btn-xs pull-right"><i class="fa fa-pencil"></i></a>
                                                        </p>

                                                        <!-- col -->
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled text-default lt mb-20">
                                                                <li>John Douey</li>
                                                                <li>Vajnorska 512</li>
                                                                <li>Bratislava, Bratislava 1</li>
                                                                <li>811 09</li>
                                                            </ul>
                                                        </div>
                                                        <!-- /col -->

                                                        <!-- col -->
                                                        <div class="col-md-6">
                                                            <ul class="list-unstyled text-default lt mb-20">
                                                                <li>john.douey@gmail.com</li>
                                                                <li>655 169 4599</li>
                                                            </ul>
                                                        </div>
                                                        <!-- /col -->

                                                    </div>
                                                    <!-- /col -->

                                                    <!-- col -->
                                                    <div class="col-md-3">
                                                        <p class="text-uppercase text-strong mb-10 custom-font">Delivery &amp; Payment</p>
                                                        <ul class="list-unstyled text-default lt mb-20">
                                                            <li><strong>Delivery:</strong> Pick-Up</li>
                                                            <li><strong>Payment:</strong> Cash</li>
                                                        </ul>
                                                    </div>
                                                    <!-- /col -->

                                                </div>
                                                <!-- /row -->


                                            </div>
                                            <!-- /tile body -->

                                        </section>
                                        <!-- /tile -->


                                        <!-- tile -->
                                        <section class="tile tile-simple">

                                            <!-- tile body -->
                                            <div class="tile-body p-0">

                                                <div class="table-responsive">
                                                    <table class="table table-hover table-striped">
                                                        <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Desription</th>
                                                            <th>Date</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td><a href="javascript:;">1</a></td>
                                                            <td>Order Created</td>
                                                            <td>Jan 20, 2015</td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:;">2</a></td>
                                                            <td>Order Received</td>
                                                            <td>Jan 20, 2015</td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:;">2</a></td>
                                                            <td>Order Shipped</td>
                                                            <td>Jan 21, 2015</td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:;">2</a></td>
                                                            <td>Invoice Created</td>
                                                            <td>Jan 21, 2015</td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:;">2</a></td>
                                                            <td>Invoice Sent</td>
                                                            <td>Jan 21, 2015</td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:;">2</a></td>
                                                            <td>Payment Received</td>
                                                            <td>Jan 23, 2015</td>
                                                        </tr>
                                                        <tr>
                                                            <td><a href="javascript:;">2</a></td>
                                                            <td>Order Completed</td>
                                                            <td>Jan 23, 2015</td>
                                                        </tr>
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
                        </div>
                    </div>
                </div>



            </div>

        </div>

    </section>
    <!--/ CONTENT -->
@endsection