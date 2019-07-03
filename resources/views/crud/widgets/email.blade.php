<div class="col-sm-4 form-group {{ $fiels['name'] }}">
    @if(isset($fiels['slug']))
        <label for="{{ $fiels['name'] }}">{{ $fiels['slug'] }}</label>
    @endif
    <input type="email" name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" value="{{ $value }}" class="form-control">
    @if(isset($fiels['description']))<small id="{{ $fiels['name'] }}Help" class="form-text text-muted">{{ $fiels['description'] }}</small> @endif

</div>
@if(isset($fiels['showIF']))
    <?php
        $showif = explode(',',$fiels['showIF']);
        $field = $showif[0];
        $field_value = $showif[1];
    ?>
<script>
    if($('#{{ $field }}').val() != {{ $field_value }})
        $('.{{ $fiels['name'] }}').hide();
    $('#{{ $field }}').change(function () {
        if ($('#{{ $field }}').val() == {{ $field_value }})
            $('.{{ $fiels['name'] }}').show();
        else
            $('.{{ $fiels['name'] }}').hide();
    })
</script>
@endif