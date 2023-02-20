<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ env('LF_NAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" />
    </head>
    <body>
        <div class="center">
            <h1>Error</h1>
        </div>
        <br />
        <div class="boardlist">
            <h1>{{ $error }}</h1>
            <a href="{{ route('index') }}">Return to home</a>
        </div>
    </body>
</html>