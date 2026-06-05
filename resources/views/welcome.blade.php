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
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        .animate-scroll {
            display: flex;
            width: max-content;
            animation: scroll 35s linear infinite;
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

        /* CSS section mengapa memilih kami */
        .planet-container {
            position: relative;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .planet-ring {
            position: absolute;
            inset: 0;
            border-radius: 2rem;
            padding: 2px;
            background: conic-gradient(from 0deg, transparent 60%, #FF9B00 100%);
            animation: spin-magic 3s linear infinite;
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
        }

        @keyframes spin-magic {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .planet-card-inner {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            border-radius: 1.5rem;
            width: 100%;
            padding: 2rem;
            position: relative;
            z-index: 2;
            border: 1px solid rgba(255, 155, 0, 0.1);
        }

        /* Css untuk section testimoni */
        .perspective-container {
            perspective: 1000px;
        }

        .mask-cylinder {
            -webkit-mask-image: linear-gradient(to bottom, transparent, black 15%, black 85%, transparent);
            mask-image: linear-gradient(to bottom, transparent, black 15%, black 85%, transparent);
        }

        @keyframes scrollUp {
            0% { transform: translateY(0); }
            100% { transform: translateY(-50%); }
        }

        @keyframes scrollDown {
            0% { transform: translateY(-50%); }
            100% { transform: translateY(0); }
        }

        .animate-scroll-up {
            animation: scrollUp linear infinite;
        }

        .animate-scroll-down {
            animation: scrollDown linear infinite;
        }

        .animate-scroll-up:hover,
        .animate-scroll-down:hover {
            animation-play-state: paused;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-800 antialiased">

    <nav id="navbar" class="fixed w-full z-50 transition-all duration-300 transform translate-y-0 bg-transparent text-white py-2">
        <div class="w-full px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <div class="flex-shrink-0 flex items-center gap-3">
                    <img src="{{ asset('img/logo-brait.png') }}" alt="Logo Brait Jaya"
                        class="h-10 w-auto object-contain logo-silhouette transition-all duration-300">
                    <span id="nav-logo" class="font-extrabold text-2xl tracking-tight text-white transition-colors duration-300">
                        BRAIT JAYA
                    </span>
                </div>

                <div class="hidden lg:flex flex-1 justify-center gap-8 items-center">
                    <a href="#beranda" class="nav-link text-white hover:text-brand-primary font-semibold transition">Beranda</a>

                    @foreach ($categories as $catNav)
                        <div class="relative dropdown py-6 group">
                            <a href="#layanan" class="nav-link text-white group-hover:text-brand-primary font-semibold transition flex items-center">
                                {{ $catNav->name }}
                                <svg class="w-4 h-4 ml-1 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </a>
                            <ul class="dropdown-menu absolute hidden pt-4 top-full left-0 w-64 bg-white border border-slate-100 shadow-xl rounded-xl overflow-hidden z-50 transform -translate-y-2 opacity-0 group-hover:opacity-100 group-hover:block transition-all duration-300">
                                @foreach ($catNav->products as $prodNav)
                                    <li>
                                        <a href="#layanan" class="block px-4 py-3 text-sm text-slate-700 hover:bg-brand-primary/10 hover:text-brand-primary font-bold transition-colors border-b border-slate-50 last:border-0">
                                            {{ $prodNav->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach

                    <a href="#keunggulan" class="nav-link text-white hover:text-brand-primary font-semibold transition">Keunggulan</a>
                    <a href="#testimoni" class="nav-link text-white hover:text-brand-primary font-semibold transition">Klien Kami</a>
                    <a href="#kontak" class="nav-link text-white hover:text-brand-primary font-semibold transition">Kontak</a>
                </div>

                <div class="lg:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-inherit focus:outline-none hover:text-brand-primary transition">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="hidden lg:hidden bg-white shadow-xl absolute top-full left-0 w-full border-t border-slate-100 max-h-[80vh] overflow-y-auto z-50">
            <div class="px-4 pt-2 pb-6 space-y-1">
                <a href="#beranda" class="mobile-link block px-3 py-3 text-slate-700 font-bold hover:bg-slate-50 hover:text-brand-primary rounded-md">Beranda</a>
                @foreach ($categories as $catNav)
                    <div class="px-3 py-3">
                        <span class="block text-brand-primary font-bold mb-2">{{ $catNav->name }}</span>
                        <div class="pl-4 space-y-2 border-l-2 border-slate-100">
                            @foreach ($catNav->products as $prodNav)
                                <a href="#layanan" class="mobile-link block text-sm font-semibold text-slate-500 hover:text-brand-primary py-1.5">{{ $prodNav->name }}</a>
                            @endforeach
                        </div>
                    </div>
                @endforeach
                <a href="#keunggulan" class="mobile-link block px-3 py-3 text-slate-700 font-bold hover:bg-slate-50 hover:text-brand-primary rounded-md">Keunggulan</a>
                <a href="#testimoni" class="mobile-link block px-3 py-3 text-slate-700 font-bold hover:bg-slate-50 hover:text-brand-primary rounded-md">Klien Kami</a>
                <a href="#kontak" class="mobile-link block px-3 py-3 text-slate-700 font-bold hover:bg-slate-50 hover:text-brand-primary rounded-md">Kontak</a>
            </div>
        </div>
    </nav>

    <section id="beranda" class="relative w-full h-screen flex flex-col items-center justify-center overflow-hidden">
        <div class="video-wrapper">
            @php
                $ytId = 'Fi_VIrnhF2A';
                if ($hero && preg_match('/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/i', $hero->video_url, $matches)) {
                    $ytId = $matches[1];
                }
            @endphp
            <iframe src="https://www.youtube.com/embed/{{ $ytId }}?autoplay=1&mute=1&playsinline=1&controls=0&showinfo=0&rel=0&loop=1&playlist={{ $ytId }}&end=70"
                frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
            </iframe>
        </div>

        <div class="absolute inset-0 bg-slate-900/70 z-10"></div>

        <div class="relative z-20 text-center px-4 max-w-5xl mx-auto flex-grow flex flex-col justify-center items-center pb-24">
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-white mb-6 leading-tight drop-shadow-2xl">
                {{ $hero->title ?? 'Otomatisasi Cerdas untuk Kemajuan Bisnis Anda' }}
            </h1>
            <p class="text-lg md:text-xl text-white/80 mb-10 font-medium max-w-3xl leading-relaxed drop-shadow">
                {{ $hero->subtitle ?? 'Kami menganalisis proses Anda, menemukan potensi tersembunyi, dan menggunakan teknologi modern untuk membuat perusahaan Anda tumbuh lebih cepat, cerdas, dan menguntungkan.' }}
            </p>
            <a href="#layanan" class="inline-flex items-center justify-center bg-brand-primary text-white font-extrabold px-8 py-4 rounded-md hover:bg-brand-accent hover:text-slate-900 transition-colors duration-300 shadow-[0_0_20px_rgba(255,155,0,0.4)]">
                {{ $hero->cta_text ?? 'Mulai Konsultasi Gratis' }}
            </a>
        </div>

        <div class="absolute bottom-0 left-0 w-full bg-slate-900/60 backdrop-blur-md border-t border-white/10 z-20 overflow-hidden flex items-center h-20">
            <div class="animate-scroll">
                <div class="flex items-center gap-16 px-8 text-white/50 shrink-0">
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> MIKROTIK</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> HIKVISION</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> LARAVEL</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> CISCO</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> DELL EMC</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> UBIQUITI</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> REACT JS</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> DAHUA</div>
                </div>
                <div class="flex items-center gap-16 px-8 text-white/50 shrink-0">
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> MIKROTIK</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> HIKVISION</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> LARAVEL</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> CISCO</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> DELL EMC</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> UBIQUITI</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> REACT JS</div>
                    <div class="flex items-center text-2xl font-extrabold cursor-default"> DAHUA</div>
                </div>
            </div>
        </div>
    </section>

    <section id="layanan" class="py-24 bg-gradient-to-b from-slate-50 to-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div class="absolute -top-[10%] -right-[10%] w-[40%] h-[40%] rounded-full bg-brand-primary/5 blur-3xl"></div>
            <div class="absolute -bottom-[10%] -left-[10%] w-[40%] h-[40%] rounded-full bg-brand-secondary/5 blur-3xl"></div>
        </div>

        <div class="max-w-[1200px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-slate-900 to-slate-700 sm:text-4xl">
                    Layanan & Solusi
                </h2>
                <p class="mt-4 text-lg text-slate-600 max-w-2xl mx-auto">
                    Transformasi digital bisnis Anda dimulai dari sini. Pilih kategori di bawah untuk menemukan solusi spesifik yang kami tawarkan.
                </p>
            </div>

            <div class="flex flex-wrap justify-center gap-3 mb-12">
                @foreach ($categories as $index => $category)
                    <button class="cat-btn px-6 py-3 rounded-2xl text-sm font-semibold transition-all duration-300 border {{ $index === 0 ? 'bg-brand-primary text-white border-brand-primary shadow-lg shadow-brand-primary/30' : 'bg-white text-slate-600 border-slate-200 hover:border-brand-primary/50 hover:text-brand-primary hover:shadow-md' }}"
                        data-target="cat-{{ $category->id }}">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>

            <div class="relative min-h-[400px]">
                @foreach ($categories as $catIndex => $category)
                    <div id="cat-{{ $category->id }}"
                        class="cat-content transition-all duration-500 ease-in-out {{ $catIndex === 0 ? 'opacity-100 translate-y-0 relative' : 'opacity-0 translate-y-4 absolute inset-0 pointer-events-none hidden' }}">

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                            @foreach ($category->products as $product)
                                <div class="group bg-white rounded-3xl shadow-sm hover:shadow-xl border border-slate-100 overflow-hidden transition-all duration-300 transform hover:-translate-y-2 flex flex-col h-full">

                                    <div class="h-56 w-full bg-slate-50/50 relative p-6 flex justify-center items-center border-b border-slate-100 overflow-hidden">
                                        <div class="absolute inset-0 bg-gradient-to-br from-brand-primary/5 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                                class="object-contain h-full w-auto relative z-10 group-hover:scale-110 transition-transform duration-500">
                                        @else
                                            <div class="w-full h-full rounded-2xl bg-gradient-to-br from-slate-100 to-slate-200 flex items-center justify-center border border-white shadow-inner relative z-10">
                                                <svg class="w-12 h-12 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 002-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="p-6 flex flex-col flex-grow">
                                        <h3 class="text-xl font-bold text-slate-800 mb-2 group-hover:text-brand-primary transition-colors">
                                            {{ $product->name }}
                                        </h3>
                                        
                                        <p class="text-slate-600 text-sm mb-6 line-clamp-3 leading-relaxed flex-grow">
                                            {{ $product->short_description ?: Str::limit($product->long_description, 100) }}
                                        </p>

                                        @php
                                            $features = is_array($product->features) ? $product->features : (json_decode($product->features, true) ?? []);
                                        @endphp
                                        @if(count($features) > 0)
                                            <div class="flex flex-wrap gap-2 mb-6">
                                                @foreach(array_slice($features, 0, 2) as $feature)
                                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-brand-primary/10 text-brand-primary">
                                                        <svg class="mr-1.5 h-3 w-3 text-brand-primary" fill="currentColor" viewBox="0 0 8 8"><circle cx="4" cy="4" r="3"></circle></svg>
                                                        {{ $feature }}
                                                    </span>
                                                @endforeach
                                                @if(count($features) > 2)
                                                    <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-slate-100 text-slate-600">
                                                        +{{ count($features) - 2 }}
                                                    </span>
                                                @endif
                                            </div>
                                        @endif

                                        <div class="mt-auto pt-4 border-t border-slate-100">
                                            <a href="{{ route('layanan.show', $product->id) }}" class="inline-flex items-center text-sm font-bold text-brand-primary group-hover:text-brand-secondary transition-colors">
                                                Pelajari Lebih Lanjut
                                                <svg class="ml-2 w-4 h-4 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="keunggulan" class="relative py-24 bg-slate-900 bg-fixed bg-center bg-cover"
        style="background-image: url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?q=80&w=2072&auto=format&fit=crop');">
        <div class="absolute inset-0 bg-slate-900/85 z-0"></div>
        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-white sm:text-4xl relative inline-block">
                    Mengapa Memilih Kami?
                    <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-1/2 h-1 bg-gradient-to-r from-brand-primary to-brand-secondary rounded-full"></div>
                </h2>
                <p class="mt-6 text-lg text-white/80 font-medium max-w-2xl mx-auto">
                    Membangun ekosistem teknologi masa depan untuk pertumbuhan bisnis Anda di era digital perkotaan.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach ($advantages as $index => $item)
                    <div class="planet-container group">
                        <div class="planet-ring"></div>
                        <div class="planet-card-inner shadow-2xl transition-transform duration-500 group-hover:-translate-y-2">
                            <div class="text-center mb-4">
                                <span class="text-4xl font-extrabold tracking-tight text-transparent bg-clip-text bg-gradient-to-b from-brand-primary to-brand-secondary/40 select-none">
                                    {{ sprintf('%02d', $index + 1) }}
                                </span>
                            </div>
                            <h3 class="text-lg font-bold text-slate-900 mb-3 text-center">{{ $item->title }}</h3>
                            <p class="text-xs text-slate-600 leading-relaxed text-center">{{ $item->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="testimoni" class="py-24 bg-slate-50 relative overflow-hidden flex flex-col justify-center">
        <div class="absolute top-0 left-0 w-full h-full overflow-hidden z-0 pointer-events-none">
            <div class="absolute -top-24 -left-24 w-96 h-96 bg-brand-primary/10 rounded-full blur-3xl"></div>
            <div class="absolute bottom-10 right-10 w-72 h-72 bg-brand-secondary/10 rounded-full blur-3xl"></div>
            <div class="absolute inset-0 pattern-dots opacity-40"></div>
        </div>

        <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900 sm:text-4xl relative inline-block">
                    Jejak Digital Keberhasilan
                    <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-1/2 h-1 bg-gradient-to-r from-brand-primary to-brand-secondary rounded-full"></div>
                </h2>
                <p class="mt-6 text-lg text-slate-600 font-medium max-w-2xl mx-auto">
                    Kepercayaan adalah pondasi utama. Simak bagaimana ekosistem teknologi kami mengakselerasi
                    produktivitas puluhan mitra bisnis.
                </p>
            </div>

            <div class="perspective-container mask-cylinder h-[600px] overflow-hidden relative w-full mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 h-full w-full">
                    @if ($testimonials->isEmpty())
                        <div class="flex flex-col gap-6 animate-scroll-up" style="animation-duration: 40s;">
                            <div class="bg-white/80 backdrop-blur-md rounded-3xl p-6 shadow-xl border border-slate-100">
                                <p class="text-slate-700 leading-relaxed mb-6 font-medium text-sm">"Sistem UPT PKB sangat intuitif. Laporan lancar."</p>
                                <div class="flex items-center gap-4">
                                    <img src="https://ui-avatars.com/api/?name=Hendra+G&background=f1f5f9&color=0f172a&bold=true" class="w-10 h-10 rounded-full">
                                    <div>
                                        <h4 class="font-bold text-slate-900 text-xs">Hendra G.</h4>
                                        <p class="text-[10px] text-brand-primary font-bold">UPT PKB</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="flex flex-col gap-6 animate-scroll-up" style="animation-duration: 40s;">
                            @foreach ($testimonials as $index => $item)
                                @if ($index % 3 == 0)
                                    <div class="bg-white/80 backdrop-blur-md rounded-3xl p-6 shadow-xl border border-slate-100 transform transition-transform hover:scale-[1.02]">
                                        <p class="text-slate-700 leading-relaxed mb-6 font-medium text-sm">"{{ $item->message }}"</p>
                                        <div class="flex items-center gap-4">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}&background=f1f5f9&color=0f172a&bold=true" alt="Klien" class="w-10 h-10 rounded-full">
                                            <div>
                                                <h4 class="font-bold text-slate-900 text-xs">{{ $item->name }}</h4>
                                                <p class="text-[10px] text-brand-primary font-bold">{{ $item->company_or_role }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="hidden md:flex flex-col gap-6 animate-scroll-down" style="animation-duration: 45s;">
                            @foreach ($testimonials as $index => $item)
                                @if ($index % 3 == 1)
                                    <div class="bg-white/80 backdrop-blur-md rounded-3xl p-6 shadow-xl border border-slate-100 transform transition-transform hover:scale-[1.02]">
                                        <p class="text-slate-700 leading-relaxed mb-6 font-medium text-sm">"{{ $item->message }}"</p>
                                        <div class="flex items-center gap-4">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}&background=f1f5f9&color=0f172a&bold=true" alt="Klien" class="w-10 h-10 rounded-full">
                                            <div>
                                                <h4 class="font-bold text-slate-900 text-xs">{{ $item->name }}</h4>
                                                <p class="text-[10px] text-brand-primary font-bold">{{ $item->company_or_role }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="hidden lg:flex flex-col gap-6 animate-scroll-up" style="animation-duration: 35s;">
                            @foreach ($testimonials as $index => $item)
                                @if ($index % 3 == 2)
                                    <div class="bg-white/80 backdrop-blur-md rounded-3xl p-6 shadow-xl border border-slate-100 transform transition-transform hover:scale-[1.02]">
                                        <p class="text-slate-700 leading-relaxed mb-6 font-medium text-sm">"{{ $item->message }}"</p>
                                        <div class="flex items-center gap-4">
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($item->name) }}&background=f1f5f9&color=0f172a&bold=true" alt="Klien" class="w-10 h-10 rounded-full">
                                            <div>
                                                <h4 class="font-bold text-slate-900 text-xs">{{ $item->name }}</h4>
                                                <p class="text-[10px] text-brand-primary font-bold">{{ $item->company_or_role }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <section id="kontak" class="py-24 bg-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold text-slate-900 sm:text-4xl relative inline-block">
                    Hubungi Kami
                    <div class="absolute -bottom-3 left-1/2 transform -translate-x-1/2 w-1/2 h-1 bg-gradient-to-r from-brand-primary to-brand-secondary rounded-full"></div>
                </h2>
                <p class="mt-6 text-lg text-slate-600 font-medium">Konsultasikan kebutuhan IT Anda secara gratis bersama tim ahli kami.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 bg-slate-50 p-6 md:p-10 rounded-3xl border border-slate-100 shadow-xl">
                <div class="flex flex-col justify-center">
                    <h3 class="text-2xl font-bold text-slate-900 mb-6">Informasi Kontak</h3>
                    <ul class="space-y-6">
                        <li class="flex items-start">
                            <div class="bg-brand-primary/20 p-3 rounded-full mr-4 text-brand-primary">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
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
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <div>
                                <span class="block font-bold text-slate-800 text-lg">Email</span>
                                <a href="mailto:info@braitjaya.co.id" class="text-brand-primary hover:text-brand-accent transition">info@braitjaya.co.id</a>
                            </div>
                        </li>
                    </ul>

                    <a href="https://wa.me/6281234567890" target="_blank" class="mt-10 inline-flex justify-center items-center px-8 py-4 bg-slate-900 text-white font-bold rounded-full hover:bg-brand-primary transition-colors duration-300 shadow-lg w-max">
                        Chat via WhatsApp
                    </a>
                </div>

                <div class="w-full h-[400px] lg:h-full min-h-[400px] rounded-2xl overflow-hidden shadow-inner border border-slate-200">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d127116.59014164395!2d105.1837699!3d-5.4168069!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e40da4672e0a2e5%3A0x335da4bbffab80f7!2sBandar%20Lampung%2C%20Kota%20Bandar%20Lampung%2C%20Lampung!5e0!3m2!1sid!2sid!4v1650000000000!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>

    <footer class="bg-slate-900 text-white pt-12 pb-8 border-t-4 border-brand-primary">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-center border-b border-slate-800 pb-8 mb-8">
                <div class="mb-4 md:mb-0">
                    <span class="font-extrabold text-2xl text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-accent tracking-tight">BRAIT JAYA SOLUSINDO</span>
                </div>
                <div class="flex space-x-6">
                    <a href="#" class="text-slate-500 hover:text-brand-primary transition">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-slate-500 hover:text-brand-primary transition">
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
            <div class="text-center">
                <p class="text-slate-500 text-sm font-medium">© 2026 PT. BRAIT JAYA SOLUSINDO. Hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // ==========================================
            // 1. LOGIKA SWITCHER KATEGORI (Desain Baru)
            // ==========================================
            const buttons = document.querySelectorAll('.cat-btn');
            const contents = document.querySelectorAll('.cat-content');

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const targetId = button.getAttribute('data-target');

                    // Reset state seluruh tombol
                    buttons.forEach(btn => {
                        btn.classList.remove('bg-brand-primary', 'text-white', 'border-brand-primary', 'shadow-lg', 'shadow-brand-primary/30');
                        btn.classList.add('bg-white', 'text-slate-600', 'border-slate-200');
                    });

                    // Beri styling aktif pada tombol yang diklik
                    button.classList.remove('bg-white', 'text-slate-600', 'border-slate-200');
                    button.classList.add('bg-brand-primary', 'text-white', 'border-brand-primary', 'shadow-lg', 'shadow-brand-primary/30');

                    // Animasi sembunyikan semua panel
                    contents.forEach(content => {
                        content.classList.remove('opacity-100', 'translate-y-0', 'relative');
                        content.classList.add('opacity-0', 'translate-y-4', 'absolute', 'inset-0', 'pointer-events-none');
                        
                        setTimeout(() => {
                            if (!content.classList.contains('opacity-100')) {
                                content.classList.add('hidden');
                            }
                        }, 300);
                    });

                    // Tampilkan panel yang dituju
                    const targetContent = document.getElementById(targetId);
                    if(targetContent) {
                        targetContent.classList.remove('hidden');
                        
                        setTimeout(() => {
                            targetContent.classList.remove('opacity-0', 'translate-y-4', 'absolute', 'inset-0', 'pointer-events-none');
                            targetContent.classList.add('opacity-100', 'translate-y-0', 'relative');
                        }, 50);
                    }
                });
            });

            // ==========================================
            // 2. LOGIKA NAVBAR SCROLL & MOBILE MENU
            // ==========================================
            let lastScrollTop = 0;
            const navbar = document.getElementById('navbar');
            const navLogoText = document.getElementById('nav-logo');
            const navLogoImg = document.querySelector('img.logo-silhouette'); 
            const navLinks = document.querySelectorAll('.nav-link');

            const mobileBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileLinks = document.querySelectorAll('.mobile-link');

            window.addEventListener('scroll', function() {
                let scrollTop = window.scrollY || document.documentElement.scrollTop;

                if (scrollTop > 50) {
                    navbar.classList.add('bg-white/95', 'backdrop-blur-md', 'shadow-md');
                    navbar.classList.remove('bg-transparent', 'text-white');
                    navbar.classList.add('text-slate-700');

                    if (navLogoText) {
                        navLogoText.classList.remove('text-white');
                        navLogoText.classList.add('text-transparent', 'bg-clip-text', 'bg-gradient-to-r', 'from-brand-primary', 'to-brand-accent');
                    }

                    if (navLogoImg) {
                        navLogoImg.classList.remove('logo-silhouette');
                    }

                    navLinks.forEach(link => {
                        link.classList.remove('text-white');
                        link.classList.add('text-slate-700');
                    });
                } else {
                    navbar.classList.remove('bg-white/95', 'backdrop-blur-md', 'shadow-md', 'text-slate-700');
                    navbar.classList.add('bg-transparent', 'text-white');

                    if (navLogoText) {
                        navLogoText.classList.add('text-white');
                        navLogoText.classList.remove('text-transparent', 'bg-clip-text', 'bg-gradient-to-r', 'from-brand-primary', 'to-brand-accent');
                    }

                    if (navLogoImg) {
                        navLogoImg.classList.add('logo-silhouette');
                    }

                    navLinks.forEach(link => {
                        link.classList.add('text-white');
                        link.classList.remove('text-slate-700');
                    });
                }

                if (scrollTop > lastScrollTop && scrollTop > 150) {
                    navbar.classList.add('-translate-y-full');
                    mobileMenu.classList.add('hidden'); 
                } else {
                    navbar.classList.remove('-translate-y-full');
                }

                lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            });

            // ==========================================
            // 3. HAMBURGER MENU TOGGLE (MOBILE)
            // ==========================================
            mobileBtn.addEventListener('click', function() {
                mobileMenu.classList.toggle('hidden');
                if (window.scrollY <= 50) {
                    navbar.classList.toggle('bg-slate-900/90');
                    navbar.classList.toggle('backdrop-blur-md');
                }
            });

            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                });
            });

        });
    </script>
</body>

</html>