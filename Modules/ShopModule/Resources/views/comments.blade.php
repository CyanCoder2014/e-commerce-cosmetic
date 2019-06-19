
@foreach($comments as $comment)
    @if($comment->approved == 1)
    <table class="table table-striped table-bordered">
        <tbody>
        <tr>
            <td style="width: 50%;"><strong><span>@if(isset($comment->name)){{$comment->name}}@else{{$comment->user->name}}@endif</span></strong></td>
            <td class="text-right"><span>{!!  to_jalali_date($comment->created_at) !!}</span></td>
        </tr>
        <tr>
            <td colspan="2"><p style="font-size: 13px"> {{ $comment->comment }}</p>
            </td>
        </tr>
        </tbody>
    </table>
    <?php $reply = $comment->answers; ?>
    @if($reply->count() > 0)
        <div style="margin-right: 25px;background-color: #e9e9e9; border: 1px solid #5e5e5e; border-radius: 2px">
            @include('shopmodule::comments',['comments'=>$reply])
        </div>
    @endif
    @endif
@endforeach
