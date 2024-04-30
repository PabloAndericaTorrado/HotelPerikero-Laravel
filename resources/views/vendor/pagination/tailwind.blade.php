@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-center items-center mt-8">
        {{-- Previous Page Link --}}
        <div class="mr-4">
            @if ($paginator->onFirstPage())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-200 border border-gray-200 rounded-md cursor-default">
                    {!! __('pagination.previous') !!}
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-blue-600 border border-blue-600 rounded-l-md hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 transition-all duration-300 ease-in-out">
                    {!! __('pagination.previous') !!}
                </a>
            @endif
        </div>

        {{-- Pagination Elements --}}
        <div class="flex">
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-200 border border-gray-200 cursor-default">{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span aria-current="page" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-blue-600 border border-blue-600 hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 transition-all duration-300 ease-in-out">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 bg-gray-200 border border-gray-200 hover:bg-gray-300 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 transition-all duration-300 ease-in-out">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </div>

        {{-- Next Page Link --}}
        <div class="ml-4">
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-white bg-blue-600 border border-blue-600 rounded-r-md hover:bg-blue-700 focus:outline-none focus:border-blue-700 focus:ring ring-blue-300 transition-all duration-300 ease-in-out">
                    {!! __('pagination.next') !!}
                </a>
            @else
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-200 border border-gray-200 rounded-md cursor-default">
                    {!! __('pagination.next') !!}
                </span>
            @endif
        </div>
    </nav>
@endif
