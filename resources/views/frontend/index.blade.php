{{-- Professional Hero Section with Lightweight Images --}}
<x-header/>
<style>
    .hero-section {
        position: relative;
        height: 90vh;
        min-height: 600px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: linear-gradient(135deg, #1a1a1a 0%, #2a2a2a 100%);
    }

    .hero-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        z-index: 1;
        opacity: 0.4;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(135deg, rgba(40, 167, 69, 0.3) 0%, rgba(0, 0, 0, 0.7) 100%);
        z-index: 2;
    }

.hero-content {
    position: relative;
    z-index: 3;
    max-width: 900px;
    width: 100%;
    padding: 12px;
    text-align: center;
    color: white;
    animation: fadeInUp 0.8s ease-out;
    transform: scale(0.8);
    /* max-width: 2000px; */
    max-height: 100vh;
}

    .hero-subtitle {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(40, 167, 69, 0.2);
        color: #28a745;
        padding: 10px 20px;
        border-radius: 50px;
        margin-bottom: 20px;
        font-weight: 600;
        border: 1px solid rgba(40, 167, 69, 0.4);
    }

    .hero-subtitle i {
        font-size: 20px;
    }

    .hero-title {
        font-size: 68px;
        font-weight: 800;
        line-height: 1.2;
        margin-bottom: 20px;
        background: linear-gradient(135deg, #ffffff 0%, #20c997 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-description {
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 40px;
        color: rgba(255, 255, 255, 0.9);
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
    }

    .hero-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn-primary-hero {
        background: linear-gradient(135deg, #28a745, #20c997);
        color: white;
        padding: 15px 40px;
        border: none;
        border-radius: 50px;
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 20px rgba(40, 167, 69, 0.3);
    }

    .btn-primary-hero:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 30px rgba(40, 167, 69, 0.5);
        color: white;
    }

    .btn-secondary-hero {
        background: transparent;
        color: white;
        padding: 15px 40px;
        border: 2px solid white;
        border-radius: 50px;
        font-weight: 600;
        font-size: 16px;
        cursor: pointer;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        transition: all 0.3s ease;
    }

    .btn-secondary-hero:hover {
        background: white;
        color: #28a745;
        transform: translateY(-3px);
    }

    .hero-stats {
        display: flex;
        gap: 40px;
        justify-content: center;
        margin-top: 60px;
        flex-wrap: wrap;
    }

    .stat-item {
        text-align: center;
    }

    .stat-number {
        font-size: 48px;
        font-weight: 800;
        color: #28a745;
        display: block;
    }

    .stat-label {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.7);
        margin-top: 5px;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .hero-section {
            height: 80vh;
            min-height: 500px;
        }

        .hero-content {
            padding: 20px;
        }

        .hero-title {
            font-size: 42px;
        }

        .hero-description {
            font-size: 16px;
        }

        .hero-buttons {
            flex-direction: column;
        }

        .btn-primary-hero, .btn-secondary-hero {
            width: 100%;
            justify-content: center;
        }

        .hero-stats {
            gap: 20px;
        }

        .stat-number {
            font-size: 36px;
        }
    }
</style>

