<div class="col-sm-12 form-group">
    @if(isset($fiels['slug']))
        <label for="{{ $fiels['name'] }}">{{ $fiels['slug'] }}</label>
    @endif
    <textarea  name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" class="form-control">{{ $value }}</textarea>
        @if(isset($fiels['description']))<small id="{{ $fiels['name'] }}Help" class="form-text text-muted">{{ $fiels['description'] }}</small> @endif
</div>