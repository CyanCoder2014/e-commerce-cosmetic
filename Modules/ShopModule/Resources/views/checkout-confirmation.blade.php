@extends('layouts.layout')

@section('header')
    <meta name="description"
          content="سبد خرید شما">
    <title>مدیر جو |   تسویه حساب</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

@endsection


@section('content')

    <section class="hero container-full">


        <article class="pricing__table" style="width: 90%;margin:0 auto;direction: rtl">



            <div class="content_fullwidth less2" style="margin-top:70px;direction: rtl">
                <!-- Breadcrumb Start-->
                {{--<ul class="breadcrumb">--}}
                    {{--<li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>&nbsp; > &nbsp;--}}
                    {{--<li><a href="{{route('shop.basket')}}">سبد خرید</a></li>&nbsp; > &nbsp;--}}
                    {{--<li><a href="">تسویه حساب</a></li>--}}
                {{--</ul>--}}
                <div class="steps-form-2">
                    <div class="steps-row-2 setup-panel-2 d-flex justify-content-between">
                        <div class="steps-step-3">
                            <a href="#step-1" type="button" class="btn btn-amber btn-circle-2 waves-effect ml-0" data-toggle="tooltip" data-placement="top" title="سبد خرید"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                        </div>
                        <div class="steps-step-3">
                            <a href="#step-2" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="اطلاعات ارسال"><i class="fa fa-map-marker" aria-hidden="true"></i></a>
                        </div>
                        <div class="steps-step-3">
                            <a href="#step-3" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="اطلاعات حمل و نقل"><i class="fa fa-truck" aria-hidden="true"></i></a>
                        </div>
                        <div class="steps-step-3">
                            <a href="#step-4" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="پرداخت"><i class="fa fa-credit-card" aria-hidden="true"></i></a>
                        </div>
                        <div class="steps-step-2">
                            <a href="#step-5" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect mr-0" data-toggle="tooltip" data-placement="top" title="اتمام خرید و ارسال"><i class="fa fa-check" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Breadcrumb End-->
                <div class="row">
                    <!--Middle Part Start-->
                    <div id="content" class="col-sm-12" style="text-align: right">
                        <h1 class="title">انتخاب سیستم حمل و نقل</h1>
                        <div class="row">


                            <div class="col-sm-12">
                                <div class="row">


                                        <!--
                                    <div class="col-sm-6">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-credit-card"></i> شیوه پرداخت</h4>
                                            </div>
                                            <div class="panel-body">
                                                <p>لطفا یک شیوه پرداخت برای سفارش خود انتخاب کنید.</p>
                                                <div class="radio">
                                                    <label>
                                                        <input checked="checked" name="Cash On Delivery" type="radio">
                                                        پرداخت هنگام تحویل</label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input name="Bank Transfer" type="radio">
                                                        واریز به حساب</label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input name="Paypal" type="radio">
                                                        پی پال</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-ticket"></i> استفاده از کوپن تخفیف</h4>
                                            </div>
                                            <div class="panel-body">
                                                <label for="input-coupon" class="col-sm-3 control-label">کد تخفیف خود را وارد کنید</label>
                                                <div class="input-group">
                                                    <input class="form-control" id="input-coupon" placeholder="کد تخفیف خود را در اینجا وارد کنید" value="" name="coupon" type="text">
                                                    <span class="input-group-btn">
                          <input class="btn btn-primary" data-loading-text="بارگذاری ..." id="button-coupon" value="اعمال کوپن" type="button">
                          </span></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-gift"></i> استفاده از کارت هدیه</h4>
                                            </div>
                                            <div class="panel-body">
                                                <label for="input-voucher" class="col-sm-3 control-label">کد کارت هدیه خود را وارد کنید</label>
                                                <div class="input-group">
                                                    <input class="form-control" id="input-voucher" placeholder="کد کارت هدیه خود را در اینجا وارد کنید ..." value="" name="voucher" type="text">
                                                    <span class="input-group-btn">
                          <input class="btn btn-primary" data-loading-text="بارگذاری ..." id="button-voucher" value="اعمال کارت هدیه" type="submit">
                          </span> </div>
                                            </div>
                                        </div>
                                    </div>
                                    -->

                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-shopping-cart"></i> سبد خرید</h4>
                                            </div>
                                            <div class="panel-body">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                        <tr>
                                                            <td class="text-center">تصویر</td>
                                                            <td class="text-left">نام محصول</td>

                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($order_items as $item)
                                                            <tr>
                                                                <td class="text-center"><a href="#" ><img style="height: 110px;max-width: 250px" @if(isset($item->product->image[0]))src="{{asset($item->product->image[0])}}" @endif alt="{{$item->product->name}}" title="{{$item->product->name}}" class="img-thumbnail"></a></td>
                                                                <td class="text-left"><a href="#">{{$item->product->name}}</a></td>
                                                                
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td class="text-right" ><strong>جمع کل:</strong></td>
                                                            <td class="text-right">{{$cart->subtotal}} تومان</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" ><strong>کسر هدیه:</strong></td>
                                                            <td class="text-right">{{$cart->discount}} تومان</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" ><strong>مالیات:</strong></td>
                                                            <td class="text-right">{{$invoice->tax}} تومان</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" ><strong>هزینه حمل و نقل :</strong></td>
                                                            <td class="text-right">{{$invoice->deliver_cost}} تومان</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" ><strong>کل :</strong></td>
                                                            <td class="text-right">{{$invoice->final_amount}} تومان</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" ><strong>کدرهگیری :</strong></td>
                                                            <td class="text-right">{{$trackingcode}} </td>
                                                        </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-pencil"></i></h4>
                                            </div>

                                                <div class="panel-body">
                                                    <div class="buttons">
                                                        <div class="pull-right">
                                                            <a href="{{ route('shop.payment') }}">
                                                                <button class="btn btn-primary" id="button-confirm"  type="submit">پرداخت(مرحله نهایی)</button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Middle Part End -->
                </div>
            </div>
        </article>

    </section>


@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script>
        function getCities(th)
        {

            selected_city = $('#city').attr('data-selected') || null;


            $('#city').html('').fadeIn(800).append('<option>لطفا کمی صبر کنید ...</option>');

            $.ajax({
                type: "GET",
                url: $(th).data('action') + $(th).val(),
                dataType : 'json',
                success: function(data)
                {

                    $('#city').html('').fadeIn(800).append('<option>انتخاب شهر</option>');
                    $.each(data, function(i, city){
                        if(selected_city == city.id)
                            $('#city').append('<option value="' + city.id + '" selected>' + city.name + '</option>');
                        else
                            $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                },
                error : function(data)
                {
                    console.log('province_city.js#getCities function error: #line : 30');
                }
            });


            return false; // avoid to execute the actual submit of the form.
        }
        $(document).ready(function() {
            $('#province').select2();
            $('#city').select2();
            @if(old('province_id'))
            getCities($('#province'));
            @endif

        });
        $(document).on('change', '#province', function (e) {
            getCities(this);
//            $(this).siblings('.city').select2();

        });

    </script>
@endsection
