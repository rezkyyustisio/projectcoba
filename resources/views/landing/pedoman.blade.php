<x-app-landing-layout>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumbs bg-light mb-4">
                        <li class="breadcrumbs__item">
                            <a href="{{ route('beranda') }}" class="breadcrumbs__url"> <i class="fa fa-home"></i> Beranda</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a href="{{ route('pedoman-media-siber') }}" class="breadcrumbs__url">Pedoman Media Siber</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <aside class="wrapper__list__article ">
                        <h4 class="border_section">Pedoman Media Siber</h4>
                        {!! $settings['pedoman_media_siber'] ?? null !!}
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
