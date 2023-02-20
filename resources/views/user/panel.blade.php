@if (Cookie::get('user_login') ?? '')
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>User Panel - {{ env('LF_NAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" />
    </head>
    <body>
        <div class="center">
            <h1>Welcome.</h1>
            <i>{{ env('LF_NAME') }} user control panel (UCP).</i>
        </div>
        <br />
        <div class="boardlist">
            We don't have many options for users at the moment. But, by being logged in, your
            username will automatically fill the "Name" field for threads and replies, cool!
            <br />
            <a href="{{ route('index') }}">to home</a>
        </div>
    </body>
</html>
@else
    Incorrect login.
@endif