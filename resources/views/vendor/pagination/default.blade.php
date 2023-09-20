@if ($paginator->hasPages())
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 px-0">
                    <div class="main-inner-pagenation">
                        @if ($paginator->onFirstPage())
                            <button class="active">prev</button>
                        @else
                            <a href="{{ $paginator->previousPageUrl() }}"><button class="active">prev</button></a>
                        @endif

                        <div class="inr-tabs">
                            @foreach ($elements as $element)
                                @if (is_string($element))
                                    <span>{{ $element }}</span>
                                @endif

                                @if (is_array($element))
                                    @foreach ($element as $page => $url)
                                        @if ($page == $paginator->currentPage())
                                            <span class="active">{{ $page }}</span>
                                        @else
                                            <a href="{{ $url }}">{{ $page }}</a>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </div>

                        @if ($paginator->hasMorePages())
                            <a href="{{ $paginator->nextPageUrl() }}"><button>Next</button></a>
                        @else
                            <button>Next</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endif
