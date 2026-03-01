<script type="text/javascript" src="{{ asset('landing/js/index.bundle.js') }}"></script>

<script src="{{ asset('assets/libs/toastr/build/toastr.min.js')}}"></script>
<script>
    $(document).ready(function () {
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif

        @if (session('success'))
            toastr.success('{{ session('success') }}');
        @endif
    });
</script>
@stack('js')