<!-- Professional Hero Section -->
<section class="hero-section">
    <!-- Background Image (lightweight SVG gradient or external image) -->
    <div class="hero-background" style="background-image: url('data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 1920 1080%22><defs><linearGradient id=%22grad%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22><stop offset=%220%25%22 style=%22stop-color:%2328a745%22 /><stop offset=%22100%25%22 style=%22stop-color:%231a1a1a%22 /></linearGradient></defs><rect width=%221920%22 height=%221080%22 fill=%22url(%23grad)%22 /></svg>')"></div>

    <!-- Overlay -->
    <div class="hero-overlay"></div>

    <!-- Content -->
    <div class="hero-content">
        <!-- Subtitle -->
        <div class="hero-subtitle">
            <i class="fas fa-sun"></i>
            <span>{{ __('Sustainable Energy Solutions') }}</span>
        </div>

        <!-- Title -->
        <h1 class="hero-title">
            {{ __('Transform Your Energy Future') }}<br>
            {{ __('With Solar Power') }}
        </h1>

        <!-- Description -->
        <p class="hero-description">
            {{ __('Leading provider of high-quality solar energy solutions for residential and commercial properties. Save money, reduce carbon footprint, and enjoy reliable clean energy.') }}
        </p>

        <!-- Call-to-Action Buttons -->
        <div class="hero-buttons">
            <a href="{{ route('solar-estimator') }}" class="btn-primary-hero">
                <i class="fas fa-bolt"></i>
                {{ __('Get Free Estimate') }}
            </a>
            <a href="{{ route('services') }}" class="btn-secondary-hero">
                <i class="fas fa-arrow-right"></i>
                {{ __('Explore Services') }}
            </a>
        </div>

        <!-- Statistics -->
        <div class="hero-stats">
            <div class="stat-item">
                <span class="stat-number">500+</span>
                <span class="stat-label">{{ __('Projects Completed') }}</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">25K+</span>
                <span class="stat-label">{{ __('Happy Customers') }}</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">10M+</span>
                <span class="stat-label">{{ __('kWh Generated') }}</span>
            </div>
        </div>
    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator">
        <i class="fas fa-chevron-down"></i>
    </div>
</section>

{{-- Features Section with Improved Accessibility --}}
<section class="features-section pull-up pt-0" aria-labelledby="features-heading">
    <div class="auto-container">
        <div class="row g-0">
            <div class="video-column col-lg-4 col-md-12">
                <div class="video-box wow fadeInUp">
                    <figure class="image">
                        <img
                            src="{{ asset('frontend/assets/images/resource/feature1-1.jpg') }}"
                            alt="{{ __('Solar Installation Process Video') }}"
                            width="370"
                            height="470"
                            loading="lazy"
                        >
                    </figure>
                    <a href="https://www.youtube.com/watch?v=Fvae8nxzVz4"
                       class="play-btn lightbox-image"
                       data-caption="{{ __('Solar Installation Process') }}"
                       aria-label="{{ __('Watch Solar Installation Video') }}">
                        <span class="sr-only">{{ __('Play Video') }}</span>
                    </a>
                </div>
            </div>

            <div class="services-column col-lg-8 col-md-12">
                <div class="inner-column">
                    <div class="info-box wow fadeInUp" data-wow-delay="300ms">
                        <i class="icon flaticon-backup" aria-hidden="true"></i>
                        <div class="text">{{ __('From full automation to top-class tech innovation') }}</div>
                    </div>

                    <div class="row g-0">
                        @php
                            $features = [
                                [
                                    'image' => 'feature1-2.jpg',
                                    'title' => __('Residential Solutions'),
                                    'alt' => __('Residential Solar Solutions'),
                                    'delay' => '300ms'
                                ],
                                [
                                    'image' => 'feature1-3.jpg',
                                    'title' => __('Commercial Solutions'),
                                    'alt' => __('Commercial Solar Solutions'),
                                    'delay' => '600ms'
                                ]
                            ];
                        @endphp

                        @foreach($features as $feature)
                        <div class="feature-block col-lg-6 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="{{ $feature['delay'] }}">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ route('services') }}" aria-label="{{ $feature['title'] }}">
                                            <img
                                                src="{{ asset('frontend/assets/images/resource/' . $feature['image']) }}"
                                                alt="{{ $feature['alt'] }}"
                                                width="370"
                                                height="300"
                                                loading="lazy"
                                            >
                                        </a>
                                    </figure>
                                    <div class="content-box">
                                        <h4 class="title h5">
                                            <a href="{{ route('services') }}">{{ $feature['title'] }}</a>
                                        </h4>
                                        <a href="{{ route('services') }}"
                                           class="theme-btn read-more"
                                           aria-label="{{ __('Learn more about') }} {{ $feature['title'] }}">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- About Section with Structured Data --}}
