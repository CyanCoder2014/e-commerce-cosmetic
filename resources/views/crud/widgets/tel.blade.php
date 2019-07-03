<div class="col-sm-4 form-group">
    @if(isset($fiels['slug']))
        <label for="{{ $fiels['name'] }}">{{ $fiels['slug'] }}</label>
    @endif
    <input type="tel"  name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" value="{{ $value }}" class="form-control" step="any" placeholder="0xxxxxxxxxx">
</div>