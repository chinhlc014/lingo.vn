{{--@if ($paginator->hasPages())--}}
    @php
        $currentPage = request('page', 1);
    @endphp
    <div class="text-center mt-5">
        <ul class="nav nav-segment">
            {{-- Previous Page Link --}}
            @if ($currentPage == 1)
                <li class="nav-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="nav-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home', ['page' => 1]) }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            @if($currentPage < 4)
                @foreach([1,2,3,4] as $page)
                    @if($currentPage == $page)
                        <li class="nav-item active" aria-current="page"><span class="nav-link">{{ $page }}</span></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('home', ['page' => $page]) }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @else
                @foreach([1,2,3,4] as $page)
                    @if($currentPage == $page)
                        <li class="nav-item active" aria-current="page"><span class="nav-link">{{ $page }}</span></li>
                    @else
                        <li class="nav-item"><a class="nav-link" href="{{ route('home', ['page' => $page]) }}">{{ $page }}</a></li>
                    @endif
                @endforeach
                <li class="nav-item disabled" aria-disabled="true"><span class="nav-link"> ... </span></li>
                @if($currentPage != 4)
                    <li class="nav-item active a" aria-current="page"><span class="nav-link">{{ $currentPage }}</span></li>
                @endif

                @foreach([1,2,3,4] as $page)
                        <li class="nav-item"><a class="nav-link" href="{{ route('home', ['page' => $page + $currentPage ]) }}">{{ $page + $currentPage }}</a></li>
                @endforeach
            @endif
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home', ['page' => $currentPage + 1]) }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        </ul>
    </div>
{{--@endif--}}
