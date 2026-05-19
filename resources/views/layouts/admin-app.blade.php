<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CMS') - PT. BRAIT JAYA SOLUSINDO</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
                            dark: '#cc7c00'
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
            background-color: #f8fafc;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #FF9B00;
        }
    </style>
    @stack('styles')
</head>

<body class="text-slate-800 antialiased flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-900 text-slate-300 shadow-2xl hidden md:flex flex-col relative z-20">
        <div class="h-20 flex items-center px-6 border-b border-slate-800 bg-slate-950/50">
            <div class="flex items-center justify-center mr-3">
                <img src="{{ asset('img/logo-brait.png') }}" alt="Logo"
                    class="h-7 w-auto object-contain transition-all" style="filter: brightness(0) invert(1);">
            </div>
            <span class="font-extrabold text-lg tracking-tight text-white">BRAIT<span
                    class="text-brand-primary">CMS</span></span>
        </div>

        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
            <div class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2 px-4">Menu Utama</div>

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-3 rounded-lg font-semibold transition-colors group {{ request()->routeIs('admin.dashboard') ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-white' : 'text-slate-500 group-hover:text-brand-primary' }} transition-colors"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                Dashboard
            </a>

            <a href="{{ route('admin.products.index') }}"
                class="flex items-center px-4 py-3 rounded-lg font-semibold transition-colors group {{ request()->routeIs('admin.products.*') ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.products.*') ? 'text-white' : 'text-slate-500 group-hover:text-brand-primary' }} transition-colors"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
                Katalog Layanan
            </a>

            <a href="{{ route('admin.advantages.index') }}"
                class="flex items-center px-4 py-3 rounded-lg font-semibold transition-colors group {{ request()->routeIs('admin.advantages.*') ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.advantages.*') ? 'text-white' : 'text-slate-500 group-hover:text-brand-primary' }} transition-colors"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z">
                    </path>
                </svg>
                Kelola Keunggulan
            </a>

            <a href="{{ route('admin.testimonials.index') }}"
                class="flex items-center px-4 py-3 rounded-lg font-semibold transition-colors group {{ request()->routeIs('admin.testimonials.*') ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.testimonials.*') ? 'text-white' : 'text-slate-500 group-hover:text-brand-primary' }} transition-colors"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                    </path>
                </svg>
                Kelola Testimonial
            </a>

            <a href="{{ route('admin.settings.index') }}"
                class="flex items-center px-4 py-3 rounded-lg font-semibold transition-colors group {{ request()->routeIs('admin.settings.*') ? 'bg-brand-primary text-white shadow-lg shadow-brand-primary/20' : 'text-slate-400 hover:bg-slate-800 hover:text-white' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.settings.*') ? 'text-white' : 'text-slate-500 group-hover:text-brand-primary' }} transition-colors"
                    fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                    </path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                Pengaturan Web
            </a>
        </nav>

        <div class="p-4 border-t border-slate-800 bg-slate-950/30">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex w-full items-center justify-center px-4 py-2.5 border border-slate-700 text-slate-400 hover:text-white hover:bg-red-500/20 hover:border-red-500 rounded-lg font-semibold transition-all">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                        </path>
                    </svg>
                    Keluar Sesi
                </button>
            </form>
        </div>
    </aside>

    <main class="flex-1 flex flex-col h-screen overflow-hidden relative bg-slate-50">

        <header
            class="h-20 bg-white z-10 flex items-center justify-between px-8 shadow-sm border-b border-slate-200 shrink-0">
            <h1 class="text-xl font-bold text-slate-800 flex items-center">
                @yield('title', 'Tinjauan Sistem')
            </h1>
            <div class="flex items-center gap-4 cursor-pointer">
                <div class="text-right hidden md:block">
                    <span
                        class="block text-sm font-bold text-slate-800">{{ auth()->user()->name ?? 'Administrator' }}</span>
                    <span class="block text-xs text-brand-primary font-medium">Divisi TAC / Web Dev</span>
                </div>
                <div
                    class="w-10 h-10 rounded-full bg-brand-primary/10 border border-brand-primary/30 flex items-center justify-center text-brand-primary font-bold shadow-inner">
                    {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                </div>
            </div>
        </header>

        <div class="flex-1 overflow-y-auto">
            @yield('content')
        </div>

    </main>

    @stack('scripts')
</body>

</html>
