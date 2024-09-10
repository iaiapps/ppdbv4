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
    {{-- <div id="app">
        @include('layouts.partial.navbar')
        <div class="container-fluid back">
            <div class="row p-3 px-md-3">
                <div class="col-12 col-md-2 px-0 px-md-2 mb-3 mb-md-0">
                    @include('layouts.partial.sidemenu')
                </div>
                <div class="col-12 col-md-10 px-0 px-md-2">
                    @yield('content')
                </div>
            </div>
        </div>
    </div> --}}
    <div id="app">
        @include('layouts.partial.navbar')
        <div class="container-fluid back">
            <div class="d-block d-md-flex py-3 ">
                <div class="px-0 px-md-2 mb-3 mb-md-0 ">
                    @include('layouts.partial.sidemenu ')
                </div>
                <div class="px-0 px-md-2 page">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/jquery/jquery-3.6.4.min.js') }}"></script>
    @stack('scripts')
</body>

</html>
