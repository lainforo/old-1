@php
if ($postType == 'reply') {
    $action = route('delReply');
    $idvalue = $reply->id;
    $idname = "replyid";
} else if ($postType == 'thread') {
    $action = route('delThread');
    $idvalue = $thread->id;
    $idname = "threadid";
}
@endphp

<form method="post" action="{{ $action }}" style="display: inline;">
    @csrf

    <input type="hidden" name="{{ $idname }}" value="{{ $idvalue }}">
    <input type="submit" value="[delete]">
</form>
