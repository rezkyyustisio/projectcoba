<x-app-landing-layout>
<section class="bg-light">
        <div class="container">
            <div class="row justify-content-center">
            <figure class="text-center">
                {{-- <img src="{{asset('storage/'.($settings['home_image'] ?? null))}}" alt="Home Image" class="img-fluid" width="100%"> --}}
                <img src="{{asset('storage/'.('home_image.png' ?? null))}}" alt="Home Image" class="img-fluid" width="100%">
            </figure>
            </div>
            <div class="row">
                {{-- BERITA PERTAMA DENGAN MENGIKUTI SLIDESHOW DI BAWAH, UKURAN BESAR DAN HANYA 1 JADI TOTALNYA ADA 4 SLIDESHOW --}}
                <div class="col-md-12 mb-4">
                    <div id="slideshowBeritaPertama" class="carousel slide" data-ride="carousel">
                        <!-- Slides -->
                        <div class="carousel-inner">
                            @php
                                $slideshowBeritas = $beritas->take(4); // Ambil 4 berita pertama untuk slideshow
                            @endphp
                            
                            @foreach($slideshowBeritas as $key => $berita)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <a href="{{ route('detail', $berita->slug) }}">
                                        <img src="{{ asset('storage/'.$berita->image) }}" 
                                             class="d-block w-100" 
                                             alt="{{ $berita->name }}"
                                             style="height: 500px; object-fit: cover;">
                                    </a>
                                    {{-- Caption dengan background gradasi hitam yang lebih tinggi --}}
                                    <div class="carousel-caption d-block p-4" style="background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.5) 30%, rgba(0,0,0,0.2) 70%, transparent 100%); bottom: 0; left: 0; right: 0; width: 100%; text-align: left; border: none; padding-top: 60px !important;">
                                        <h5 class="text-white" style="text-shadow: 1px 1px 3px rgba(0,0,0,0.9); font-weight: bold; font-size: 1.8rem; margin-bottom: 10px;">{{ $berita->name }}</h5>
                                        <p class="text-white mb-0" style="text-shadow: 1px 1px 2px rgba(0,0,0,0.9); font-size: 1.1rem;">
                                            <i class="fas fa-calendar-alt"></i> 
                                            {{ Carbon\Carbon::parse($berita->created_at)->locale('id')->isoFormat('D MMM YYYY') }}
                                            <span class="mx-2">•</span>
                                            <i class="fas fa-user"></i> {{ $berita->createdBy->name }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        
                        <!-- Indicators -->
                        {{-- <ol class="carousel-indicators">
                            @foreach($slideshowBeritas as $key => $berita)
                                <li data-target="#slideshowBeritaPertama" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ol> --}}
                        
                        <!-- Controls -->
                        <a class="carousel-control-prev" href="#slideshowBeritaPertama" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#slideshowBeritaPertama" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <div class="wrapp__list__article-responsive wrapp__list__article-responsive-carousel">
                        @foreach ($beritas as $berita)
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
        <div style="margin-top: -50px !important;">
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
                    
                    {{-- Tombol Previous --}}
                    @if ($bertasPaginates->onFirstPage())
                        <a href="#" class="disabled">«</a>
                    @else
                        <a href="{{ $bertasPaginates->previousPageUrl() }}">«</a>
                    @endif

                    {{-- Halaman Pertama --}}
                    @if($bertasPaginates->currentPage() > 2)
                        <a href="{{ $bertasPaginates->url(1) }}">1</a>
                        @if($bertasPaginates->currentPage() > 3)
                            <span class="pagination-dots"></span>
                        @endif
                    @endif

                    {{-- Halaman Sebelumnya (jika ada) --}}
                    @if($bertasPaginates->currentPage() > 1)
                        <a href="{{ $bertasPaginates->url($bertasPaginates->currentPage() - 1) }}">
                            {{ $bertasPaginates->currentPage() - 1 }}
                        </a>
                    @endif

                    {{-- Halaman Aktif --}}
                    <a class="active" href="#">{{ $bertasPaginates->currentPage() }}</a>

                    {{-- Halaman Berikutnya (jika ada) --}}
                    @if($bertasPaginates->currentPage() < $bertasPaginates->lastPage())
                        <a href="{{ $bertasPaginates->url($bertasPaginates->currentPage() + 1) }}">
                            {{ $bertasPaginates->currentPage() + 1 }}
                        </a>
                    @endif

                    {{-- Halaman Terakhir --}}
                    @if($bertasPaginates->currentPage() < $bertasPaginates->lastPage() - 1)
                        @if($bertasPaginates->currentPage() < $bertasPaginates->lastPage() - 2)
                            <span class="pagination-dots"></span>
                        @endif
                        <a href="{{ $bertasPaginates->url($bertasPaginates->lastPage()) }}">
                            {{ $bertasPaginates->lastPage() }}
                        </a>
                    @endif

                    {{-- Tombol Next --}}
                    @if ($bertasPaginates->hasMorePages())
                        <a href="{{ $bertasPaginates->nextPageUrl() }}">»</a>
                    @else
                        <a href="#" class="disabled">»</a>
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
                
                // Auto play slideshow
                $('#slideshowBeritaPertama').carousel({
                    interval: 5000,
                    pause: 'hover'
                });
            });
        </script>
        
        <style>
            /* Style untuk caption dengan background gradasi yang lebih tinggi */
            /* SUPER GELAP - Hitam pekat dengan gradasi halus */
            .carousel-caption {
                background: linear-gradient(to top, 
                    rgba(0,0,0,0.9) 0%,     /* bawah lebih gelap */
                    rgba(0,0,0,0.7) 40%,    /* tengah gelap */
                    rgba(0,0,0,0.4) 80%,    /* atas mulai transparan */
                    transparent 100%
                ) !important;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
                padding: 40px 30px 25px 30px !important;
                text-align: left;
                border: none;
            }

            /* Text shadow minimalis */
            .carousel-caption h5 {
                text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
                font-weight: bold;
                margin-bottom: 5px;
            }

            .carousel-caption p {
                text-shadow: 1px 1px 2px rgba(0,0,0,0.7);
                font-size: 0.95rem;
            }
            
            /* Indicators styling */
            .carousel-indicators {
                bottom: 15px;
                z-index: 15;
            }
            
            .carousel-indicators li {
                width: 12px;
                height: 12px;
                border-radius: 50%;
                margin: 0 6px;
                background-color: rgba(255,255,255,0.7);
                border: 1px solid rgba(0,0,0,0.2);
            }
            
            .carousel-indicators .active {
                background-color: #fff;
                transform: scale(1.2);
            }
            
            /* Mobile styles - area gelap lebih tinggi di mobile juga */
            @media (max-width: 767px) {
                .carousel-item {
                    height: 300px;
                }
                
                .carousel-item img {
                    height: 300px !important;
                }
                
                .carousel-caption {
                    padding: 50px 15px 15px 15px !important;
                    background: linear-gradient(to top, 
                        rgba(0,0,0,0.8) 0%, 
                        rgba(0,0,0,0.7) 30%, 
                        rgba(0,0,0,0.4) 60%, 
                        rgba(0,0,0,0.2) 80%, 
                        transparent 100%);
                }
                
                .carousel-caption h5 {
                    font-size: 1.1rem !important;
                    text-shadow: 1px 1px 3px rgba(0,0,0,0.9);
                }
                
                .carousel-caption p {
                    font-size: 0.8rem !important;
                    text-shadow: 1px 1px 2px rgba(0,0,0,0.9);
                }
                
                .carousel-caption p .mx-2 {
                    margin: 0 3px;
                }
                
                .carousel-indicators li {
                    width: 8px;
                    height: 8px;
                    margin: 0 4px;
                }
            }
            
            /* Tablet styles */
            @media (min-width: 768px) and (max-width: 991px) {
                .carousel-item {
                    height: 400px;
                }
                
                .carousel-item img {
                    height: 400px !important;
                }
                
                .carousel-caption {
                    padding: 60px 20px 20px 20px !important;
                }
                
                .carousel-caption h5 {
                    font-size: 1.4rem;
                }
                
                .carousel-caption p {
                    font-size: 0.95rem;
                }
            }
            
            /* Desktop besar */
            @media (min-width: 1200px) {
                .carousel-caption {
                    padding: 100px 40px 40px 40px !important;
                }
                
                .carousel-caption h5 {
                    font-size: 2rem;
                }
            }
        </style>
    @endpush
</x-app-landing-layout>