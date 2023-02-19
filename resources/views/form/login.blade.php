<form method="post" action="{{ route('acplogin') }}">
    @csrf

    <input type="password" name="password"><br />
    <input type="submit" value="Login">
</form>
