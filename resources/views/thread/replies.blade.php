@foreach ($replies as $reply)
<div class="reply">
        <span class="postername">{{ $reply->author }}</span> at {{ date("m/d/y (D) H:i:s", strtotime($reply->created_at)) }} No. {{ $reply->id }}
        @if (Cookie::get('admin_login') === env('LF_PASSWORD'))
            @include('form.modactions', ['postType' => 'reply'])
        @endif

        <pre class="threadbody">{{ $reply->body }}</pre>
        @if ($reply->die ?? '')
        <pre class="threadbody"><span class="postername">{{ $reply->author }}</span> rolled a six-sided die, it landed on {{ $reply->die }}</pre>
        @endif
        @if ($reply->xkcd ?? '')
        <a href="{{ $reply->xkcd }}"><img src="{{ $reply->xkcd }}" height=250></a>
        @endif
</div>
<br />
@endforeach