<section class="about-section pt-0" itemscope itemtype="https://schema.org/Organization">
    <meta itemprop="name" content="{{ config('app.name', 'Soliur') }}">
    <meta itemprop="description" content="{{ __('Industry leading solar system provider') }}">

    <div class="float-text" aria-hidden="true">Soliur</div>
    <div class="auto-container">
        <div class="outer-box">
            <div class="row">
                <div class="content-column col-xl-5 col-lg-6 col-md-12 col-sm-12 order-lg-2 wow fadeInRight" data-wow-delay="300ms">
                    <div class="inner-column">
                        <div class="sec-title">
                            <div class="sub-title-outer">
                                <span class="sub-title">{{ __('Who we are') }}</span>
                                <span class="divider"></span>
                            </div>
                            <h2 class="letters-slide-up text-split" itemprop="slogan">{{ __('Industry leading solar system provider') }}</h2>
                            <div class="text" itemprop="description">
                                {{ __('A leading voice in low-income solar policy and the nation\'s largest nonprofit solar installer, serving families throughout California') }}
                            </div>
                        </div>
                        <div class="bottom-box">
                            <ul class="list-style-three">
                                <li><i class="icon flaticon-solar-panels" aria-hidden="true"></i> {{ __('Significantly reduces') }} <br> {{ __('electricity bills') }}</li>
                                <li><i class="icon flaticon-solar-panel-6" aria-hidden="true"></i> {{ __('A solar installation') }} <br> {{ __('makes attractive') }}</li>
                                <li><i class="icon flaticon-solar-energy-1" aria-hidden="true"></i> {{ __('Help lower electricity') }} <br> {{ __('residential costs') }}</li>
                            </ul>

                            <div class="author-box" itemprop="founder" itemscope itemtype="https://schema.org/Person">
                                <div class="inner">
                                    <div class="author-image">
                                        <img
                                            src="{{ asset('frontend/assets/images/resource/about1-thumb1.jpg') }}"
                                            alt="{{ __('Alen Donald - CEO') }}"
                                            itemprop="image"
                                            width="80"
                                            height="80"
                                            loading="lazy"
                                        >
                                    </div>
                                    <h6 class="name" itemprop="name">Alen Donald</h6>
                                    <div class="designation" itemprop="jobTitle">{{ __('CEO, Soliur') }}</div>
                                    <img
                                        src="{{ asset('frontend/assets/images/resource/sign.png') }}"
                                        alt="{{ __('Signature') }}"
                                        itemprop="signature"
                                        width="100"
                                        height="50"
                                        loading="lazy"
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="image-column col-xl-7 col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="bg-home" aria-hidden="true"></div>
                        <div class="image-box">
                            <div class="image reveal">
                                <img
                                    src="{{ asset('frontend/assets/images/resource/about1-1.png') }}"
                                    alt="{{ __('Solar Panel Installation') }}"
                                    width="570"
                                    height="570"
                                    loading="lazy"
                                >
                            </div>
                            <div class="image-2 zoom-one" data-wow-delay="300ms">
                                <img
                                    src="{{ asset('frontend/assets/images/resource/about1-2.jpg') }}"
                                    alt="{{ __('Solar Panel Details') }}"
                                    width="270"
                                    height="270"
                                    loading="lazy"
                                >
                            </div>
                            <div class="info-box wow fadeInUp" data-wow-delay="600ms">
                                <i class="icon flaticon-bulb" aria-hidden="true"></i><br>
                                <span class="text">{{ __('Affordable System') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Marquee Section with ARIA Labels --}}
<div class="marquee-section" aria-label="{{ __('Solar Energy Keywords') }}">
    <div class="marquee" aria-hidden="true">
        <div class="marquee-group">
            @foreach(['Electricity', 'Panels', 'Solar', 'Energy', 'Power', 'Panels'] as $keyword)
                <div class="text">{{ __($keyword) }}</div>
            @endforeach
        </div>
        <div class="marquee-group">
            @foreach(['Electricity', 'Panels', 'Solar', 'Energy', 'Power', 'Panels'] as $keyword)
                <div class="text">{{ __($keyword) }}</div>
            @endforeach
        </div>
    </div>
</div>

