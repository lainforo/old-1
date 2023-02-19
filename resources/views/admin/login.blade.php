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
        <br />
        <div class="boardlist">
            <h1>Administrator Login</h1>
            @include('form.login')
        </div>
    </body>
</html>