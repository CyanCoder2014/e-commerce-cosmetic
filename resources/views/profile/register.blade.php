@extends('layouts.layout')
@section('header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12" style="min-height: 583px">

            <div class="widget with-padding" style="margin-bottom: 50px;text-align: right" >
                <div>
                    <form  id="postForm" name="_token" method="POST" enctype="multipart/form-data"
                           action="<?= Url('/home/profile/profileComplete/'); ?>">
                        {{ csrf_field() }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }} ">

                        <div>
                            <h2 class="StepTitle"> اطلاعات عمومی</h2>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="c-label"> شخصیت </label>
                                    <select name="person" id="" class="form-control">
                                        <option value="1">حقیقی</option>
                                        <option value="2">حقوقی</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="c-label"> نوع </label>
                                    <select name="type" id=""  class="form-control">
                                        <option value="1">شرکت</option>
                                        <option value="2">تعمیرگاه</option>
                                        <option value="3">فروشگاه</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="c-label">نوع کاربری</label>
                                    <select name="type_sub" id="" class="form-control">
                                        <option value="1">نمایندگی</option>
                                        <option value="2">مستقل</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="c-label">نام خانوادگی</label><input required  class="form-control" type="text" placeholder="" name="family" value="{{$user->family}} " />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="c-label"> نام</label><input required class="form-control" type="text" placeholder=""  name="name" value="{{$user->name}} "/>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-zone" class="col-sm-2 control-label">شهر / استان</label>
                                <div class="col-sm-10">
                                    <select id="province" class="form-control" name="province_id" data-action="{{ route('getcities',['id' => null]).'/' }}">
                                    <option>استان را انتخاب کنید</option>
                                    @foreach($provinces as $province)
                                        <option value="{{$province->id}}" @if($province->id == old('province_id')) selected @endif>{{$province->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label for="input-zone" class="col-sm-2 control-label">شهر</label>
                                <div class="col-sm-10">
                                    <select id="city" class="form-control" name="country_id" data-selected="{{old('country_id')}}">
                                    </select>
                                </div>
                            </div>



                            @if($user->profile !== null)

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label"> عنوان شغلی </label><input required  type="text" placeholder="" name="job" value="{{$user->profile->job}}"  class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label">رشته و تحصیلات</label><input required type="text" placeholder="" name="education" value="{{$user->profile->education}}" class="form-control" />
                                    </div>
                                </div>
                            @else
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label"> عنوان شغلی </label><input required  type="text" placeholder="" name="job" value="" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label">رشته و تحصیلات</label><input required type="text" placeholder="" name="education" value="" class="form-control" />
                                    </div>
                                </div>
                            @endif

                        </div>
                        @if($user->profile !== null)
                            <div>
                                <h2 style="margin-top: 40px !important;" class="StepTitle">اطلاعات شخصی  </h2>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label">تلفن ثابت  </label><input required type="text" placeholder="" name="tell" value="{{$user->profile->tell}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label"> تلفن همراه</label><input  type="text" placeholder="" name="mobile" value="{{$user->profile->mobile}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label"> طریقه آشنایی با سایت</label><input  type="text" placeholder="" name="introduce" value="{{$user->profile->introduce}}" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label">سایت</label><input  type="text" placeholder="" name="site" value="{{$user->profile->site}}" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        @else
                            <div>
                                <h2 style="margin-top: 40px !important;" class="StepTitle">اطلاعات شخصی  </h2>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label">تلفن ثابت  </label><input required type="text" placeholder="" name="tell" value="" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label"> تلفن همراه</label><input  type="text" placeholder="" name="mobile" value="" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label">کدپستی</label><input  type="text" placeholder="" name="post_code" value="" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="c-label">آدرس</label><input  type="text" placeholder="" name="address" value="" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label"> طریقه آشنایی با سایت</label><input  type="text" placeholder="" name="introduce" value="" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="c-label">سایت</label><input  type="text" placeholder="" name="site" value="" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div>
                            <div class="form-group">
                                <label class="c-label">تصویر جواز کسب یا جواز تعمیرات</label>
                                <input  type="file" class="form-control" placeholder="" name="license_img" accept="image/jpeg,image/gif,image/png" required/>
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



                        <div class="col-md-12" style="margin-top: 40px !important;">
                            <div >
                                <button name="_token" value="{{ csrf_token() }}" class="btn green-bg">ثبت و تکمیل پروفایل </button>
                                <!-- <a href="<?= Url('home/profile/edit'); ?>" class="btn skyblue-bg"><i class="fa fa-check"></i>  ثبت   </a>  -->
                                <a href="<?= Url('home/profile/show/137-'.Auth::id().'-42-'.Auth::user()->username); ?>" class="btn red-bg">تکمیل در زمانی دیگر </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
      </div>

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