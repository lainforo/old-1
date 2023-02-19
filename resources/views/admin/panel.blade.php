@if (Cookie::get('admin_login') === env('LF_PASSWORD'))

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Mastermind - {{ env('LF_NAME') }}</title>
        <link rel="stylesheet" href="{{ URL::asset('assets/css/main.css') }}" />
    </head>
    <body>
        <div class="center">
            <h1>{{ env('LF_NAME') }}</h1>
            <i>{{ env('LF_DESC') }}</i>
        </div>
        <br />
        <div class="boardlist">
            <h1>Mastermind Panel</h1>
            

            I'm still improving this page. If you're seeing it, though, that means you have the admin cookie
            and can delete threads/replies by visiting them. Enjoy.
            <br />
            <h1>All boards</h1>
            This includes boards where `indexed` is set to false.
            <br />
            @include('board.nav', ['isadmin' => true])
            <br />
            <a href="{{ route('index') }}">to home</a>
        </div>
    </body>
</html>
@else
    Incorrect login.
@endif
