<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - PT. BRAIT JAYA SOLUSINDO</title>
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
                            secondary: '#E68A00'
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

        /* Pola grid transparan untuk latar belakang kiri */
        .bg-grid-pattern {
            background-size: 40px 40px;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.1) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.1) 1px, transparent 1px);
        }

        /* Filter untuk membuat siluet logo putih */
        .logo-silhouette {
            filter: brightness(0) invert(1);
        }
    </style>
</head>

<body class="bg-slate-50 antialiased h-screen flex overflow-hidden">

    <div
        class="hidden lg:flex w-1/2 bg-gradient-to-br from-brand-primary to-brand-secondary relative flex-col justify-center items-center text-white overflow-hidden p-12">

        <div class="absolute inset-0 bg-grid-pattern z-0"></div>
        <svg class="absolute bottom-0 left-0 w-full opacity-30 z-0 pointer-events-none" viewBox="0 0 1440 320"
            xmlns="http://www.w3.org/2000/svg">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,224L60,202.7C120,181,240,139,360,144C480,149,600,203,720,218.7C840,235,960,213,1080,181.3C1200,149,1320,107,1380,85.3L1440,64L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z">
            </path>
        </svg>
        <div class="absolute top-1/4 left-1/4 w-32 h-32 border border-white/20 rounded-full z-0"></div>
        <div class="absolute bottom-1/3 right-1/4 w-16 h-16 border-[4px] border-white/20 rounded-full z-0"></div>
        <div class="absolute top-1/3 right-1/3 w-3 h-3 bg-white/40 rounded-full z-0"></div>

        <div class="absolute top-10 left-10 flex items-center gap-3 z-10">
            <img src="{{ asset('img/logo-brait.png') }}" alt="Logo"
                class="h-8 w-auto object-contain logo-silhouette">
            <span class="font-bold tracking-widest text-sm uppercase">BRAIT JAYA</span>
        </div>

        <div class="z-10 text-center mt-10">
            <p class="font-medium tracking-wide mb-3 text-white/90">Senang melihat Anda kembali</p>
            <h1 class="text-5xl font-extrabold tracking-tight mb-8">SELAMAT DATANG</h1>

            <div class="w-16 h-1 bg-white mx-auto mb-8 rounded-full"></div>

            <p class="text-sm font-medium text-white/80 max-w-sm mx-auto leading-relaxed">
                Akses ruang kendali internal.
            </p>
        </div>
    </div>

    <div class="w-full lg:w-1/2 flex items-center justify-center bg-white p-8 relative z-10 shadow-2xl">
        <div class="w-full max-w-sm">

            <div class="lg:hidden flex items-center justify-center gap-3 mb-10">
                <img src="{{ asset('img/logo-brait.png') }}" alt="Logo" class="h-10 w-auto object-contain">
                <span class="font-bold text-xl text-slate-800">BRAIT JAYA</span>
            </div>

            <div class="text-center mb-10">
                <h2 class="text-3xl font-extrabold text-brand-primary mb-2">Login Akun</h2>
                <p class="text-slate-400 text-xs font-medium">Masukan email dan kata sandi Anda</p>
            </div>

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="mb-5 relative">
                    <div class="absolute inset-y-0 left-0 w-1 bg-brand-primary rounded-l-md"></div>
                    <input type="email" name="email" id="email" value="{{ old('email') }}" required
                        placeholder="Email ID"
                        class="w-full bg-slate-50 border-none py-4 pl-6 pr-4 text-sm font-medium text-slate-800 placeholder-slate-400 focus:bg-slate-100 focus:ring-0 outline-none transition-colors">
                    @error('email')
                        <p class="text-red-500 text-[10px] mt-1 text-left absolute">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 relative">
                    <div class="absolute inset-y-0 left-0 w-1 bg-brand-primary rounded-l-md"></div>
                    <input type="password" name="password" id="password" required placeholder="Password"
                        class="w-full bg-slate-50 border-none py-4 pl-6 pr-4 text-sm font-medium text-slate-800 placeholder-slate-400 focus:bg-slate-100 focus:ring-0 outline-none transition-colors">
                </div>

                <div class="flex items-center justify-between mb-10 text-xs font-semibold text-slate-500">
                    <label class="flex items-center cursor-pointer hover:text-slate-700 transition">
                        <input type="checkbox" name="remember"
                            class="mr-2 w-4 h-4 rounded text-brand-primary focus:ring-brand-primary border-slate-300">
                        Tetap masuk
                    </label>
                    <a href="#" class="text-brand-primary hover:text-brand-secondary transition">Lupa sandi?</a>
                </div>

                <button type="submit"
                    class="w-full bg-brand-primary hover:bg-brand-secondary text-white font-bold py-4 rounded-full transition-colors shadow-lg shadow-brand-primary/30 text-sm tracking-widest uppercase">
                    MASUK
                </button>
            </form>

        </div>
    </div>

</body>

</html>
