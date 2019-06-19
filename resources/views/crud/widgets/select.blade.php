<div class="col-sm-4 form-group">
    @if(isset($fiels['slug']))
        <label for="{{ $fiels['name'] }}">{{ $fiels['slug'] }}</label>
    @endif
        <select name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" class="form-control">
            <option value="">--انتخاب--</option>
            @if(is_array($fiels['values']))
                @foreach($fiels['values'] as $key => $val)
                        <option value="{{$key}}" @if($key == $value) selected @endif>{{ $val }}</option>
                @endforeach
            @endif

        </select>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $('#{{ $fiels['name'] }}').select2();
    @if(isset($fiels['condition']))
    <?php
        $condition_field = explode(',',$fiels['condition'])[0];
    ?>
    function get{{ $fiels['name'] }}()
    {

        selected_{{ $fiels['name'] }} = {{ $value??'null' }};

        {{--while (!Number.isInteger($('#{{ $condition_field }}').val())){--}}
        {{--    console.log('waiting {{ $fiels['name'] }}');--}}
        {{--    setTimeout(function(){--}}
        {{--        //do what you need here--}}
        {{--    }, 100);--}}
        {{--}--}}


        $('#{{ $fiels['name'] }}').html('').fadeIn(800).append('<option>لطفا کمی صبر کنید ...</option>');

        $.ajax({
            type: "GET",
            url: '{{ $class::route('condition',$fiels['name']) }}',
            data: {
              '{{$condition_field}}' : $('#{{ $condition_field }}').val()
            },
            dataType : 'json',
            async: false,
            success: function(data)
            {

                $('#{{ $fiels['name'] }}').html('').fadeIn(800).append('<option>انتخاب</option>');
                $.each(data, function(i, value){
                    if(selected_{{ $fiels['name'] }} == i)
                        $('#{{ $fiels['name'] }}').append('<option value="' + i + '" selected>' + value + '</option>');
                    else
                        $('#{{ $fiels['name'] }}').append('<option value="' + i + '">' + value + '</option>');
                });
            },
            error : function(data)
            {
                console.log('get {{ $fiels['name'] }} field has error');
            }
        });

        return false; // avoid to execute the actual submit of the form.
    }
    $(document).ready(function() {

        @if(isset($value))
            get{{ $fiels['name'] }}();
        @endif


    });
    $(document).on('change', '#{{ $condition_field }}', function (e) {
        get{{ $fiels['name'] }}();

    });

    @endif
</script>