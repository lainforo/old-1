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
            <h1>The Overboard</h1>
            This shows all (public) threads and replies from every board on {{ env('LF_NAME') }}.
                <div class="threads">
                <br /><br />
                @include('board.threads', ['isoverboard' => 'true'])
            </div>
        </div>
    </body>
</html>