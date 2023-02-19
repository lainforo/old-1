<div class="boardlist">
        @if ($isadmin ?? '')
            
        @else
        <a href="{{ route('index') }}">[home]</a> - <a href="{{ route('about') }}">[about]</a>
            - <a href="{{ route('overboard') }}">[overboard]</a> - <a href="{{ route('adminlogin') }}">[admin]</a> -
        @endif
            @foreach ($boards as $board)
                <a href="/{{ $board->uri }}/" title="{{ $board->title }}">/{{ $board->uri }}/</a>
            @endforeach
</div>