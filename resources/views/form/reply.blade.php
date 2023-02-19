<form method="post" action="{{ route('newreply') }}">
    @csrf

    <input type="hidden" name="indexed" value="{{ $board->indexed }}">
    <input type="hidden" name="replyto" value="{{ $thread->id }}">
    <input type="text" name="author" value="Anonymous"><input type="submit" value="New reply"><br />
    Roll a six-sided die? <input type="checkbox" name="rolldie" value="true">
    <br />
    <textarea name="body" placeholder="Message"></textarea>
</form>
