<ul class="pagination">
    @if ($paginator->hasPages())
        <li class="page-item {{$paginator->currentPage() == 1 ? 'disabled' : ''}}">
            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                <span>&lt;</span>
            </a>
        </li>

        @for ($i = max(1, $paginator->currentPage() - 2); $i <= min($paginator->lastPage(), $paginator->currentPage() + 2); $i++)
            <li class="page-item {{ $i == $paginator->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
            </li>
        @endfor

        <li class="page-item {{$paginator->currentPage() == $paginator->lastPage() ? 'disabled' : ''}}">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                <span>&gt;</span>
            </a>
        </li>
    @endif
</ul>