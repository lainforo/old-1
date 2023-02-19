@foreach ($replies as $reply)
<div class="reply">
        <span class="postername">{{ $reply->author }}</span> at {{ date("m/d/y (D) H:i:s", strtotime($reply->created_at)) }} No. {{ $reply->id }}
        @if (Cookie::get('admin_login') === env('LF_PASSWORD'))
            @include('form.modactions', ['postType' => 'reply'])
        @endif

        <pre class="threadbody">{{ $reply->body }}</pre>
</div>
<br />
@endforeach