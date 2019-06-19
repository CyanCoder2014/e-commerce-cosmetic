<form method="POST" action="{{ $class::route('destroy',$id) }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}

    <div class="form-group">
        <input type="submit" class="btn btn-danger delete-user" value="حذف" onclick="return confirm('ایا از حذف اطمینان دارید؟');">
    </div>
</form>
<a href="{{ $class::route('edit',$id) }}" class="btn btn-warning">ویرایش</a>
