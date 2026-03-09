<x-app-landing-layout>
    <section class="pb-80">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumbs bg-light mb-4">
                        <li class="breadcrumbs__item">
                            <a href="i{{ route('beranda') }}" class="breadcrumbs__url"><i class="fa fa-home"></i> Beranda</a>
                        </li>
                        <li class="breadcrumbs__item">
                            <a href="{{ route('category', $data->category->slug) }}" class="breadcrumbs__url">{{ $data->category->name }}</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-8">
                    <!-- Article Detail -->
                    <div class="wrap__article-detail">
                        <div class="wrap__article-detail-title">
                            <h1>
                                {{ $data->name }}
                            </h1>
                        </div>
                        <hr>
                        <div class="wrap__article-detail-info">
                            <ul class="list-inline">
                                {{-- <li class="list-inline-item">
                                    <figure class="image-profile">
                                        <img src="{{ asset('storage/'.$data->createdBy->image) }}" alt="{{ $data->createdBy->name }}">
                                    </figure>
                                </li> --}}
                                <li class="list-inline-item">
                                    <span>
                                        by
                                    </span>
                                    <a href="#" onclick="return false;" style="color: #000 !important; text-decoration: none; pointer-events: none;">
                                        {{ $data->createdBy->name }},
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize ml-1">
                                        {{ Carbon\Carbon::parse($data->created_at)->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span class="text-dark text-capitalize">
                                        -
                                    </span>
                                    <a href="{{ route('category',$data->category->slug) }}" class="no-hover-effect" id="category-link">
                                        {{ $data->category->name }}
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="wrap__article-detail-image mt-4">
                            <figure>
                                <img src="{{ asset('storage/'.$data->image) }}" alt="{{ $data->name }}" class="img-fluid">
                            </figure>
                        </div>
                        <div class="wrap__article-detail-content">
                            <div class="total-views">
                                {{-- <div class="total-views-read">
                                    15.k
                                    <span>
                                        views
                                    </span>
                                </div> --}}


                                {{-- <ul class="list-inline">
                                    <span class="share">Begikan ke :</span>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o facebook" href="#">
                                            <i class="fa fa-facebook-f"></i>
                                            <span>facebook</span>
                                        </a>

                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o twitter" href="#">
                                            <i class="fa fa-twitter"></i>
                                            <span>twitter</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o whatsapp" href="#">
                                            <i class="fa fa-whatsapp"></i>
                                            <span>whatsapp</span>
                                        </a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a class="btn btn-social-o telegram" href="#">
                                            <i class="fa fa-telegram"></i>
                                            <span>telegram</span>
                                        </a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a class="btn btn-linkedin-o linkedin" href="#">
                                            <i class="fa fa-linkedin"></i>
                                            <span>linkedin</span>
                                        </a>
                                    </li>

                                </ul> --}}
                            </div>
                            {!! $data->description !!}
                        </div>
                    </div>
                    <div class="blog-tags">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <i class="fa fa-tags" style="color: #000;"></i>
                            </li>
                            @foreach (explode(',', $data->tags) as $tag)
                                <li class="list-inline-item" id="list-inline-item-custom">
                                    <a href=" {{ route('tag', $tag) }} ">{{$tag}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="wrap__profile" style="border: 0 !important;">
                        <div class="wrap__profile-author"> 
                            {{-- <figure>
                                <img src="{{ asset('storage/'.$data->createdBy->image) }}" alt="{{ $data->createdBy->name }}" class="img-fluid rounded-circle">
                            </figure> --}}
                            <div class="wrap__profile-author-detail">
                                <div class="wrap__profile-author-detail-name">Penulis</div>
                                <h4>{{$data->createdBy->name}}</h4>
                                {{-- <p>{{ $data->createdBy->description }}</p> --}}
                                {{-- <ul class="list-inline">
                                    @if ($data->createdBy->facebook)
                                        <li class="list-inline-item">
                                            <a href="{{ $data->createdBy->facebook }}" class="btn btn-social btn-social-o facebook ">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if ($data->createdBy->x)
                                        <li class="list-inline-item">
                                            <a href="{{ $data->createdBy->x }}" class="btn btn-social btn-social-o twitter ">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if ($data->createdBy->instagram)
                                        <li class="list-inline-item">
                                            <a href="{{ $data->createdBy->instagram }}" class="btn btn-social btn-social-o instagram ">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if ($data->createdBy->instagram)
                                        <li class="list-inline-item">
                                            <a href="{{ $data->createdBy->instagram }}" class="btn btn-social btn-social-o telegram ">
                                                <i class="fa fa-telegram"></i>
                                            </a>
                                        </li>
                                    @endif
                                    @if ($data->createdBy->linked_in)
                                        <li class="list-inline-item">
                                            <a href="{{ $data->createdBy->linked_in }}" class="btn btn-social btn-social-o linkedin ">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                    @endif
                                </ul> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sticky-top">
                        <aside class="wrapper__list__article ">
                            <h4 class="border_section">Terbaru</h4>
                            <div class="wrapper__list__article-small">
                                @foreach ($beritas as $berita)
                                    <div class="mb-3">
                                        <div class="card__post card__post-list">
                                            <div class="image-sm">
                                                <a href="{{ route('detail', $berita->slug) }}">
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
                                                            <a href="{{ route('detail', $berita->slug) }}">
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

    @push('css')
        <style>
            #category-link.no-hover-effect,
            #category-link.no-hover-effect:hover,
            #category-link.no-hover-effect:focus,
            #category-link.no-hover-effect:active {
                color: #000000 !important;
                text-decoration: none !important;
                background-color: transparent !important;
                border: none !important;        /* tambahkan ini */
                outline: none !important;       /* tambahkan ini untuk menghilangkan outline saat focus */
                box-shadow: none !important;     /* tambahkan ini untuk menghilangkan shadow */
            }

            /* Style default */
            /* Style default */
            .blog-tags #list-inline-item-custom {
                background-color: #000 !important;
                transition: none !important; /* hilangkan transisi */
            }

            .blog-tags .list-inline #list-inline-item-custom a {
                color: #fff !important;
                text-decoration: none !important;
                transition: none !important; /* hilangkan transisi */
            }

            /* Reset semua pseudo-class untuk ID list-inline-item-custom */
            .blog-tags #list-inline-item-custom,
            .blog-tags #list-inline-item-custom:hover,
            .blog-tags #list-inline-item-custom:focus,
            .blog-tags #list-inline-item-custom:active,
            .blog-tags #list-inline-item-custom:visited,
            .blog-tags #list-inline-item-custom:link,
            .blog-tags #list-inline-item-custom:focus-within,
            .blog-tags #list-inline-item-custom:focus-visible,
            .blog-tags #list-inline-item-custom:target {
                background-color: #000 !important;
                border: none !important;
                outline: none !important;
                box-shadow: none !important;
                opacity: 1 !important;
                filter: none !important;
                transform: none !important;
                transition: none !important;
            }

            /* Reset semua pseudo-class untuk link di dalamnya */
            .blog-tags .list-inline #list-inline-item-custom a,
            .blog-tags .list-inline #list-inline-item-custom a:hover,
            .blog-tags .list-inline #list-inline-item-custom a:focus,
            .blog-tags .list-inline #list-inline-item-custom a:active,
            .blog-tags .list-inline #list-inline-item-custom a:visited,
            .blog-tags .list-inline #list-inline-item-custom a:link,
            .blog-tags .list-inline #list-inline-item-custom a:focus-within,
            .blog-tags .list-inline #list-inline-item-custom a:focus-visible,
            .blog-tags .list-inline #list-inline-item-custom a:target {
                color: #fff !important;
                background-color: transparent !important;
                text-decoration: none !important;
                border: none !important;
                outline: none !important;
                box-shadow: none !important;
                opacity: 1 !important;
                filter: none !important;
                transform: none !important;
                transition: none !important;
            }
        </style>
    @endpush
</x-app-landing-layout>
