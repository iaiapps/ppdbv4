@extends('layouts.landing')
@section('title', 'Landing Page')

@section('content')
    @include('landing.header')
    <!-- Hero Section -->
    <section id="hero" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="text-center">
                    <img src="{{ asset('img/logoutama.svg') }}" class="logosdit" alt="logo">
                </div>
                <div class="item animate__animated animate__fadeInUp">
                    <span class="fs-2 text mb-1"> Sekolah Dasar Islam Terpadu Harapan Umat Jember</span>
                    <span class="fs-3 mb-0 text2 text-dark">Sekolah Kaya Warna Mencetak Generasi Qurani</span>
                </div>

                <h1 class="animate__animated animate__fadeInDown mb-4">
                    Mengantarkan Ananda menjadi Generasi Shalih, Cerdas, Mandiri, Kreatif dan Tangguh, dalam
                    menghadapi Tantangan Global
                </h1>

                <div class="cta-buttons animate__animated animate__zoomIn animate__fadeInDown pb-5">
                    <a href="{{ url('register') }}" class="btn btn-orange btn-lg text-white">
                        Daftar Sekarang
                    </a>
                    <a href="https://wa.me/6285232213939" class="btn btn-success btn-lg" target="_blank">
                        Tanya Admin
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Login -->
    <section>
        <div class="text-center bg-dark p-4 p-md-5 text-white top">
            <p class="fs-2 mt-3">Sudah punya akun ? <br> Login web <a class="btn btn-lg btn-orange text-white"
                    href="{{ route('login') }}">DISINI</a></p>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="section bg-gray-50">
        <div class="container">
            <div class="section-title">
                <h2>Mengapa Memilih <span class="highlight">SDIT Harapan Umat Jember?</span></h2>
                <p>Kami berkomitmen memberikan pendidikan terbaik dengan fasilitas lengkap dan metode pembelajaran yang
                    inovatif</p>
            </div>

            <div class="row gy-4">
                <div class="col-12 col-md-4">
                    <div class="feature-card" data-aos="fade-up">
                        <div class="feature-icon">
                            <i class="bi bi-book-fill"></i>
                        </div>
                        <h3>Kurikulum Terpadu</h3>
                        <p>Menerapkan Kurikulum Nasional dan Kurikulum Kekhasan JSIT Indonesia. Disertai dengan program
                            keislaman
                            dan karakter serta keterampilan yang dibutuhkan dalam
                            abad 21.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="feature-card" data-aos="fade-up">
                        <div class="feature-icon">
                            <i class="bi bi-heart-fill"></i>
                        </div>
                        <h3>Program Unggulan</h3>
                        <p>Terdapat Kelas Minat dan Bakat, Kelas Qur'an, Kelas Sains. Program Literasi dan Bilingual. BTAQ
                            dengan Metode Otak
                            Kanan (WAFA). Parenting berkala untuk Orang Tua.</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="feature-card" data-aos="fade-up">
                        <div class="feature-icon">
                            <i class="bi bi-trophy-fill"></i>
                        </div>
                        <h3>Ekstrakurikuler dan Pembinaan</h3>
                        <p>Esktrakurikuler wajib siswa adalah Pramuka SIT. Serta berbagai pilihan Ekstrakurikuler lain yang
                            beragam. Terdapat juga Pembinaan siswa untuk Olimpiade dan Lomba-lomba. </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="feature-card" data-aos="fade-up">
                        <div class="feature-icon">
                            <i class="bi bi-people-fill"></i>
                        </div>
                        <h3>Guru Proporsional </h3>
                        <p>Rasio guru dan siswa yang ideal, memungkinkan pendekatan pembelajaran yang lebih personal dan
                            efektif. Serta terciptanya suasana belajar yang nyaman dan kondusif.
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="feature-card" data-aos="fade-up">
                        <div class="feature-icon">
                            <i class="bi bi-globe"></i>
                        </div>
                        <h3>Fasilitas Lengkap</h3>
                        <p>Ruang kelas represntatif, laboratorium terpadu, perpustakaan, Toilet bersih, Masjid 2 lantai,
                            Ruang hijau terbuka, Kantin sehat, Ruang UKS, Koperasi siswa, Lapangan olahraga</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="feature-card" data-aos="fade-up">
                        <div class="feature-icon">
                            <i class="bi bi-lightbulb-fill"></i>
                        </div>
                        <h3>Pembelajaran Inovatif</h3>
                        <p>Menerapkan metode pembelajaran aktif, dan menyenangkan yang sesuai dengan perkembangan
                            zaman. Sehingga tercipta pengalaman belajar yang bermakna.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Registration Section -->
    <section id="registration" class="section bg-orange-50">
        <div class="container">
            <!-- Tata Cara Pendaftaran -->
            <div class="section-title">
                <h2>Tata Cara <span class="highlight">Pendaftaran</span></h2>
                <p>Ikuti langkah-langkah mudah berikut untuk mendaftarkan putra/putri Anda</p>
            </div>

            <div class="row gy-4">
                <div class="col-12 col-md-4">
                    <div class="step-card">
                        <div class="step-number">1</div>
                        <h3 class="mb-3">Membuat Akun</h3>
                        <p class="fs-5"> Calon siswa membuat akun di website SPMB SDIT Harum Jember dengan alamat <a
                                href="https://spmb.sditharum.id/">https://spmb.sditharum.id/</a></p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="step-card">
                        <div class="step-number">2</div>
                        <h3 class="mb-3">Biaya Pendaftaran</h3>
                        <p class="fs-5">
                            Membayar biaya pendaftaran sebesar :
                            <span class="bg-orange text-white px-1 rounded fw-bold badge">Rp 350.000</span>
                            ke rekening <span class="bg-orange text-white px-1 rounded fw-bold badge">BSI 2005720055</span>
                            a.n.
                            SDIT HARAPAN UMAT
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="step-card">
                        <div class="step-number">3</div>
                        <h3 class="mb-3">Bukti Pembayaran</h3>
                        <p class="fs-5">
                            Upload bukti pembayaran di <a href="https://spmb.sditharum.id/">https://spmb.sditharum.id/</a>
                            dan
                            tunggu konfirmasi admin (maks 1 x 24 jam).
                        </p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="step-card">
                        <div class="step-number">4</div>
                        <h3 class="mb-3">Isi Formulir Online</h3>
                        <p class="fs-5">Lengkapi formulir pendaftaran online di web dan upload foto terbaru</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="step-card">
                        <div class="step-number">5</div>
                        <h3 class="mb-3">Psikotes & Observasi</h3>
                        <p class="fs-5">Mengikuti Psikotes dan Observasi sesuai jadwal yang telah ditentukan</p>
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <div class="step-card">
                        <div class="step-number">6</div>
                        <h3 class="mb-3">Pengumuman</h3>
                        <p class="fs-5">Menunggu pengumuman penerimaan ananda sesuai jadwal yang telah ditentukan</p>
                    </div>
                </div>
            </div>
            <!-- Jadwal Pendaftaran -->
            <div id="schedule">
                <div class="section-title">
                    <h2>Jadwal <span class="highlight">Pendaftaran</span></h2>
                    <p>Jangan sampai terlewat, berikut ini rangkaian jadwal SPMB SDIT Harapan Umat Jember</p>

                </div>

                <div class="schedule-card">
                    <div class="schedule-header green">
                        <h3 class="mb-0">{{ $schedule->desc }}</h3>
                        <div class="px-3 py-2 fw-bold fs-5 rounded-pill d-inline-block mt-3 mb-0"
                            style="background: rgba(255, 255, 255, 0.331);">
                            {{ $schedule->value }}
                        </div>
                    </div>
                    <div class="schedule-content">
                        <div class="row">
                            @foreach ($timelines->chunk(ceil($timelines->count() / 2)) as $col)
                                <div class="col-md-6 col-12">
                                    @foreach ($col as $timeline)
                                        <div class="schedule-item">
                                            {!! $timeline->icon !!}
                                            <div>
                                                <h4 class="fw-bold mb-1">{{ $timeline->name }}</h4>
                                                <p class="fs-5 text-muted">{{ $timeline->date }}</p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>

                        <div class="p-3 rounded text-center mt-2"
                            style="background: #dcfce7; border: 2px solid #16a34a; ">
                            <p class="mb-0" style="color: #15803d; font-size:1.1rem">{{ $early->desc }}
                                {{ $early->value }} </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="section">
        <div class="container">
            <div class="section-title">
                <h2>Hubungi <span class="highlight">Kami</span></h2>
                <p>Jangan tunggu lagi! Berikan pendidikan terbaik untuk buah hati Anda bersama kami</p>
            </div>

            <div style="margin-bottom: 3rem;">
                <h3 class="text-center fs-4 mb-4">
                    <i class="fas fa-user text-orange me-3"></i>
                    Kontak Person
                </h3>
                <div class="row">
                    @foreach ($contacts as $contact)
                        <div class="col-md-6 col-12 mb-3">
                            <div class="bg-radiant">
                                <div class="d-flex mb-3">
                                    <span class="rounded me-3 bg-radiant2 text-white fs-4">
                                        <i class="fa-regular fa-circle-user"></i>
                                    </span>
                                    <div>
                                        <h5 class="fw-bold mb-1">{{ $contact->name }}</h5>
                                        <p class="fw-bold mb-0 text-muted fs-5">{{ $contact->desc }}</p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="rounded me-3 bg-radiant2 text-white fs-4">
                                        <i class="fab fa-whatsapp"></i>
                                    </div>
                                    <div>
                                        @php
                                            $phone = ltrim($contact->value, '0'); // buang 0 di depan
                                        @endphp
                                        <h5 class="fw-bold">
                                            <a href="https://wa.me/62{{ $phone }}" target="_blank">WhatsApp: <br>
                                                {{ $contact->value }}</a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Service Hours -->
            <div class="bg-radiant">
                <h3 class="text-center fs-4 mb-4">
                    <i class="fas fa-clock fs-4 text-orange me-3"></i>
                    Jam Pelayanan
                </h3>
                <div class="service">
                    @foreach ($pelayanans as $pelayanan)
                        <div class="service-card">
                            <h4 class="fs-4 fw-bold">{{ $pelayanan->desc }}</h4>
                            <p
                                class="fw-bold fs-5 mb-2 {{ $pelayanan->value === 'Tutup' ? 'text-danger' : 'text-orange' }}">
                                {{ $pelayanan->value }}</p>
                            <p class="text-muted">{{ $pelayanan->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    @include('landing.floating')
    @include('landing.footer')
@endsection

@push('scripts')
    <script script>
        // Smooth scrolling hanya untuk link dengan target yang valid
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                const href = this.getAttribute('href');
                if (href && href.length > 1) { // bukan hanya "#"
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                }
            });
        });

        // Ambil navbar berdasarkan ID
        var myNav = document.getElementById("nav");
        window.addEventListener('scroll', function() {
            if (document.body.scrollTop >= 55 || document.documentElement.scrollTop >= 55) {
                myNav.classList.add("change_nav");
            } else {
                myNav.classList.remove("change_nav");
            }
        });

        // Intersection Observer untuk animasi card
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe semua card yang ada
        document.querySelectorAll('.feature-card, .program-card, .step-card, .schedule-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
@endpush
