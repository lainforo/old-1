@foreach ($threads as $thread)
<div class="thread">
    @if ($isfeatured ?? '')
        <div class="featured">
    @endif

    @if ($isoverboard ?? '')
        <b>/{{ $thread->board }}/</b> - 
    @endif

    <b>{{ $thread->subject }}</b> <span class="postername">{{ $thread->author }}</span> @if ($thread->tripcode) <span class="postertrip">!{{ substr($thread->tripcode, 0, 8) }}</span> @endif {{ date("m/d/y (D) H:i:s", strtotime($thread->created_at)) }} <a href="/{{ $thread->board }}/{{ $thread->id }}">No.{{ $thread->id }}</a>
    <pre class="threadbody">{{ $thread->body }}</pre>
    @if ($thread->created_at == $thread->updated_at)
        <i class="grayish">No replies have been made on this thread yet.</i>
    @else
        <i class="grayish">Last reply at {{ $thread->updated_at }}</i><br />
    @endif
    @if ($isfeatured ?? '')
        </div>
    @endif
</div>
<br />
@endforeach
