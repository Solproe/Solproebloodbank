<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">

    <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="https://www.facebook.com/sharer/sharer.php?u=https://geofault.com" target="_blank"
        class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
    <link rel="stylesheet" href="https://api.whatsapp.com/send?text=https://geofault.com" target="_blank"
        class="whatsapp"><i class="fa fa-whatsapp" aria-hidden="true"></i></href=>
    <link rel="stylesheet" href="https://www.linkedin.com/sharing/share-offsite/?url=https://geofault.com"
        target="_blank" class="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></href=>
    <link rel="stylesheet" href="https://plus.google.com/share?url=https://geofault.com" target="_blank"
        class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></href=>

    <meta name="csrf-token" content="{{ csrf_token() }}" <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/v4-shims.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/fontawesome.js"></script>
    {{--  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script> --}}
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    <!-- Scripts -->
    {{--  @include('sweetalert::alert') --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @yield('scripts')
    @yield('js')
</body>

</html>
