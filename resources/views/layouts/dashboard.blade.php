<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('css')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    <div id="app">
        @include('layouts.partial.navbar')
        <div class="container-fluid back">
            <div class="d-block d-md-flex py-3 ">
                @if (!Auth::user()->hasRole('akun_nonaktif'))
                    <div class="px-0 px-md-2 mb-3 mb-md-0 ">
                        @include('layouts.partial.sidemenu ')
                    </div>
                @endif
                <div class="px-0 px-md-2 page">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.partial.footer')
    </div>
    <script src="{{ asset('assets/jquery/jquery-3.6.4.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
