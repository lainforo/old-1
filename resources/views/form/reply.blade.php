<form method="post" action="{{ route('newreply') }}">
    @csrf

    <input type="hidden" name="indexed" value="{{ $board->indexed }}">
    <input type="hidden" name="replyto" value="{{ $thread->id }}">
    <input type="text" name="author" value="Anonymous"><input type="submit" value="New reply"><br />
    <textarea name="body" placeholder="Message"></textarea><br />
    <label for="show-text-checkbox" class="show-text-button">[Extra options]</label>
    <input type="checkbox" id="show-text-checkbox" class="hidden-checkbox">
    <div class="hidden-text">
        Roll a six-sided die? <input type="checkbox" name="rolldie" value="true"><br />
        Random XKCD comic? <input type="checkbox" name="xkcd" value="true">
    </div>

</form>
