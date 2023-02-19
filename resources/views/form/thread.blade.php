<form method="post" action="{{ route('newthread') }}">
    @csrf

    <input type="hidden" name="indexed" value="{{ $board->indexed }}">
    <input type="hidden" name="board" value="{{ $board->uri }}">
    <input type="text" name="author" value="Anonymous"><br />
    <input type="text" name="subject" placeholder="Subject"><input type="submit" value="New thread">
    <br />
    <textarea name="body" placeholder="Message"></textarea>
</form>
