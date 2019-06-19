<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<div class="col-12">
    <div class="row" id="Addable{{$fiels['name']}}">
        <label for="">{{ $fiels['slug'] }}</label>
        @if (is_array($value))
            @foreach($value as $key => $val)
                <div class="col-sm-4 input-group">
                        <input id="{{ $fiels['name'] }}" class="form-control" type="hidden" name="{{ $fiels['name'] }}_old[]" value="{{ $val }}">
                            <a href="{{ asset($val) }}">فایل قبلی</a>
                        <a href="#" onclick="$(this).parent().remove();" class="btn btn-danger">حذف</a>
                </div>
            @endforeach
        @endif
    </div>
    <button id="add{{ $fiels['name'] }}" type="button">اضافه کردن</button>
</div>



<script>
    $(document).ready(function () {
        var addable{{$fiels['name']}}= "#Addable{{$fiels['name']}}";
        var count{{$fiels['name']}}= @if (is_array($value)) {{ count($value) }} @else {{ 0 }} @endif;
        $('#add{{ $fiels['name'] }}').click(function () {
            count{{$fiels['name']}}++;
            if (count{{$fiels['name']}} <= {{$fiels['addnum']??10}})
                $(addable{{$fiels['name']}}).append('<div class="col-sm-4 input-group">\n' +
                '    <input type="file" name="{{ $fiels['name'] }}[]" >\n' +
                '</div>'
            );
        });
    });


</script>
