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
                <button class="nav-link active" id="website-tab" data-bs-toggle="tab" data-bs-target="#website"
                    type="button" role="tab">
                    Website
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="jadwal-tab" data-bs-toggle="tab" data-bs-target="#jadwal" type="button"
                    role="tab">
                    Jadwal
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="kontak-tab" data-bs-toggle="tab" data-bs-target="#kontak" type="button"
                    role="tab">
                    Kontak
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="biaya-tab" data-bs-toggle="tab" data-bs-target="#biaya" type="button"
                    role="tab">
                    Biaya
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-danger" id="danger-tab" data-bs-toggle="tab" data-bs-target="#danger"
                    type="button" role="tab">
                    Danger
                </button>
            </li>
        </ul>

        <!-- Tabs Content -->
        <div class="tab-content" id="settingsTabContent">

            <!-- TAB: Website -->
            <div class="tab-pane fade show active" id="website" role="tabpanel">
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
                                    <br><small class="text-muted">Pesan header</small>
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
                            <!-- Countdown Heading -->
                            <tr>
                                <td>
                                    Judul Countdown
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
                                    Tanggal Countdown
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
                            <!-- Jadwal -->
                            <tr>
                                <td>
                                    Jadwal
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
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- TAB: Jadwal (Timeline) -->
            <div class="tab-pane fade" id="jadwal" role="tabpanel">
                <a href="{{ route('timeline.create') }}" class="btn btn-primary btn-sm mb-3">
                    <i class="bi bi-plus-circle"></i> tambah jadwal
                </a>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th width="100">Icon</th>
                                <th>Nama</th>
                                <th>Tanggal</th>
                                <th width="150">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($timelines as $time)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><i class="{{ $time->icon }}"></i></td>
                                    <td>{{ $time->name }}</td>
                                    <td>{{ $time->date }}</td>
                                    <td>
                                        <a href="{{ route('timeline.edit', $time->id) }}" class="btn btn-sm btn-orange">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <form action="{{ route('timeline.destroy', $time->id) }}" method="POST"
                                            class="d-inline" onsubmit="return confirm('Hapus jadwal ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger"><i class="bi bi-trash3"></i></button>
                                        </form>
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
                                <th width="120">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($contacts as $contact)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->desc }}</td>
                                    <td>{{ $contact->value }}</td>
                                    <td>
                                        <a href="{{ route('setting.contact.edit', ['id' => $contact->id]) }}"
                                            class="btn btn-sm btn-orange">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
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

                <p class="fs-6 fw-bold">Jam Pelayanan</p>
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead>
                            <tr>
                                <th width="50">#</th>
                                <th>Kegiatan</th>
                                <th>Hari</th>
                                <th>Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pelayanans as $pelayanan)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pelayanan->name }}</td>
                                    <td>{{ $pelayanan->desc }}</td>
                                    <td>
                                        <span
                                            class="badge {{ $pelayanan->value === 'Tutup' ? 'bg-danger' : 'bg-success' }}">
                                            {{ $pelayanan->value }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada jadwal pelayanan</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
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
                value = value.replace('T', ' ') + ':00';
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

        // Enter key to save
        document.querySelectorAll('#website input[type="text"], #website input[type="datetime-local"]').forEach(input => {
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    const btn = this.closest('tr').querySelector('button');
                    btn.click();
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

        #table {
            font-size: 14px;
        }
    </style>
@endpush
