@foreach ($threads as $thread)
    @if ($isoverboard ?? '')
        <b>/{{ $thread->board }}/</b> - 
    @endif

    <b>{{ $thread->subject }}</b> <span class="postername">{{ $thread->author }}</span> {{ date("m/d/y (D) H:i:s", strtotime($thread->created_at)) }} <a href="/{{ $thread->board }}/{{ $thread->id }}">No.{{ $thread->id }}</a>
    <pre class="threadbody">{{ $thread->body }}</pre>
@endforeach
