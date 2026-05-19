@extends('layouts.admin-app')

@section('title', 'Tinjauan Sistem')

@section('content')
    <div class="p-8 relative">
        <div
            class="bg-gradient-to-r from-slate-900 to-slate-800 rounded-2xl p-8 shadow-lg mb-8 text-white relative overflow-hidden">
            <div
                class="absolute right-0 top-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-brand-primary/20 blur-3xl pointer-events-none">
            </div>
            <h2 class="text-2xl font-bold mb-2">Pantauan Kinerja Operasional</h2>
            <p class="text-slate-300 max-w-2xl text-sm leading-relaxed">
                Ringkasan performa sistem dan metrik data website perusahaan Anda hari ini. Gunakan panel di sebelah kiri
                untuk mengelola entri database spesifik.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div
                class="bg-white rounded-xl p-6 shadow-sm border border-slate-100 border-l-4 border-l-brand-primary hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-slate-500 text-sm font-semibold">Total Kategori</h3>
                    <div class="p-2 bg-brand-primary/10 rounded-lg"><svg class="w-4 h-4 text-brand-primary" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                            </path>
                        </svg></div>
                </div>
                <p class="text-3xl font-extrabold text-slate-800">{{ $categoryCount }}</p>
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
                <p class="text-3xl font-extrabold text-slate-800">{{ $productCount }}</p>
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
                <p class="text-3xl font-extrabold text-slate-800">{{ $errorDisplay }}</p>
            </div>

            <div
                class="bg-white rounded-xl p-6 shadow-sm border border-slate-100 border-l-4 border-l-green-500 hover:shadow-md transition-shadow">
                <div class="flex justify-between items-start mb-2">
                    <h3 class="text-slate-500 text-sm font-semibold">Status Server</h3>
                    <div class="p-2 bg-green-50 rounded-lg"><svg class="w-4 h-4 text-green-500" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg></div>
                </div>
                <p class="text-xl font-bold text-green-600 mt-1">Normal</p>
            </div>
        </div>
    </div>
@endsection