{{-- Stats Section with Dynamic Data --}}
<section class="fun-fact-section pb-0">
    <div class="icon-turbines-3" aria-hidden="true"></div>
    <div class="auto-container">
        <div class="fact-counter">
            <div class="icon-turbines-2" aria-hidden="true"></div>
            <div class="row">
                <div class="content-column col-xl-4 col-lg-4 col-md-12 col-sm-12 wow fadeInLeft">
                    <div class="inner-column">
                        <h3 class="title">{{ __('Renewable energy that benefits everyone') }}</h3>
                        <a href="{{ route('services') }}" class="read-more">
                            {{ __('View Services') }}
                            <span class="sr-only">{{ __('of Solar Energy Solutions') }}</span>
                        </a>
                    </div>
                </div>

                <div class="image-column col-xl-3 col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <figure class="image wow zoomIn">
                            <img
                                src="{{ asset('frontend/assets/images/resource/funfact1-1.png') }}"
                                alt="{{ __('Renewable Energy Graphic') }}"
                                width="270"
                                height="270"
                                loading="lazy"
                            >
                        </figure>
                    </div>
                </div>

                <div class="funfact-column col-xl-5 col-lg-4 col-md-12 col-sm-12">
                    @php
                        $stats = [
                            [
                                'icon' => 'flaticon-solar-panels',
                                'count' => '20110',
                                'title' => __('Systems Installed'),
                                'delay' => '0'
                            ],
                            [
                                'icon' => 'flaticon-solar-panel-6',
                                'count' => '677',
                                'prefix' => '$',
                                'suffix' => 'k',
                                'title' => __('Lifetime Savings'),
                                'delay' => '300ms'
                            ],
                            [
                                'icon' => 'flaticon-solar-energy-1',
                                'count' => '47215',
                                'title' => __('Participants Trained'),
                                'delay' => '600ms'
                            ]
                        ];
                    @endphp

                    @foreach($stats as $stat)
                    <div class="counter-block wow fadeInUp" data-wow-delay="{{ $stat['delay'] }}">
                        <div class="inner-box">
                            <div class="icon-box">
                                <i class="icon {{ $stat['icon'] }}" aria-hidden="true"></i>
                            </div>
                            <div class="content-box">
                                <div class="count-box">
                                    {{ $stat['prefix'] ?? '' }}
                                    <span class="count-text"
                                          data-speed="3000"
                                          data-stop="{{ $stat['count'] }}">0</span>
                                    {{ $stat['suffix'] ?? '' }}
                                </div>
                                <h6 class="counter-title">{{ $stat['title'] }}</h6>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Services Section with Carousel --}}
<section class="services-section pull-up">
    <div class="bg bg-pattern-3" aria-hidden="true"></div>
    <div class="auto-container">
        <div class="sec-title light text-center">
            <div class="sub-title-outer">
                <span class="sub-title">{{ __('What we do') }}</span>
                <span class="divider"></span>
            </div>
            <h2 class="letters-slide-up text-split">{{ __('Affordable solar panel installation for all') }}</h2>
        </div>

        <div class="services-carousel owl-carousel owl-theme default-dots">
            @php
                $services = [
                    [
                        'image' => 'service1-1.jpg',
                        'icon' => 'flaticon-solar-panels',
                        'title' => __('Utility Solutions'),
                        'text' => __('With over four decades of experience providing solutions to large-scale enterprises')
                    ],
                    [
                        'image' => 'service1-2.jpg',
                        'icon' => 'flaticon-solar-panel-6',
                        'title' => __('C&I Solutions'),
                        'text' => __('With over four decades of experience providing solutions to large-scale enterprises')
                    ],
                    [
                        'image' => 'service1-3.jpg',
                        'icon' => 'flaticon-solar-energy-1',
                        'title' => __('Residential Solutions'),
                        'text' => __('With over four decades of experience providing solutions to large-scale enterprises')
                    ]
                ];
            @endphp

            @foreach($services as $index => $service)
            <div class="service-block">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image">
                            <a href="{{ route('services') }}" aria-label="{{ $service['title'] }}">
                                <img
                                    src="{{ asset('frontend/assets/images/resource/' . $service['image']) }}"
                                    alt="{{ $service['title'] }}"
                                    width="370"
                                    height="300"
                                    loading="lazy"
                                >
                            </a>
                        </figure>
                    </div>
                    <div class="content-box">
                        <div class="icon-border-2" aria-hidden="true"></div>
                        <div class="icon-border-3" aria-hidden="true"></div>
                        <i class="icon {{ $service['icon'] }}" aria-hidden="true"></i>
                        <div class="content">
                            <h4 class="title h5">
                                <a href="{{ route('services') }}">{{ $service['title'] }}</a>
                            </h4>
                            <div class="text">{{ $service['text'] }}</div>
                        </div>
                        <div class="count" aria-hidden="true">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Contact & FAQ Section with Refreshed Theme --}}
