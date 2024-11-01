@extends('layouts.dashboard')

@section('title', 'Student Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100 clearfix none">
        <p class="fs-5 text-center">Data Seluruh Kartu Peserta Ujian</p>
        <hr>

        <a href="{{ url()->previous() }}" class="btn btn-success btn-sm mb-3"> kembali </a>
        <button class="btn btn-success btn-sm mb-3" onclick="print()"> print </button>


        <div id="printarea">
            @foreach ($cards as $card)
                <div class="border p-2 ukuran mb-1 me-1 float-start border-black">
                    <div class="text-center mb-1">
                        <img src="{{ asset('img/kop.svg') }}" class="img-header" alt="ppdb">
                    </div>
                    <p class="text-center fw-bold mb-1">Kartu Peserta Ujian Psikotest 2025 </p>
                    <p class="text-center mb-0">{{ $card->full_name }}</p>
                    <small class="text-center d-block">{{ $card->place_birth }}, {{ $card->date_birth }}</small>

                    <table class="table table-bordered mt-1 border-black mb-1">
                        <tr class="text-center">
                            <td style="width: 50%; height:60px" class="tbl"><small>RUANG</small></td>

                            <td style="width: 50%; height:60px" class="tbl"><small>NO</small></td>
                        </tr>

                    </table>

                    <table class="table table-bordered align-middle border-black">
                        <tbody>
                            <tr>
                                <td rowspan="2" class="text-center">
                                    @if ($card->user->document->where('type', 'upload_foto')->isEmpty())
                                        <img class="logouser p-2 rounded-circle bg-white border border-5 border-orange mb-3"
                                            src="{{ asset('img/user.png') }}" alt="user" />
                                    @else
                                        <img src="{{ asset('img-document/' . $card->user->document->where('type', 'upload_foto')->first()->document) }}"
                                            class="profil" alt="foto">
                                    @endif
                                <td class="pdl"><small>Nama Panggilan</small><br>{{ $card->nick_name }} </td>

                            </tr>

                            <tr>
                                <td class="pdl"><small>Asal Sekolah</small><br>
                                    <small> {{ $card->school_origin }}</small>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            @endforeach
        </div>

    </div>
@endsection

@push('css')
    <style>
        .logouser {
            width: 1.5cm !important;
        }

        .profil {
            height: 113px;
            width: 76px;
        }

        .img-header {
            height: 55px;
        }

        .ukuran {
            height: 377px;
            width: 302px
        }

        .tbl {
            padding: 0px !important;
        }

        .pdl {
            padding: 4px !important;
        }

        /* allpage */
        @page {
            margin: 8px !important;
            padding: 8px !important;
            font-size: 0.6em
        }

        /* print */
        @media print {
            body {
                visibility: hidden;
                background-color: white !important;
            }

            .page {
                margin: 0px !important;
            }

            #printarea {
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
    <script>
        print() {
            window.print();
        },
    </script>
@endpush
