<div class="boardlist">
            <a href="{{ route('index') }}">[home]</a> - <a href="{{ route('about') }}">[about]</a>
            @foreach ($boards as $board)
                - <a href="/{{ $board->uri }}/" title="{{ $board->title }}">/{{ $board->uri }}/</a>
            @endforeach
</div>