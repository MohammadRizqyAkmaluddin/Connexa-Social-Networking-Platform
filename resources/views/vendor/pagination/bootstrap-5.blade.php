@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.previous')</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link rounded-circle" href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a>
                    </li>
                @endif

                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">@lang('pagination.next')</span>
                    </li>
                @endif
            </ul>
        </div>

        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center w-100 justify-content-sm-between">

            <div class="gap-3 w-100">
                <ul class="pagination d-flex mx-auto w-100 justify-content-between ">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true"  aria-label="@lang('pagination.previous')">
                            <span class="page-link border-0 rounded-circle text-white bg-transparent" aria-hidden="true"><i class="bi bi-chevron-left"></i> Previous</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link border-0 text-mutedbold rounded-circle text-center p-1 bg-transparent fs-7 fw-semibold" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="bi bi-chevron-left"></i> Previous</a>
                        </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- Pagination Elements --}}
@php
    $current = $paginator->currentPage();
    $last = $paginator->lastPage();
    $start = max(1, $current - 2);
    $end = min($last, $current + 2);
@endphp

<div class="d-flex gap-1 align-items-center">

    {{-- Always show page 1 --}}
    @if ($start > 1)
        <li class="page-item">
            <a class="page-link rounded-circle border-0 text-mutedbold fw-semibold fs-7 text-center" href="{{ $paginator->url(1) }}">1</a>
        </li>

        @if ($start > 2)
            <li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>
        @endif
    @endif

    {{-- Pages around current --}}
    @for ($i = $start; $i <= $end; $i++)
        @if ($i == $current)
            <li class="page-item active" aria-current="page">
                <span class="page-link bg-dark border-0 rounded-circle fs-7 fw-semibold text-center p-1" style="width: 30px;">{{ $i }}</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link rounded-circle border-0 text-mutedbold fw-semibold fs-7 text-center" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endif
    @endfor

    {{-- Always show last page --}}
    @if ($end < $last)
        @if ($end < $last - 1)
            <li class="page-item disabled"><span class="page-link border-0 bg-transparent">...</span></li>
        @endif

        <li class="page-item">
            <a class="page-link rounded-circle border-0 text-mutedbold fw-semibold fs-7 text-center" href="{{ $paginator->url($last) }}">{{ $last }}</a>
        </li>
    @endif
</div>

                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link border-0 text-mutedbold rounded-circle m-0 p-1 text-center bg-transparent fs-7 fw-semibold"  href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next <i class="bi bi-chevron-right"></i></a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                            <span class="page-link border-0 text-white bg-transparent" aria-hidden="true">Next <i class="bi bi-chevron-right"></i></span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif
