<nav id="nav" class="navbar navbar-expand-lg navbar-light bg-light py-2 fs-5 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing') }}">
            <img src="{{ asset('img/logoppdb.png') }}" alt="logoppdb" class="imglogo" />
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-md-2">
                {{-- @dd(Request::url()) --}}
                <li class="nav-item mx-md-2 mx-0">
                    <a class="nav-link hover px-3" href="#beranda">BERANDA</a>
                </li>
                <li class="nav-item mx-md-2 mx-0">
                    <a class="nav-link hover px-3" href="#panduan">PANDUAN</a>
                </li>
                <li class="nav-item mx-md-2 mx-0">
                    <a class="nav-link hover px-3" href="#jadwal">JADWAL</a>
                </li>
                <li class="nav-item mx-md-2 mx-0">
                    <a class="nav-link hover px-3" href="#kontak">KONTAK</a>
                </li>
            </ul>

            <a class="btn btn-dark btn-lg text-white ps-3" href="{{ route('login') }}">LOGIN</a>
        </div>
    </div>
</nav>

@push('css')
    <style>
        .imglogo {
            width: 160px;
        }

        .bg-nav {
            background-color: #ffa511;
            color: white !important;
        }

        .change_nav {
            background-color: #fffffff5 !important;
            border-bottom: 3px solid #ffa511;
        }

        .hover {
            border-radius: 10px;
            color: #02141d;
        }

        .hover:hover,
        .hover:active {
            background-color: #ffa511;
            color: white;
        }

        @media only screen and (max-width: 600px) {
            .bg-nav {
                background-color: #ffc107;
            }

            .imglogo {
                width: 130px;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        var myNav = document.getElementById("nav");

        window.onscroll = function() {
            "use strict";
            if (document.body.scrollTop >= 55 || document.documentElement.scrollTop >= 55) {
                myNav.classList.add("change_nav");
            } else {
                myNav.classList.remove("change_nav");
            }
        };
    </script>
@endpush
