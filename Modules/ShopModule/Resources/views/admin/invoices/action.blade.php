@can('edit invoice')
<a href="{{ route('invoice.detail',['id'=> $invoice->id]) }}" class="btn btn-primary"><span class="fa fa-cog"></span>ویرایش</a>
@endcan