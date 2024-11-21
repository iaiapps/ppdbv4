@extends('layouts.dashboard')
@inject('carbon', 'Carbon\Carbon')
@section('title', 'Detail Pembayaran')

@section('content')

    @include('layouts.partial.name')

    <div class="bg-white rounded p-3">
        <a href="{{ url()->previous() }}" class="btn btn-outline-primary btn-sm mb-3"> <i class="bi bi-arrow-left-circle"></i>
            kembali</a>
        <br>
        <button id="print" class="btn btn-primary mb-3"> <i class="bi bi-printer"></i>
            cetak kuitansi</button>

        <button id="download" class="btn btn-primary mb-3"> <i class="bi bi-arrow-down-circle"></i>
            download kuitansi</button>
        <br>
        <hr>
        <div id="cetak" class="px-md-4 px-1">
            <div class="row center">
                <div class="col my-1 ">
                    <img class="kop" src="{{ asset('img/kopkuitansi.svg') }}" alt="kop" />
                </div>
                <div class="col my-1">
                    <p class="fs-4 border border-success d-inline-block p-2 rounded mb-2">KUITANSI </p>
                    <p>nomor : {{ '0' . $payment->id . $carbon::parse($payment->created_at)->isoFormat('YYMMDDHH') }}
                    </p>
                </div>
            </div>
            <hr class="mt-0">
            <p class="fs-5 text-center">Pembayaran Daftar Ulang </p>
            <div class="border rounded border-success p-2 mb-4">
                <p class="mb-2">Telah terima dari :</p>
                <table class="table mb-0 align-middle">
                    <tbody>
                        <tr>
                            <td class="lebartd1">Bapak/Ibu/Wali</td>
                            <td class="lebartd2"><span class="me-3">:</span> {{ $payment->payment_from }} </td>
                        </tr>
                        <tr>
                            <td>Nama Siswa</td>
                            <td><span class="me-3">:</span> {{ $payment->student->full_name }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="border border-success rounded p-2 mb-4">
                <table class="table mb-0 align-middle">
                    <tbody>
                        <tr>
                            <td class="lebartd1 ">Pembayaran</td>
                            <td><span class="me-3">:</span> {{ $payment->name }} </td>
                        </tr>
                        <tr>
                            <td class="lebartd1 ">Uang Sejumlah</td>
                            <td><span class="me-3">:</span> <span
                                    class="text-uppercase">{{ $payment->payment_says }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3">Nominal</td>
                            <td class="fs-5 py-3"><span class="me-3">:</span> <span
                                    class="inline-block border border-black rounded p-md-2 p-1 "> <b>@currency($payment->value)
                                    </b></span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="boxttd my-3 text-center position-relative">
                <div class="float-end">
                    <p class="m-0"> <span class="bold"> Jember,
                            {{ $carbon::parse($payment->date)->isoFormat('DD MMM Y') }}</span> </p>
                    <br />
                    <br />
                    <br />
                    <p class="m-0 text-decoration-underline"><b>Keu. SDIT Harum</b></p>
                    <div class="imgttd">
                        <img src="{{ asset('img/stam.png') }}" alt="stempel" />
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('css')
    <style>
        .kop {
            width: 350px;
        }

        .lebartd1 {
            width: 150px !important;
        }

        .boxttd {
            margin-right: 50px;
            height: 150px;
        }

        .bold {
            font-weight: bold;
        }

        .imgttd {
            position: absolute;
            top: -10px;
            right: 14px;
        }

        .imgttd img {
            width: 130px;
            opacity: 0.9;
        }

        @media (max-width: 600px) {
            .kop {
                width: 100%;
                min-width: 300px;
            }

            .center {
                text-align: center;
            }

            .lebartd1 {
                width: 100px !important;
            }
        }

        @media print {
            body {
                visibility: hidden;
                background-color: white !important
            }

            #cetak {
                height: 400px;
                visibility: visible !important;
                position: absolute !important;
                left: 0;
                right: 0;
                top: 0;
                /* border: 2px solid rgb(95, 222, 148); */
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        const download = document.getElementById('download');

        function createpdf() {
            const element = document.getElementById("cetak");

            const options = {
                margin: 7,
                filename: "Kwitansi PPDB.pdf",
                image: {
                    type: "jpeg",
                    quality: 1
                },
                html2canvas: {
                    scale: 3,
                    removeContainer: true,
                    scrollY: 0,
                },
                jsPDF: {
                    unit: "mm",
                    format: "a4",
                    orientation: "portrait",
                },
            };
            html2pdf().set(options).from(element).save();
        };
        download.addEventListener('click', () => {
            createpdf();
        });

        const print = document.getElementById("print")
        print.addEventListener("click", () => {
            window.print();

        });
    </script>
@endpush
