<div class="col-sm-12 form-group">
    @if(isset($fiels['slug']))
        <label for="{{ $fiels['name'] }}">{{ $fiels['slug'] }}</label>
    @endif
    <textarea  name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" class="form-control">{{ $value }}</textarea>
</div>