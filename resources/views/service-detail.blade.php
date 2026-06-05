<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $service->name }} - PT. BRAIT JAYA SOLUSINDO</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { primary: '#FF9B00', secondary: '#FFE100', accent: '#FFC900' }
                    },
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] }
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; background-color: #f8fafc; }
        .glass-sidebar { background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(16px); border: 1px solid rgba(255,255,255,0.5); }
        .prose h2 { font-size: 1.5rem; font-weight: 800; color: #0f172a; margin-top: 2rem; margin-bottom: 1rem; }
        .prose h3 { font-size: 1.25rem; font-weight: 700; color: #1e293b; margin-top: 1.5rem; margin-bottom: 0.75rem; }
        .prose p { color: #475569; line-height: 1.8; margin-bottom: 1.25rem; }
        .prose ul { list-style-type: disc; padding-left: 1.5rem; color: #475569; margin-bottom: 1.25rem; }
        .prose li { margin-bottom: 0.5rem; }
    </style>
</head>
<body class="text-slate-800 antialiased">

    <nav class="fixed w-full z-50 bg-white/95 backdrop-blur-md border-b border-slate-100 shadow-sm py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <a href="/" class="flex items-center gap-3">
                <img src="{{ asset('img/logo-brait.png') }}" alt="Logo" class="h-8 w-auto">
                <span class="font-extrabold text-xl text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-accent tracking-tight">BRAIT JAYA</span>
            </a>
            <a href="/" class="text-sm font-bold text-slate-500 hover:text-brand-primary transition">Kembali ke Beranda</a>
        </div>
    </nav>

    <div class="pt-32 pb-12 bg-slate-900 relative overflow-hidden">
        <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1558494949-ef010cbdcc31?q=80&w=2034&auto=format&fit=crop')] bg-cover bg-center opacity-20"></div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-wrap gap-2 text-sm font-semibold text-brand-primary mb-4">
                <a href="/" class="hover:text-white transition">Home</a>
                <span class="text-slate-500">/</span>
                <span class="text-white">{{ $service->category->name ?? 'Layanan' }}</span>
                <span class="text-slate-500">/</span>
                <span class="text-slate-300">{{ $service->name }}</span>
            </div>
            <h1 class="text-4xl md:text-5xl font-extrabold text-white leading-tight max-w-4xl">{{ $service->name }}</h1>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <div class="lg:col-span-8 space-y-12">
                
                @if($service->image)
                <div class="w-full h-[400px] rounded-3xl overflow-hidden shadow-lg border border-slate-200">
                    <img src="{{ asset('storage/' . $service->image) }}" class="w-full h-full object-cover" alt="{{ $service->name }}">
                </div>
                @endif

                <div class="bg-white p-8 md:p-12 rounded-3xl shadow-sm border border-slate-100 prose max-w-none">
                    {!! $service->long_description !!}

                    @if($service->prices && $service->prices->count() > 0)
                    <h2 class="mt-12">Estimasi Harga Jasa {{ $service->name }}</h2>
                    <div class="overflow-x-auto mt-6 rounded-2xl border border-slate-200">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-slate-50 text-slate-800 text-sm uppercase tracking-wider border-b border-slate-200">
                                    <th class="p-4 font-bold">Layanan</th>
                                    <th class="p-4 font-bold text-right">Harga Estimasi</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm">
                                @foreach($service->prices as $price)
                                <tr class="border-b border-slate-100 hover:bg-slate-50/50 transition">
                                    <td class="p-4 text-slate-700 font-semibold">{{ $price->service_name }}</td>
                                    <td class="p-4 text-brand-primary font-bold text-right">{{ $price->price_range }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <p class="text-xs text-slate-400 mt-3 italic">*Catatan: Harga di atas merupakan estimasi dan dapat berubah tergantung pada spesifikasi dan kebutuhan proyek.</p>
                    @endif

                    @if(isset($serviceAreas) && $serviceAreas->count() > 0)
                    <h2 class="mt-12">Area Layanan Kami</h2>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3 mt-6">
                        @foreach($serviceAreas as $area)
                        <div class="bg-slate-50 border border-slate-100 p-3 rounded-xl text-center text-sm font-semibold text-slate-700 hover:bg-brand-primary/10 hover:text-brand-primary hover:border-brand-primary/30 transition-colors cursor-default">
                            {{ $area->city_name }}
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                <div class="flex justify-between items-center bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                    @if($previous)
                        <a href="{{ route('layanan.show', $previous->id) }}" class="group flex flex-col text-left">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1 group-hover:text-brand-primary transition">Previous Post</span>
                            <span class="text-sm font-bold text-slate-800 line-clamp-1">{{ $previous->name }}</span>
                        </a>
                    @else
                        <div></div>
                    @endif

                    @if($next)
                        <a href="{{ route('layanan.show', $next->id) }}" class="group flex flex-col text-right">
                            <span class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1 group-hover:text-brand-primary transition">Next Post</span>
                            <span class="text-sm font-bold text-slate-800 line-clamp-1">{{ $next->name }}</span>
                        </a>
                    @else
                        <div></div>
                    @endif
                </div>

                <div class="bg-white p-8 md:p-10 rounded-3xl shadow-sm border border-slate-100">
                    <h3 class="text-2xl font-extrabold text-slate-900 mb-2">Leave a Reply</h3>
                    <p class="text-sm text-slate-500 mb-8">Alamat email Anda tidak akan dipublikasikan. Ruas yang wajib ditandai *</p>

                    @if(session('success'))
                        <div class="p-4 mb-6 text-sm text-green-800 rounded-xl bg-green-50 border border-green-200">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('comment.store', $service->id) }}" method="POST" class="space-y-6">
                        @csrf
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Message *</label>
                            <textarea name="message" rows="5" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-primary/50 focus:border-brand-primary outline-none transition-all"></textarea>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Name *</label>
                                <input type="text" name="name" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-primary/50 focus:border-brand-primary outline-none transition-all">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2">Email *</label>
                                <input type="email" name="email" required class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-primary/50 focus:border-brand-primary outline-none transition-all">
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2">Website</label>
                            <input type="url" name="website" class="w-full px-4 py-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-brand-primary/50 focus:border-brand-primary outline-none transition-all">
                        </div>
                        <button type="submit" class="px-8 py-4 bg-slate-900 text-white font-bold rounded-xl hover:bg-brand-primary transition-colors duration-300 w-full sm:w-auto shadow-md">
                            Post Comment
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-4">
                <div class="sticky top-28 space-y-8">
                    
                    <div class="glass-sidebar p-8 rounded-3xl shadow-sm">
                        <h3 class="text-lg font-extrabold text-slate-900 border-b-2 border-brand-primary pb-3 inline-block mb-6">Perusahaan IT</h3>
                        <p class="text-sm text-slate-600 leading-relaxed text-justify hyphens-auto">
                            PT Brait Jaya Solusindo lebih dari sekadar penyedia layanan IT. Dengan pengalaman mendalam dan tim teknisi bersertifikat, kami hadir sebagai mitra yang siap memberikan solusi teknologi yang tepat, aman, dan efisien sesuai dengan kebutuhan bisnis Anda di era digital.
                        </p>
                    </div>

                    <div class="bg-white border border-slate-100 p-8 rounded-3xl shadow-sm">
                        <h3 class="text-lg font-extrabold text-slate-900 border-b-2 border-brand-primary pb-3 inline-block mb-6">Layanan Lainnya</h3>
                        <ul class="space-y-3">
                            @foreach($otherServices as $other)
                            <li>
                                <a href="{{ route('layanan.show', $other->id) }}" class="flex items-center text-sm font-semibold text-slate-600 hover:text-brand-primary transition group">
                                    <svg class="w-4 h-4 mr-2 text-slate-300 group-hover:text-brand-primary transition transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                                    {{ $other->name }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="bg-white border border-slate-100 p-8 rounded-3xl shadow-sm">
                        <h3 class="text-lg font-extrabold text-slate-900 border-b-2 border-brand-primary pb-3 inline-block mb-6">Artikel Terbaru</h3>
                        <div class="space-y-5">
                            @foreach($recentArticles as $article)
                            <a href="{{ route('layanan.show', $article->id) }}" class="group flex gap-4 items-start">
                                <div class="w-16 h-16 rounded-lg bg-slate-100 overflow-hidden flex-shrink-0 border border-slate-200">
                                    @if($article->image)
                                        <img src="{{ asset('storage/' . $article->image) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300" alt="{{ $article->name }}">
                                    @endif
                                </div>
                                <div>
                                    <h4 class="text-sm font-bold text-slate-800 group-hover:text-brand-primary transition leading-snug line-clamp-2">{{ $article->name }}</h4>
                                    <span class="text-xs text-slate-400 mt-1 block">{{ $article->created_at->format('d M Y') }}</span>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <footer class="bg-slate-900 text-white pt-16 pb-8 border-t-4 border-brand-primary mt-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-12 gap-12 border-b border-slate-800 pb-12 mb-8">
                
                <div class="md:col-span-4">
                    <span class="font-extrabold text-2xl text-transparent bg-clip-text bg-gradient-to-r from-brand-primary to-brand-accent tracking-tight block mb-6">PT BRAIT JAYA SOLUSINDO</span>
                    <ul class="space-y-4 text-sm text-slate-400">
                        <li class="flex items-center"><svg class="w-5 h-5 mr-3 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> 0858-5643-1511</li>
                        <li class="flex items-center"><svg class="w-5 h-5 mr-3 text-brand-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> info@braitjaya.co.id</li>
                        <li class="flex items-start"><svg class="w-5 h-5 mr-3 mt-0.5 text-brand-primary shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg> Bandar Lampung, Provinsi Lampung, Indonesia</li>
                    </ul>
                </div>

                <div class="md:col-span-4">
                    <h4 class="text-white font-bold mb-6 uppercase tracking-wider">Tautan Cepat</h4>
                    <ul class="grid grid-cols-2 gap-3 text-sm text-slate-400">
                        <li><a href="/" class="hover:text-brand-primary transition">Beranda</a></li>
                        <li><a href="#" class="hover:text-brand-primary transition">Tentang Kami</a></li>
                        <li><a href="#layanan" class="hover:text-brand-primary transition">Layanan</a></li>
                        <li><a href="#" class="hover:text-brand-primary transition">Portofolio</a></li>
                        <li><a href="#testimoni" class="hover:text-brand-primary transition">Testimoni</a></li>
                        <li><a href="#kontak" class="hover:text-brand-primary transition">Kontak</a></li>
                    </ul>
                </div>

                <div class="md:col-span-4">
                    <h4 class="text-white font-bold mb-6 uppercase tracking-wider">Layanan Utama</h4>
                    <ul class="space-y-3 text-sm text-slate-400">
                        @foreach($categories as $catFoot)
                            <li><a href="#" class="hover:text-brand-primary transition">{{ $catFoot->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="text-center">
                <p class="text-slate-500 text-sm font-medium">© 2026 PT. BRAIT JAYA SOLUSINDO. Hak cipta dilindungi.</p>
            </div>
        </div>
    </footer>

</body>
</html>