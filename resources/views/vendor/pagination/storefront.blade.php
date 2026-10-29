@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination" class="flex flex-col sm:flex-row items-center justify-between gap-4">
        <p class="text-xs text-slate-500 dark:text-slate-400">
            Showing
            <span class="font-semibold text-slate-800 dark:text-slate-200">{{ $paginator->firstItem() }}</span>
            –
            <span class="font-semibold text-slate-800 dark:text-slate-200">{{ $paginator->lastItem() }}</span>
            of
            <span class="font-semibold text-slate-800 dark:text-slate-200">{{ $paginator->total() }}</span>
            products
        </p>
        <div class="flex items-center gap-1.5 flex-wrap justify-center">
            @if ($paginator->onFirstPage())
                <span class="px-3 py-1.5 rounded-lg text-xs text-slate-400 border border-gray-200 dark:border-slate-800 cursor-not-allowed">Prev</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-700 dark:text-slate-300 border border-gray-200 dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors">Prev</a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="px-2 text-slate-400">{{ $element }}</span>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="px-3 py-1.5 rounded-lg text-xs font-bold bg-indigo-600 text-white">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-700 dark:text-slate-300 border border-gray-200 dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="px-3 py-1.5 rounded-lg text-xs font-semibold text-slate-700 dark:text-slate-300 border border-gray-200 dark:border-slate-700 hover:bg-gray-100 dark:hover:bg-slate-800 transition-colors">Next</a>
            @else
                <span class="px-3 py-1.5 rounded-lg text-xs text-slate-400 border border-gray-200 dark:border-slate-800 cursor-not-allowed">Next</span>
            @endif
        </div>
    </nav>
@endif
