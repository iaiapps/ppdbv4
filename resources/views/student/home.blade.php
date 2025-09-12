@extends('layouts.dashboard')

@section('title', 'Home Page')

@section('content')

    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 mb-3 text-center">
        <p class="m-0">Status PPDB</p>
        @if (Auth::user()->hasRole('akun_isi_formulir'))
            <p class="my-1 text-white bg-secondary p-2 rounded fs-5 fw-bold">Menunggu Hasil Pengumuman PPDB</p>
        @elseif (Auth::user()->hasRole('akun_diterima'))
            <p class="my-1 text-white bg-primary p-2 rounded fs-5 fw-bold">Selamat, ananda "DITERIMA" di SDIT Harum
                Jember
            </p>
        @elseif (Auth::user()->hasRole('akun_ditolak'))
            <p class="my-1 text-white bg-danger p-2 rounded fs-5 fw-bold">Mohon Maaf ananda Belum Diterima di SDIT Harum
                Jember</p>
        @endif
    </div>

    @if (Auth::user()->hasRole('akun_isi_formulir'))
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
            <!-- Toolbar Zoom -->
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
            <!-- PDF Viewer -->
            <div id="pdf-viewer" class="border border-2 rounded p-2 text-center w-100" style="overflow: auto;">
                <canvas id="the-canvas"></canvas>
            </div>
        </div>
    @elseif (Auth::user()->hasRole('akun_diterima'))
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
        <div class="bg-white rounded p-3 text-center">
            <div>
                <p class="my-1 p-1 rounded fs-4 fw-bold">Jangan putus asa dan tetap semangat, semoga mendapat sekolah yang
                    lebih baik</p>
            </div>
        </div>
    @endif

@endsection

@push('css')
    <style>
        #the-canvas {
            display: block;
            margin: 0 auto;
        }

        .text-rata {
            text-align: justify;
        }

        .foto {
            height: 300px;
        }

        @media (max-width: 700px) {
            .foto {
                height: 200px;
            }
        }
    </style>
@endpush
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.14.305/pdf.min.js"></script>
    <script>
        const url = "{{ asset('img/rincian.pdf') }}";

        let pdfDoc = null,
            scale = 1.0,
            defaultScale = 1.0,
            canvas = document.getElementById('the-canvas'),
            ctx = canvas.getContext('2d'),
            renderTask = null;

        function renderPage() {
            if (!pdfDoc) return;

            pdfDoc.getPage(1).then(function(page) {
                const containerWidth = document.getElementById('pdf-viewer').offsetWidth;

                // hitung baseScale sekali untuk fit ke lebar container
                const unscaledViewport = page.getViewport({
                    scale: 1
                });
                const baseScale = containerWidth / unscaledViewport.width;

                // kalikan dengan zoom manual (scale)
                const finalViewport = page.getViewport({
                    scale: baseScale * scale
                });

                canvas.height = finalViewport.height;
                canvas.width = finalViewport.width;

                if (renderTask) {
                    renderTask.cancel();
                }

                renderTask = page.render({
                    canvasContext: ctx,
                    viewport: finalViewport
                });

                renderTask.promise.then(() => {
                    renderTask = null;
                }).catch(function(error) {
                    if (error && error.name !== 'RenderingCancelledException') {
                        console.error(error);
                    }
                });
            });
        }


        // Load PDF
        pdfjsLib.getDocument(url).promise.then(function(pdfDoc_) {
            pdfDoc = pdfDoc_;
            renderPage();
        });

        // Zoom In
        document.getElementById('zoom_in').addEventListener('click', function() {
            scale += 0.1;
            renderPage();
        });

        // Zoom Out
        document.getElementById('zoom_out').addEventListener('click', function() {
            if (scale <= 0.2) return;
            scale -= 0.1;
            renderPage();
        });

        // Reset Zoom
        document.getElementById('zoom_reset').addEventListener('click', function() {
            scale = defaultScale;
            renderPage();
        });

        // Render ulang saat resize
        window.addEventListener('resize', renderPage);
    </script>
@endpush
