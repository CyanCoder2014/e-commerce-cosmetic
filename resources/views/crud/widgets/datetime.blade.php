<div class="col-sm-4 form-group">
    @if(isset($fiels['slug']))
        <label for="{{ $fiels['name'] }}">{{ $fiels['slug'] }}</label>
    @endif
    <input type="text" name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" value="{{ $value }}" class="form-control" style="direction: ltr">
</div>
{{--<link rel="stylesheet" href="/widgets/datepicker/css/persianDatepicker-default.css"/>--}}
<link rel="stylesheet" href="/widgets/datepicker/jquery.md.bootstrap.datetimepicker.style.css"/>
<script src="/widgets/jquery.min.js"></script>
{{--<script src="/widgets/datepicker/js/persianDatepicker.min.js"></script>--}}
<script src="/widgets/datepicker/jquery.md.bootstrap.datetimepicker.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        {{--$("#{{ $fiels['name'] }}").persianDatepicker({--}}
            {{--formatDate: "YYYY/MM/DD hh:mm:ss"--}}
        {{--});--}}
        $("#{{ $fiels['name'] }}").MdPersianDateTimePicker({
            targetTextSelector: '#{{ $fiels['name'] }}',
            enableTimePicker: true,
        });
    });
</script>