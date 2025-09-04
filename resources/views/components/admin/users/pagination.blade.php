<nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
    <span class="text-sm font-normal text-gray-800 dark:text-gray-700">
        Mostrando
        <span class="font-semibold text-gray-900 dark:text-pink-900">{{ $paginator->firstItem() }}-{{ $paginator->lastItem() }}</span>
        de
        <span class="font-semibold text-gray-900 dark:text-pink-900">{{ $paginator->total() }}</span>
    </span>

    <ul class="inline-flex items-stretch -space-x-px">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li>
                <span class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-400 bg-white rounded-l-lg border border-pink-300 cursor-not-allowed">
                    <span class="sr-only">Previous</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </span>
            </li>
        @else
            <li>
                <button wire:click="previousPage" class="flex items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-pink-300 hover:bg-gray-100 hover:text-gray-700">
                    <span class="sr-only">Previous</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                </button>
            </li>
        @endif

        {{-- Página numeradas --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <li><span class="px-3 py-2 bg-white border border-pink-300 text-gray-500 cursor-not-allowed">{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li><span class="flex items-center justify-center text-sm z-10 py-2 px-3 leading-tight text-primary-600 bg-primary-50 border border-primary-300 dark:border-pink-700 dark:bg-pink-700 dark:text-white">{{ $page }}</span></li>
                    @else
                        <li>
                            <button wire:click="gotoPage({{ $page }})" class="flex items-center justify-center text-sm py-2 px-3 leading-tight text-gray-500 bg-white border border-pink-300 hover:bg-pink-100 hover:text-pink-700 dark:bg-pink-800 dark:border-pink-700 dark:text-pink-400 dark:hover:bg-pink-700 dark:hover:text-white">{{ $page }}</button>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <button wire:click="nextPage" class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-pink-300 hover:bg-pink-100 hover:text-pink-700 dark:bg-pink-800 dark:border-pink-700 dark:text-pink-400 dark:hover:bg-pink-700 dark:hover:text-white">
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                </button>
            </li>
        @else
            <li>
                <span class="flex items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-400 bg-white rounded-r-lg border border-pink-300 cursor-not-allowed">
                    <span class="sr-only">Next</span>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                </span>
            </li>
        @endif
    </ul>
</nav>
