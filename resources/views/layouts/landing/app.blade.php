<!DOCTYPE html>
<html lang="">

@include('layouts.landing.head')

<style>
    .navbar-collapse {
        justify-content: flex-start !important;
    }

    .navbar-nav.ml-auto {
        margin-left: 130px !important;
        margin-right: auto;
    }

    /* Atur posisi icon search */
    .navbar-nav:last-child {
        margin-left: 15px;
    }
</style>

<body>
    @include('layouts.landing.pre-loader')
    @include('layouts.landing.header')

    {{ $slot }}

    @include('layouts.landing.footer')

    @include('layouts.landing.script')
</body>

</html>
