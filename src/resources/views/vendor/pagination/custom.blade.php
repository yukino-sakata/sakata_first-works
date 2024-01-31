@if ($paginator->hasPages())
<div class="paginationWrap">
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if($paginator->onFirstPage())
            <li class="prev_link" aria-disabled="true" aria-label="@lang('pagination.previous')"><</li>
        @else
            <li>
                <a class="prev_link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><</a>
            </li>
        @endif

            {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li aria-disabled="true">{{ $element }}</li>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li aria-current="page"><a class="active" href="#">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="next_link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">></a>
            </li>
        @else
            <li class="next_link" aria-disabled="true" aria-label="@lang('pagination.next')">></li>
        @endif
    </ul>
</div>
@endif