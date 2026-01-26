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
                        <label class="label font-bold"><span class="label-text">Email</span></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="examplemail@mail.com" class="input input-bordered w-full" required />
                    </div>
                    
                    <div class="form-control mb-4 text-left">
                        <label class="label font-bold"><span class="label-text">Kata Sandi</span></label>
                        <input type="password" name="password" placeholder="xxxxx" class="input input-bordered w-full" required />
                    </div>

                    <div class="mb-4 flex justify-center">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
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

                    <button type="submit" class="btn btn-primary w-full bg-blue-900 border-none mb-4 text-white">Masuk</button>
                    
                    <div class="divider">Atau</div>
                    
                    <a href="{{ url('/auth/google') }}"
                        class="btn btn-outline w-full flex items-center gap-2">
                        <img src="https://www.svgrepo.com/show/355037/google.svg" class="w-5">
                        Lanjutkan dengan Google
                    </a>


                    <p class="mt-6 text-sm">
                        Belum punya akun? <a href="/register" class="text-blue-900 font-bold">Daftar sekarang</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</body>
</html>