<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $board->title }} - {{ env('LF_NAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" />
        @if ($board->background ?? '')
            <style>
                html, body {
                    background-image: url("{{ $board->background }}");
                    background-size: 100%, 100%;
                }
            </style>
        @endif
    </head>
    <body>
        <div class="center">
            <h1>{{ $board->title }}</h1>
            <i>{{ $board->description }}</i>
        </div>
        @include('board.nav')
        <br />
        <div class="boardlist">
            @if ($board->iconpath == null)
                <img src="{{ URL::asset('assets/img/board-default.png') }}" height=128><br />
            @else
                <img src="{{ $board->iconpath }}" height=128>
            @endif
            <h1>Latest Threads</h1>
            <div class="threads">
            @include('form.thread')
            @include('board.threads')
            </div>
        </div>
    </body>
</html>
