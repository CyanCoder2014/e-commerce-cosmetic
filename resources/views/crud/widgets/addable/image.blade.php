<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<div class="col-12">
    <div class="row" id="Addable{{$fiels['name']}}">
        <label for="">{{ $fiels['slug'] }}</label>
        @if (is_array($value))
        @foreach($value as $key => $val)
            <div class="col-sm-4 input-group">

                <span class="input-group-btn">
             <a id="lfm{{ $fiels['name'].$key }}" data-input="{{ $fiels['name'].$key }}" data-preview="thumbnail{{ $fiels['name'].$key }}" class="btn btn-primary">
               <i class="fa fa-picture-o"></i> انتخاب
             </a>
           </span>
                <input id="{{ $fiels['name'].$key }}" class="form-control" type="text" name="{{ $fiels['name'] }}[]" value="{{ $val }}">
                <img id="thumbnail{{ $fiels['name'].$key }}" style="margin-top:15px;max-height:100px;" @if(isset($val)) src="{{ $val }}" @endif>
            </div>
        @endforeach
        @endif
    </div>
    <button id="add{{ $fiels['name'] }}" type="button">اضافه کردن</button>
</div>



<script>
    $(document).ready(function () {
        @if (is_array($value))
        @foreach($value as $key => $val)
        $('#lfm{{ $fiels['name'].$key }}').filemanager('image');
                @endforeach
                @endif
        var addable{{$fiels['name']}}= "#Addable{{$fiels['name']}}";
        var count{{$fiels['name']}}= @if (is_array($value)) {{ count($value) }} @else {{ 0 }} @endif;
        $('#add{{ $fiels['name'] }}').click(function () {
            count{{$fiels['name']}}++;
            $(addable{{$fiels['name']}}).append('<div class="col-sm-4 input-group">' +
                '            <label for="{{ $fiels['name'] }}'+count{{$fiels['name']}}+'">{{ $fiels['slug'] }}</label>' +
                '            <span class="input-group-btn">' +
                '             <a id="lfm{{ $fiels['name'] }}'+count{{$fiels['name']}}+'" data-input="{{ $fiels['name'] }}'+count{{$fiels['name']}}+'" data-preview="thumbnail{{ $fiels['name'] }}'+count{{$fiels['name']}}+'" class="btn btn-primary">' +
                '               <i class="fa fa-picture-o"></i> انتخاب' +
                '             </a>' +
                '           </span>' +
                '            <input id="{{ $fiels['name'] }}'+count{{$fiels['name']}}+'" class="form-control" type="text" name="{{ $fiels['name'] }}[]">' +
                '            <img id="thumbnail{{ $fiels['name'] }}'+count{{$fiels['name']}}+'" style="margin-top:15px;max-height:100px;">' +
                '        </div>'
            );
            $('#lfm{{ $fiels['name'] }}'+count{{$fiels['name']}}).filemanager('image');
        });
    });


</script>