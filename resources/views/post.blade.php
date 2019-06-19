
@if($post->intro != '...')
{!!nl2br($post->intro)!!}
@endif
<br>

@if($post->text != 'null')
{!!$post->text!!}
@endif