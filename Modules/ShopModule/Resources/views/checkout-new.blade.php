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
                        <div class="steps-step-2">
                            <a href="#step-3" type="button" class="btn btn-blue-grey btn-circle-2 waves-effect" data-toggle="tooltip" data-placement="top" title="اطلاعات حمل و نقل"><i class="fa fa-truck" aria-hidden="true"></i></a>
                        </div>
                        <div class="steps-step-2">
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
                        <h1 class="title">اضافه کردن ادرس</h1>
                        <div class="row">

                            <div class="col-sm-4">
                                <!--
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-sign-in"></i> یک حساب کاربری ساخته و یا به حساب خود وارد شوید</h4>
                                    </div>
                                    <div class="panel-body">
                                        <div class="radio">
                                            <label>
                                                <input value="register" name="account" type="radio">
                                                ثبت نام حساب کاربری</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input checked="checked" value="guest" name="account" type="radio">
                                                تسویه حساب مهمان</label>
                                        </div>
                                        <div class="radio">
                                            <label>
                                                <input value="returning" name="account" type="radio">
                                                مشتری قبلی</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-user"></i> اطلاعات شخصی شما</h4>
                                    </div>
                                    <div class="panel-body">
                                        <fieldset id="account">
                                            <div class="form-group required">
                                                <label for="input-payment-firstname" class="control-label">نام</label>
                                                <input class="form-control" id="input-payment-firstname" placeholder="نام" value="" name="firstname" type="text">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-lastname" class="control-label">نام خانوادگی</label>
                                                <input class="form-control" id="input-payment-lastname" placeholder="نام خانوادگی" value="" name="lastname" type="text">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-email" class="control-label">آدرس ایمیل</label>
                                                <input class="form-control" id="input-payment-email" placeholder="آدرس ایمیل" value="" name="email" type="text">
                                            </div>
                                            <div class="form-group required">
                                                <label for="input-payment-telephone" class="control-label">شماره تلفن</label>
                                                <input class="form-control" id="input-payment-telephone" placeholder="شماره تلفن" value="" name="telephone" type="text">
                                            </div>
                                            <div class="form-group">
                                                <label for="input-payment-fax" class="control-label">فکس</label>
                                                <input class="form-control" id="input-payment-fax" placeholder="فکس" value="" name="fax" type="text">
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title"><i class="fa fa-book"></i> آدرس</h4>
                                    </div>
                                    <div class="panel-body">
                                        <form method="post" action="{{ route('address.add') }}">
                                            {{ csrf_field() }}
                                            <fieldset id="address">
                                                <legend>افزودن آدرس</legend>
                                                <div class="form-group">
                                                    <label for="input-company" class="control-label">نام</label>
                                                    <div class="">
                                                        <input class="form-control" id="input-company" placeholder="نام" value="{{old('firstname')}}" name="firstname" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-company2" class="control-label">نام خانوادگی</label>
                                                    <div class="">
                                                        <input class="form-control" id="input-company2" placeholder="نام خانوادگی" value="{{old('lastname')}}" name="lastname" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-company3" class=" control-label">شرکت</label>
                                                    <div class="">
                                                        <input class="form-control" id="input-company3" placeholder="شرکت" value="{{old('company')}}" name="company" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-address-1" class="control-label">آدرس</label>
                                                    <div class="">
                                                        <input class="form-control" id="input-address-1" placeholder="آدرس" value="{{old('address')}}" name="address" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-postcode" class="control-label">کد پستی</label>
                                                    <div class="">
                                                        <input class="form-control" id="input-postcode" placeholder="کد پستی" value="{{old('postcode')}}" name="postcode" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="input-company" class="control-label">تلفن</label>
                                                    <div class="">
                                                        <input class="form-control" id="input-company" placeholder="تلفن" value="{{old('phone')}}" name="phone" type="text">
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-zone" class="control-label">شهر / استان</label>
                                                    <div class="">
                                                        <select id="province" class="form-control" name="province_id" data-action="{{ route('getcities',['id' => null]).'/' }}">
                                                            <option>استان را انتخاب کنید</option>
                                                            @foreach($provinces as $province)
                                                                <option value="{{$province->id}}" @if($province->id == old('province_id')) selected @endif>{{$province->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group required">
                                                    <label for="input-zone" class="control-label">شهر</label>
                                                    <div class="">
                                                        <select id="city" class="form-control" name="city_id" data-selected="{{old('city_id')}}">
                                                        </select>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <button class="btn btn-primary" type="submit">افزودن</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-8">
                                <div class="row">
                                    <form method="post" action="{{route('shop.shipping')}}">
                                        {{csrf_field()}}
                                    <div class="col-sm-12">
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h4 class="panel-title"><i class="fa fa-truck"></i>ادرس های انتخابی</h4>
                                            </div>
                                            <div class="panel-body">
                                                <p></p>
                                                @foreach($addresses as $address)
                                                <div class="radio">
                                                    <label>
                                                        <input checked="checked" name="address" value="{{$address->id}}" type="radio">
                                                     {{$address->province->name}} - {{ $address->city->name }} - {{ $address->address }}</label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
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
                                                            <td class="text-left">تعداد</td>
                                                            <td class="text-right">قیمت واحد</td>
                                                            <td class="text-right">کل</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>

                                                        @foreach($cart->item as $item)
                                                            <tr>
                                                                <td class="text-center"><a href="#" ><img style="height: 110px;max-width: 250px" src="{{asset($item->name->pic)}}" alt="{{$item->name->name}}" title="{{$item->name->name}}" class="img-thumbnail"></a></td>
                                                                <td class="text-left"><a href="#">{{$item->name->name}}</a></td>
                                                                <td class="text-left"><div class="input-group btn-block" style="max-width: 200px;">
                                                                            <input name="qty" disabled value="{{$item->qty}}" size="1" class="form-control" type="text">
                                                                    </div></td>
                                                                <td class="text-right">{{$item->price}} تومان</td>
                                                                <td class="text-right">{{$item->subtotal}} تومان</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                        <tfoot>
                                                        <tr>
                                                            <td class="text-right" colspan="4"><strong>جمع کل:</strong></td>
                                                            <td class="text-right">{{$cart->subtotal}} تومان</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" colspan="4"><strong>کسر هدیه:</strong></td>
                                                            <td class="text-right">{{$cart->discount}} تومان</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" colspan="4"><strong>مالیات:</strong></td>
                                                            <td class="text-right">{{$cart->tax}} تومان</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-right" colspan="4"><strong>کل :</strong></td>
                                                            <td class="text-right">{{$cart->total}} تومان</td>
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
                                                <h4 class="panel-title"><i class="fa fa-pencil"></i> افزودن توضیح برای سفارش.</h4>
                                            </div>

                                                <div class="panel-body">
                                                    <textarea rows="4" class="form-control" id="confirm_comment" name="detail"></textarea>
                                                    <br>
                                                    <label class="control-label" for="confirm_agree">
                                                        <input checked="checked" value="1" required="" class="validate required" id="confirm_agree" name="confirm_agree" type="checkbox">
                                                        <span><a class="agree" href="#"><b>شرایط و قوانین</b></a> را خوانده ام و با آنها موافق هستم.</span> </label>
                                                    <div class="buttons">
                                                        <div class="pull-right">
                                                            <input class="btn btn-primary" id="button-confirm" value="مرحله بعدی" type="submit">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    </form>

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
