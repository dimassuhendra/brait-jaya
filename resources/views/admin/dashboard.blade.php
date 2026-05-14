<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard CMS - PT. BRAIT JAYA SOLUSINDO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
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
            background-color: #f1f5f9;
        }

        /* bg-slate-100 */
        /* Kustomisasi scrollbar untuk sidebar agar lebih rapi */
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
</head>

<body class="text-slate-800 antialiased flex h-screen overflow-hidden">

    <aside class="w-64 bg-slate-900 text-slate-300 shadow-2xl hidden md:flex flex-col relative z-20">
        <div class="h-20 flex items-center px-6 border-b border-slate-800 bg-slate-950/50">
            <div class="p-1.5 bg-white rounded flex items-center justify-center mr-3">
                <img src="{{ asset('img/logo-brait.png') }}" alt="Logo" class="h-6 w-auto object-contain">
            </div>
            <span class="font-extrabold text-lg tracking-tight text-white">BRAIT<span
                    class="text-brand-primary">CMS</span></span>
        </div>

        <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
            <div class="text-xs font-bold text-slate-500 uppercase tracking-wider mb-2 px-4">Menu Utama</div>

            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-3 bg-brand-primary text-white rounded-lg font-semibold transition-colors shadow-lg shadow-brand-primary/20">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                    </path>
                </svg>
                Dashboard
            </a>

            <a href="#"
                class="flex items-center px-4 py-3 hover:bg-slate-800 hover:text-white rounded-lg font-medium transition-colors group">
                <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-brand-primary transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
                Katalog Produk
            </a>

            <a href="#"
                class="flex items-center px-4 py-3 hover:bg-slate-800 hover:text-white rounded-lg font-medium transition-colors group">
                <svg class="w-5 h-5 mr-3 text-slate-500 group-hover:text-brand-primary transition-colors" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                Manajemen Portofolio
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

        <header class="h-20 bg-white z-10 flex items-center justify-between px-8 shadow-sm border-b border-slate-200">
            <h1 class="text-xl font-bold text-slate-800 flex items-center">
                Tinjauan Sistem
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

        <div class="flex-1 overflow-y-auto p-8 relative">

            <div
                class="bg-gradient-to-r from-slate-900 to-slate-800 rounded-2xl p-8 shadow-lg mb-8 text-white relative overflow-hidden">
                <div
                    class="absolute right-0 top-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-brand-primary/20 blur-3xl pointer-events-none">
                </div>
                <h2 class="text-2xl font-bold mb-2">Pantauan Kinerja Operasional</h2>
                <p class="text-slate-300 max-w-2xl text-sm leading-relaxed">
                    Ringkasan performa sistem dan metrik data website perusahaan Anda hari ini. Gunakan panel di sebelah
                    kiri untuk mengelola entri database spesifik.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div
                    class="bg-white rounded-xl p-6 shadow-sm border border-slate-100 border-l-4 border-l-brand-primary hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-slate-500 text-sm font-semibold">Total Kategori</h3>
                        <div class="p-2 bg-brand-primary/10 rounded-lg"><svg class="w-4 h-4 text-brand-primary"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg></div>
                    </div>
                    <p class="text-3xl font-extrabold text-slate-800">4</p>
                </div>

                <div
                    class="bg-white rounded-xl p-6 shadow-sm border border-slate-100 border-l-4 border-l-slate-800 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-slate-500 text-sm font-semibold">Produk Aktif</h3>
                        <div class="p-2 bg-slate-100 rounded-lg"><svg class="w-4 h-4 text-slate-700" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg></div>
                    </div>
                    <p class="text-3xl font-extrabold text-slate-800">12</p>
                </div>

                <div
                    class="bg-white rounded-xl p-6 shadow-sm border border-slate-100 border-l-4 border-l-slate-400 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-slate-500 text-sm font-semibold">Log Error Temuan</h3>
                        <div class="p-2 bg-red-50 rounded-lg"><svg class="w-4 h-4 text-red-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                                </path>
                            </svg></div>
                    </div>
                    <p class="text-3xl font-extrabold text-slate-800">ALL</p>
                </div>

                <div
                    class="bg-white rounded-xl p-6 shadow-sm border border-slate-100 border-l-4 border-l-green-500 hover:shadow-md transition-shadow">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="text-slate-500 text-sm font-semibold">Status Server</h3>
                        <div class="p-2 bg-green-50 rounded-lg"><svg class="w-4 h-4 text-green-500" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5 13l4 4L19 7"></path>
                            </svg></div>
                    </div>
                    <p class="text-xl font-bold text-green-600 mt-1">Normal</p>
                </div>
            </div>

        </div>
    </main>
</body>

</html>