<section class="contact-faq-section py-80">
    <div class="container">
        <div class="row">

            {{-- Contact Form Column --}}
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="contact-form-wrapper bg-white p-4 p-md-5 rounded-4 shadow-sm">
                    <div class="text-center mb-5">
                        <span class="badge bg-primary text-white rounded-pill px-4 py-2 mb-3 d-inline-flex align-items-center">
                            <i class="fas fa-envelope me-2"></i>{{ __('Quick Quote') }}
                        </span>
                        <h3 class="fw-bold mb-3">{{ __('Get Your Solar Quote') }}</h3>
                        <p class="text-muted">{{ __('Fill in your details and get a free customized quote') }}</p>
                    </div>

                    {{-- Session Messages --}}
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ __('Please fix the following issues:') }}
                        <ul class="mb-0 mt-2">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <form method="POST" action="{{ route('contact.submit') }}" id="contactForm" novalidate>
                        @csrf

                        <div class="row g-3">
                            {{-- Name Field --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="full_name" class="form-label fw-semibold">
                                        <i class="fas fa-user me-2 text-primary"></i>{{ __('Full Name') }}
                                    </label>
                                    <input type="text"
                                           class="form-control form-control-lg @error('full_name') is-invalid @enderror"
                                           id="full_name"
                                           name="full_name"
                                           placeholder="{{ __('John Smith') }}"
                                           value="{{ old('full_name') }}"
                                           required>
                                    @error('full_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Email Field --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="form-label fw-semibold">
                                        <i class="fas fa-envelope me-2 text-primary"></i>{{ __('Email Address') }}
                                    </label>
                                    <input type="email"
                                           class="form-control form-control-lg @error('email') is-invalid @enderror"
                                           id="email"
                                           name="email"
                                           placeholder="{{ __('john@example.com') }}"
                                           value="{{ old('email') }}"
                                           required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Phone Field --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="phone" class="form-label fw-semibold">
                                        <i class="fas fa-phone me-2 text-primary"></i>{{ __('Phone Number') }}
                                    </label>
                                    <input type="tel"
                                           class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                           id="phone"
                                           name="phone"
                                           placeholder="{{ __('(123) 456-7890') }}"
                                           value="{{ old('phone') }}"
                                           required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Subject Field --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subject" class="form-label fw-semibold">
                                        <i class="fas fa-tag me-2 text-primary"></i>{{ __('Subject') }}
                                    </label>
                                    <input type="text"
                                           class="form-control form-control-lg @error('subject') is-invalid @enderror"
                                           id="subject"
                                           name="subject"
                                           placeholder="{{ __('Residential Solar Quote') }}"
                                           value="{{ old('subject') }}"
                                           required>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Solar Panels Range --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label fw-semibold d-flex justify-content-between">
                                        <span>
                                            <i class="fas fa-solar-panel me-2 text-primary"></i>{{ __('Number of Panels') }}
                                        </span>
                                        <span class="badge bg-primary" id="panelCountBadge">5</span>
                                    </label>
                                    <div class="range-slider-wrapper">
                                        <input type="range"
                                               class="form-range"
                                               id="panelSlider"
                                               name="panels_count"
                                               min="1"
                                               max="50"
                                               value="{{ old('panels_count', 5) }}"
                                               step="1"
                                               oninput="updatePanelCount(this.value)">
                                        <div class="range-labels d-flex justify-content-between mt-2">
                                            <small class="text-muted">1-10</small>
                                            <small class="text-muted">25-30</small>
                                            <small class="text-muted">45-50</small>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <small class="text-muted">
                                            <i class="fas fa-info-circle me-1"></i>
                                            {{ __('Slide to adjust the number of solar panels needed') }}
                                        </small>
                                    </div>
                                </div>
                            </div>

                            {{-- Message Field --}}
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="message" class="form-label fw-semibold">
                                        <i class="fas fa-comment me-2 text-primary"></i>{{ __('Your Message') }}
                                    </label>
                                    <textarea class="form-control @error('message') is-invalid @enderror"
                                              id="message"
                                              name="message"
                                              rows="4"
                                              placeholder="{{ __('Tell us about your project or any specific requirements...') }}">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="col-12">
                                <div class="d-grid mt-3">
                                    <button type="submit" class="btn btn-primary btn-lg py-3 fw-semibold">
                                        <i class="fas fa-paper-plane me-2"></i>{{ __('Request Free Quote') }}
                                    </button>
                                </div>
                                <div class="text-center mt-3">
                                    <small class="text-muted">
                                        <i class="fas fa-lock me-1"></i>
                                        {{ __('Your information is secure and private') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- FAQ Column --}}
            <div class="col-lg-6">
                <div class="faq-wrapper bg-light p-4 p-md-5 rounded-4 h-100">
                    <div class="text-center mb-5">
                        <span class="badge bg-success text-white rounded-pill px-4 py-2 mb-3 d-inline-flex align-items-center">
                            <i class="fas fa-question-circle me-2"></i>{{ __('FAQs') }}
                        </span>
                        <h3 class="fw-bold mb-3">{{ __('Common Questions') }}</h3>
                        <p class="text-muted">{{ __('Quick answers to frequently asked questions') }}</p>
                    </div>

                    {{-- FAQ Accordion --}}
                    <div class="accordion accordion-flush" id="faqAccordion">
                        @php
                            $faqs = [
                                [
                                    'question' => __('What is a solar power system?'),
                                    'answer' => __('A solar power system converts sunlight into electricity using solar panels. It helps reduce your electricity bills and carbon footprint.'),
                                    'icon' => 'fa-sun'
                                ],
                                [
                                    'question' => __('How much does solar installation cost?'),
                                    'answer' => __('Costs vary based on system size. We offer competitive pricing with flexible financing options. Contact us for a free customized quote.'),
                                    'icon' => 'fa-dollar-sign'
                                ],
                                [
                                    'question' => __('How long does installation take?'),
                                    'answer' => __('Most residential installations take 1-3 days. The complete process including permits typically takes 2-4 weeks.'),
                                    'icon' => 'fa-calendar-alt'
                                ],
                                [
                                    'question' => __('Do solar panels require maintenance?'),
                                    'answer' => __('Solar panels require minimal maintenance. Occasional cleaning and annual checkups are recommended for optimal performance.'),
                                    'icon' => 'fa-tools'
                                ],
                                [
                                    'question' => __('Are there government incentives?'),
                                    'answer' => __('Yes! Federal tax credits and state incentives are available. We help you navigate all available programs to maximize savings.'),
                                    'icon' => 'fa-hand-holding-usd'
                                ],
                                [
                                    'question' => __('What warranty do you offer?'),
                                    'answer' => __('We offer 25-year performance warranty on panels, 10-year warranty on inverters, and 5-year workmanship warranty.'),
                                    'icon' => 'fa-shield-alt'
                                ]
                            ];
                        @endphp

                        @foreach($faqs as $index => $faq)
                        <div class="accordion-item border-0 mb-3 bg-white rounded-3 shadow-sm">
                            <h4 class="accordion-header" id="heading{{ $index }}">
                                <button class="accordion-button collapsed rounded-3 py-3 px-4 fw-semibold"
                                        type="button"
                                        data-bs-toggle="collapse"
                                        data-bs-target="#collapse{{ $index }}"
                                        aria-expanded="false"
                                        aria-controls="collapse{{ $index }}">
                                    <i class="fas {{ $faq['icon'] }} me-3 text-primary"></i>
                                    {{ $faq['question'] }}
                                </button>
                            </h4>
                            <div id="collapse{{ $index }}"
                                 class="accordion-collapse collapse"
                                 aria-labelledby="heading{{ $index }}"
                                 data-bs-parent="#faqAccordion">
                                <div class="accordion-body px-4 pb-4 pt-0">
                                    <div class="faq-answer ps-4 border-start border-3 border-primary">
                                        <p class="mb-0">{{ $faq['answer'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    {{-- FAQ CTA --}}
                    <div class="text-center mt-5 pt-3">
                        <div class="cta-box bg-primary text-white p-4 rounded-4">
                            <i class="fas fa-headset fa-2x mb-3"></i>
                            <h5 class="fw-bold mb-2">{{ __('Still have questions?') }}</h5>
                            <p class="mb-3 opacity-75">{{ __('Our solar experts are here to help') }}</p>
                            <a href="tel:+10161245741" class="btn btn-light btn-lg px-4">
                                <i class="fas fa-phone me-2"></i>{{ __('Call Now') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Quick Contact Bar --}}
<div class="quick-contact-bar bg-dark text-white py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-4 text-center text-md-start mb-2 mb-md-0">
                <i class="fas fa-clock me-2 text-primary"></i>
                <span>{{ __('Mon - Fri: 9 AM - 10 PM') }}</span>
            </div>
            <div class="col-md-4 text-center mb-2 mb-md-0">
                <i class="fas fa-map-marker-alt me-2 text-primary"></i>
                <span>{{ __('Pakistan, Sahiwal') }}</span>
            </div>
            <div class="col-md-4 text-center text-md-end">
                <i class="fas fa-phone me-2 text-primary"></i>
                <a href="tel:+10161245741" class="text-white text-decoration-none fw-semibold">
                    {{ __('(010) 612-45-741') }}
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Simple JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Panel Count Update
    const panelSlider = document.getElementById('panelSlider');
    const panelCountBadge = document.getElementById('panelCountBadge');

    function updatePanelCount(value) {
        if(panelCountBadge) {
            panelCountBadge.textContent = value;
        }
    }

    if(panelSlider) {
        updatePanelCount(panelSlider.value);
        panelSlider.addEventListener('input', function() {
            updatePanelCount(this.value);
        });
    }

    // Form Validation Enhancement
    const contactForm = document.getElementById('contactForm');
    if(contactForm) {
        contactForm.addEventListener('submit', function() {
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Processing...';
            submitBtn.disabled = true;

            // Re-enable after 3 seconds if still on page
            setTimeout(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 3000);
        });
    }

    // FAQ Accordion Enhancement
    const faqButtons = document.querySelectorAll('.accordion-button');
    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Close all other open accordions (optional)
            if(!this.classList.contains('collapsed')) {
                const allButtons = document.querySelectorAll('.accordion-button:not(.collapsed)');
                allButtons.forEach(btn => {
                    if(btn !== this) {
                        btn.click();
                    }
                });
            }
        });
    });
});
</script>

