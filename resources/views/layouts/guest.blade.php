<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    {{--  <link rel="stylesheet" href="sweetalert2.min.css">
 --}}
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/v4-shims.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/fontawesome.js"></script>
    {{--  <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script> --}}
    {{-- <script src="sweetalert2.min.js"></script> --}}


    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    {{--  @include('sweetalert::alert') --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    @yield('scripts')
    @yield('js')
</body>

</html>
