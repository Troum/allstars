@if ($paginator->hasPages())
    <div class="pagination">
        @if ($paginator->onFirstPage())
            <a class="page-item disabled"><span>&laquo;</span></a>
        @else
            <a class="page-item" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <a class="page-item disabled"><span>{{ $element }}</span></a>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="page-item active"><span>{{ $page }}</span></a>
                    @else
                        <a class="page-item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <a class="page-item" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a>
        @else
            <a class="page-item disabled"><span>&raquo;</span></a>
        @endif
    </div>
@endif
