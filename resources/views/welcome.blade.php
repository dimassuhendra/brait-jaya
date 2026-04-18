<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. BRAIT JAYA SOLUSINDO - Solusi IT Terintegrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            primary: '#FF9B00',
                            secondary: '#FFE100',
                            accent: '#FFC900',
                            light: '#EBE389'
                        }
                    },
                    fontFamily: {
                        sans: ['"Plus Jakarta Sans"', 'sans-serif']
                    }
                }
            }
        }
    </script>

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 155, 0, 0.2);
        }

        .pattern-dots {
            background-image: radial-gradient(rgba(255, 155, 0, 0.15) 2px, transparent 2px);
            background-size: 30px 30px;
        }

        /* Animasi Logo Berjalan (Marquee) */
        @keyframes scroll {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .animate-scroll {
            display: flex;
            width: max-content;
            animation: scroll 35s linear infinite;
            /* Angka 35s bisa diubah untuk mengatur kecepatan */
        }

        .animate-scroll:hover {
            animation-play-state: paused;
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .video-wrapper {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            pointer-events: none;
            background-color: #1e293b;
        }

        .video-wrapper iframe {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100vw;
            height: 56.25vw;
        }

        @media (min-width: 768px) {
            .video-wrapper iframe {
                min-height: 100vh;
                min-width: 177.77vh;
            }
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased">

    <nav id="navbar"
        class="fixed w-full z-50 transition-all duration-300 transform translate-y-0 bg-transparent text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <div class="flex-shrink-0 flex items-center">
                    <span id="nav-logo"
                        class="font-extrabold text-2xl tracking-tight text-white transition-colors duration-300">
                        BRAIT JAYA
                    </span>
                </div>

                <div class="hidden lg:flex flex-1 justify-center gap-8 items-center">
                    <a href="#beranda"
                        class="nav-link text-white hover:text-brand-primary font-semibold transition">Beranda</a>

                    @foreach ($categories as $catNav)
                        <div class="relative dropdown py-6 group">
                            <a href="#layanan"
                                class="nav-link text-white group-hover:text-brand-primary font-semibold transition flex items-center">
                                {{ $catNav->name }}
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>

                            <ul
                                class="dropdown-menu absolute hidden pt-4 top-full left-0 w-64 bg-white border border-slate-100 shadow-xl rounded-xl overflow-hidden z-50 transform -translate-y-2">
                                @foreach ($catNav->products as $prodNav)
                                    <li>
                                        <a href="#layanan"
                                            class="block px-4 py-3 text-sm text-slate-700 hover:bg-brand-light/30 hover:text-brand-primary font-medium transition-colors border-b border-slate-50 last:border-0">
                                            {{ $prodNav->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach

                    <a href="#kontak"
                        class="nav-link text-white hover:text-brand-primary font-semibold transition">Kontak</a>
                </div>

                <div class="lg:hidden flex items-center">
                    <button id="mobile-menu-btn"
                        class="text-inherit focus:outline-none hover:text-brand-primary transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu"
            class="hidden lg:hidden bg-white shadow-xl absolute top-full left-0 w-full border-t border-slate-100 max-h-[80vh] overflow-y-auto">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="#beranda"
                    class="mobile-link block px-3 py-3 text-slate-700 font-bold hover:bg-slate-50 hover:text-brand-primary rounded-md">Beranda</a>

                @foreach ($categories as $catNav)
                    <div class="px-3 py-3">
                        <span class="block text-brand-primary font-bold mb-2">{{ $catNav->name }}</span>
                        <div class="pl-4 space-y-2 border-l-2 border-slate-100">
                            @foreach ($catNav->products as $prodNav)
                                <a href="#layanan"
                                    class="mobile-link block text-sm font-semibold text-slate-500 hover:text-brand-primary py-1">{{ $prodNav->name }}</a>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <a href="#kontak"
                    class="mobile-link block px-3 py-3 text-slate-700 font-bold hover:bg-slate-50 hover:text-brand-primary rounded-md border-t border-slate-100 mt-2">Kontak</a>
            </div>
        </div>
    </nav>

    <section id="beranda" class="relative w-full h-screen flex flex-col items-center justify-center overflow-hidden">

        <div class="video-wrapper">
            @php
                // ID Video "PT. BRAIT JAYA SOLUSINDO" yang baru
                $ytId = 'Fi_VIrnhF2A';

                // Baris ini mengecek apakah di database ada URL lain, jika ada akan ditimpa
                if (
                    $hero &&
                    preg_match(
                        '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i',
                        $hero->video_url,
                        $matches,
                    )
                ) {
                    $ytId = $matches[1];
                }
            @endphp
            <iframe
                src="https://www.youtube.com/embed/{{ $ytId }}?autoplay=1&mute=1&playsinline=1&controls=0&showinfo=0&rel=0&loop=1&playlist={{ $ytId }}&end=70"
                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
            </iframe>
        </div>

        <div class="absolute inset-0 bg-slate-900/70 z-10"></div>

        <div
            class="relative z-20 text-center px-4 max-w-5xl mx-auto flex-grow flex flex-col justify-center items-center pb-24">

            <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 leading-tight drop-shadow-2xl">
                {{ $hero->title ?? 'Otomatisasi Cerdas untuk Kemajuan Bisnis Anda' }}
            </h1>

            <p class="text-lg md:text-xl text-white/80 mb-10 font-medium max-w-3xl leading-relaxed drop-shadow">
                {{ $hero->subtitle ?? 'Kami menganalisis proses Anda, menemukan potensi tersembunyi, dan menggunakan teknologi modern untuk membuat perusahaan Anda tumbuh lebih cepat, cerdas, dan menguntungkan.' }}
            </p>

            <a href="#layanan"
                class="inline-flex items-center justify-center bg-brand-primary text-white font-extrabold px-8 py-4 rounded-md hover:bg-brand-accent hover:text-slate-900 transition-colors duration-300 shadow-[0_0_20px_rgba(255,155,0,0.4)]">
                {{ $hero->cta_text ?? 'Mulai Konsultasi Gratis' }}
            </a>
        </div>

        <div
            class="absolute bottom-0 left-0 w-full bg-slate-900/60 backdrop-blur-md border-t border-white/10 z-20 overflow-hidden flex items-center h-20">
            <div class="animate-scroll">
                <div class="flex items-center gap-16 px-8 text-white/50 shrink-0">
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg> MIKROTIK</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                        </svg> HIKVISION</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 4h16v16H4z" />
                        </svg> LARAVEL</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        </svg> CISCO</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z" />
                        </svg> DELL EMC</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg> UBIQUITI</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 4h16v16H4z" />
                        </svg> REACT JS</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                        </svg> DAHUA</div>
                </div>

                <div class="flex items-center gap-16 px-8 text-white/50 shrink-0">
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg> MIKROTIK</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                        </svg> HIKVISION</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 4h16v16H4z" />
                        </svg> LARAVEL</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        </svg> CISCO</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z" />
                        </svg> DELL EMC</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                        </svg> UBIQUITI</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path d="M4 4h16v16H4z" />
                        </svg> REACT JS</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"><svg class="w-8 h-8 mr-2"
                            fill="currentColor" viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                        </svg> DAHUA</div>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="py-24 bg-slate-50 relative">
        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-slate-900 sm:text-4xl">Layanan & Solusi</h2>
                <p class="mt-4 text-lg text-slate-600">Pilih kategori untuk melihat solusi spesifik yang kami tawarkan.
                </p>
            </div>

            <div class="flex justify-center mb-10">
                <div class="bg-slate-200/70 p-1.5 rounded-full inline-flex overflow-x-auto hide-scrollbar max-w-full">
                    @foreach ($categories as $index => $category)
                        <button
                            class="cat-tab whitespace-nowrap px-6 py-2.5 rounded-full text-sm font-bold transition-all duration-300 {{ $index === 0 ? 'bg-brand-primary text-white shadow-md' : 'text-slate-600 hover:text-brand-primary' }}"
                            data-target="cat-{{ $category->id }}">
                            {{ $category->name }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-[2rem] shadow-xl border border-slate-100 overflow-hidden min-h-[500px]">
                @foreach ($categories as $catIndex => $category)
                    <div id="cat-{{ $category->id }}"
                        class="cat-content w-full flex flex-col md:flex-row {{ $catIndex === 0 ? '' : 'hidden' }}">

                        <div class="w-full md:w-1/3 bg-slate-50/50 border-r border-slate-100 p-6 flex flex-col gap-2">
                            @foreach ($category->products as $prodIndex => $product)
                                <button
                                    class="prod-tab w-full text-left px-5 py-4 rounded-xl font-bold text-sm transition-all duration-300 flex items-center {{ $prodIndex === 0 ? 'bg-brand-primary/10 text-brand-primary border-l-4 border-brand-primary' : 'text-slate-600 hover:bg-slate-100 hover:text-brand-primary' }}"
                                    data-target="prod-{{ $product->id }}">
                                    <div class="mr-3 p-1.5 rounded-full bg-white shadow-sm border border-slate-200">
                                        <svg class="w-4 h-4 text-slate-700" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    {{ $product->name }}
                                </button>
                            @endforeach
                        </div>

                        <div class="w-full md:w-2/3 p-8 lg:p-12 flex items-center justify-center bg-white relative">
                            @foreach ($category->products as $prodIndex => $product)
                                <div id="prod-{{ $product->id }}"
                                    class="prod-content w-full text-center {{ $prodIndex === 0 ? '' : 'hidden' }}">
                                    <div class="h-48 md:h-64 w-full mb-8 flex justify-center items-center">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}"
                                                alt="{{ $product->name }}" class="object-contain h-full w-auto">
                                        @else
                                            <div
                                                class="w-full h-full max-w-sm rounded-3xl bg-gradient-to-br from-brand-light/30 to-brand-secondary/30 flex items-center justify-center border border-brand-primary/20 shadow-inner">
                                                <span
                                                    class="text-brand-primary font-extrabold text-xl">{{ $product->name }}</span>
                                            </div>
                                        @endif
                                    </div>

                                    <h3 class="text-3xl font-extrabold text-slate-900 mb-4">{{ $product->name }}</h3>
                                    <p class="text-slate-600 mb-8 max-w-xl mx-auto leading-relaxed">
                                        {{ $product->long_description }}</p>

                                    <a href="#"
                                        class="inline-flex items-center text-brand-primary font-bold hover:text-brand-accent transition-colors">
                                        Informasi Detail & Portofolio
                                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-16 bg-slate-900 pattern-dots border-y border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h3 class="text-xl md:text-2xl font-bold text-white">Didukung Oleh Teknologi Global</h3>
                <p class="text-brand-light text-sm mt-2">Kami menggunakan perangkat & framework terbaik di industri IT.
                </p>
            </div>

            <div
                class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-70 hover:opacity-100 transition-opacity duration-300">
                <div
                    class="flex items-center justify-center text-xl font-extrabold text-slate-400 hover:text-brand-primary transition">
                    <svg class="w-8 h-8 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                    </svg>
                    MIKROTIK
                </div>
                <div
                    class="flex items-center justify-center text-xl font-extrabold text-slate-400 hover:text-brand-primary transition">
                    <svg class="w-8 h-8 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                    </svg>
                    HIKVISION
                </div>
                <div
                    class="flex items-center justify-center text-xl font-extrabold text-slate-400 hover:text-brand-primary transition">
                    <svg class="w-8 h-8 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M4 4h16v16H4z" />
                    </svg>
                    LARAVEL
                </div>
                <div
                    class="flex items-center justify-center text-xl font-extrabold text-slate-400 hover:text-brand-primary transition">
                    <svg class="w-8 h-8 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg>
                    CISCO
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900 sm:text-4xl relative inline-block">
                    Hubungi Kami
                    <div
                        class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-1/2 h-1 bg-gradient-to-r from-brand-primary to-brand-secondary rounded-full">
                    </div>
                </h2>
                <p class="mt-6 text-lg text-slate-600 font-medium">Konsultasikan kebutuhan IT Anda secara gratis
                    bersama tim ahli kami.</p>
            </div>

            <div
                class="grid grid-cols-1 lg:grid-cols-2 gap-12 bg-slate-50 p-6 md:p-10 rounded-3xl border border-slate-100 shadow-xl">
                <div class="flex flex-col justify-center">
                    <h3 class="text-2xl font-bold text-slate-900 mb-6">Informasi Kontak</h3>
                    <ul class="space-y-6">
                        <li class="flex items-start">
                            <div class="bg-brand-primary/20 p-3 rounded-full mr-4 text-brand-primary">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <span class="block font-bold text-slate-800 text-lg">Alamat Kantor</span>
                                <span class="text-slate-600">Bandar Lampung, Provinsi Lampung, Indonesia</span>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div class="bg-brand-primary/20 p-3 rounded-full mr-4 text-brand-primary">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <span class="block font-bold text-slate-800 text-lg">Email</span>
                                <a href="mailto:info@braitjaya.co.id"
                                    class="text-brand-primary hover:text-brand-accent transition">info@braitjaya.co.id</a>
                            </div>
                        </li>
                    </ul>

                    <a href="https://wa.me/6281234567890" target="_blank"
                        class="mt-10 inline-flex justify-center items-center px-8 py-4 bg-slate-900 text-white font-bold rounded-full hover:bg-brand-primary transition-colors duration-300 shadow-lg w-max">
                        Chat via WhatsApp
                    </a>
                </div>

                <div
                    class="w-full h-[400px] lg:h-full min-h-[400px] rounded-2xl overflow-hidden shadow-inner border border-slate-200">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127116.59014164395!2d105.1837699!3d-5.4168069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40da4672e0a2e5%3A0x335da4bbffab80f7!2sBandar%20Lampung%2C%20Kota%20Bandar%20Lampung%2C%20Lampung!5e0!3m2!1sid!2sid!4v1650000000000!5m2!1sid!2sid"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-white pt-12 pb-8 border-t-4 border-brand-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center border-b border-slate-800 pb-8 mb-8">
                <div class="mb-4 md:mb-0">
                    <span
                        class="font-extrabold text-2xl text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-accent tracking-tight">BRAIT
                        JAYA SOLUSINDO</span>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-slate-500 hover:text-brand-primary transition">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-slate-500 hover:text-brand-primary transition">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="text-center">
                <p class="text-slate-500 text-sm font-medium">
                    © 2026 PT. BRAIT JAYA SOLUSINDO. Hak cipta dilindungi.
                </p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // 1. Logika Switcher Kategori (Tombol Oval Atas)
            const catTabs = document.querySelectorAll('.cat-tab');
            const catContents = document.querySelectorAll('.cat-content');

            for (let i = 0; i < catTabs.length; i++) {
                catTabs[i].addEventListener('click', function() {
                    // Reset semua gaya tombol kategori
                    for (let j = 0; j < catTabs.length; j++) {
                        catTabs[j].classList.remove('bg-brand-primary', 'text-white', 'shadow-md');
                        catTabs[j].classList.add('text-slate-600');
                    }

                    // Berikan gaya aktif ke tombol yang baru di-klik
                    this.classList.add('bg-brand-primary', 'text-white', 'shadow-md');
                    this.classList.remove('text-slate-600');

                    // Sembunyikan semua kontainer
                    for (let k = 0; k < catContents.length; k++) {
                        catContents[k].classList.add('hidden');
                    }

                    // Tampilkan kontainer yang dituju
                    const targetId = this.getAttribute('data-target');
                    document.getElementById(targetId).classList.remove('hidden');
                });
            }

            // 2. Logika Switcher Produk (Daftar Kiri)
            const prodTabs = document.querySelectorAll('.prod-tab');
            const prodContents = document.querySelectorAll('.prod-content');

            for (let i = 0; i < prodTabs.length; i++) {
                prodTabs[i].addEventListener('click', function() {
                    // Batasi pencarian hanya pada kategori induk dari tombol yang di-klik
                    const parentCat = this.closest('.cat-content');

                    // Reset tombol produk lain di kategori yang sama
                    const siblingTabs = parentCat.querySelectorAll('.prod-tab');
                    for (let j = 0; j < siblingTabs.length; j++) {
                        siblingTabs[j].classList.remove('bg-brand-primary/10', 'text-brand-primary',
                            'border-l-4', 'border-brand-primary');
                        siblingTabs[j].classList.add('text-slate-600');
                    }

                    // Aktifkan tombol yang di-klik
                    this.classList.add('bg-brand-primary/10', 'text-brand-primary', 'border-l-4',
                        'border-brand-primary');
                    this.classList.remove('text-slate-600');

                    // Sembunyikan konten produk lain di kategori ini
                    const siblingContents = parentCat.querySelectorAll('.prod-content');
                    for (let k = 0; k < siblingContents.length; k++) {
                        siblingContents[k].classList.add('hidden');
                    }

                    // Tampilkan konten produk yang dituju
                    const targetId = this.getAttribute('data-target');
                    document.getElementById(targetId).classList.remove('hidden');
                });
            }

            let lastScrollTop = 0;
            const navbar = document.getElementById('navbar');
            const navLogo = document.getElementById('nav-logo');
            const navLinks = document.querySelectorAll('.nav-link');

            const mobileBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileLinks = document.querySelectorAll('.mobile-link');

            window.addEventListener('scroll', function() {
                let scrollTop = window.scrollY || document.documentElement.scrollTop;

                // 1. Transparan vs Background Solid
                if (scrollTop > 50) {
                    navbar.classList.add('glass-card');
                    navbar.classList.remove('bg-transparent', 'text-white');
                    navbar.classList.add('text-slate-700'); // Untuk warna ikon hamburger

                    // Ubah logo ke warna brand
                    navLogo.classList.remove('text-white');
                    navLogo.classList.add('text-transparent', 'bg-clip-text', 'bg-gradient-to-r',
                        'from-brand-primary', 'to-brand-accent');

                    // Ubah link desktop jadi abu-abu gelap
                    navLinks.forEach(link => {
                        link.classList.remove('text-white');
                        link.classList.add('text-slate-700');
                    });
                } else {
                    // Reset ke transparan (Hero Section)
                    navbar.classList.remove('glass-card', 'text-slate-700');
                    navbar.classList.add('bg-transparent', 'text-white');

                    // Reset logo ke putih
                    navLogo.classList.add('text-white');
                    navLogo.classList.remove('text-transparent', 'bg-clip-text', 'bg-gradient-to-r',
                        'from-brand-primary', 'to-brand-accent');

                    // Reset link desktop ke putih
                    navLinks.forEach(link => {
                        link.classList.add('text-white');
                        link.classList.remove('text-slate-700');
                    });
                }

                // 2. Hide on Scroll Down, Show on Scroll Up
                if (scrollTop > lastScrollTop && scrollTop > 150) {
                    // Jika scroll ke bawah (sembunyikan ke atas)
                    navbar.classList.add('-translate-y-full');
                    mobileMenu.classList.add('hidden'); // Auto-tutup menu mobile jika ada
                } else {
                    // Jika scroll ke atas (munculkan)
                    navbar.classList.remove('-translate-y-full');
                }

                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            });

            // 3. Hamburger Menu Toggle
            mobileBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                // Pastikan navbar ber-background solid jika menu dibuka saat masih di atas
                if (window.scrollY <= 50) {
                    navbar.classList.toggle('glass-card');
                }
            });

            // 4. Tutup Menu Mobile jika link diklik
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });
        });
    </script>
</body>

</html>
