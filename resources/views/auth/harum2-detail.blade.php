@extends('layouts.landing')

@section('title', 'HARAPAN UMAT - Nature Bilingual School')

@section('content')
    @include('landing.up')

    {{-- Hero Section with Parallax --}}
    <section class="harum2-hero position-relative">
        <div class="hero-overlay"></div>
        <div class="hero-pattern"></div>
        <div class="container position-relative py-5">
            <div class="row align-items-center min-vh-50">
                <div class="col-lg-7" data-aos="fade-right" data-aos-duration="1000">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <img src="{{ asset('img/harum2.jpg') }}" alt="Logo Harum 2" class="harum2-logo rounded shadow-lg">
                    </div>
                    <h1 class="display-5 fw-bold text-white mb-1 hero-title">
                        HARAPAN UMAT
                    </h1>
                    <h2 class="h3 text-white mb-4 fw-normal">
                        Nature Bilingual School
                    </h2>
                    <p class="text-white-50 mb-4">
                        <i class="bi bi-geo-alt-fill me-1 text-warning"></i>
                        Jl. Parang Tritis Rt 01, Rw 07 Lingkungan Pelinggian Antirogo Jember
                    </p>
                    <div class="hero-quote">
                        <blockquote class="blockquote">
                            <p class="fst-italic text-white mb-2">
                                "Growing with Nature Blessing the World"
                            </p>
                        </blockquote>
                    </div>
                    <div class="d-flex gap-3 mt-4">
                        <a href="{{ route('branch.select') }}" class="btn btn-light btn-lg px-4 shadow">
                            <i class="bi bi-arrow-left me-1"></i> Choose Another Branch
                        </a>
                        <a href="#vision" class="btn btn-outline-light btn-lg px-4">
                            <i class="bi bi-arrow-down me-1"></i> Explore
                        </a>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                    <div class="hero-image-wrapper">
                        <img src="{{ asset('img/building.jpg') }}" alt="Gedung Harum 2"
                            class="hero-building rounded-4 shadow-lg">
                        <div class="hero-image-badge">
                            <div class="bg-white rounded-3 p-3 shadow-lg text-center">
                                <div class="h3 fw-bold text-brand mb-0">2027/2028</div>
                                <small class="text-muted">SPMB Open</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="hero-wave">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 120L48 105C96 90 192 60 288 45C384 30 480 30 576 37.5C672 45 768 60 864 67.5C960 75 1056 75 1152 67.5C1248 60 1344 45 1392 37.5L1440 30V120H1392C1344 120 1248 120 1152 120C1056 120 960 120 864 120C768 120 672 120 576 120C480 120 384 120 288 120C192 120 96 120 48 120H0Z"
                    fill="#f0ead6" />
            </svg>
        </div>
    </section>

    {{-- Vision Section --}}
    <section id="vision" class="vision-section py-5 position-relative overflow-hidden">
        <div class="vision-bg-pattern"></div>
        <div class="container py-4 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8" data-aos="fade-up" data-aos-duration="1000">
                    <div class="vision-card text-center p-5 rounded-4">

                        <h2 class="vision-heading mb-3">
                            "Cultivating self-leadership and ecological awareness to shape the future and civilization."
                        </h2>
                        <div class="vision-divider"></div>
                        <p class="vision-label mt-3 mb-0">School Vision</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Programs Section --}}
    <section class="programs-section py-5 position-relative">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="800">
                <span class="section-tag">What We Offer</span>
                <h3 class="fw-bold">Flagship Programs</h3>
                <p class="text-muted">Our signature programs that set us apart</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="0">
                    <div class="program-card-lg h-100 text-center p-4 rounded-4">
                        <div class="program-card-icon mx-auto mb-3">
                            <i class="bi bi-book-half"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Tahfidz & Tahsin Quran</h5>
                        <p class="text-muted mb-3">Juz 30: Required | Juz 29: Optional. And get a tahsin certification</p>
                        <div class="program-card-tag">Wafa/IWR</div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="100">
                    <div class="program-card-lg h-100 text-center p-4 rounded-4">
                        <div class="program-card-icon mx-auto mb-3">
                            <i class="bi bi-check2-circle"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Nature Learning </h5>
                        <p class="text-muted mb-3">Turning the environment into a living classroom for hands-on exploration
                            and sustainability</p>
                        <div class="program-card-tag">JSAN</div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-duration="600" data-aos-delay="200">
                    <div class="program-card-lg h-100 text-center p-4 rounded-4">
                        <div class="program-card-icon mx-auto mb-3">
                            <i class="bi bi-globe2"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Bilingual Program</h5>
                        <p class="text-muted mb-3">Speaking English confidently & understanding basic Arabic texts</p>
                        <div class="program-card-tag">Pearson GSE Partner</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Excellence Section --}}
    <section class="bg-white py-5 position-relative">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="800">
                <span class="section-tag">Why Choose Us</span>
                <h3 class="fw-bold">School Excellence</h3>
                <p class="text-muted">Five pillars that shape our students</p>
            </div>
            <div class="row g-4 align-items-stretch justify-content-center">
                @php
                    $excellences = [
                        [
                            'icon' => 'bi-book',
                            'title' => 'Mastery Learning',
                            'desc' => 'Literacy, Numeracy, Tahsin & Tahfidz',
                            'delay' => '0',
                        ],
                        [
                            'icon' => 'bi-moon-stars',
                            'title' => 'Islamic Consciousness',
                            'desc' => 'Aqidah, Ibadah, Adab & Muslim Self-Concept',
                            'delay' => '100',
                        ],
                        [
                            'icon' => 'bi-star',
                            'title' => 'Learning & Self Leadership',
                            'desc' => '4R Learning Capacity towards Aqil Baligh',
                            'delay' => '200',
                        ],
                        [
                            'icon' => 'bi-tree',
                            'title' => 'Ecological Consciousness',
                            'desc' => 'Sustainability Mindset via Nature Learning',
                            'delay' => '300',
                        ],
                        [
                            'icon' => 'bi-globe',
                            'title' => 'Bilingual Program',
                            'desc' => 'Speaking English confidently & understanding basic Arabic texts',
                            'delay' => '400',
                        ],
                    ];
                @endphp
                @foreach ($excellences as $item)
                    <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="600"
                        data-aos-delay="{{ $item['delay'] }}">
                        <div class="excellence-card h-100 p-4 rounded-4">
                            <div class="excellence-icon mb-3">
                                <i class="bi {{ $item['icon'] }}"></i>
                            </div>
                            <h5 class="fw-bold mb-2">{{ $item['title'] }}</h5>
                            <p class="text-muted mb-0">{{ $item['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Graduate Profile Section --}}
    <section class="graduate-section py-5 position-relative">
        <div class="graduate-bg"></div>
        <div class="container py-4 position-relative">
            <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="800">
                <span class="section-tag">Who They Become</span>
                <h3 class="fw-bold">Graduate Profile</h3>
                <p class="text-muted">Our students will grow to become...</p>
            </div>
            <div class="row g-3 justify-content-center">
                @php
                    $profiles = [
                        [
                            'icon' => 'bi-moon-stars',
                            'title' => 'Abid',
                            'desc' => 'Devoted Servant of Allah',
                            'delay' => '0',
                        ],
                        [
                            'icon' => 'bi-globe-americas',
                            'title' => 'Khalifah',
                            'desc' => 'Leader & Guardian of the Earth',
                            'delay' => '50',
                        ],
                        [
                            'icon' => 'bi-book',
                            'title' => 'Lifelong Learner',
                            'desc' => 'Resilient & Curious',
                            'delay' => '100',
                        ],
                        [
                            'icon' => 'bi-person-check',
                            'title' => 'Independent & Productive',
                            'desc' => 'Discovering Personal Talents',
                            'delay' => '150',
                        ],
                        [
                            'icon' => 'bi-hand-thumbs-up',
                            'title' => 'Beneficial Citizen',
                            'desc' => 'Loving the motherland & contributing to others ',
                            'delay' => '200',
                        ],
                        [
                            'icon' => 'bi-translate',
                            'title' => 'Global Communicator',
                            'desc' => 'Confident in English & Able to read Basic Arabic texts',
                            'delay' => '250',
                        ],
                    ];
                @endphp
                @foreach ($profiles as $item)
                    <div class="col-6 col-md-4 col-lg-2" data-aos="zoom-in" data-aos-duration="500"
                        data-aos-delay="{{ $item['delay'] }}">
                        <div class="graduate-card h-100 p-3 text-center rounded-4">
                            <div class="graduate-icon mb-2">
                                <i class="bi {{ $item['icon'] }}"></i>
                            </div>
                            <h6 class="fw-bold mb-1">{{ $item['title'] }}</h6>
                            <small class="text-muted">{{ $item['desc'] }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Learning Experience Section --}}
    <section class="bg-white py-5 position-relative">
        <div class="container py-4">
            <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="800">
                <span class="section-tag">What They Do</span>
                <h3 class="fw-bold">Learning Experience</h3>
                <p class="text-muted">Structured activities across all timeframes</p>
            </div>
            @php
                $schedules = [
                    'Daily' => [
                        'icon' => 'bi-calendar-day',
                        'items' => [
                            'Literacy & Clean Up',
                            'Dhuha, Dhuhur, Ashr Prayer',
                            'Tahsin Holy Quran',
                            'Subject Learning',
                            'Daily English',
                        ],
                    ],
                    'Weekly' => [
                        'icon' => 'bi-calendar-week',
                        'items' => ['Story Telling', 'English Song', 'Project Learning', 'Fitness Friday', 'Scout'],
                    ],
                    'Monthly' => [
                        'icon' => 'bi-calendar-month',
                        'items' => ['Mini Podcast', 'Show & Tell', 'Flag Ceremony', 'Outing Class', 'Student of Month'],
                    ],
                    'Annual' => [
                        'icon' => 'bi-calendar-event',
                        'items' => ['Project Showcase', 'Student Led Conference', 'English Festival'],
                    ],
                ];
            @endphp
            <div class="row g-4">
                @foreach ($schedules as $period => $data)
                    @php
                        $delays = ['Daily' => '0', 'Weekly' => '100', 'Monthly' => '200', 'Annual' => '300'];
                    @endphp
                    <div class="col-md-6" data-aos="fade-up" data-aos-duration="600"
                        data-aos-delay="{{ $delays[$period] }}">
                        <div class="schedule-card h-100 rounded-4 overflow-hidden">
                            <div class="schedule-header-custom">
                                <i class="bi {{ $data['icon'] }} me-2"></i> {{ $period }}
                            </div>
                            <div class="schedule-body p-4">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($data['items'] as $item)
                                        <li class="schedule-item mb-2">
                                            <i class="bi bi-check-circle-fill text-brand me-2"></i>
                                            {{ $item }}
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA Section --}}
    <section class="cta-section py-5 position-relative overflow-hidden">
        <div class="container py-4 position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center" data-aos="zoom-in" data-aos-duration="800">
                    <h3 class="fw-bold text-white mb-3">Enroll Your Child Now!</h3>
                    <p class="text-white mb-4 fs-5">
                        0853620127542 (Pak Firdaus)
                    </p>
                    <a href="https://wa.me/62853620127542?text=Assalamualaikum%20Pak%20Firdaus%2C%20saya%20tertarik%20dengan%20PPDB%20Harum%202"
                        target="_blank" class="btn btn-success btn-lg px-3 shadow-lg">
                        <i class="bi bi-whatsapp me-2"></i> Contact via WhatsApp
                    </a>
                    <div class="mt-3">
                        <a href="{{ route('branch.select') }}" class="btn btn-outline-light px-4">
                            <i class="bi bi-arrow-left me-1"></i> back to Branch Selection
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('landing.footer')
@endsection

