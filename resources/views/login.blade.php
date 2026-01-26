<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NeoAds</title>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex h-screen">
        <div class="hidden lg:flex lg:w-1/2 bg-cover bg-center" 
             style="background-image: url('{{ asset('images/bg-image.jpg') }}')">
        </div>

        <div class="w-full lg:w-1/2 flex items-center justify-center p-8">
            <div class="max-w-md w-full text-center">
                <img src="{{ asset('images/logo.png') }}" alt="NeoAds" class="mx-auto mb-4 w-32">
                <h2 class="text-2xl font-bold mb-8">NeoAds</h2>
                
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf @if($errors->any())
                        <div class="alert alert-error mb-4 shadow-sm py-2">
                            <span class="text-xs text-white">{{ $errors->first() }}</span>
                        </div>
                    @endif
                    
                <div class="form-control mb-4 text-left">
    <label class="label">
        <div style="display: flex !important; flex-direction: row !important; align-items: center !important; gap: 0.6rem;">
            <div class="flex items-center justify-center w-7 h-7 rounded-full bg-[#1a2e6b] shrink-0">
                <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <span class="font-bold text-[#1a2e6b] text-xl">Email</span>
        </div>
    </label>
    <input type="email" name="email" value="{{ old('email') }}" 
        placeholder="examplemail@mail.com" 
        class="input input-bordered w-full rounded-2xl border-slate-400 focus:border-[#1a2e6b] focus:outline-none h-14 text-lg px-6" required />
</div>

<div class="form-control mb-6 text-left">
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
    <input type="password" name="password" 
        placeholder="xxxxx" 
        class="input input-bordered w-full rounded-2xl border-slate-400 focus:border-[#1a2e6b] focus:outline-none h-14 text-lg px-6" required />
</div>

                    <div class="mb-4 flex justify-center">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    </div>

                    
                    <div class="form-control mb-4 text-left">
                        <label class="cursor-pointer flex items-start gap-2">
                            <input type="checkbox" name="agree" class="checkbox checkbox-sm" required>
                            <span class="text-sm">
                                Saya setuju dengan 
                                <a href="/privacy-policy" class="text-blue-900 underline">Kebijakan Privasi Data</a>
                                dan
                                <a class="text-sm">dan memberikan persetujuan untuk pemrosesan data pribadi saya.</a>
                            </span>
                        </label>
                    </div>

<button type="submit" 
    class="btn w-full bg-[#1a2e6b] hover:bg-blue-950 border-none mb-4 text-white rounded-full py-3 h-auto font-bold">
    Masuk
</button>

<a href="{{ url('/auth/google') }}"
    class="btn btn-outline w-full flex items-center justify-center gap-2 rounded-full py-3 h-auto border-2 border-[#1a2e6b] text-[#1a2e6b] font-bold hover:bg-[#1a2e6b] hover:text-white transition-all duration-300">
    <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5">
    Lanjutkan dengan Google
</a>
                    <p class="mt-4 text-sm">
                        Belum punya akun? <a href="/register" class="text-blue-900 font-bold">Daftar disini</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>