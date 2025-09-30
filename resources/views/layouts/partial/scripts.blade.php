@push('css')
    <link rel="stylesheet" href="{{ asset('assets/datatables/datatables.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/datatables/dataTables.bootstrap5.min.css') }}"> --}}

    {{-- responsive and rowreorder --}}
    <link rel="stylesheet" href="{{ asset('assets/datatables/responsive/responsive.bootstrap5.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/datatables/rowreorder/rowReorder.bootstrap5.min.css') }}"> --}}
@endpush
@push('scripts')
    <script src="{{ asset('assets/datatables/datatables.min.js') }}"></script>
    {{-- <script src="{{ asset('assets/datatables/dataTables.bootstrap5.min.js') }}"></script> --}}

    {{-- responsive and rowreorder --}}
    <script src="{{ asset('assets/datatables/rowreorder/dataTables.rowReorder.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/rowreorder/rowReorder.bootstrap5.min.js') }}"></script>
    {{--  <script src="{{ asset('assets/datatables/responsive/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/datatables/responsive/responsive.bootstrap5.min.js') }}"></script> --}}
@endpush
