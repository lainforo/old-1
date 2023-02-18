@foreach ($threads as $thread)
    <b>{{ $thread->subject }}</b> <span class="postername">{{ $thread->author }}</span> {{ date("m/d/y (D) H:i:s", strtotime($thread->created_at)) }} <a href="/{{ $board->uri }}/{{ $thread->id }}">No.{{ $thread->id }}</a>
    <pre class="threadbody">{{ $thread->body }}</pre>
@endforeach