{{-- CSS Theme Enhancements --}}
<style>
.contact-faq-section {
    background: linear-gradient(135deg, #f8fafc 0%, #f1f5f9 100%);
}

.contact-form-wrapper {
    border: 1px solid #e2e8f0;
    transition: transform 0.3s ease;
}

.contact-form-wrapper:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

.form-group label {
    color: #334155;
    font-size: 0.95rem;
}

.form-control, .form-select {
    border: 2px solid #e2e8f0;
    border-radius: 10px;
    padding: 12px 16px;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #3b82f6;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.form-control-lg {
    font-size: 1rem;
}

.range-slider-wrapper {
    padding: 0 10px;
}

.form-range::-webkit-slider-thumb {
    background: #3b82f6;
    border: 3px solid white;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    width: 22px;
    height: 22px;
}

.form-range::-moz-range-thumb {
    background: #3b82f6;
    border: 3px solid white;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
    width: 22px;
    height: 22px;
}

.form-range::-webkit-slider-runnable-track {
    background: #e2e8f0;
    height: 8px;
    border-radius: 4px;
}

.btn-primary {
    background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    border: none;
    transition: all 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
}

.accordion-button {
    background-color: white;
    color: #1e293b;
    font-size: 1rem;
}

.accordion-button:not(.collapsed) {
    background-color: rgba(59, 130, 246, 0.1);
    color: #1e40af;
    box-shadow: none;
}

.accordion-button:focus {
    border-color: #93c5fd;
    box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
}

.accordion-button::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%231e40af'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
}

