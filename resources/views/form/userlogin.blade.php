<form method="post" action="{{ route('userAuth') }}">
    @csrf

    <input type="text" name="username" placeholder="Username"><br />
    <input type="password" name="password" placeholder="Password"><br />
    <input type="submit" value="Login">
</form>
