@extends('layouts.admin-app')

@section('title', 'Pengaturan Web')

@section('content')
    <div class="p-8 max-w-5xl">
        <div class="mb-8">
            <h2 class="text-2xl font-bold text-slate-800">Pengaturan Tampilan Website</h2>
            <p class="text-slate-500 text-sm mt-1">Ubah copywriting beranda, tautan video, dan informasi kontak perusahaan.
            </p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-lg shadow-sm">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
            @csrf @method('PUT')

            <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
                <div class="bg-slate-900 px-6 py-5 border-b border-slate-800 flex items-center">
                    <div class="bg-brand-primary/20 p-2 rounded-lg mr-3">
                        <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white tracking-wide">Hero Section (Beranda)</h3>
                </div>

                <div class="p-8 space-y-6 bg-slate-50/50">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Judul Utama (Headline)</label>
                        <input type="text" name="hero_title" value="{{ old('hero_title', $settings->hero_title ?? '') }}"
                            required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-brand-primary focus:bg-white outline-none transition-all shadow-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Sub-judul (Deskripsi)</label>
                        <textarea name="hero_subtitle" rows="3" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-brand-primary focus:bg-white outline-none transition-all shadow-sm">{{ old('hero_subtitle', $settings->hero_subtitle ?? '') }}</textarea>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Teks Tombol CTA</label>
                            <input type="text" name="hero_cta_text"
                                value="{{ old('hero_cta_text', $settings->hero_cta_text ?? '') }}" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-brand-primary focus:bg-white outline-none transition-all shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">URL Video (ID YouTube)</label>
                            <input type="text" name="hero_video_url"
                                value="{{ old('hero_video_url', $settings->hero_video_url ?? '') }}" required
                                placeholder="Contoh: Fi_VIrnhF2A"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-brand-primary focus:bg-white outline-none transition-all shadow-sm font-mono text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-[0_8px_30px_rgb(0,0,0,0.04)] border border-slate-100 overflow-hidden">
                <div class="bg-slate-900 px-6 py-5 border-b border-slate-800 flex items-center">
                    <div class="bg-brand-primary/20 p-2 rounded-lg mr-3">
                        <svg class="w-5 h-5 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-white tracking-wide">Informasi Kontak & Footer</h3>
                </div>

                <div class="p-8 space-y-6 bg-slate-50/50">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Email Resmi</label>
                            <input type="email" name="contact_email"
                                value="{{ old('contact_email', $settings->contact_email ?? '') }}" required
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-brand-primary focus:bg-white outline-none transition-all shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Nomor WhatsApp (Tanpa Spasi/Tanda
                                Hubung)</label>
                            <input type="text" name="contact_whatsapp"
                                value="{{ old('contact_whatsapp', $settings->contact_whatsapp ?? '') }}" required
                                placeholder="6281234567890"
                                class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-brand-primary focus:bg-white outline-none transition-all shadow-sm">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Alamat Kantor Lengkap</label>
                        <textarea name="contact_address" rows="3" required
                            class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:border-brand-primary focus:bg-white outline-none transition-all shadow-sm">{{ old('contact_address', $settings->contact_address ?? '') }}</textarea>
                    </div>
                </div>
            </div>

            <div class="flex justify-end mt-8 border-t border-slate-200 pt-6">
                <button type="submit"
                    class="bg-brand-primary hover:bg-[#e68a00] text-white font-bold py-4 px-12 rounded-xl transition-colors shadow-lg shadow-brand-primary/30 uppercase tracking-widest text-sm">
                    Simpan Konfigurasi Sistem
                </button>
            </div>
        </form>
    </div>
@endsection
