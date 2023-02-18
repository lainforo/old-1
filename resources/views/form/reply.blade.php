<form method="post" action="{{ route('newreply') }}">
    @csrf

    <input type="hidden" name="replyto" value="{{ $thread->id }}">
    <input type="text" name="author" value="Anonymous"><input type="submit" value="New thread">
    <br />
    <textarea name="body" placeholder="Message"></textarea>
</form>
