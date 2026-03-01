<!DOCTYPE html>
<html lang="">

@include('layouts.landing.head')

<body>
    @include('layouts.landing.pre-loader')
    @include('layouts.landing.header')

    {{ $slot }}

    @include('layouts.landing.footer')

    @include('layouts.landing.script')
</body>

</html>