.accordion-button:not(.collapsed)::after {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%231e40af'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
}

.faq-answer {
    background: #f8fafc;
    padding: 20px;
    border-radius: 8px;
    margin-top: 10px;
}

.cta-box {
    background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
}

.quick-contact-bar {
    background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%);
    border-top: 3px solid #3b82f6;
}

.quick-contact-bar a:hover {
    color: #93c5fd !important;
}

.badge {
    font-weight: 500;
    letter-spacing: 0.5px;
}

@media (max-width: 768px) {
    .contact-faq-section {
        padding-top: 60px !important;
        padding-bottom: 60px !important;
    }

    .contact-form-wrapper,
    .faq-wrapper {
        padding: 25px !important;
    }
}
</style>

{{-- Newsletter Subscription --}}
<section class="newsletter-section bg-light py-5">
    <div class="auto-container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h3 class="mb-3">{{ __('Stay Updated with Solar News') }}</h3>
                <p class="mb-0">{{ __('Subscribe to our newsletter for the latest updates on solar technology and promotions.') }}</p>
            </div>
            <div class="col-lg-6">
                <form action="{{ route('newsletter.subscribe') }}" method="POST" class="newsletter-form">
                    @csrf
                    <div class="input-group">
                        <input type="email"
                               name="email"
                               class="form-control"
                               placeholder="{{ __('Enter your email') }}"
                               required
                               aria-label="{{ __('Email for newsletter subscription') }}">
                        <button class="btn btn-primary" type="submit">
                            {{ __('Subscribe') }}
                        </button>
                    </div>
                    @error('email')
                        <div class="text-danger mt-2">{{ $message }}</div>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</section>

