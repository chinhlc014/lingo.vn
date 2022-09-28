@if ($paginator->hasPages())
    <div class="text-center mt-5">
        <ul class="nav nav-segment">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="nav-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="nav-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="nav-item disabled" aria-disabled="true"><span class="nav-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="nav-item active" aria-current="page"><span class="nav-link">{{ $page }}</span></li>
                        @elseif($page <= ($paginator->currentPage() + 3))
                            <li class="nav-item"><a class="nav-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="nav-item">
                    <a class="nav-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="nav-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="nav-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </div>
@endif
