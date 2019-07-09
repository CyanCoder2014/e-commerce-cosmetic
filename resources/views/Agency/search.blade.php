@extends('layouts.layout')
@section('title')
   نمایندگی ها
@endsection
@section('header')
    <link href="/select2/select2.min.css" rel="stylesheet"/>
    <style>
        .maps iframe {
            width: 100%;
            height: 600px;
        }
    </style>
@endsection
@section('content')
    <div class="row maps" style="margin-top: 150px">
        <div class="col-4" style="direction: rtl">
            <div class="card">
                <div class="card-header">
                    جستجو
                </div>
                <div class="card-body">
                    <form method="get">
                        <div class="form-group required">
                            <label for="input-zone" class="control-label">شهر / استان</label>
                            <select id="province" class="form-control" name="province_id"
                                    data-action="{{ route('getcities',['id' => null]).'/' }}">
                                <option>استان را انتخاب کنید</option>
                                @foreach($provinces as $province)
                                    <option value="{{$province->id}}"
                                            @if($province->id == Request::get('province_id')) selected @endif>{{$province->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group required">
                            <label for="input-zone" class="control-label">شهر</label>
                            <select id="city" class="form-control" name="city_id" data-selected="{{Request::get('city_id')}}">
                                <option value="">ابتدا استان را انتخاب کنید</option>
                            </select>
                        </div>
                        <button class="btn btn-success">جستجو</button>
                    </form>
                </div>
            </div>

            @foreach($Agencies as $agency)
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $agency->title }}</h5>
                        <h5 class="card-title">  نام: {{ $agency->name }}</h5>
                        <p class="card-text">آدرس: {{ $agency->address }}</p>
                        @if(isset($agency->tell))
                            <p class="card-text">تلفن: <a href="tel:{{ $agency->tell }}">{{ $agency->tell }}</a></p>
                        @endif
                        @if(isset($agency->fax))
                        <p class="card-text">فکس: {{ $agency->fax }}</p>
                        @endif
                        @if(isset($agency->email))
                        <p class="card-text">ایمیل: <a href="mailto:{{ $agency->email }}">{{ $agency->email }}</a></p>
                        @endif
                        @if(isset($agency->site))
                        <p class="card-text">سایت: <a href="{{ $agency->site }}">{{ $agency->site }}</a></p>
                        @endif
                        <a href="#" class="btn btn-primary mapkey" data-key="{{$agency->id}}">نمایش روی نقشه</a>
                    </div>
                </div>
            @endforeach
            {!! $Agencies->links() !!}
        </div>
        <div class="col-8">
            @foreach($Agencies as $key => $agency)
                <div id="map-{{$agency->id}}" @if($key != 0) style="display: none" @endif>
                    {!! $agency->map !!}
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('script')
    <script src="/select2/select2.min.js"></script>
    <script>
        function getCities(th) {

            selected_city = $('#city').attr('data-selected') || null;


            $('#city').html('').fadeIn(800).append('<option value="">لطفا کمی صبر کنید ...</option>');

            $.ajax({
                type: "GET",
                url: $(th).data('action') + $(th).val(),
                dataType: 'json',
                success: function (data) {

                    $('#city').html('').fadeIn(800).append('<option value="">انتخاب شهر</option>');
                    $.each(data, function (i, city) {
                        if (selected_city == city.id)
                            $('#city').append('<option value="' + city.id + '" selected>' + city.name + '</option>');
                        else
                            $('#city').append('<option value="' + city.id + '">' + city.name + '</option>');
                    });
                },
                error: function (data) {
                    console.log('province_city.js#getCities function error: #line : 30');
                }
            });


            return false; // avoid to execute the actual submit of the form.
        }

        $(document).ready(function () {
            $('#province').select2();
            $('#city').select2();
            @if(Request::get('province_id'))
            getCities($('#province'));
            @endif

        });
        $(document).on('change', '#province', function (e) {
            getCities(this);
//            $(this).siblings('.city').select2();

        });
        var key = 0;
        $(document).on('click', '.mapkey', function (e) {
            $('#map-'+$(this).attr('data-key')).show()
            $('#map-'+key).hide()
            key = $(this).attr('data-key');

        });

    </script>
@endsection