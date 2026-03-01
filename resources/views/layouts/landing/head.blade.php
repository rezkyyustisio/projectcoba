<head>
    <meta charset="utf-8">
    <title> {{ $settings['name'] ?? null }} </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('storage/'.($settings['icon_light'] ?? null))}}" rel="stylesheet" type="text/css" />
    <link rel="apple-touch-icon" href="{{ asset('storage/'.($settings['icon_light'] ?? null)) }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,500;0,700;1,300;1,500&family=Poppins:ital,wght@0,300;0,500;0,700;1,300;1,400&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="{{asset('landing/css/styles.css')}}" rel="stylesheet">
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ $settings['google_ads_client'] ?? null }}" crossorigin="anonymous"></script>
    <style>
        :root {
            --theme-color: {{ $settings['theme'] ?? '#000000' }};
        }

        .active,.list-inline .list-inline-item a:hover {
            background: var(--theme-color) !important;
            border: 2px solid var(--theme-color) !important;
        }

        .nav-item:hover .nav-link {
            border-bottom: 2px solid var(--theme-color) !important;
        }


        .card__post__category,
        .border_section:before {
            background: var(--theme-color) !important;
        }

        .card__post__title h5 a:hover,
        .card__post__title h6 a:hover,
        .text-primary {
            color: var(--theme-color) !important;
        }
    </style>
    @stack('css')
</head>
