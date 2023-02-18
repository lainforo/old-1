@foreach ($replies as $reply)
<div class="reply">
        <span class="postername">{{ $reply->author }}</span> at {{ date("m/d/y (D) H:i:s", strtotime($thread->created_at)) }} No. {{ $reply->id }}
        <pre class="threadbody">{{ $reply->body }}</pre>
</div>
<br />
@endforeach