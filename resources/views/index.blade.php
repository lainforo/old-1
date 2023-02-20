<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ env('LF_NAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" />
    </head>
    <body>
        <div class="center">
            <h1>{{ env('LF_NAME') }}</h1>
            <i>{{ env('LF_DESC') }}</i>
        </div>
        @include('board.nav')
        <br />
        <div class="boardlist">
            <h1>{{ env('LF_DESC') }}</h1>
            @if ($threads ?? '')
            <h2>Featured Posts</h2>
            @include('board.threads', ['isfeatured' => 'true'])
            <br />
            <br />
            @endif
            @include('board.statistics')
        </div>
    </body>
</html>