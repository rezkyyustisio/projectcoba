<div class="vertical-menu" style="background: {{ ($settings['theme'] ?? null) }}">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>
                <li class="{{ request()->is('admin/dashboard') ? 'mm-active' : '' }}"><a href="{{ route('admin.dashboard') }}" class="waves-effect"><i class="bx bxs-dashboard"></i><span key="t-dashboard">Dashboard</span></a></li>
                <li><a href="#" class="has-arrow waves-effect"><i class="bx bx-news"></i><span key="t-berita">Berita</span></a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li class="{{ request()->is('admin/berita/berita') ? 'mm-active' : '' }}"><a href="{{ route('admin.berita.berita.index') }}" key="t-berita">Berita</a></li>
                        <li class="{{ request()->is('admin/berita/category') ? 'mm-active' : '' }}"><a href="{{ route('admin.berita.category.index') }}" key="t-berita-category">Kategori</a></li>
                        <li class="{{ request()->is('admin/berita/tag') ? 'mm-active' : '' }}"><a href="{{ route('admin.berita.tag.index') }}" key="t-berita-tag">Tag</a></li>
                        <li class="{{ request()->is('admin/berita/media') ? 'mm-active' : '' }}"><a href="{{ route('admin.berita.media.index') }}" key="t-berita-media">Media</a></li>
                    </ul>
                </li>
                <li class="{{ request()->is('admin/alur-keuangan' ? 'mm-active' : '') }}"><a href="{{ route('admin.keuangan.alur-keuangan.index') }}" class="waves-effect"><i class="bx bx-money"></i><span key="t-user">Alur Keuangan</span></a></li>
                <li class="{{ request()->is('admin/keuangan/hutang-piutang') ? 'mm-active' : '' }}"><a href="{{ route('admin.keuangan.hutang-piutang.index') }}" class="waves-effect"><i class="bx bx-file"></i><span key="t-hutang-piutang">Hutang & Piutang</span></a></li>
                <li class="{{ request()->is('admin/user') ? 'mm-active' : '' }}"><a href="{{ route('admin.user.index') }}" class="waves-effect"><i class="bx bx-group"></i><span key="t-user">Pengguna</span></a></li>
                <li class="{{ request()->is('admin/setting') ? 'mm-active' : '' }}"><a href="{{ route('admin.setting.index') }}" class="waves-effect"><i class="bx bx-cog"></i><span key="t-setting-apps">Pengaturan</span></a></li>
            </ul>
        </div>
    </div>
</div>
