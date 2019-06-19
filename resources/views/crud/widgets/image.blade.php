<div class="col-sm-4 input-group">
    <label for="{{ $fiels['name'] }}">{{ $fiels['slug'] }}</label>
   <span class="input-group-btn">
     <a id="lfm{{ $fiels['name'] }}" data-input="{{ $fiels['name'] }}" data-preview="thumbnail{{ $fiels['name'] }}" class="btn btn-primary">
       <i class="fa fa-picture-o"></i> انتخاب
     </a>
   </span>
    <input id="{{ $fiels['name'] }}" class="form-control" type="text" name="{{ $fiels['name'] }}" value="{{ $value }}">
    <img id="thumbnail{{ $fiels['name'] }}" style="margin-top:15px;max-height:100px;" @if(isset($value)) src="{{ $value }}" @endif>
</div>
<script src="{{asset('/vendor/laravel-filemanager/js/lfm.js')}}"></script>
<script>
    $('#lfm{{ $fiels['name'] }}').filemanager('image');
</script>