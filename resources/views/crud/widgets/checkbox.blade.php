<div class="col-sm-4 form-group">
    @if(isset($fiels['slug']))
        <label for="{{ $fiels['name'] }}">{{ $fiels['slug'] }}</label>
    @endif
    <input type="checkbox" name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" @if($value && $value==1) checked @endif value="1">
</div>