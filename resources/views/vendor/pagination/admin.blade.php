@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex items-center justify-between gap-3 flex-wrap">
        <p class="text-xs text-slate-400">
            Showing
            <span class="font-semibold text-slate-200">{{ $paginator->firstItem() }}</span>
            to
            <span class="font-semibold text-slate-200">{{ $paginator->lastItem() }}</span>
            of
            <span class="font-semibold text-slate-200">{{ $paginator->total() }}</span>
        </p>
        <div class="flex items-center gap-1">
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1.5 rounded-lg text-xs text-slate-600 border border-slate-800 cursor-not-allowed">Prev</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-300 border border-slate-700 hover:bg-slate-800 hover:text-white transition-colors">Prev</a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-2 text-slate-600">{{ $element }}</span>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-1.5 rounded-lg text-xs font-semibold bg-emerald-600 text-white">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-300 border border-slate-700 hover:bg-slate-800 hover:text-white transition-colors">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1.5 rounded-lg text-xs font-medium text-slate-300 border border-slate-700 hover:bg-slate-800 hover:text-white transition-colors">Next</a>
            @else
                <span class="px-3 py-1.5 rounded-lg text-xs text-slate-600 border border-slate-800 cursor-not-allowed">Next</span>
            @endif
        </div>
    </nav>
@endif
