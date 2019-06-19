@foreach($comments as $comment)
    @if($comment->approved == 1)
<div class="comment_wrap border-bottom" style="margin: 25px 0;">
    <div class="comment_content">
        <div class="comment_meta">
        <div class="gravatar" style="max-width: 50px;max-height: 50px;float: right;">
            <img src="{{asset('web/images/blog/people_img.jpg')}}" alt="" style="border-radius: 25px;" />
        </div>
            <div class="comment_author" ><h6>@if(isset($comment->name)){{$comment->name}}@else{{$comment->user->name}}@endif</h6> <i style="font-size:15px;"> {!!  to_jalali_date($comment->created_at) !!}</i></div>

        </div>
        <div class="comment_text">
            <p>{{$comment->comment}}</p>
            {{--<a href="javascript:;" onclick="$('#parent_id').val({{$comment->id}})">پاسخ</a>--}}
        </div>
        <?php $reply = $comment->answers; ?>
        @if($reply->count() > 0)
            <div style="margin-right: 45px;background-color: #e9e9e9; border: 1px solid #5e5e5e;padding: 2px 10px; border-radius: 2px" class="">
                @include('blogmodule::comment',['comments'=>$reply])
            </div>
        @endif
    </div>
</div><!-- end section -->
@endif
@endforeach