<div class="col-sm-4 input-group">
    <label for="{{ $fiels['name'] }}">{{ $fiels['slug'] }}</label>
    <input type="file" name="{{ $fiels['name'] }}" >
    @if(isset($value))
        <div>
            <input id="{{ $fiels['name'] }}" class="form-control" type="hidden" name="{{ $fiels['name'] }}_old" value="{{ $value }}">
            <a href="{{ $value }}">فایل قبلی</a>
            <a href="#" onclick="this.parent().remove();">حذف</a>
        </div>
    @endif
</div>
