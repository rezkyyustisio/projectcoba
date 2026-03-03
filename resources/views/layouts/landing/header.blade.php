<header class="bg-light">
    <div class="topbar d-none d-sm-block">
        <div class="container ">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="topbar-left">
                        <div class="topbar-text">
                            {{ Carbon\Carbon::now()->locale('id')->isoFormat('dddd, D MMMM YYYY') }}
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-7">
                    <div class="list-unstyled topbar-right">
                        <ul class="topbar-sosmed">
                            <li>
                                <a href="{{ $settings['sosmed_facebook'] ?? null }}"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="{{ $settings['sosmed_youtube'] ?? null }}"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="{{ $settings['sosmed_whatsapp'] ?? null }}"><i class="fa fa-whatsapp"></i></a>
                            </li>
                            <li>
                                <a href="{{ $settings['sosmed_instagram'] ?? null }}"><i class="fa fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="{{ $settings['sosmed_tiktok'] ?? null }}"><i class="fab fa-tiktok"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation-wrap navigation-shadow bg-white">
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft">
            <div class="container">
                <div class="offcanvas-header">
                    <div data-toggle="modal" data-target="#modal_aside_right" class="btn-md">
                        <span class="navbar-toggler-icon"></span>
                    </div>
                </div>
                <figure class="mb-0 mx-auto">
                    <a href="{{ route('beranda') }}">
                        {{-- <img src="{{asset('storage/'.($settings['logo_dark'] ?? null))}}" alt="{{ $settings['name'] ?? null }}" class="img-fluid logo" style="max-height: 40px; max-width:200px" width="auto" height="auto"> --}}

                        <img src="{{asset('storage/'.('logo_dark_1772280797.png' ?? null))}}" alt="{{ $settings['name'] ?? null }}" class="img-fluid logo" style="max-height: 40px; max-width:200px" width="auto" height="auto">
                    </a>
                </figure>

                <div class="collapse navbar-collapse justify-content-between" id="main_nav99">
                    <ul class="navbar-nav ml-auto ">
                        @foreach ($providerCategories as $category)
                            <li class="nav-item"><a class="nav-link" href="{{ route('category',$category->slug) }}"> {{ $category->name }} </a></li>
                        @endforeach
                    </ul>

                    <ul class="navbar-nav ">
                        <li class="nav-item search hidden-xs hidden-sm "> <a class="nav-link" href="#">
                                <i class="fa fa-search"></i>
                            </a>
                        </li>
                    </ul>
                    <div class="top-search navigation-shadow">
                        <div class="container">
                            <div class="input-group ">
                                <form action="{{ route('search') }}" method="GET">
                                    <div class="row no-gutters mt-3">
                                        <div class="col">
                                            <input class="form-control border-secondary border-right-0 rounded-0" type="search" value="{{ request('s') }}" placeholder="Cari Berita" name="s" minlength="3" oninvalid="this.setCustomValidity('Minimal 3 karakter untuk pencarian')" oninput="this.setCustomValidity('')" id="example-search-input4">
                                        </div>
                                        <div class="col-auto">
                                            <button class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </div>

    <div id="modal_aside_right" class="modal fixed-left fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-aside" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <form class="widget__form-search-bar" action="{{ route('search') }}">
                        <div class="row no-gutters">
                            <div class="col">
                                <input class="form-control border-secondary border-right-0 rounded-0" value="" name="s" placeholder="Cari Berita">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <nav class="list-group list-group-flush">
                        <ul class="navbar-nav ">
                            @foreach ($providerCategories as $category)
                                <li class="nav-item"><a class="nav-link text-dark" href="{{ route('category',$category->slug) }}"> {{ $category->name }}</a></li>
                            @endforeach
                        </ul>

                    </nav>
                </div>
                <div class="modal-footer">
                    <p>© {{ date('Y') }} <a class="text-primary" href="#">{{ $settings['company'] ?? null }}</a>.</p>
                </div>
            </div>
        </div>
    </div>
</header>
