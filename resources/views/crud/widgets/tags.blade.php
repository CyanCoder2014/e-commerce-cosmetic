<div class="col-sm-4 form-group">
    @if(isset($fiels['slug']))
        <label for="{{ $fiels['name'] }}">{{ $fiels['slug'] }}</label>
    @endif
        <select name="{{ $fiels['name'] }}[]" id="{{ $fiels['name'] }}" class="form-control"  multiple="multiple">
            @if(is_array($fiels['values']))
                @foreach($fiels['values'] as $key => $val)
                        <option value="{{$key}}" @if(isset($value) && in_array($key,$value)) selected="selected" @endif>{{ $val }}</option>
                @endforeach
            @endif

        </select>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $('#{{ $fiels['name'] }}').select2();
</script>