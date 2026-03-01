<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <div class="navbar-brand-box" style="background: {{ ($settings['header'] ?? null) }}">
                <a href="{{ route('admin.dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('storage/'.($settings['icon_dark'] ?? null))}}"
                            alt="Icon {{ $settings['name'] ?? null }}" height="{{ $settings['icon_size'] ?? null }}">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('storage/'.($settings['logo_dark'] ?? null))}}"
                            alt="Logo {{ $settings['name'] ?? null }}" height="{{ $settings['logo_size'] ?? null }}">
                    </span>
                </a>

                <a href="{{ route('admin.dashboard') }}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ asset('storage/'.($settings['icon_light'] ?? null))}}"
                            alt="Icon {{ $settings['name'] ?? null }}" height="{{ $settings['icon_size'] ?? null }}">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('storage/'.($settings['logo_light'] ?? null))}}"
                            alt="Logo {{ $settings['name'] ?? null }}" height="{{ $settings['logo_size'] ?? null }}">
                    </span>
                </a>
            </div>
            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>
        </div>

        <div class="d-flex">
            <div class="dropdown d-none d-lg-inline-block ms-1">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="bx bx-fullscreen"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user"
                        src="{{ Auth::user()->image ? asset('storage/'.Auth::user()->image) : 'https://ui-avatars.com/api/?background=0D8ABC&color=FFF&name=' . str_replace(' ', '+', Auth::user()->name) }}"
                        alt="Avatar">

                    <span class="d-none d-xl-inline-block ms-1">{{ auth()->user()->name }}</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                        <span key="t-logout">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
