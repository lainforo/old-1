<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ $board->title }} - {{ env('LF_NAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" />
    </head>
    <body>
        <div class="center">
            <h1>{{ $board->title }}</h1>
            <i>{{ $board->description }}</i>
        </div>
        @include('board.nav')
        <br />
        <div class="boardlist">
            <h1>Latest Threads</h1>
            <div class="threads">
            @include('form.thread')
            @include('board.threads')
            </div>
        </div>
    </body>
</html>