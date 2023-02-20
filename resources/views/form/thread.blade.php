@php
if (Cookie::get('user_login') ?? '') {
    $authorname = Cookie::get('user_login');
} else {
    $authorname = "Anonymous";
}
@endphp

<form method="post" action="{{ route('newthread') }}">
    @csrf

    <input type="hidden" name="indexed" value="{{ $board->indexed }}">
    <input type="hidden" name="board" value="{{ $board->uri }}">
    <input type="text" name="author" value="{{ $authorname }}"><br />
    <input type="text" name="subject" placeholder="Subject"><input type="submit" value="New thread">
    <br />
    <textarea name="body" placeholder="Message"></textarea>
    <label for="show-text-checkbox" class="show-text-button">[Extra options]</label>
    <input type="checkbox" id="show-text-checkbox" class="hidden-checkbox">
    <div class="hidden-text">
        <input type="password" name="tripcode" value="" placeholder="Tripcode"><br />
    </div>
</form>
