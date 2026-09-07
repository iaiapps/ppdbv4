@extends('layouts.dashboard')

@section('title', 'Setting Page')

@section('content')
    @include('layouts.partial.name')

    <div class="bg-white rounded p-3 min-vh-100">
        @if (session('msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <p class="m-0">{{ session('msg') }}</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <p class="fs-5 text-center">Setting Aplikasi</p>
        <hr>

        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs mb-3" id="settingsTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="umum-tab" data-bs-toggle="tab" data-bs-target="#umum"
                    type="button" role="tab">
                    <i class="bi bi-gear"></i> Umum
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="landing-tab" data-bs-toggle="tab" data-bs-target="#landing" type="button"
                    role="tab">
                    <i class="bi bi-house"></i> Landing
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="countdown-tab" data-bs-toggle="tab" data-bs-target="#countdown" type="button"
                    role="tab">
                    <i class="bi bi-clock-history"></i> Countdown
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="kontak-tab" data-bs-toggle="tab" data-bs-target="#kontak" type="button"
                    role="tab">
                    <i class="bi bi-telephone"></i> Kontak
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="biaya-tab" data-bs-toggle="tab" data-bs-target="#biaya" type="button"
                    role="tab">
                    <i class="bi bi-cash"></i> Biaya
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-danger" id="danger-tab" data-bs-toggle="tab" data-bs-target="#danger"
                    type="button" role="tab">
                    <i class="bi bi-exclamation-triangle"></i> Danger
                </button>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content" id="settingsTabContent">

            <!-- TAB: Umum -->
            <div class="tab-pane fade show active" id="umum" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="200">Setting</th>
                                <th>Value</th>
                                <th width="130">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- On/Off -->
                            <tr>
                                <td>
                                    Status Website
                                    <br><small class="text-muted">Buka/Tutup PPDB</small>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="onoffToggle"
                                            {{ ($landing['onoff']->value ?? '1') == '1' ? 'checked' : '' }}
                                            onchange="toggleOnOff(this.checked)">
                                        <label class="form-check-label" for="onoffToggle" id="onoffLabel">
                                            {{ ($landing['onoff']->value ?? '1') == '1' ? '🟢 Buka' : '🔴 Tutup' }}
                                        </label>
                                    </div>
                                </td>
                                <td class="text-center">-</td>
                            </tr>
                            <!-- Tagline -->
                            <tr>
                                <td>
                                    Tagline
                                    <br><small class="text-muted">Pesan header (semua halaman)</small>
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm"
                                        id="setting-{{ $landing['tagline']->id ?? '' }}"
                                        value="{{ $landing['tagline']->value ?? '' }}">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-orange"
                                        onclick="saveInline({{ $landing['tagline']->id ?? 0 }}, document.getElementById('setting-{{ $landing['tagline']->id ?? '' }}').value, this)">
                                        <i class="bi bi-check-lg"></i> simpan
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TAB: Landing -->
            <div class="tab-pane fade" id="landing" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="200">Setting</th>
                                <th>Value</th>
                                <th width="130">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Jadwal -->
                            <tr>
                                <td>
                                    Jadwal
                                    <br><small class="text-muted">Tahun ajaran</small>
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm"
                                        id="setting-{{ $landing['jadwal']->id ?? '' }}"
                                        value="{{ $landing['jadwal']->value ?? '' }}">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-orange"
                                        onclick="saveInline({{ $landing['jadwal']->id ?? 0 }}, document.getElementById('setting-{{ $landing['jadwal']->id ?? '' }}').value, this)">
                                        <i class="bi bi-check-lg"></i> simpan
                                    </button>
                                </td>
                            </tr>
                            <!-- Early Bird -->
                            <tr>
                                <td>
                                    Early Bird
                                    <br><small class="text-muted">Diskon uang gedung</small>
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm"
                                        id="setting-{{ $landing['early_bird']->id ?? '' }}"
                                        value="{{ $landing['early_bird']->value ?? '' }}">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-orange"
                                        onclick="saveInline({{ $landing['early_bird']->id ?? 0 }}, document.getElementById('setting-{{ $landing['early_bird']->id ?? '' }}').value, this)">
                                        <i class="bi bi-check-lg"></i> simpan
                                    </button>
                                </td>
                            </tr>
                            <!-- Registration Fee -->
                            <tr>
                                <td>
                                    Biaya Pendaftaran
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm"
                                        id="setting-{{ $landing['registration_fee']->id ?? '' }}"
                                        value="{{ $landing['registration_fee']->value ?? '' }}">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-orange"
                                        onclick="saveInline({{ $landing['registration_fee']->id ?? 0 }}, document.getElementById('setting-{{ $landing['registration_fee']->id ?? '' }}').value, this)">
                                        <i class="bi bi-check-lg"></i> simpan
                                    </button>
                                </td>
                            </tr>
                            <!-- Bank Name -->
                            <tr>
                                <td>
                                    Nama Bank
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm"
                                        id="setting-{{ $landing['bank_name']->id ?? '' }}"
                                        value="{{ $landing['bank_name']->value ?? '' }}">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-orange"
                                        onclick="saveInline({{ $landing['bank_name']->id ?? 0 }}, document.getElementById('setting-{{ $landing['bank_name']->id ?? '' }}').value, this)">
                                        <i class="bi bi-check-lg"></i> simpan
                                    </button>
                                </td>
                            </tr>
                            <!-- Bank Number -->
                            <tr>
                                <td>
                                    Nomor Rekening
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm"
                                        id="setting-{{ $landing['bank_number']->id ?? '' }}"
                                        value="{{ $landing['bank_number']->value ?? '' }}">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-orange"
                                        onclick="saveInline({{ $landing['bank_number']->id ?? 0 }}, document.getElementById('setting-{{ $landing['bank_number']->id ?? '' }}').value, this)">
                                        <i class="bi bi-check-lg"></i> simpan
                                    </button>
                                </td>
                            </tr>
                            <!-- Bank Account -->
                            <tr>
                                <td>
                                    Nama Pemegang Rekening
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm"
                                        id="setting-{{ $landing['bank_account']->id ?? '' }}"
                                        value="{{ $landing['bank_account']->value ?? '' }}">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-orange"
                                        onclick="saveInline({{ $landing['bank_account']->id ?? 0 }}, document.getElementById('setting-{{ $landing['bank_account']->id ?? '' }}').value, this)">
                                        <i class="bi bi-check-lg"></i> simpan
                                    </button>
                                </td>
                            </tr>
                            <!-- Timelines (Jadwal Pendaftaran) -->
                        </tbody>
                    </table>
                </div>
                <hr>
                <p class="fs-6 fw-bold"><i class="bi bi-calendar-event"></i> Jadwal Pendaftaran</p>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th width="150">Icon</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($timelines as $time)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"
                                            id="timeline-icon-{{ $time->id }}" value="{{ $time->icon }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"
                                            id="timeline-name-{{ $time->id }}" value="{{ $time->name }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"
                                            id="timeline-date-{{ $time->id }}" value="{{ $time->date }}">
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-orange"
                                            onclick="saveTimeline({{ $time->id }}, this)">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger"
                                            onclick="deleteTimeline({{ $time->id }}, this)">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada jadwal</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Form tambah jadwal baru -->
                <div class="card border mt-3">
                    <div class="card-header bg-light">
                        <strong><i class="bi bi-plus-circle"></i> Tambah Jadwal Baru</strong>
                    </div>
                    <div class="card-body">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label small">Icon (BI)</label>
                                <input type="text" class="form-control form-control-sm" id="new-timeline-icon"
                                    placeholder="bi-calendar-event">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small">Nama</label>
                                <input type="text" class="form-control form-control-sm" id="new-timeline-name"
                                    placeholder="Contoh: Pendaftaran Online">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small">Tanggal</label>
                                <input type="text" class="form-control form-control-sm" id="new-timeline-date"
                                    placeholder="Contoh: 14 - 21 September 2026">
                            </div>
                            <div class="col-md-2">
                                <button class="btn btn-primary btn-sm w-100" onclick="addTimeline(this)">
                                    <i class="bi bi-plus-lg"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB: Countdown -->
            <div class="tab-pane fade" id="countdown" role="tabpanel">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="200">Setting</th>
                                <th>Value</th>
                                <th width="130">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Countdown Heading -->
                            <tr>
                                <td>
                                    Judul Countdown
                                    <br><small class="text-muted">Judul halaman countdown</small>
                                </td>
                                <td>
                                    <input type="text" class="form-control form-control-sm"
                                        id="setting-{{ $landing['countdown_heading']->id ?? '' }}"
                                        value="{{ $landing['countdown_heading']->value ?? '' }}">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-orange"
                                        onclick="saveInline({{ $landing['countdown_heading']->id ?? 0 }}, document.getElementById('setting-{{ $landing['countdown_heading']->id ?? '' }}').value, this)">
                                        <i class="bi bi-check-lg"></i> simpan
                                    </button>
                                </td>
                            </tr>
                            <!-- Countdown Date -->
                            <tr>
                                <td>
                                    Tanggal Pembukaan
                                    <br><small class="text-muted">Kapan countdown berakhir</small>
                                </td>
                                <td>
                                    <input type="datetime-local" class="form-control form-control-sm"
                                        id="setting-{{ $landing['countdown']->id ?? '' }}"
                                        value="{{ str_replace(' ', 'T', $landing['countdown']->value ?? '') }}">
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-orange"
                                        onclick="saveInline({{ $landing['countdown']->id ?? 0 }}, document.getElementById('setting-{{ $landing['countdown']->id ?? '' }}').value, this)">
                                        <i class="bi bi-check-lg"></i> simpan
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TAB: Kontak -->
            <div class="tab-pane fade" id="kontak" role="tabpanel">
                <p class="fs-6 fw-bold">Kontak Person</p>
                <div class="table-responsive mb-4">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>No. HP</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"
                                            id="contact-name-{{ $contact->id }}" value="{{ $contact->name }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"
                                            id="contact-desc-{{ $contact->id }}" value="{{ $contact->desc }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"
                                            id="contact-value-{{ $contact->id }}" value="{{ $contact->value }}">
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-orange"
                                            onclick="saveContact({{ $contact->id }}, this)">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger"
                                            onclick="deleteContact({{ $contact->id }}, this)">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada kontak</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Form tambah kontak baru -->
                <div class="card border mb-4">
                    <div class="card-header bg-light">
                        <strong><i class="bi bi-plus-circle"></i> Tambah Kontak Baru</strong>
                    </div>
                    <div class="card-body">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label small">Nama</label>
                                <input type="text" class="form-control form-control-sm" id="new-contact-name"
                                    placeholder="Contoh: Pak Ahmad">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small">Jabatan</label>
                                <input type="text" class="form-control form-control-sm" id="new-contact-desc"
                                    placeholder="Contoh: Koordinator SPMB">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small">No. HP</label>
                                <input type="text" class="form-control form-control-sm" id="new-contact-value"
                                    placeholder="Contoh: 08123456789">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary btn-sm w-100" onclick="addContact(this)">
                                    <i class="bi bi-plus-lg"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <p class="fs-6 fw-bold">Jam Pelayanan</p>
                <div class="table-responsive mb-3">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th>Kegiatan</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pelayanans as $pelayanan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"
                                            id="pelayanan-name-{{ $pelayanan->id }}" value="{{ $pelayanan->name }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"
                                            id="pelayanan-desc-{{ $pelayanan->id }}" value="{{ $pelayanan->desc }}">
                                    </td>
                                    <td>
                                        <input type="text" class="form-control form-control-sm"
                                            id="pelayanan-value-{{ $pelayanan->id }}" value="{{ $pelayanan->value }}">
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-orange"
                                            onclick="savePelayanan({{ $pelayanan->id }}, this)">
                                            <i class="bi bi-check-lg"></i>
                                        </button>
                                        <button class="btn btn-sm btn-danger"
                                            onclick="deletePelayanan({{ $pelayanan->id }}, this)">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted">Belum ada jadwal pelayanan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Form tambah pelayanan baru -->
                <div class="card border">
                    <div class="card-header bg-light">
                        <strong><i class="bi bi-plus-circle"></i> Tambah Pelayanan Baru</strong>
                    </div>
                    <div class="card-body">
                        <div class="row g-2 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label small">Kegiatan</label>
                                <input type="text" class="form-control form-control-sm" id="new-pelayanan-name"
                                    placeholder="Contoh: Jam Sekolah">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small">Hari</label>
                                <input type="text" class="form-control form-control-sm" id="new-pelayanan-desc"
                                    placeholder="Contoh: Senin s/d Jumat">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small">Jam</label>
                                <input type="text" class="form-control form-control-sm" id="new-pelayanan-value"
                                    placeholder="Contoh: 07.15-15.15">
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-primary btn-sm w-100" onclick="addPelayanan(this)">
                                    <i class="bi bi-plus-lg"></i> Tambah
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- TAB: Biaya -->
            <div class="tab-pane fade" id="biaya" role="tabpanel">
                <a href="{{ route('costCategory.create') }}" class="btn btn-primary btn-sm mb-3">
                    <i class="bi bi-plus-circle"></i> tambah kategori
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Gender</th>
                                <th>Gedung</th>
                                <th>Perpustakaan</th>
                                <th>Kegiatan</th>
                                <th>Buku & Media</th>
                                <th>Seragam</th>
                                <th>Jilbab</th>
                                <th>IPP</th>
                                <th>Total</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($costcats as $cost)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $cost->name }}</td>
                                    <td>{{ $cost->gender }}</td>
                                    <td>@currency($cost->gedung)</td>
                                    <td>@currency($cost->perpustakaan)</td>
                                    <td>@currency($cost->kegiatan)</td>
                                    <td>@currency($cost->bukumedia)</td>
                                    <td>@currency($cost->seragam)</td>
                                    <td>@currency($cost->jilbab)</td>
                                    <td>@currency($cost->ipp)</td>
                                    <td><strong>@currency($cost->total)</strong></td>
                                    <td>
                                        <a href="{{ route('costCategory.edit', $cost->id) }}"
                                            class="btn btn-sm btn-orange">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('costCategory.destroy', $cost->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Hapus kategori biaya ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="12" class="text-center text-muted">Belum ada kategori biaya</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TAB: Danger Zone -->
            <div class="tab-pane fade" id="danger" role="tabpanel">
                <div class="border border-danger rounded p-4">
                    <h6 class="text-danger"><i class="bi bi-exclamation-triangle"></i> Danger Zone</h6>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-0">Hapus semua data user kecuali admin. Tindakan ini tidak dapat dibatalkan.</p>
                        </div>
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                            data-bs-target="#deleteUser">
                            <i class="bi bi-trash3"></i> Hapus Data
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Hapus User -->
    <div class="modal fade" id="deleteUser" tabindex="-1" aria-labelledby="deleteUserLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteUserLabel"><i class="bi bi-exclamation-triangle"></i> Hapus Semua
                        Data User</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('user.delete.all') }}">
                    @csrf
                    <div class="modal-body">
                        <p class="fw-bold text-danger">Peringatan: Ini akan menghapus SEMUA data user kecuali admin!</p>
                        <p>Ketik <span class="fw-bold text-danger">"DELETE"</span> untuk melanjutkan:</p>
                        <input type="text" name="key" class="form-control" placeholder="Ketik DELETE" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3"></i> Hapus
                            Semua</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Toggle On/Off
        function toggleOnOff(checked) {
            const value = checked ? '1' : '0';
            const label = document.getElementById('onoffLabel');
            label.textContent = checked ? '🟢 Buka' : '🔴 Tutup';

            fetch('{{ route('setting.toggle-onoff') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        value: value
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Status website diperbarui!');
                    }
                });
        }

        // Save Inline Setting
        function saveInline(id, value, btnEl) {
            if (!id) return;

            const btn = btnEl;
            const input = btn.closest('tr').querySelector('input');
            const originalHtml = btn.innerHTML;

            // Konversi datetime-local format: 2026-09-14T00:00 → 2026-09-14 00:00:00
            if (value && value.includes('T')) {
                value = value.replace('T', ' ');
                // Tambah detik jika belum ada
                if (value.split(':').length === 2) {
                    value += ':00';
                }
            }

            // Show loading
            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
            btn.disabled = true;
            input.classList.add('border-warning');

            fetch('{{ route('setting.update-inline') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        id: id,
                        value: value
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Success feedback
                    btn.innerHTML = '<i class="bi bi-check-lg"></i> tersimpan';
                    btn.classList.remove('btn-orange');
                    btn.classList.add('btn-success');
                    input.classList.remove('border-warning');
                    input.classList.add('border-success', 'bg-success-subtle');

                    setTimeout(() => {
                        btn.innerHTML = originalHtml;
                        btn.classList.remove('btn-success');
                        btn.classList.add('btn-orange');
                        input.classList.remove('border-success', 'bg-success-subtle');
                        btn.disabled = false;
                    }, 2000);

                    if (data.success) {
                        showToast('Berhasil disimpan!');
                    }
                })
                .catch(error => {
                    // Error feedback
                    btn.innerHTML = '<i class="bi bi-x-lg"></i> gagal';
                    btn.classList.remove('btn-orange');
                    btn.classList.add('btn-danger');
                    input.classList.remove('border-warning');
                    input.classList.add('border-danger');

                    setTimeout(() => {
                        btn.innerHTML = originalHtml;
                        btn.classList.remove('btn-danger');
                        btn.classList.add('btn-orange');
                        input.classList.remove('border-danger');
                        btn.disabled = false;
                    }, 2000);
                });
        }

        // Toast notification
        function showToast(message) {
            const toast = document.createElement('div');
            toast.className = 'position-fixed top-0 end-0 p-3';
            toast.style.zIndex = '9999';
            toast.innerHTML = `
                <div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i><strong>Berhasil!</strong> ${message}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            `;
            document.body.appendChild(toast);
            setTimeout(() => toast.remove(), 3000);
        }

        // Save Timeline Inline
        function saveTimeline(id, btnEl) {
            const btn = btnEl;
            const originalHtml = btn.innerHTML;
            const fields = ['icon', 'name', 'date'];
            const data = { id: id };

            fields.forEach(field => {
                const input = document.getElementById(`timeline-${field}-${id}`);
                if (input) data[field] = input.value;
            });

            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
            btn.disabled = true;

            fetch('{{ route('timeline.update-inline') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    btn.innerHTML = '<i class="bi bi-check-lg"></i>';
                    btn.classList.remove('btn-orange');
                    btn.classList.add('btn-success');

                    setTimeout(() => {
                        btn.innerHTML = originalHtml;
                        btn.classList.remove('btn-success');
                        btn.classList.add('btn-orange');
                        btn.disabled = false;
                    }, 1500);

                    if (data.success) {
                        showToast('Jadwal diperbarui!');
                    }
                })
                .catch(() => {
                    btn.innerHTML = '<i class="bi bi-x-lg"></i>';
                    btn.classList.remove('btn-orange');
                    btn.classList.add('btn-danger');

                    setTimeout(() => {
                        btn.innerHTML = originalHtml;
                        btn.classList.remove('btn-danger');
                        btn.classList.add('btn-orange');
                        btn.disabled = false;
                    }, 1500);
                });
        }

        // Delete Timeline
        function deleteTimeline(id, btnEl) {
            if (!confirm('Hapus jadwal ini?')) return;

            const btn = btnEl;
            const originalHtml = btn.innerHTML;

            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
            btn.disabled = true;

            fetch('{{ route('timeline.delete') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        btn.closest('tr').remove();
                        showToast('Jadwal dihapus!');
                    }
                });
        }

        // Add Timeline
        function addTimeline(btnEl) {
            const icon = document.getElementById('new-timeline-icon').value;
            const name = document.getElementById('new-timeline-name').value;
            const date = document.getElementById('new-timeline-date').value;

            if (!icon || !name || !date) {
                alert('Semua field harus diisi!');
                return;
            }

            const btn = btnEl;
            const originalHtml = btn.innerHTML;

            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
            btn.disabled = true;

            fetch('{{ route('timeline.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ icon, name, date })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Jadwal ditambahkan!');
                        location.reload();
                    }
                });
        }

        // Save Contact Inline
        function saveContact(id, btnEl) {
            const btn = btnEl;
            const originalHtml = btn.innerHTML;
            const data = {
                id: id,
                name: document.getElementById(`contact-name-${id}`).value,
                desc: document.getElementById(`contact-desc-${id}`).value,
                value: document.getElementById(`contact-value-${id}`).value
            };

            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
            btn.disabled = true;

            fetch('{{ route('setting.contact.update-inline') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    btn.innerHTML = '<i class="bi bi-check-lg"></i>';
                    btn.classList.remove('btn-orange');
                    btn.classList.add('btn-success');
                    setTimeout(() => {
                        btn.innerHTML = originalHtml;
                        btn.classList.remove('btn-success');
                        btn.classList.add('btn-orange');
                        btn.disabled = false;
                    }, 1500);
                    if (data.success) showToast('Kontak diperbarui!');
                })
                .catch(() => {
                    btn.innerHTML = '<i class="bi bi-x-lg"></i>';
                    btn.classList.remove('btn-orange');
                    btn.classList.add('btn-danger');
                    setTimeout(() => {
                        btn.innerHTML = originalHtml;
                        btn.classList.remove('btn-danger');
                        btn.classList.add('btn-orange');
                        btn.disabled = false;
                    }, 1500);
                });
        }

        // Delete Contact
        function deleteContact(id, btnEl) {
            if (!confirm('Hapus kontak ini?')) return;
            const btn = btnEl;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
            btn.disabled = true;

            fetch('{{ route('setting.contact.delete') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        btn.closest('tr').remove();
                        showToast('Kontak dihapus!');
                    }
                });
        }

        // Add Contact
        function addContact(btnEl) {
            const name = document.getElementById('new-contact-name').value;
            const desc = document.getElementById('new-contact-desc').value;
            const value = document.getElementById('new-contact-value').value;
            if (!name) { alert('Nama harus diisi!'); return; }

            const btn = btnEl;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
            btn.disabled = true;

            fetch('{{ route('setting.contact.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ name, desc, value })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Kontak ditambahkan!');
                        location.reload();
                    }
                });
        }

        // Save Pelayanan Inline
        function savePelayanan(id, btnEl) {
            const btn = btnEl;
            const originalHtml = btn.innerHTML;
            const data = {
                id: id,
                name: document.getElementById(`pelayanan-name-${id}`).value,
                desc: document.getElementById(`pelayanan-desc-${id}`).value,
                value: document.getElementById(`pelayanan-value-${id}`).value
            };

            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
            btn.disabled = true;

            fetch('{{ route('setting.pelayanan.update-inline') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify(data)
                })
                .then(response => response.json())
                .then(data => {
                    btn.innerHTML = '<i class="bi bi-check-lg"></i>';
                    btn.classList.remove('btn-orange');
                    btn.classList.add('btn-success');
                    setTimeout(() => {
                        btn.innerHTML = originalHtml;
                        btn.classList.remove('btn-success');
                        btn.classList.add('btn-orange');
                        btn.disabled = false;
                    }, 1500);
                    if (data.success) showToast('Pelayanan diperbarui!');
                })
                .catch(() => {
                    btn.innerHTML = '<i class="bi bi-x-lg"></i>';
                    btn.classList.remove('btn-orange');
                    btn.classList.add('btn-danger');
                    setTimeout(() => {
                        btn.innerHTML = originalHtml;
                        btn.classList.remove('btn-danger');
                        btn.classList.add('btn-orange');
                        btn.disabled = false;
                    }, 1500);
                });
        }

        // Delete Pelayanan
        function deletePelayanan(id, btnEl) {
            if (!confirm('Hapus pelayanan ini?')) return;
            const btn = btnEl;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
            btn.disabled = true;

            fetch('{{ route('setting.pelayanan.delete') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ id: id })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        btn.closest('tr').remove();
                        showToast('Pelayanan dihapus!');
                    }
                });
        }

        // Add Pelayanan
        function addPelayanan(btnEl) {
            const name = document.getElementById('new-pelayanan-name').value;
            const desc = document.getElementById('new-pelayanan-desc').value;
            const value = document.getElementById('new-pelayanan-value').value;
            if (!name) { alert('Kegiatan harus diisi!'); return; }

            const btn = btnEl;
            btn.innerHTML = '<span class="spinner-border spinner-border-sm"></span>';
            btn.disabled = true;

            fetch('{{ route('setting.pelayanan.add') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({ name, desc, value })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Pelayanan ditambahkan!');
                        location.reload();
                    }
                });
        }

        // Enter key to save - all tabs
        document.querySelectorAll('.tab-pane input[type="text"], .tab-pane input[type="datetime-local"]').forEach(input => {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    const btn = this.closest('tr').querySelector('button');
                    if (btn) btn.click();
                }
            });
        });
    </script>
@endpush

@push('css')
    <style>
        .nav-tabs .nav-link {
            font-weight: 500;
            font-size: 14px;
        }

        .nav-tabs .nav-link.active {
            font-weight: 600;
        }

        .form-check-input:checked {
            background-color: #198754;
            border-color: #198754;
        }
    </style>
@endpush
