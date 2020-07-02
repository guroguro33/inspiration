@if ($paginator->hasPages())
    <ul class="c-pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled c-pagination__prev" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">＜</span>
            </li>
        @else
            <li class="c-pagination__prev">
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">＜</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active c-pagination__page-item" aria-current="page"><a>{{ $page }}</a></li>
                    @else
                        <li class="c-pagination__page-item"><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="c-pagination__next">
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">＞</a>
            </li>
        @else
            <li class="disabled c-pagination__next" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">＞</span>
            </li>
        @endif
    </ul>
@endif