@push('css')
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --hijau-tua: #1a2d1a;
            --hijau: #2d5a2d;
            --hijau-muda: #4a7c4a;
            --hijau-pale: #e8f0e4;
            --cream: #f0ead6;
            --cream-dark: #e5dcc8;
            --tan: #d9cdb4;
        }

        .harum2-hero {
            background: linear-gradient(135deg, #111f11 0%, #1a2d1a 50%, #2d5a2d 100%);
            min-height: 85vh;
            display: flex;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .hero-overlay {
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.5;
        }

        .hero-pattern {
            position: absolute;
            inset: 0;
            background: radial-gradient(circle at 20% 50%, rgba(74, 124, 74, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(240, 234, 214, 0.08) 0%, transparent 40%);
        }

        .harum2-logo {
            height: 90px;
            object-fit: cover;
            border: 3px solid rgba(255, 255, 255, 0.3);
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
            letter-spacing: 2px;
        }

        .hero-quote {
            border-left: 3px solid var(--cream-dark);
            padding-left: 1rem;
        }

        .hero-image-wrapper {
            position: relative;
        }

        .hero-building {
            width: 100%;
            height: 320px;
            object-fit: cover;
            border: 3px solid rgba(255, 255, 255, 0.15);
        }

        .hero-image-badge {
            position: absolute;
            bottom: -20px;
            right: -10px;
        }

        .min-vh-50 {
            min-height: 70vh;
        }

        /* Vision — Statement Section */
        .vision-section {
            background: var(--cream);
        }

        .vision-bg-pattern {
            position: absolute;
            inset: 0;
            background:
                radial-gradient(circle at 15% 50%, rgba(26, 45, 26, 0.03) 0%, transparent 40%),
                radial-gradient(circle at 85% 30%, rgba(213, 205, 180, 0.3) 0%, transparent 40%);
        }

        .vision-card {
            background: var(--hijau-tua);
            border: none;
        }



        .vision-heading {
            font-family: Georgia, 'Times New Roman', serif;
            font-size: 1.6rem;
            font-weight: 600;
            line-height: 1.6;
            color: var(--cream);
            letter-spacing: 0.5px;
        }

        .vision-divider {
            width: 50px;
            height: 3px;
            background: var(--cream-dark);
            margin: 1rem auto;
            border-radius: 2px;
        }

        .vision-label {
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            color: rgba(240, 234, 214, 1);
            font-weight: 500;
        }

        /* Programs — Premium Cards */
        .programs-section {
            background: var(--cream);
        }

        .program-card-lg {
            background: white;
            border: 1px solid var(--cream-dark);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
        }

        .program-card-lg:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(26, 45, 26, 0.1);
            border-color: transparent;
        }

        .program-card-icon {
            width: 72px;
            height: 72px;
            background: var(--hijau-tua);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: var(--cream);
            transition: all 0.3s ease;
        }

        .program-card-lg:hover .program-card-icon {
            transform: scale(1.08);
            box-shadow: 0 8px 24px rgba(26, 45, 26, 0.25);
        }

        .program-card-tag {
            display: inline-block;
            background: var(--cream);
            color: var(--hijau-tua);
            padding: 0.3rem 0.9rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            border: 1px solid var(--cream-dark);
        }

        /* Section Tags */
        .section-tag {
            display: inline-block;
            background: var(--cream);
            color: var(--hijau-tua);
            border: 1px solid var(--cream-dark);
            padding: 0.35rem 1rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 0.75rem;
            letter-spacing: 0.5px;
        }

        /* Excellence Cards */
        .excellence-card {
            background: white;
            border: 1px solid var(--cream-dark);
            transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            position: relative;
            overflow: hidden;
        }

        .excellence-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 0;
            background: var(--hijau-tua);
            transition: height 0.4s ease;
        }

        .excellence-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(26, 45, 26, 0.12);
            border-color: transparent;
        }

        .excellence-card:hover::before {
            height: 100%;
        }

        .excellence-icon {
            width: 56px;
            height: 56px;
            background: var(--cream);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: var(--hijau-tua);
            transition: all 0.3s ease;
        }

        .excellence-card:hover .excellence-icon {
            background: var(--hijau-tua);
            color: var(--cream);
            transform: scale(1.1);
        }

        /* Graduate Section */
        .graduate-section {
            background: linear-gradient(180deg, var(--cream) 0%, #f5f2e8 50%, var(--cream) 100%);
        }

        .graduate-bg {
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='100' height='100' viewBox='0 0 100 100' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M11 18c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm48 25c3.866 0 7-3.134 7-7s-3.134-7-7-7-7 3.134-7 7 3.134 7 7 7zm-43-7c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm63 31c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM34 90c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zm56-76c1.657 0 3-1.343 3-3s-1.343-3-3-3-3 1.343-3 3 1.343 3 3 3zM12 86c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm28-65c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm23-11c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-6 60c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm29 22c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zM32 63c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm57-13c2.76 0 5-2.24 5-5s-2.24-5-5-5-5 2.24-5 5 2.24 5 5 5zm-9-21c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM60 91c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2zM35 41c1.105 0 2-.895 2-2s-.895-2-2-2-2 .895-2 2 .895 2 2 2z' fill='%231a2d1a' fill-opacity='0.03' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        .graduate-card {
            background: white;
            border: 1px solid var(--cream-dark);
            transition: all 0.4s ease;
        }

        .graduate-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 15px 35px rgba(26, 45, 26, 0.1);
            border-color: var(--hijau-muda);
        }

        .graduate-icon {
            width: 50px;
            height: 50px;
            background: var(--hijau-tua);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 1.3rem;
            color: var(--cream);
            transition: transform 0.3s ease;
        }

        .graduate-card:hover .graduate-icon {
            transform: rotate(-10deg) scale(1.1);
        }

        /* Schedule */
        .schedule-card {
            background: white;
            border: 1px solid var(--cream-dark);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.04);
            transition: all 0.3s ease;
        }

        .schedule-card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.07);
            transform: translateY(-3px);
        }

        .schedule-header-custom {
            background: var(--hijau-tua);
            color: var(--cream);
            padding: 1rem 1.5rem;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .schedule-item {
            padding: 0.25rem 0;
            border-bottom: 1px solid #f5f3ee;
        }

        .schedule-item:last-child {
            border-bottom: none;
        }

        /* CTA */
        .cta-section {
            background: linear-gradient(135deg, #111f11 0%, #1a2d1a 50%, #214021 100%);
        }

        /* Global */
        .leading-relaxed {
            line-height: 1.8;
        }

        .text-brand {
            color: var(--hijau-tua) !important;
        }

        .bg-brand {
            background-color: var(--hijau-tua) !important;
        }

        .bg-cream {
            background-color: var(--cream) !important;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .hero-title {
            font-family: 'Playfair Display', serif;
        }

        .hero-wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            z-index: 10;
            line-height: 0;
        }

        .hero-wave svg {
            display: block;
            width: 100%;
            height: auto;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .harum2-hero {
                min-height: auto;
                padding: 3rem 0;
            }

            .min-vh-50 {
                min-height: auto;
            }

            .hero-building {
                height: 280px;
            }
        }

        @media (max-width: 767px) {
            .display-5 {
                font-size: 1.8rem;
            }

            .harum2-logo {
                height: 70px;
            }

            .vision-heading {
                font-size: 1.4rem;
            }

            .program-card-icon {
                width: 60px;
                height: 60px;
                font-size: 1.5rem;
            }
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                once: true,
                offset: 50,
            });
        });
    </script>
@endpush
