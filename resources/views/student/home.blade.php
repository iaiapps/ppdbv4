@extends('layouts.dashboard')

@section('title', 'Home Page')

@section('content')

    @include('layouts.partial.name')

    @if ($today->lt($pengumuman) || Auth::user()->hasRole('akun_isi_formulir'))
        <div class="bg-white rounded p-3 mb-3 text-center">
            <p class="m-0">Status PPDB</p>
            <p class="my-1 text-white bg-secondary p-2 rounded fs-5 fw-bold">Menunggu Hasil Pengumuman PPDB</p>
        </div>
        <div class="bg-white rounded p-3 min-vh-100 text-center">
            <div class="text-rata">
                <p>
                    Terima Kasih telah mengisi formulir pendaftaran di Web SPMB SDIT Harapan Umat Jember</p>
                <p>Tahap selanjutnya adalah Psikotest, Observasi dan Wawancara, yang dilaksanakan sesuai jadwal yang
                    ditentukan. </p>
                <p>Jangan sampai terlewatkan ya.. </p>
            </div>
            <div class="btn-group w-100 my-3">
                <a class="btn btn-orange w-100" href="{{ route('student.timeline') }}">
                    Informasi Jadwal</a>
                <a class="btn btn-primary w-100" href="{{ route('student.profile') }}">
                    Data Pendaftar</a>
            </div>
            <hr>

            <div class="d-flex justify-content-center align-items-center mb-2 gap-2">
                <button id="zoom_in" class="btn btn-sm btn-success">
                    <i class="bi bi-zoom-in"></i> Zoom In
                </button>
                <button id="zoom_out" class="btn btn-sm btn-danger">
                    <i class="bi bi-zoom-out"></i> Zoom Out
                </button>
                <button id="zoom_reset" class="btn btn-sm btn-secondary">
                    <i class="bi bi-arrow-counterclockwise"></i> Reset
                </button>
            </div>

            <div id="img-container" class="border border-2 rounded p-2 text-center w-100 hh" style="overflow: auto;">
                <img id="zoomable-img" src="{{ asset('img/rincian.svg') }}" alt="imgrincian"
                    style="max-width: 100%; transform: scale(1); transform-origin: top left;">
            </div>
        </div>
    @else
        @if (Auth::user()->hasRole('akun_diterima'))
            <div class="bg-white rounded p-3 mb-3 text-center">
                <p class="m-0">Status PPDB</p>
                <p class="my-1 text-white bg-primary p-2 rounded fs-5 fw-bold">Selamat, ananda "DITERIMA" di SDIT Harum
                    Jember
                </p>
            </div>
            <div id="lanjut" class="bg-white rounded p-3 text-center">
                <div class="text-center">
                    <p class="fs-5 mb-2 "> Tahap selanjutnya adalah daftar ulang. </p>
                    <p> Untuk melihat rincian biaya daftar ulang klik tombol dibawah
                    </p>
                    <a class="btn btn-orange w-75 my-4" href="{{ route('student.cost') }}">
                        Lihat rincian biaya daftar ulang</a>
                </div>
            </div>
        @elseif (Auth::user()->hasRole('akun_ditolak'))
            <div class="bg-white rounded p-3 mb-3 text-center">
                <p class="my-1 text-white bg-danger p-2 rounded fs-5 ">Mohon Maaf ananda Belum Diterima di SDIT Harum
                    Jember</p>
            </div>
            <div class="bg-white rounded p-3 text-center">
                <div>
                    <p class="my-1 p-1 rounded fs-5 ">Jangan putus asa dan tetap semangat, semoga mendapat sekolah
                        yang
                        lebih baik</p>
                </div>
            </div>
        @elseif (Auth::user()->hasRole('akun_mengundurkan_diri'))
            <div class="bg-white rounded p-3 mb-3 text-center">
                <p class="my-1 text-white bg-secondary p-2 rounded fs-5 ">Mohon Maaf, Anda telah mengundurkan diri
                    dari
                    SPMB SDIT Harum
                    Jember</p>
            </div>
            <div class="bg-white rounded p-3 text-center">
                <div>
                    <p class="my-1 p-1 rounded fs-5 ">Semoga mendapat sekolah
                        yang
                        lebih baik</p>
                </div>
            </div>
        @endif
    @endif

@endsection

@push('css')
    <style>
        .text-rata {
            text-align: justify;
        }

        .foto {
            height: 300px;
        }

        @media (max-width: 700px) {
            .hh {
                height: 60vh;
            }

            .foto {
                height: 200px;
            }
        }
    </style>
@endpush
@push('scripts')
    <script>
        let scale = 1;
        const img = document.getElementById('zoomable-img');

        function updateTransform() {
            img.style.transform = `scale(${scale})`;
        }

        // Zoom In
        document.getElementById('zoom_in').addEventListener('click', () => {
            scale += 0.5;
            updateTransform();
        });

        // Zoom Out
        document.getElementById('zoom_out').addEventListener('click', () => {
            if (scale > 0.2) {
                scale -= 0.5;
                updateTransform();
            }
        });

        // Reset
        document.getElementById('zoom_reset').addEventListener('click', () => {
            scale = 1;
            updateTransform();
            document.getElementById('img-container').scrollTop = 0;
            document.getElementById('img-container').scrollLeft = 0;
        });
    </script>
@endpush
