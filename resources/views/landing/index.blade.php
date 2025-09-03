@extends('layouts.landing')
@section('title', 'Landing Page')

@section('content')
    @include('landing.header')

    <!-- Hero Section -->
    <section id="hero" class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="text-center mb-5">
                    <img src="{{ asset('img/logosdit.png') }}" class="logosdit" alt="logo">
                </div>
                <div class="item animate__animated animate__fadeInUp">
                    <span class="fs-2 text mb-1"> Sekolah Dasar Islam Terpadu Harapan Umat Jember</span>
                    <span class="fs-3 mb-0 text2 text-dark">Sekolah Kaya Warna Mencetak Generasi Qurani</span>
                </div>

                <h1 class="animate__animated animate__fadeInDown mb-4">
                    Mengantarkan Ananda menjadi Generasi Shalih, Cerdas, Mandiri, Kreatif dan Tangguh, dalam
                    menghadapi Tantangan Global<br>

                </h1>

                <div class="cta-buttons animate__animated animate__zoomIn animate__fadeInDown pb-5">
                    <a href="{{ url('register') }}" class="btn btn-orange btn-lg">
                        Daftar Sekarang
                    </a>
                    <a href="#features" class="btn btn-success btn-lg">
                        Tanya Admin
                    </a>
                </div>

            </div>
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

            <div class="features-grid">
                <div class="feature-card" data-aos="fade-up">
                    <div class="feature-icon">
                        <i class="fas fa-book-open"></i>
                    </div>
                    <h3>Kurikulum Terpadu</h3>
                    <p>Menerapkan Kurikulum Nasional dan Kurikulum Kekhasan JSIT Indonesia. Disertai dengan program
                        keislaman
                        dan karakter serta keterampilan yang dibutuhkan dalam
                        abad 21.</p>
                </div>

                <div class="feature-card" data-aos="fade-up">
                    <div class="feature-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>Program Unggulan</h3>
                    <p>Terdapat Kelas Minat dan Bakat, Kelas Qur'an, Kelas Sains. Program Literasi dan Bilingual. BTAQ
                        dengan Metode Otak
                        Kanan (WAFA). Parenting berkala untuk Orang Tua.</p>
                </div>

                <div class="feature-card" data-aos="fade-up">
                    <div class="feature-icon">
                        <i class="fas fa-trophy"></i>
                    </div>
                    <h3>Ekstrakurikuler dan Pembinaan</h3>
                    <p>Esktrakurikuler wajib siswa adalah Pramuka SIT. Serta berbagai pilihan Ekstrakurikuler lain yang
                        beragam. Terdapat juga Pembinaan siswa untuk Olimpiade dan Lomba-lomba. </p>
                </div>

                <div class="feature-card" data-aos="fade-up">
                    <div class="feature-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Guru Proporsional </h3>
                    <p>Rasio guru dan siswa yang ideal memungkinkan pendekatan pembelajaran yang lebih personal dan efektif.
                    </p>
                </div>

                <div class="feature-card" data-aos="fade-up">
                    <div class="feature-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3>Fasilitas Lengkap</h3>
                    <p>Ruang kelas represntatif, laboratorium terpadu, perpustakaan, Toilet bersih, Masjid 2 lantai, Ruang
                        hijau terbuka, Kantin sehat, Ruang UKS, Koperasi siswa, Lapangan olahraga</p>
                </div>

                <div class="feature-card" data-aos="fade-up">
                    <div class="feature-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Pembelajaran Inovatif</h3>
                    <p>Menerapkan metode pembelajaran aktif, kreatif, dan menyenangkan yang sesuai dengan perkembangan
                        zaman.</p>
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

            <div class="registration-steps">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3 class="mb-3">Membuat Akun</h3>
                    <p class="fs-5"> membuat akun SPMB di <a
                            href="https://spmb.sditharum.id/">https://spmb.sditharum.id/</a></p>
                </div>

                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3 class="mb-3">Biaya Pendaftaran</h3>
                    <p class="fs-5">
                        Membayar biaya pendaftaran sebesar :
                        <span class="bg-orange text-white px-1 rounded fw-bold badge">Rp 300.000</span>
                        ke rekening <span class="bg-orange text-white px-1 rounded fw-bold badge">BSI 2005720055</span> a.n.
                        SDIT HARAPAN UMAT
                    </p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3 class="mb-3">Bukti Pembayaran</h3>
                    <p class="fs-5">
                        Upload bukti pembayaran di <a href="https://spmb.sditharum.id/">https://spmb.sditharum.id/</a> dan
                        tunggu konfirmasi admin (maks 1 x 24 jam).
                    </p>
                </div>

                <div class="step-card">
                    <div class="step-number">4</div>
                    <h3 class="mb-3">Isi Formulir Online</h3>
                    <p class="fs-5">Lengkapi formulir pendaftaran online di website kami dengan data yang akurat</p>
                </div>

                <div class="step-card">
                    <div class="step-number">5</div>
                    <h3 class="mb-3">Psikotes & Observasi</h3>
                    <p class="fs-5">Mengikuti Psikotes dan Observasi sesuai jadwal yang telah ditentukan</p>
                </div>
                <div class="step-card">
                    <div class="step-number">5</div>
                    <h3 class="mb-3">Pengumuman</h3>
                    <p class="fs-5">Menunggu pengumuman penerimaan ananda sesuai jadwal yang telah ditentukan</p>
                </div>
            </div>

            <!-- Jadwal Pendaftaran -->
            <div class="section-title" style="margin-top: 4rem;">
                <h2>Jadwal <span class="highlight">Pendaftaran</span></h2>
            </div>

            <div class="schedule-grid">
                <div class="schedule-card">
                    <div class="schedule-header green">
                        <h3 class="mb-0">Pendaftaran SPMB SDIT Harapan Umat Jember</h3>
                        <div class="px-3 py-2 fw-bold fs-5 rounded-pill d-inline-block mt-3 mb-0"
                            style="background: rgba(255, 255, 255, 0.331);">
                            Tahun Ajaran 2026/2027
                        </div>
                    </div>
                    <div class="schedule-content">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="schedule-item">
                                    <i class="fas fa-clock fs-4"></i>
                                    <div>
                                        <h3 style="font-weight: bold; margin-bottom: 4px;">Pendaftaran</h3>
                                        <p class="fs-5" style="color: #6b7280;">15 September 2025 - 31 Oktober
                                            2025</p>
                                    </div>
                                </div>
                                <div class="schedule-item">
                                    <i class="fas fa-clock fs-4"></i>
                                    <div>
                                        <h3 style="font-weight: bold; margin-bottom: 4px;">Observasi dan Psikotes</h3>
                                        <p class="fs-5" style="color: #6b7280;">8 November 2025</p>
                                    </div>
                                </div>
                                <div class="schedule-item">
                                    <i class="fas fa-clock fs-4"></i>
                                    <div>
                                        <h3 style="font-weight: bold; margin-bottom: 4px;">Pengumuman</h3>
                                        <p class="fs-5" style="color: #6b7280;">1 Desember 2025</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="schedule-item">
                                    <i class="fas fa-clock fs-4"></i>
                                    <div>
                                        <h3 style="font-weight: bold; margin-bottom: 4px;">Daftar Ulang</h3>
                                        <p class="fs-5" style="color: #6b7280;">1 - 10 Desember 2025</p>
                                    </div>
                                </div>
                                <div class="schedule-item">
                                    <i class="fas fa-clock fs-4"></i>
                                    <div>
                                        <h4 style="font-weight: bold; margin-bottom: 4px;">Test BTAQ dan Fitting Seragam
                                        </h4>
                                        <p class="fs-5" style="color: #6b7280;">9 Mei 2026</p>
                                    </div>
                                </div>
                                <div class="schedule-item">
                                    <i class="fas fa-clock fs-4"></i>
                                    <div>
                                        <h4 style="font-weight: bold; margin-bottom: 4px;">Pengambilan seragam</h4>
                                        <p class="fs-5" style="color: #6b7280;">6 Juli 2026</p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="p-3 rounded text-center mt-3"
                            style="background: #dcfce7; border: 2px solid #16a34a; ">
                            <p class="mb-0" style="color: #15803d; ">🎉 Eearly bird, Diskon uang gedung 10% (15-25
                                september 2025)
                            </p>
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
                <h3 style="text-align: center; font-size: 1.5rem; margin-bottom: 2rem; color: #1f2937;">
                    <i class="fas fa-user" style="color: #f97316; margin-right: 8px;"></i>
                    Kontak Person
                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(400px, 1fr)); gap: 2rem;">
                    <div
                        style="background: linear-gradient(135deg, #fef3c7, #fce7f3); padding: 2rem; border-radius: 20px; border: 1px solid #fed7aa;">
                        <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                            <div class="p-3 rounded me-3" style="background: linear-gradient(135deg, #f97316, #ec4899); ">
                                <i class="fas fa-user" style="color: white; font-size: 1.2rem;"></i>
                            </div>
                            <div>
                                <h5 style="font-weight: bold; margin-bottom: 4px;">Pak Ristiono (Koordinator SPMB)</h5>
                            </div>
                        </div>
                        <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                            <div class="p-3 rounded me-3" style="background: linear-gradient(135deg, #f97316, #ec4899); ">
                                <i class="fab
                            fa-whatsapp"
                                    style="color: white; font-size: 1.2rem;"></i>
                            </div>
                            <h5 style="font-weight: bold; margin-bottom: 4px;">WhatsApp: 088289378109</h5>
                        </div>
                    </div>

                    <div
                        style="background: linear-gradient(135deg, #fef3c7, #fce7f3); padding: 2rem; border-radius: 20px; border: 1px solid #fed7aa;">
                        <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                            <div class="p-3 rounded me-3" style="background: linear-gradient(135deg, #f97316, #ec4899); ">
                                <i class="fas fa-user" style="color: white; font-size: 1.2rem;"></i>
                            </div>
                            <div>
                                <h5 style="font-weight: bold; margin-bottom: 4px;">Pak Ikrom (Admin Web SPMB)</h5>

                            </div>
                        </div>
                        <div style="display: flex; align-items: center; margin-bottom: 1rem;">
                            <div class="p-3 rounded me-3" style="background: linear-gradient(135deg, #f97316, #ec4899); ">
                                <i class="fab
                            fa-whatsapp"
                                    style="color: white; font-size: 1.2rem;"></i>
                            </div>
                            <h5 style="font-weight: bold; margin-bottom: 4px;">WhatsApp: 085232213939</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Service Hours -->
            <div style="background: linear-gradient(135deg, #fef3c7, #fce7f3); padding: 2rem; border-radius: 20px;">
                <h3
                    style="text-align: center; font-size: 1.5rem; margin-bottom: 2rem; color: #1f2937; display: flex; align-items: center; justify-content: center;">
                    <i class="fas fa-clock fs-4" style="color: #f97316; margin-right: 8px;"></i>
                    Jam Pelayanan
                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem;">
                    <div
                        style="background: white; padding: 2rem; border-radius: 15px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <h4 style="font-weight: bold; margin-bottom: 8px;">Senin - Jumat</h4>
                        <p style="font-size: 1.1rem; font-weight: bold; color: #f97316; margin-bottom: 4px;">07:00 - 15:00
                            WIB</p>
                        <p style="color: #6b7280; font-size: 14px;">Jam Sekolah</p>
                    </div>
                    <div
                        style="background: white; padding: 2rem; border-radius: 15px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <h4 style="font-weight: bold; margin-bottom: 8px;">Sabtu</h4>
                        <p style="font-size: 1.1rem; font-weight: bold; color: #f97316; margin-bottom: 4px;">08:00 - 12:00
                            WIB</p>
                        <p style="color: #6b7280; font-size: 14px;">Konsultasi & Pendaftaran</p>
                    </div>
                    <div
                        style="background: white; padding: 2rem; border-radius: 15px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                        <h4 style="font-weight: bold; margin-bottom: 8px;">Minggu</h4>
                        <p style="font-size: 1.1rem; font-weight: bold; color: #ef4444; margin-bottom: 4px;">Tutup</p>
                        <p style="color: #6b7280; font-size: 14px;">Libur</p>
                    </div>
                </div>
                <div style="margin-top: 1.5rem; text-align: center;">
                    <p style="color: #6b7280; font-size: 14px;">
                        💡 <strong>Tip:</strong> Untuk konsultasi di luar jam kerja, silakan hubungi WhatsApp kontak person
                        kami
                    </p>
                </div>
            </div>
        </div>
    </section>
    @include('landing.footer')


@endsection

@push('css')
    <style>
        .btn-lg {
            font-size: 1.5rem
        }

        @media (max-width: 600px) {
            .btn-lg {
                font-size: 1.15rem
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Smooth scrolling for navigation links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to header
        window.addEventListener('scroll', function() {
            const header = document.querySelector('.header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(31, 41, 55, 0.95)';
                header.style.backdropFilter = 'blur(10px)';
            } else {
                header.style.background = 'linear-gradient(135deg, #f97316, #ec4899)';
                header.style.backdropFilter = 'none';
            }
        });

        // Animate cards on scroll
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

        // Observe all cards
        document.querySelectorAll('.feature-card, .program-card, .step-card, .schedule-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            observer.observe(card);
        });
    </script>
@endpush
