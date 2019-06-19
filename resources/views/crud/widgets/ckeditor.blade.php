<div class="col-sm-12 form-group">
    @if(isset($fiels['slug']))
        <label for="{{ $fiels['name'] }}">{{ $fiels['slug'] }}</label>
    @endif
    <textarea  name="{{ $fiels['name'] }}" id="{{ $fiels['name'] }}" class="form-control">{{ $value }}</textarea>
</div>
<script src="<?= Url('assets/plugins/ckeditor/ckeditor.js'); ?>"></script>
<script>
    CKEDITOR.replace( '{{ $fiels['name'] }}',{
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    });

</script>