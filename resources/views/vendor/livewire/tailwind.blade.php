@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div>
                {{-- Desktop (pagination count) --}}
                <p
                    class="hidden w-full pb-5 text-xl font-normal uppercase border-b md:absolute md:block md:top-0 -top-12 text-primary-950 border-primary-400">
                    <span>{!! __('Showing') !!}</span>
                    <span class="font-medium">{{ $paginator->firstItem() ?? 0 }}</span>
                    <span>{!! __('-') !!}</span>
                    <span class="font-medium">{{ $paginator->lastItem() ?? 0 }}</span>
                    <span>{!! __('of') !!}</span>
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    <span>{!! __('results') !!}</span>
                </p>
            </div>

            <div class="flex-1 flex items-center justify-center">
                <div>
                    <span class="inline-flex items-center space-x-4">
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">

                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.4158 20.2458L22.9558 16.7058C23.142 16.5184 23.2466 16.265 23.2466 16.0008C23.2466 15.7366 23.142 15.4832 22.9558 15.2958C22.8628 15.2021 22.7522 15.1277 22.6304 15.0769C22.5085 15.0261 22.3778 15 22.2458 15C22.1138 15 21.9831 15.0261 21.8612 15.0769C21.7394 15.1277 21.6288 15.2021 21.5358 15.2958L17.2958 19.5358C17.2021 19.6288 17.1277 19.7394 17.0769 19.8612C17.0261 19.9831 17 20.1138 17 20.2458C17 20.3778 17.0261 20.5085 17.0769 20.6304C17.1277 20.7522 17.2021 20.8628 17.2958 20.9558L21.5358 25.2458C21.6292 25.3385 21.7401 25.4118 21.8619 25.4616C21.9837 25.5113 22.1142 25.5366 22.2458 25.5358C22.3774 25.5366 22.5079 25.5113 22.6297 25.4616C22.7515 25.4118 22.8624 25.3385 22.9558 25.2458C23.142 25.0584 23.2466 24.805 23.2466 24.5408C23.2466 24.2766 23.142 24.0232 22.9558 23.8358L19.4158 20.2458Z"
                                        fill="#010817" />
                                </svg>

                            </span>
                        @else
                            <button wire:click="previousPage('{{ $paginator->getPageName() }}')"
                                dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                                rel="prev" aria-label="{{ __('pagination.previous') }}"
                                wire:loading.attr="disabled">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.4158 20.2458L22.9558 16.7058C23.142 16.5184 23.2466 16.265 23.2466 16.0008C23.2466 15.7366 23.142 15.4832 22.9558 15.2958C22.8628 15.2021 22.7522 15.1277 22.6304 15.0769C22.5085 15.0261 22.3778 15 22.2458 15C22.1138 15 21.9831 15.0261 21.8612 15.0769C21.7394 15.1277 21.6288 15.2021 21.5358 15.2958L17.2958 19.5358C17.2021 19.6288 17.1277 19.7394 17.0769 19.8612C17.0261 19.9831 17 20.1138 17 20.2458C17 20.3778 17.0261 20.5085 17.0769 20.6304C17.1277 20.7522 17.2021 20.8628 17.2958 20.9558L21.5358 25.2458C21.6292 25.3385 21.7401 25.4118 21.8619 25.4616C21.9837 25.5113 22.1142 25.5366 22.2458 25.5358C22.3774 25.5366 22.5079 25.5113 22.6297 25.4616C22.7515 25.4118 22.8624 25.3385 22.9558 25.2458C23.142 25.0584 23.2466 24.805 23.2466 24.5408C23.2466 24.2766 23.142 24.0232 22.9558 23.8358L19.4158 20.2458Z"
                                        fill="#010817" />
                                </svg>
                            </button>
                        @endif


                        <!-- Pagination Elements -->
                        @foreach ($elements as $element)
                            <!-- Array Of Links -->
                            @if (is_array($element))
                                @foreach ($element as $page => $url)
                                    <!--  Use three dots when current page is greater than 3.  -->
                                    @if ($paginator->currentPage() > 2 && $page === 1)
                                        <div class="text-primary-800 mx-1 flex">
                                            <span class="font-bold">.</span>
                                            <span class="font-bold">.</span>
                                            <span class="font-bold">.</span>
                                        </div>
                                    @endif

                                    <!--  Show active page two pages before and after it.  -->
                                    @if ($page == $paginator->currentPage())
                                        <span
                                            class="mx-1 px-4 py-2 bg-primary-950 text-white text-center cursor-pointer">{{ $page }}</span>
                                    @elseif (
                                        $page === $paginator->currentPage() + 1 ||
                                            $page === $paginator->currentPage() + 1 ||
                                            $page === $paginator->currentPage() - 1 ||
                                            $page === $paginator->currentPage() - 1)
                                        <a class="mx-1 px-4 py-2 text-primary-950 text-center cursor-pointer"
                                            wire:click="gotoPage({{ $page }})">{{ $page }}</a>
                                    @endif

                                    <!--  Use three dots when current page is away from end.  -->
                                    @if ($paginator->currentPage() < $paginator->lastPage() - 2 && $page === $paginator->lastPage() - 1)
                                        <div class="text-primary-800 mx-1 flex">
                                            <span class="font-bold">.</span>
                                            <span class="font-bold">.</span>
                                            <span class="font-bold">.</span>
                                        </div>
                                    @endif
                                @endforeach
                            @endif
                        @endforeach


                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <button wire:click="nextPage('{{ $paginator->getPageName() }}')"
                                dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                                rel="next" aria-label="{{ __('pagination.next') }}">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22.9508 19.5358L18.7108 15.2958C18.6178 15.2021 18.5072 15.1277 18.3854 15.0769C18.2635 15.0261 18.1328 15 18.0008 15C17.8688 15 17.7381 15.0261 17.6162 15.0769C17.4944 15.1277 17.3838 15.2021 17.2908 15.2958C17.1045 15.4832 17 15.7366 17 16.0008C17 16.265 17.1045 16.5184 17.2908 16.7058L20.8308 20.2458L17.2908 23.7858C17.1045 23.9732 17 24.2266 17 24.4908C17 24.755 17.1045 25.0084 17.2908 25.1958C17.3842 25.2885 17.495 25.3618 17.6169 25.4116C17.7387 25.4613 17.8692 25.4866 18.0008 25.4858C18.1324 25.4866 18.2629 25.4613 18.3847 25.4116C18.5065 25.3618 18.6174 25.2885 18.7108 25.1958L22.9508 20.9558C23.0445 20.8628 23.1189 20.7522 23.1697 20.6304C23.2205 20.5085 23.2466 20.3778 23.2466 20.2458C23.2466 20.1138 23.2205 19.9831 23.1697 19.8612C23.1189 19.7394 23.0445 19.6288 22.9508 19.5358Z"
                                        fill="#010817" />
                                </svg>
                            </button>
                        @else
                            <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                <svg width="40" height="40" viewBox="0 0 40 40" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M22.9508 19.5358L18.7108 15.2958C18.6178 15.2021 18.5072 15.1277 18.3854 15.0769C18.2635 15.0261 18.1328 15 18.0008 15C17.8688 15 17.7381 15.0261 17.6162 15.0769C17.4944 15.1277 17.3838 15.2021 17.2908 15.2958C17.1045 15.4832 17 15.7366 17 16.0008C17 16.265 17.1045 16.5184 17.2908 16.7058L20.8308 20.2458L17.2908 23.7858C17.1045 23.9732 17 24.2266 17 24.4908C17 24.755 17.1045 25.0084 17.2908 25.1958C17.3842 25.2885 17.495 25.3618 17.6169 25.4116C17.7387 25.4613 17.8692 25.4866 18.0008 25.4858C18.1324 25.4866 18.2629 25.4613 18.3847 25.4116C18.5065 25.3618 18.6174 25.2885 18.7108 25.1958L22.9508 20.9558C23.0445 20.8628 23.1189 20.7522 23.1697 20.6304C23.2205 20.5085 23.2466 20.3778 23.2466 20.2458C23.2466 20.1138 23.2205 19.9831 23.1697 19.8612C23.1189 19.7394 23.0445 19.6288 22.9508 19.5358Z"
                                        fill="#010817" />
                                </svg>
                            </span>
                        @endif
                    </span>
                </div>
            </div>
        </nav>

        {{-- Mobile (pagination count) --}}
        <div class="md:hidden">
            <p
                class="absolute w-full pb-5 text-xl font-normal uppercase border-b -top-12 text-primary-950 border-primary-400">
                <span>{!! __('Showing') !!}</span>
                <span class="font-medium">{{ $paginator->firstItem() ?? 0 }}</span>
                <span>{!! __('-') !!}</span>
                <span class="font-medium">{{ $paginator->lastItem() ?? 0 }}</span>
                <span>{!! __('of') !!}</span>
                <span class="font-medium">{{ $paginator->total() }}</span>
                <span>{!! __('results') !!}</span>
            </p>
        </div>
    @else
        {{-- DESKTOP (pagination count) --}}
        <div class="md:items-center md:justify-between md:flex-1 md:flex">
            <div>
                <p
                    class="absolute w-full pb-5 text-xl font-normal uppercase border-b md:top-0 -top-12 text-primary-950 border-primary-400">
                    <span>{!! __('Showing') !!}</span>
                    <span class="font-medium">{{ $paginator->firstItem() ?? 0 }}</span>
                    <span>{!! __('-') !!}</span>
                    <span class="font-medium">{{ $paginator->lastItem() ?? 0 }}</span>
                    <span>{!! __('of') !!}</span>
                    <span class="font-medium">{{ $paginator->total() }}</span>
                    <span>{!! __('results') !!}</span>
                </p>
            </div>
        </div>
    @endif
</div>
