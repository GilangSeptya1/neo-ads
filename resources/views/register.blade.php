<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - NeoAds</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex h-screen">
        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="max-w-md w-full">
                <div class="text-center mb-8">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="mx-auto w-20">
                    <h2 class="text-2xl font-bold">NeoAds</h2>
                    <p class="text-gray-500">Daftarkan akun baru Anda</p>
                </div>
                
<form action="{{ route('register.post') }}" method="POST">
    @csrf 
<div class="form-control mb-2 text-left">
    <label class="label">
        <div style="display: flex !important; flex-direction: row !important; align-items: center !important; gap: 0.6rem;">
            <div class="flex items-center justify-center w-7 h-7 rounded-full bg-[#1a2e6b] shrink-0">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <span class="font-bold text-[#1a2e6b] text-xl">Nama Lengkap</span>
        </div>
    </label>
    <input type="text" name="name" placeholder="Nama Lengkap Anda" required 
        class="input input-bordered w-full rounded-2xl border-slate-400 focus:border-[#1a2e6b] focus:outline-none h-14 text-lg px-6" />
</div>

<div class="form-control mb-2 text-left">
    <label class="label">
        <div style="display: flex !important; flex-direction: row !important; align-items: center !important; gap: 0.6rem;">
            <div class="flex items-center justify-center w-7 h-7 rounded-full bg-[#1a2e6b] shrink-0">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
            </div>
            <span class="font-bold text-[#1a2e6b] text-xl">Email</span>
        </div>
    </label>
    <input type="email" name="email" placeholder="example@mail.com" required 
        class="input input-bordered w-full rounded-2xl border-slate-400 focus:border-[#1a2e6b] focus:outline-none h-14 text-lg px-6" />
</div>

<div class="form-control mb-4 text-left">
    <label class="label">
        <div style="display: flex !important; flex-direction: row !important; align-items: center !important; gap: 0.6rem;">
            <div class="flex items-center justify-center w-7 h-7 rounded-full bg-[#1a2e6b] shrink-0">
                <svg class="w-3.5 h-3.5 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                </svg>
            </div>
            <span class="font-bold text-[#1a2e6b] text-xl">Kata Sandi</span>
        </div>
    </label>
    <input type="password" name="password" placeholder="xxxxx" required 
        class="input input-bordered w-full rounded-2xl border-slate-400 focus:border-[#1a2e6b] focus:outline-none h-14 text-lg px-6" />
</div>

                        <div class="form-control mb-4 text-left">
                        <label class="cursor-pointer flex items-start gap-2">
                            <input type="checkbox" name="agree" class="checkbox checkbox-sm" required>
                            <span class="text-sm">
                                Saya menyetujui
                                <a href="/privacy-policy" class="text-blue-900 underline">Kebijakan Privasi</a>
                                dan
                                <a href="/terms" class="text-blue-900 underline">Syarat & Ketentuan</a>
                            </span>
                        </label>
                    </div>
    
    <button type="submit" class="btn w-full bg-[#1a2e6b] hover:bg-blue-950 border-none mb-4 text-white rounded-full py-3 h-auto font-bold">Daftar</button>

    <a href="{{ url('/auth/google') }}"
    class="btn btn-outline w-full flex items-center justify-center gap-2 rounded-full py-3 h-auto border-2 border-[#1a2e6b] text-[#1a2e6b] font-bold hover:bg-[#1a2e6b] hover:text-white transition-all duration-300">
    <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5">
    Lanjutkan dengan Google
</a>
    <p class="mt-4 text-sm">
    Sudah punya akun? <a href="/login" class="text-blue-900 font-bold">Masuk disini</a>
    </p>
    
</form>
            </div>
        </div>

        <div class="hidden lg:flex lg:w-1/2 bg-cover bg-center" 
            style="background-image: url('{{ asset('images/bg-image.jpg') }}')">
        </div>
    </div>
</body>
</html>