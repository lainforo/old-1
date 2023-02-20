<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $thread->subject }} - {{ env('LF_NAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" />
    </head>
    <body>
        <div class="center">
            <h1><a href="/{{ $board->uri }}/">{{ $board->title }}</a></h1>
            <i>{{ $board->description }}</i>
        </div>
        @include('board.nav')
        <br />
        <div class="boardlist noncenter">
            @if ($board->iconpath == null)
                <div class="center"><img src="{{ URL::asset('assets/img/board-default.png') }}" height=128></div><br />
            @else
                <div class="center"><img src="{{ $board->iconpath }}" height=128></div>
            @endif
            <h1>{{ $thread->subject }}</h1>
            by <span class="postername">{{ $thread->author }}</span> @if ($thread->tripcode) <span class="postertrip">!{{ substr($thread->tripcode, 0, 8) }}</span> @endif at {{ date("m/d/y (D) H:i:s", strtotime($thread->created_at)) }}
            @if (Cookie::get('admin_login') === env('LF_PASSWORD'))
                @include('form.modactions', ['postType' => 'thread'])
            @endif
            <br />
            <pre class="threadbody">{{ $thread->body }}</pre>
            <br />
            @include('thread.replies')
            <br />
            @include('form.reply')
        </div>
    </body>
</html>