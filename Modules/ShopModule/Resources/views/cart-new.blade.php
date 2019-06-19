@extends('layouts.layout')

@section('header')
    <meta name="description"
          content="سبد خرید شما">
    <title>مدیر جو |    سبد خرید</title>
@endsection

@section('content')

    <section class="hero container-full">


        <article class="pricing__table" style="width: 90%;margin:0 auto;direction: rtl">



            <div class="content_fullwidth less2" style="margin-top:70px;direction: rtl">
                <!-- Breadcrumb Start-->
                <div class="steps-form-2">
                    <div class="steps-row-2 setup-panel-2 d-flex justify-content-between">
                        <div class="steps-step-3">
                            <a href="#step-1" type="button" class="btn btn-amber btn-circle-2 waves-effect ml-0" data-toggle="tooltip" data-placement="top" title="سبد خرید"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                        </div>
                        <div class="steps-step-2">
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
                    <div id="content" class="col-sm-12">
                        <h1 class="title">سبد خرید</h1>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <td class="text-center">تصویر</td>
                                    <td class="text-left">نام محصول</td>
                                    <td class="text-left">مدل</td>
                                    <td class="text-left">تعداد</td>
                                    <td class="text-right">قیمت واحد</td>
                                    <td class="text-right">کل</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cart->item as $item)
                                    <tr>
                                        <td class="text-center"><a href="#"><img style="height: 110px;max-width: 250px" src="{{asset($item->name->pic)}}" alt="{{$item->name->name}}" title="{{$item->name->name}}" class="img-thumbnail"></a></td>
                                        <td class="text-left"><a href="#">{{$item->name->name}}</a><br>
                                            {{--<small>امتیازات خرید: 1000</small>--}}
                                        </td>
                                        <td class="text-left">-</td>
                                        <td class="text-left"><div class="input-group btn-block quantity">
                                                <form method="get" action="{{route('cart.updatePage')}}">
                                                    <input name="qty" value="{{$item->qty}}" size="1" class="form-control" type="number">
                                                    <input name="rowid" value="{{$item->rowId}}" type="hidden">
                                                    <span class="input-group-btn">
                                            <button type="submit" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="بروزرسانی"><i class="fa fa-refresh"></i></button>
                                            <button type="button" id="{{$item->rowId}}" title="" class="btn btn-danger cart-delete" onclick="location.reload()" data-original-title="حذف"><i class="fa fa-times-circle"></i></button>
                                        </span>
                                                </form>
                                            </div></td>
                                        <td class="text-right">{{$item->price}} تومان</td>
                                        <td class="text-right">{{$item->subtotal}} تومان</td>
                                    </tr>

                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--
                        <h2 class="subtitle">حالا مایلید چه کاری انجام دهید؟</h2>
                        <p>در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
                                    </div>
                                    <div id="collapse-coupon" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <label class="col-sm-4 control-label" for="input-coupon">کد تخفیف خود را در اینجا وارد کنید</label>
                                            <div class="input-group">
                                                <input name="coupon" value="" placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon" class="form-control" type="text">
                                                <span class="input-group-btn">
                      <input value="اعمال کوپن" id="button-coupon" data-loading-text="بارگذاری ..." class="btn btn-primary" type="button">
                      </span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">استفاده از کارت هدیه</h4>
                                    </div>
                                    <div id="collapse-voucher" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <label class="col-sm-4 control-label" for="input-voucher">کد کارت هدیه را در اینجا وارد کنید</label>
                                            <div class="input-group">
                                                <input name="voucher" value="" placeholder="کد کارت هدیه را در اینجا وارد کنید" id="input-voucher" class="form-control" type="text">
                                                <span class="input-group-btn">
                      <input value="اعمال کارت هدیه" id="button-voucher" data-loading-text="بارگذاری ..." class="btn btn-primary" type="submit">
                      </span> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">پیش بینی هزینه ی حمل و نقل و مالیات</h4>
                            </div>
                            <div id="collapse-shipping" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>مقصد خود را جهت براورد هزینه ی 0 تومان وارد کنید.</p>
                                    <form class="form-horizontal">
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-country">کشور</label>
                                            <div class="col-sm-10">
                                                <select name="country_id" id="input-country" class="form-control">
                                                    <option value=""> --- لطفا انتخاب کنید --- </option>
                                                    <option value="244">Aaland Islands</option>
                                                    <option value="1">Afghanistan</option>
                                                    <option value="2">Albania</option>
                                                    <option value="3">Algeria</option>
                                                    <option value="4">American Samoa</option>
                                                    <option value="5">Andorra</option>
                                                    <option value="6">Angola</option>
                                                    <option value="7">Anguilla</option>
                                                    <option value="8">Antarctica</option>
                                                    <option value="9">Antigua and Barbuda</option>
                                                    <option value="10">Argentina</option>
                                                    <option value="11">Armenia</option>
                                                    <option value="12">Aruba</option>
                                                    <option value="252">Ascension Island (British)</option>
                                                    <option value="13">Australia</option>
                                                    <option value="14">Austria</option>
                                                    <option value="15">Azerbaijan</option>
                                                    <option value="16">Bahamas</option>
                                                    <option value="17">Bahrain</option>
                                                    <option value="18">Bangladesh</option>
                                                    <option value="19">Barbados</option>
                                                    <option value="20">Belarus</option>
                                                    <option value="21">Belgium</option>
                                                    <option value="22">Belize</option>
                                                    <option value="23">Benin</option>
                                                    <option value="24">Bermuda</option>
                                                    <option value="25">Bhutan</option>
                                                    <option value="26">Bolivia</option>
                                                    <option value="245">Bonaire, Sint Eustatius and Saba</option>
                                                    <option value="27">Bosnia and Herzegovina</option>
                                                    <option value="28">Botswana</option>
                                                    <option value="29">Bouvet Island</option>
                                                    <option value="30">Brazil</option>
                                                    <option value="31">British Indian Ocean Territory</option>
                                                    <option value="32">Brunei Darussalam</option>
                                                    <option value="33">Bulgaria</option>
                                                    <option value="34">Burkina Faso</option>
                                                    <option value="35">Burundi</option>
                                                    <option value="36">Cambodia</option>
                                                    <option value="37">Cameroon</option>
                                                    <option value="38">Canada</option>
                                                    <option value="251">Canary Islands</option>
                                                    <option value="39">Cape Verde</option>
                                                    <option value="40">Cayman Islands</option>
                                                    <option value="41">Central African Republic</option>
                                                    <option value="42">Chad</option>
                                                    <option value="43">Chile</option>
                                                    <option value="44">China</option>
                                                    <option value="45">Christmas Island</option>
                                                    <option value="46">Cocos (Keeling) Islands</option>
                                                    <option value="47">Colombia</option>
                                                    <option value="48">Comoros</option>
                                                    <option value="49">Congo</option>
                                                    <option value="50">Cook Islands</option>
                                                    <option value="51">Costa Rica</option>
                                                    <option value="52">Cote D'Ivoire</option>
                                                    <option value="53">Croatia</option>
                                                    <option value="54">Cuba</option>
                                                    <option value="246">Curacao</option>
                                                    <option value="55">Cyprus</option>
                                                    <option value="56">Czech Republic</option>
                                                    <option value="237">Democratic Republic of Congo</option>
                                                    <option value="57">Denmark</option>
                                                    <option value="58">Djibouti</option>
                                                    <option value="59">Dominica</option>
                                                    <option value="60">Dominican Republic</option>
                                                    <option value="61">East Timor</option>
                                                    <option value="62">Ecuador</option>
                                                    <option value="63">Egypt</option>
                                                    <option value="64">El Salvador</option>
                                                    <option value="65">Equatorial Guinea</option>
                                                    <option value="66">Eritrea</option>
                                                    <option value="67">Estonia</option>
                                                    <option value="68">Ethiopia</option>
                                                    <option value="69">Falkland Islands (Malvinas)</option>
                                                    <option value="70">Faroe Islands</option>
                                                    <option value="71">Fiji</option>
                                                    <option value="72">Finland</option>
                                                    <option value="74">France, Metropolitan</option>
                                                    <option value="75">French Guiana</option>
                                                    <option value="76">French Polynesia</option>
                                                    <option value="77">French Southern Territories</option>
                                                    <option value="126">FYROM</option>
                                                    <option value="78">Gabon</option>
                                                    <option value="79">Gambia</option>
                                                    <option value="80">Georgia</option>
                                                    <option value="81">Germany</option>
                                                    <option value="82">Ghana</option>
                                                    <option value="83">Gibraltar</option>
                                                    <option value="84">Greece</option>
                                                    <option value="85">Greenland</option>
                                                    <option value="86">Grenada</option>
                                                    <option value="87">Guadeloupe</option>
                                                    <option value="88">Guam</option>
                                                    <option value="89">Guatemala</option>
                                                    <option value="256">Guernsey</option>
                                                    <option value="90">Guinea</option>
                                                    <option value="91">Guinea-Bissau</option>
                                                    <option value="92">Guyana</option>
                                                    <option value="93">Haiti</option>
                                                    <option value="94">Heard and Mc Donald Islands</option>
                                                    <option value="95">Honduras</option>
                                                    <option value="96">Hong Kong</option>
                                                    <option value="97">Hungary</option>
                                                    <option value="98">Iceland</option>
                                                    <option value="99">India</option>
                                                    <option value="100">Indonesia</option>
                                                    <option value="101" selected>Iran (Islamic Republic of)</option>
                                                    <option value="102">Iraq</option>
                                                    <option value="103">Ireland</option>
                                                    <option value="254">Isle of Man</option>
                                                    <option value="105">Italy</option>
                                                    <option value="106">Jamaica</option>
                                                    <option value="107">Japan</option>
                                                    <option value="257">Jersey</option>
                                                    <option value="108">Jordan</option>
                                                    <option value="109">Kazakhstan</option>
                                                    <option value="110">Kenya</option>
                                                    <option value="111">Kiribati</option>
                                                    <option value="113">Korea, Republic of</option>
                                                    <option value="253">Kosovo, Republic of</option>
                                                    <option value="114">Kuwait</option>
                                                    <option value="115">Kyrgyzstan</option>
                                                    <option value="116">Lao People's Democratic Republic</option>
                                                    <option value="117">Latvia</option>
                                                    <option value="118">Lebanon</option>
                                                    <option value="119">Lesotho</option>
                                                    <option value="120">Liberia</option>
                                                    <option value="121">Libyan Arab Jamahiriya</option>
                                                    <option value="122">Liechtenstein</option>
                                                    <option value="123">Lithuania</option>
                                                    <option value="124">Luxembourg</option>
                                                    <option value="125">Macau</option>
                                                    <option value="127">Madagascar</option>
                                                    <option value="128">Malawi</option>
                                                    <option value="129">Malaysia</option>
                                                    <option value="130">Maldives</option>
                                                    <option value="131">Mali</option>
                                                    <option value="132">Malta</option>
                                                    <option value="133">Marshall Islands</option>
                                                    <option value="134">Martinique</option>
                                                    <option value="135">Mauritania</option>
                                                    <option value="136">Mauritius</option>
                                                    <option value="137">Mayotte</option>
                                                    <option value="138">Mexico</option>
                                                    <option value="139">Micronesia, Federated States of</option>
                                                    <option value="140">Moldova, Republic of</option>
                                                    <option value="141">Monaco</option>
                                                    <option value="142">Mongolia</option>
                                                    <option value="242">Montenegro</option>
                                                    <option value="143">Montserrat</option>
                                                    <option value="144">Morocco</option>
                                                    <option value="145">Mozambique</option>
                                                    <option value="146">Myanmar</option>
                                                    <option value="147">Namibia</option>
                                                    <option value="148">Nauru</option>
                                                    <option value="149">Nepal</option>
                                                    <option value="150">Netherlands</option>
                                                    <option value="151">Netherlands Antilles</option>
                                                    <option value="152">New Caledonia</option>
                                                    <option value="153">New Zealand</option>
                                                    <option value="154">Nicaragua</option>
                                                    <option value="155">Niger</option>
                                                    <option value="156">Nigeria</option>
                                                    <option value="157">Niue</option>
                                                    <option value="158">Norfolk Island</option>
                                                    <option value="112">North Korea</option>
                                                    <option value="159">Northern Mariana Islands</option>
                                                    <option value="160">Norway</option>
                                                    <option value="161">Oman</option>
                                                    <option value="162">Pakistan</option>
                                                    <option value="163">Palau</option>
                                                    <option value="247">Palestinian Territory, Occupied</option>
                                                    <option value="164">Panama</option>
                                                    <option value="165">Papua New Guinea</option>
                                                    <option value="166">Paraguay</option>
                                                    <option value="167">Peru</option>
                                                    <option value="168">Philippines</option>
                                                    <option value="169">Pitcairn</option>
                                                    <option value="170">Poland</option>
                                                    <option value="171">Portugal</option>
                                                    <option value="172">Puerto Rico</option>
                                                    <option value="173">Qatar</option>
                                                    <option value="174">Reunion</option>
                                                    <option value="175">Romania</option>
                                                    <option value="176">Russian Federation</option>
                                                    <option value="177">Rwanda</option>
                                                    <option value="178">Saint Kitts and Nevis</option>
                                                    <option value="179">Saint Lucia</option>
                                                    <option value="180">Saint Vincent and the Grenadines</option>
                                                    <option value="181">Samoa</option>
                                                    <option value="182">San Marino</option>
                                                    <option value="183">Sao Tome and Principe</option>
                                                    <option value="184">Saudi Arabia</option>
                                                    <option value="185">Senegal</option>
                                                    <option value="243">Serbia</option>
                                                    <option value="186">Seychelles</option>
                                                    <option value="187">Sierra Leone</option>
                                                    <option value="188">Singapore</option>
                                                    <option value="189">Slovak Republic</option>
                                                    <option value="190">Slovenia</option>
                                                    <option value="191">Solomon Islands</option>
                                                    <option value="192">Somalia</option>
                                                    <option value="193">South Africa</option>
                                                    <option value="194">South Georgia &amp; South Sandwich Islands</option>
                                                    <option value="248">South Sudan</option>
                                                    <option value="195">Spain</option>
                                                    <option value="196">Sri Lanka</option>
                                                    <option value="249">St. Barthelemy</option>
                                                    <option value="197">St. Helena</option>
                                                    <option value="250">St. Martin (French part)</option>
                                                    <option value="198">St. Pierre and Miquelon</option>
                                                    <option value="199">Sudan</option>
                                                    <option value="200">Suriname</option>
                                                    <option value="201">Svalbard and Jan Mayen Islands</option>
                                                    <option value="202">Swaziland</option>
                                                    <option value="203">Sweden</option>
                                                    <option value="204">Switzerland</option>
                                                    <option value="205">Syrian Arab Republic</option>
                                                    <option value="206">Taiwan</option>
                                                    <option value="207">Tajikistan</option>
                                                    <option value="208">Tanzania, United Republic of</option>
                                                    <option value="209">Thailand</option>
                                                    <option value="210">Togo</option>
                                                    <option value="211">Tokelau</option>
                                                    <option value="212">Tonga</option>
                                                    <option value="213">Trinidad and Tobago</option>
                                                    <option value="255">Tristan da Cunha</option>
                                                    <option value="214">Tunisia</option>
                                                    <option value="215">Turkey</option>
                                                    <option value="216">Turkmenistan</option>
                                                    <option value="217">Turks and Caicos Islands</option>
                                                    <option value="218">Tuvalu</option>
                                                    <option value="219">Uganda</option>
                                                    <option value="220">Ukraine</option>
                                                    <option value="221">United Arab Emirates</option>
                                                    <option value="222" >United Kingdom</option>
                                                    <option value="223">United States</option>
                                                    <option value="224">United States Minor Outlying Islands</option>
                                                    <option value="225">Uruguay</option>
                                                    <option value="226">Uzbekistan</option>
                                                    <option value="227">Vanuatu</option>
                                                    <option value="228">Vatican city State (Holy See)</option>
                                                    <option value="229">Venezuela</option>
                                                    <option value="230">Viet Nam</option>
                                                    <option value="231">Virgin Islands (British)</option>
                                                    <option value="232">Virgin Islands (U.S.)</option>
                                                    <option value="233">Wallis and Futuna Islands</option>
                                                    <option value="234">Western Sahara</option>
                                                    <option value="235">Yemen</option>
                                                    <option value="238">Zambia</option>
                                                    <option value="239">Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-zone">شهر / استان</label>
                                            <div class="col-sm-10">
                                                <select class="form-control"name="province_id" id="province" data-action="{{url('/getCities')}}">
                                                    <option value="0">استان را انتخاب کنید</option>
                                                    <option value="1">آذربایجان شرقی</option>
                                                    <option value="2">آذربایجان غربی</option>
                                                    <option value="3">اردبیل</option>
                                                    <option value="4">اصفهان</option>
                                                    <option value="5">البرز</option>
                                                    <option value="6">ایلام</option>
                                                    <option value="7">بوشهر</option>
                                                    <option value="8">تهران</option>
                                                    <option value="9">چهارمحال بختیاری</option>
                                                    <option value="10">خراسان جنوبی</option>
                                                    <option value="11">خراسان رضوی</option>
                                                    <option value="12">خراسان شمالی</option>
                                                    <option value="13">خوزستان</option>
                                                    <option value="14">زنجان</option>
                                                    <option value="15">سمنان</option>
                                                    <option value="16">سیستان و بلوچستان</option>
                                                    <option value="17">فارس</option>
                                                    <option value="18">قزوین</option>
                                                    <option value="19">قم</option>
                                                    <option value="20">کردستان</option>
                                                    <option value="21">کرمان</option>
                                                    <option value="22">کرمانشاه</option>
                                                    <option value="23">کهکیلویه و بویراحمد</option>
                                                    <option value="24">گلستان</option>
                                                    <option value="25">گیلان</option>
                                                    <option value="26">لرستان</option>
                                                    <option value="27">مازندران</option>
                                                    <option value="28">مرکزی</option>
                                                    <option value="29">هرمزگان</option>
                                                    <option value="30">همدان</option>
                                                    <option value="31">یزد</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-zone">شهرستان</label>
                                            <div class="col-sm-10">
                                                <select id="city" name="city_id"></select>                                        </div>
                                        </div>
                                        <div class="form-group required">
                                            <label class="col-sm-2 control-label" for="input-postcode">کد پستی</label>
                                            <div class="col-sm-10">
                                                <input name="postcode" value="" placeholder="کد پستی" id="input-postcode" class="form-control" type="text">
                                            </div>
                                        </div>
                                        <input value="دریافت پیش فاکتور" id="button-quote" data-loading-text="بارگذاری ..." class="btn btn-primary" type="button">
                                    </form>
                                </div>
                            </div>
                        </div>
                        -->
                        <div class="row">
                            <div class="col-sm-4 col-sm-offset-8">
                                <table class="table table-bordered">
                                    <tbody>
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
                                    </tbody></table>
                            </div>
                        </div>
                        <div class="buttons">
                            <!--<div class="pull-left"><a href="{{ url('/') }}" class="btn btn-default">افزودن به سبد خرید</a></div>-->
                            <div class="pull-right"><a href="{{route('shop.checkout')}}" class="btn btn-primary">تسویه حساب</a></div>
                        </div>
                    </div>
                    <!--Middle Part End -->
                </div>
            </div>
        </article>

    </section>


    <script>
        function getCities(th)
        {

            selected_city = $('#city').attr('data-selected') || null;


            $('#city').html('').fadeIn(800).append('<option value="0">لطفا کمی صبر کنید ...</option>');

            $.ajax({
                type: "GET",
                url: $(th).data('action') + $(th).val(),
                dataType : 'json',
                success: function(data)
                {
                    var cities = $.parseJSON(data);

                    $('#city').html('').fadeIn(800).append('<option value="0">انتخاب شهر</option>');
                    $.each(cities, function(i, city){
                        if(selected_city == city.id) $('#city').append('<option value="' + city.id + '" selected>' + city.name + '</option>');
                        else $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                },
                error : function(data)
                {
                    console.log('province_city.js#getCities function error: #line : 30');
                }
            });


            return false; // avoid to execute the actual submit of the form.
        }

        /**
         * Load cities on state change
         */
        $(document).on('change', '#province', function (e) {
            getCities(this);
        });
    </script>



@endsection
