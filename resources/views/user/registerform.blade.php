@extends('layouts.layout')

@section('content')
    <div class="position-relative overflow-h" style="max-height: 300px">
        <img src="{{asset($banners->img_reg)}}" class="w-100 img-background"/>
{{--        <div class="ladiesbtn"><a href="#" class="sweep-to-left0 sweep-to-left-border-gold shadow d-block mt-5 " style="color: #0b0b0b;border: 0 "></a></div>--}}
    </div>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <div id="container">
        <div class="container" style="margin-top: 0px;margin-bottom: 350px; direction: rtl;text-align: right">
            <!-- Breadcrumb Start-->
            <ul class="breadcrumb">
                <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{ route('login') }}">حساب کاربری</a></li>
                <li><a href="{{ route('register') }}">ثبت نام</a></li>
            </ul>
            <!-- Breadcrumb End-->
            <div class="row">
                <!--Middle Part Start-->
                <div class="col-sm-9" id="content">
                    <h1 class="title" >ثبت فروشگاه یا تعمیرکار</h1>
                    <p>سعی نموده ایم محیطی امن برای فروش محصولاتتون یا اگر تعمیرکار هستید محیطی امن و رایگان برای کمک به کسانی که ساعتشان نیاز به تعمیر دارد<a href="{{ route('login')}}">صفحه لاگین</a> مراجعه کنید.</p>


                    <form class="form-horizontal" method="POST" action="show" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="col-sm-10">
                            <select  class="form-control" id="classification" name="type">
                                <option value="0" @if(0 == old('type') or (isset($profile) and $profile->type == 0 )) selected @endif>فروشگاه</option>
                                <option value="2" @if(2 == old('type') or (isset($profile) and $profile->type == 2 )) selected @endif> شرکت وارد کننده</option>
                                <option value="1" @if(1 == old('type') or (isset($profile) and $profile->type == 1 )) selected @endif>تعمیرگاه ساعت</option>

                            </select>

                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="c-label">نوع کاربری</label>
                                <select name="type_sub" id="" class="form-control">
                                    <option value="1" @if(1 == old('type_sub') or (isset($profile) and $profile->type_sub == 1 )) selected @endif>نمایندگی</option>
                                    <option value="2" @if(2 == old('type_sub') or (isset($profile) and $profile->type_sub == 2 )) selected @endif>مستقل</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="c-label">برند ها</label>
                                <select name="brands[]" id="" class="form-control select2" multiple>
                                   @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}" @if((is_array(old('brands')) && in_array($brand->id,old('brands'))) or ( isset($profile)  && in_array($brand->id,$profile->brands->pluck('brand_id')->toArray()) ) )selected="" @endif >{{ $brand->name }}</option>
                                   @endforeach
                                </select>
                            </div>
                        </div>
                        <legend>اطلاعات شخصی شما</legend>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="c-label"> شخصیت </label>
                                <select name="person" id="" class="form-control">
                                    <option value="1" @if(1 == old('person') or (isset($profile) and $profile->person == 1 )) selected @endif>حقیقی</option>
                                    <option value="2" @if(2 == old('person') or (isset($profile) and $profile->person == 2 )) selected @endif>حقوقی</option>
                                </select>
                            </div>
                        </div>
                        <div style="display: none;" class="form-group required">
                            <label class="col-sm-2 control-label">گروه مشتری</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                    <label>
                                        <input checked="checked" value="1" name="customer_group_id" type="radio">
                                        پیشفرض</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group required {{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="input-firstname" class="col-sm-2 control-label">نام کاربری</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="input-username" placeholder="نام کاربری" value="@if(\Illuminate\Support\Facades\Auth::check()){{ \Illuminate\Support\Facades\Auth::user()->username }}@else{{ old('username') }} @endif" name="username" type="text">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group required {{ $errors->has('firstname') ? ' has-error' : '' }}">
                            <label for="input-firstname" class="col-sm-2 control-label">نام</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="input-firstname" placeholder="نام" value="@if(\Illuminate\Support\Facades\Auth::check()){{ \Illuminate\Support\Facades\Auth::user()->name }}@else{{ old('firstname') }} @endif" name="firstname" type="text">
                                @if ($errors->has('firstname'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('firstname') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group required {{ $errors->has('lastname') ? ' has-error' : '' }}">
                            <label for="input-firstname" class="col-sm-2 control-label"> نام خانوادگی</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="input-lastname" placeholder="نام خانوادگی" value="@if(\Illuminate\Support\Facades\Auth::check()){{ \Illuminate\Support\Facades\Auth::user()->family }}@else{{ old('lastname') }} @endif" name="lastname" type="text">
                                @if ($errors->has('lastname'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('lastname') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group required {{ $errors->has('mobile') ? ' has-error' : '' }}">
                            <label for="input-lastname" class="col-sm-2 control-label">تلفن همراه</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="input-lastname" placeholder="تلفن همراه"  name="mobile" value="@if(\Illuminate\Support\Facades\Auth::check()){{ \Illuminate\Support\Facades\Auth::user()->mobile }}@else{{ old('mobile') }} @endif" type="text">
                                @if ($errors->has('mobile'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('mobile') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group required {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="input-email" class="col-sm-2 control-label">آدرس ایمیل</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="input-email" placeholder="آدرس ایمیل" value="@if(\Illuminate\Support\Facades\Auth::check()){{ \Illuminate\Support\Facades\Auth::user()->email }}@else{{ old('email') }}@endif" name="email" type="email">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group required {{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="input-password" class="col-sm-2 control-label">رمز عبور</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="input-password" placeholder="رمز عبور" value="" name="password" type="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="input-confirm" class="col-sm-2 control-label">تکرار رمز عبور</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="input-confirm" placeholder="تکرار رمز عبور" value="" name="password_confirmation" type="password">
                            </div>
                        </div>

                        <legend>آدرس</legend>
                        <div class="form-group">
                            <label for="input-company" class="col-sm-2 control-label">شرکت</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="input-company" placeholder="شرکت" value="@if(isset($profile)){{ $profile->company }}@else{{old('company')}}@endif" name="company" type="text">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="input-address-1" class="col-sm-2 control-label">شماره ثابت</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="input-address-1" placeholder="تلفن" value="@if(isset($profile)){{ $profile->tell }}@else{{old('tell')}} @endif" name="tell" type="text">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="input-address-1" class="col-sm-2 control-label">آدرس</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="input-address-1" placeholder="آدرس" value="@if(isset($profile)){{ $profile->address }}@else{{old('address')}} @endif" name="address" type="text">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="input-postcode" class="col-sm-2 control-label">کد پستی</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="input-postcode" placeholder="کد پستی" value="@if(isset($profile)){{ $profile->post_code }}@else{{old('post_code')}} @endif" name="post_code" type="text">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="input-postcode" class="col-sm-2 control-label">سایت</label>
                            <div class="col-sm-10">
                                <input class="form-control" id="input-postcode" placeholder="www." value="@if(isset($profile)){{ $profile->site }}@else{{old('site')}} @endif" name="site" type="text">
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="input-country" class="col-sm-2 control-label">کشور</label>
                            <div class="col-sm-10">
                                <select class="form-control" id="input-country" name="country_id">
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
                                    <option value="85">سبزland</option>
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
                                    <option selected="selected" value="101">ایران (Islamic Republic of)</option>
                                    <option value="102">Iraq</option>
                                    <option value="103">Ireland</option>
                                    <option value="254">Isle of Man</option>
                                    <option value="104">Israel</option>
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
                                    <option value="222">United Kingdom</option>
                                    <option value="223">United States</option>
                                    <option value="224">United States Minor Outlying Islands</option>
                                    <option value="225">Uruguay</option>
                                    <option value="226">Uzbekistan</option>
                                    <option value="227">Vanuatu</option>
                                    <option value="228">Vatican شهر State (Holy See)</option>
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
                            <label for="input-zone" class="col-sm-2 control-label"> استان</label>
                            <div class="col-sm-10">
                                <select id="province" class="form-control" name="province_id" data-action="{{ route('getcities',['id' => null]).'/' }}">
                                    <option>استان را انتخاب کنید</option>
                                    @foreach($provinces as $province)
                                        <option value="{{$province->id}}" @if($province->id == old('province_id') or (isset($profile) and isset($profile->country) and $profile->country->province_id == $province->id )) selected @endif>{{$province->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group required">
                            <label for="input-zone" class="col-sm-2 control-label">شهر</label>
                            <div class="col-sm-10">
                                <select id="city" class="form-control" name="city_id" data-selected="@if(isset($profile)){{ $profile->country_id }}@else{{old('country_id')}}@endif">
                                </select>
                            </div>
                        </div>

                        <div>
                            <div class="form-group">
                                <label class="c-label">تصویر جواز کسب یا جواز تعمیرات</label>
                                <input  type="file" class="form-control" placeholder="" name="license_img" accept="image/jpeg,image/gif,image/png" @if(!isset($profile->license_img)) required @endif/>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label class="c-label">نشان تجاری</label>
                                <input  type="file" class="form-control" placeholder="" name="logo_img" accept="image/jpeg,image/gif,image/png"/>
                            </div>
                        </div>
                        <div>
                            <div class="form-group">
                                <label class="c-label">تصویر محل کسب</label>
                                <input  type="file" class="form-control" placeholder="" name="place_img" accept="image/jpeg,image/gif,image/png"/>
                            </div>
                        </div>


                        <div class="buttons">
                            <div class="pull-right">
                                @guest
                                <input value="1" name="agree" type="checkbox">
                                &nbsp;من <a class="agree" href="#"><b>سیاست حریم خصوصی</b> را خوانده ام و با آن موافق هستم</a> &nbsp;
                                @endguest
                                <input class="btn btn-primary" value="ادامه" type="submit">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


@endsection
@section('script')
    <script src="/select2/select2.min.js"></script>
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
            $('.select2').select2();
            $('#city').select2();
            @if(old('province_id') or isset($profile))
            getCities($('#province'));
            @endif

        });
        $(document).on('change', '#province', function (e) {
            getCities(this);
//            $(this).siblings('.city').select2();

        });

    </script>
@endsection
