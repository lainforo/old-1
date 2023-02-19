@php
if ($postType == 'reply') {
    $actiondel = route('delReply');
    $idvalue = $reply->id;
    $idname = "replyid";
} else if ($postType == 'thread') {
    $actiondel = route('delThread');
    $actionfeature = route('featureThread');
    $idvalue = $thread->id;
    $idname = "threadid";
}
@endphp

<form method="post" action="{{ $actiondel }}" style="display: inline;">
    @csrf

    <input type="hidden" name="{{ $idname }}" value="{{ $idvalue }}">
    <input type="submit" value="[delete]">
</form>

@if ($postType == 'thread')
<form method="post" action="{{ $actionfeature }}" style="display: inline;">
    @csrf

    <input type="hidden" name="{{ $idname }}" value="{{ $idvalue }}">
    <input type="submit" value="[feature thread]">
</form>
@endif