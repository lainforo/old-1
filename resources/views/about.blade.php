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
            <h1>About {{ env('LF_NAME') }}</h1>
            This website is probably really cool.
            <br />
            You can contact the admin using this email address: {{ env('LF_ADMIN_EMAIL') }}
        </div>
    </body>
</html>