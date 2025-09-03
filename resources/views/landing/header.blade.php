<div class="bg-orange">
    <p class="text-center mb-0 text-white p-2">Sistem penerimaan Murid Baru SDIT Harapan Umat Jember Tahun 2026/2027</p>
</div>
<nav id="nav" class="navbar navbar-expand-lg navbar-white bg-white py-2 fs-5 sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('landing') }}">
            <img src="{{ asset('img/logoppdbb.png') }}" alt="logoppdb" class="imglogo" />
        </a>
        <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="toggler-icon top-bar"></span>
            <span class="toggler-icon middle-bar"></span>
            <span class="toggler-icon bottom-bar"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 me-md-2">
                <li class="nav-item mx-md-2 mx-0">
                    <a class="nav-link hover px-3" href="#beranda">Beranda</a>
                </li>
                <li class="nav-item mx-md-2 mx-0">
                    <a class="nav-link hover px-3" href="#panduan">Panduan</a>
                </li>
                <li class="nav-item mx-md-2 mx-0">
                    <a class="nav-link hover px-3" href="#jadwal">Jadwal</a>
                </li>
                <li class="nav-item mx-md-2 mx-0">
                    <a class="nav-link hover px-3" href="#kontak">Kontak</a>
                </li>
            </ul>
            <a class="btn btn-orange btnlg text-white hover" href="{{ route('login') }}">LOGIN</a>
        </div>
    </div>
</nav>

@push('css')
    <style>
        .imglogo {
            width: 150px;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .bg-nav {
            background-color: #f97f2a;
            color: white !important;
        }

        .change_nav {
            background-color: #fffffff5 !important;
            border-bottom: 3px solid #f97f2a;
        }

        .hover {
            border-radius: 10px;
            color: #02141d;
        }

        .hover:hover,
        .hover:active {
            background-color: #f97f2a;
            color: white;
        }

        .btnlg {
            padding: 7px 50px;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 10px;
            text-decoration: none;
            transition: all 0.3s;
            cursor: pointer;
            border: none;
        }

        .navbar-toggler {
            border: 2px solid #f97f2a;
            border-radius: 8px;
            padding: 5px 10px;
            transition: all 0.3s ease-in-out;
        }

        .navbar-toggler:focus,
        .navbar-toggler:active {
            outline: none;
            box-shadow: none;
            border-color: #f97f2a;
            /* berubah warna saat diklik (opsional) */
        }

        .toggler-icon {
            display: block;
            width: 25px;
            height: 3px;
            margin: 5px auto;
            background-color: #f97f2a;
            transition: all 0.3s ease-in-out;
        }

        /* Saat navbar aktif (collapse terbuka) */
        .navbar-toggler:not(.collapsed) .top-bar {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .navbar-toggler:not(.collapsed) .middle-bar {
            opacity: 0;
        }

        .navbar-toggler:not(.collapsed) .bottom-bar {
            transform: rotate(-45deg) translate(6px, -6px);
        }


        @media only screen and (max-width: 600px) {
            .bg-nav {
                background-color: #f97f2a;
            }

            .imglogo {
                width: 130px;
            }

            .nav-link {
                padding-top: 10px;
                padding-bottom: 10px;
                margin-top: 5px;
                margin-bottom: 2px;
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