{{-- Clients Section with Optimized Images --}}
<section class="clients-section">
    <div class="sponsors-outer">
        <ul class="clients-carousel owl-carousel owl-theme disable-navs">
            @for($i = 1; $i <= 6; $i++)
            <li class="client-block">
                <a href="#" class="image" aria-label="{{ __('Client Logo') }} {{ $i }}">
                    <img
                        src="{{ asset('frontend/assets/images/clients/' . $i . '.png') }}"
                        alt="{{ __('Client') }} {{ $i }}"
                        width="150"
                        height="80"
                        loading="lazy"
                    >
                </a>
            </li>
            @endfor
        </ul>
    </div>
</section>

{{-- Quick Contact Bar --}}
<div class="quick-contact-bar bg-dark text-white py-3">
    <div class="auto-container">
        <div class="row align-items-center">
            <div class="col-md-4 mb-3 mb-md-0">
                <i class="fas fa-clock me-2"></i>
                {{ __('Mon - Fri: 09:00 AM - 10:00 PM') }}
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <i class="fas fa-map-marker-alt me-2"></i>
                {{ __('Pakistan , Sahiwal ') }}
            </div>
            <div class="col-md-4">
                <i class="fas fa-phone me-2"></i>
                <a href="tel:+10161245741" class="text-white text-decoration-none">
                    {{ __('(010) 612 45 741') }}
                </a>
            </div>
        </div>
    </div>
</div>

<x-footer/>

{{-- JavaScript for Form Enhancement --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Range Slider
    const rangeSlider = document.querySelector('.distance-range-slider');
    const rangeAmount = document.querySelector('.range-amount');

    if(rangeSlider && rangeAmount) {
        const min = rangeSlider.dataset.min || 1;
        const max = rangeSlider.dataset.max || 50;
        const defaultValue = rangeSlider.dataset.default || 5;

        // Initialize slider
        noUiSlider.create(rangeSlider, {
            start: [defaultValue],
            connect: [true, false],
            range: {
                'min': parseInt(min),
                'max': parseInt(max)
            },
            step: 1
        });

        rangeSlider.noUiSlider.on('update', function(values) {
            rangeAmount.value = parseInt(values[0]);
        });
    }

    // Form Validation
    const contactForm = document.getElementById('contact-form');
    if(contactForm) {
        contactForm.addEventListener('submit', function(e) {
            const phone = document.getElementById('phone');
            const phonePattern = /^[\d\s\-\(\)]+$/;

            if(phone && !phonePattern.test(phone.value)) {
                e.preventDefault();
                alert('{{ __("Please enter a valid phone number") }}');
                phone.focus();
            }
        });
    }

    // Smooth Scrolling for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if(href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if(target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });
});
</script>
@endpush
