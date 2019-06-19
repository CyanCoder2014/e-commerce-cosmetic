@extends('layouts.layout')
@section('header')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">فیلتر تعمیرگاه ها</h5>
                    <button type="button" class="close mr-auto ml-0" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-right">
                    <form action="" method="get">
                        <div class="form-group">
                            <label for="province" class="col-form-label">استان :</label>
                            <select id="province" class="form-control" name="province_id" data-action="{{ route('getcities',['id' => null]).'/' }}" style="width: 100%">
                                <option>استان را انتخاب کنید</option>
                                @foreach($provinces as $province)
                                    <option value="{{$province->id}}" @if($province->id == Request::get('province_id')) selected @endif>{{$province->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city" class="col-form-label">شهر :</label>
                            <select id="city" class="form-control" name="city_id" data-selected="{{Request::get('city_id')}}"  style="width: 100%">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="classification" class="col-form-label">نوع:</label>
                            <select class="form-control" id="classification" name="type"  style="width: 100%">
                                <option value="1"  selected="selected" >تعمیرگاه ساعت</option>
                                <option value="0" > فروشگاه ساعت</option>
                                <option value="2" >شرکت وارد کننده</option>
                                <option value="">همه</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">نوع کاربری:</label>
                            <select name="type_sub" id="" class="form-control">
                                <option value="1" >نمایندگی</option>
                                <option value="2" >مستقل</option>
                                <option value="" >همه</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="classification" class="col-form-label">برند:</label>
                            <select class="form-control" id="classification" name="brand_id"  style="width: 100%">
                                <option value="">همه</option>
                                @foreach($brands as $brand)
                                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">بستن</button>
                    <button type="button" class="btn btn-primary mr-3">فیلتر</button>
                </div>
            </div>
        </div>
    </div>


    <div class="position-relative overflow-h" style="max-height: 400px">
        <img src="/new/img/4.jpg" class="w-100"/>
        <div class="ladiesbtn" style="display: flex;justify-content: center">    <div class="accordion mb-3 mt-5" id="accordionExample275">
                <div class="card z-depth-0 bordered">
                    <div class="card-header text-center " id="headingOne2">

                        <h5 class="mb-0">
                            <button type="button" class="btn btn-link text-center " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">فیلتر تعمیرگاه ها</button>

                            {{--<button class="btn btn-link text-center "  type="button"  data-toggle="collapse" data-target="#collapseOne2"
                                    aria-expanded="true" aria-controls="collapseOne2">
                                فیلتر تعمیرگاه ها
                            </button>--}}
                        </h5>
                    </div>
                    {{--<div id="collapseOne2" class="collapse" aria-labelledby="headingOne2"
                         data-parent="#accordionExample275">
                        <div class="card-body">
                            <form action="" method="get" style="width: 100%">

                                <div class="row text-right ">
                                    <div class="col-md-6">
                                        <span class="ml-2"> استان : </span>
                                        <!-- Example split danger button -->

                                        <select id="province" class="form-control" name="province_id" data-action="{{ route('getcities',['id' => null]).'/' }}" style="width: 100%">
                                            <option>استان را انتخاب کنید</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province->id}}" @if($province->id == Request::get('province_id')) selected @endif>{{$province->name}}</option>
                                            @endforeach
                                        </select>



                                    </div>
                                    <div class="col-md-6">
                                        <span class="ml-2">شهر : </span>
                                        <select id="city" class="form-control" name="city_id" data-selected="{{Request::get('city_id')}}"  style="width: 100%">
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="ml-2"> نوع: </span>
                                        <!-- Example split danger button -->
                                        <select class="form-control" id="classification" name="type"  style="width: 100%">
                                            <option value="1"  selected="selected" >تعمیرگاه ساعت</option>
                                            <option value="0" > فروشگاه ساعت</option>
                                            <option value="2" >شرکت وارد کننده</option>
                                            <option value="">همه</option>

                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <span class="ml-2"> نوع کاربری: </span>
                                        <!-- Example split danger button -->
                                        <select name="type_sub" id="" class="form-control">
                                            <option value="1" >نمایندگی</option>
                                            <option value="2" >مستقل</option>
                                            <option value="" >همه</option>
                                        </select>

                                    </div>
                                    <div class="col-md-6">
                                        <span class="ml-2"> برند: </span>
                                        <!-- Example split danger button -->
                                        <select class="form-control" id="classification" name="brand_id"  style="width: 100%">
                                            <option value="">همه</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <button class="btn btn-primary mt-4" >فیلتر</button>
                                    </div>


                                </div>
                            </form>

                        </div>
                    </div>--}}
                </div>

            </div>

        </div>
    </div>


<div class="container">








    <div class="row pb-5">
{{--        <div class="col-md-12">--}}
{{--            <div class=" prob rad-20">--}}
{{--                <img src="/new/img/1.jpg" class="w-100"/>--}}
{{--                <div></div>--}}
{{--                <a href="#">--}}
{{--                    <h3 class="text-white">--}}
{{--                        لیست فروشندگان و تعمیر کاران--}}
{{--                    </h3>--}}
{{--                    <p>--}}
{{--                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab at et, fugiat fugit ipsa, ipsam--}}
{{--                        iste laboriosam molestiae non quas soluta voluptatum? Dicta ex fugiat iste rem tenetur unde--}}
{{--                        voluptate!--}}
{{--                    </p>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}







    @foreach($profilesellers as $profile)
            <div class="col-md-12 mt-5">
            <div class="shadow rad-10 overflow-h bg-second shadow-hover grow-parent">
                <div class="row">
                    <div class="col-md-4" style="height: 200px; ">
                        <div class="overflow-h p-5" >
                            @if(isset($profile->logo_img))
                            <img src="{{ asset($profile->logo_img) }}" class="grow img-fluid"/>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8 p-4 text-center">
                        <h2>{{ $profile->company }}</h2>
                        <p>{{$profile->name.' '.$profile->family}}</p>
                        <a href="{{ $profile->link() }}" class="sweep-to-left sweep-to-left-bg-dark shadow d-block w-50">ادامه مطلب</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {!! $profilesellers->links() !!}
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
            $('#classification').select2();
            @if(Request::get('province_id'))
            getCities($('#province'));
            @endif

        });
        $(document).on('change', '#province', function (e) {
            getCities(this);
//            $(this).siblings('.city').select2();

        });
    </script>
@endsection