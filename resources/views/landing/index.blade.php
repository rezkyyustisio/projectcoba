<x-app-landing-layout>
<section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <figure class="text-center">
                        {{-- <img src="{{asset('storage/'.($settings['home_image'] ?? null))}}" alt="Home Image" class="img-fluid" width="100%"> --}}
                        <img src="{{asset('storage/'.('home_image.png' ?? null))}}" alt="Home Image" class="img-fluid" width="100%">
                    </figure>
                    <hr>
                    <div class="wrapp__list__article-responsive wrapp__list__article-responsive-carousel">
                        @foreach ($beritas->where('top',1) as $berita)
                            <div class="item">
                                <div class="card__post card__post-list">
                                    <div class="image-sm">
                                        <a href="{{ route('detail',$berita->slug) }}">
                                            <img src="{{asset('storage/'.$berita->image)}}" class="img-fluid" alt="{{ $berita->name }}">
                                        </a>
                                    </div>
                                    <div class="card__post__body ">
                                        <div class="card__post__content">
                                            <div class="card__post__author-info mb-2">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <span class="text-primary">
                                                            by {{ $berita->createdBy->name }}
                                                        </span>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <span class="text-dark text-capitalize">
                                                            {{ Carbon\Carbon::parse($berita->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                                        </span>
                                                    </li>

                                                </ul>
                                            </div>
                                            <div class="card__post__title">
                                                <h6>
                                                    <a href="{{ route('detail',$berita->slug) }}">
                                                        {{ $berita->name }}
                                                    </a>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <aside class="wrapper__list__article">
                            <h4 class="border_section">All</h4>
                            <div class="wrapp__list__article-responsive">
                                @foreach ($bertasPaginates as $berita)
                                    <div class="card__post card__post-list card__post__transition mt-30">
                                        <div class="row ">
                                            <div class="col-md-5">
                                                <div class="card__post__transition">
                                                    <a href="{{ route('detail',$berita->slug) }}">
                                                        <img src="{{ asset('storage/'.$berita->image) }}" class="img-fluid w-100" alt="{{ $berita->name }}">
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-7 my-auto pl-0">
                                                <div class="card__post__body ">
                                                    <div class="card__post__content  ">
                                                        <div class="card__post__category ">
                                                            {{ $berita->category->name }}
                                                        </div>
                                                        <div class="card__post__author-info mb-2">
                                                            <ul class="list-inline">
                                                                <li class="list-inline-item">
                                                                    <span class="text-primary">
                                                                        by {{ $berita->createdBy->name }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span class="text-dark text-capitalize">
                                                                        {{ Carbon\Carbon::parse($berita->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                                                    </span>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                        <div class="card__post__title">
                                                            <h5>
                                                                <a href="{{ route('detail',$berita->slug) }}">
                                                                    {{ $berita->name }}
                                                                </a>
                                                            </h5>
                                                            <p class="d-none d-lg-block d-xl-block mb-0">
                                                                {{ Str::limit(strip_tags($berita->description), 100) }}
                                                            </p>

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </aside>
                    </div>
                    <div class="col-md-4">
                        <div class="sidebar-sticky">
                            @foreach ($providerCategories as $category)
                                <aside class="wrapper__list__article ">
                                    <h4 class="border_section">{{ $category->name }}</h4>
                                    <div class="wrapper__list__article-small">
                                        @foreach ($category->beritas->take(5) as $berita)
                                            <div class="mb-3">
                                                <div class="card__post card__post-list">
                                                    <div class="image-sm">
                                                        <a href="{{ route('detail',$berita->slug) }}">
                                                            <img src="{{ asset('storage/'.$berita->image) }}" class="img-fluid" alt="{{ $berita->name }}">
                                                        </a>
                                                    </div>

                                                    <div class="card__post__body ">
                                                        <div class="card__post__content">
                                                            <div class="card__post__author-info mb-2">
                                                                <ul class="list-inline">
                                                                    <li class="list-inline-item">
                                                                        <span class="text-primary">
                                                                            by {{ $berita->createdBy->name }}
                                                                        </span>
                                                                    </li>
                                                                    <li class="list-inline-item">
                                                                        <span class="text-dark text-capitalize">
                                                                        {{ Carbon\Carbon::parse($berita->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                                                        </span>
                                                                    </li>

                                                                </ul>
                                                            </div>
                                                            <div class="card__post__title">
                                                                <h6>
                                                                    <a href="{{ route('detail',$berita->slug) }}">
                                                                        {{ $berita->name }}
                                                                    </a>
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </aside>
                            @endforeach

                            {{-- <aside class="wrapper__list__article">
                                <h4 class="border_section">tags</h4>
                                <div class="blog-tags p-0">
                                    <ul class="list-inline">
                                        @foreach ($tags as $tag)
                                            <li class="list-inline-item"><a href="{{ route('tag',$tag->name) }}">{{ $tag->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside> --}}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="pagination-area">
                <div class="pagination wow fadeIn animated" data-wow-duration="2s" data-wow-delay="0.5s"
                    style="visibility: visible; animation-duration: 2s; animation-delay: 0.5s; animation-name: fadeIn;">
                    @if ($bertasPaginates->onFirstPage())
                        <a href="#">«</a>
                    @else
                        <a href="{{ $bertasPaginates->previousPageUrl() }}">«</a>
                    @endif
                    @for ($i = 1; $i <= $bertasPaginates->lastPage(); $i++)
                        @if ($bertasPaginates->currentPage() == $i)
                            <a class="active" href="#">{{ $i }}</a>
                        @else
                            <a href="{{ $bertasPaginates->url($i) }}">{{ $i }}</a>
                        @endif
                    @endfor

                    @if ($bertasPaginates->hasMorePages())
                        <a href="{{ $bertasPaginates->nextPageUrl() }}">»</a>
                    @else
                        <a href="#">»</a>
                    @endif
                </div>
            </div>
            </div>
        </div>
    </section>

     @push('js')
        <script>
            $(document).ready(function() {
                var col4Height = $('.col-md-4').outerHeight();
                $('.col-md-8').css('min-height', col4Height);
            });
        </script>
    @endpush
</x-app-landing-layout>
