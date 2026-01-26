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
    @csrf <div class="form-control mb-2">
        <label class="label font-bold"><span class="label-text">Nama Lengkap</span></label>
        <input type="text" name="name" required class="input input-bordered w-full" />
    </div>
    
    <div class="form-control mb-2">
        <label class="label font-bold"><span class="label-text">Email</span></label>
        <input type="email" name="email" required class="input input-bordered w-full" />
    </div>
    
    <div class="form-control mb-4">
        <label class="label font-bold"><span class="label-text">Kata Sandi</span></label>
        <input type="password" name="password" required class="input input-bordered w-full" />
    </div>
    
    <button type="submit" class="btn btn-primary w-full bg-blue-900 border-none text-white mb-4">Daftar Sekarang</button>
</form>
            </div>
        </div>

        <div class="hidden lg:flex lg:w-1/2 bg-cover bg-center" 
             style="background-image: url('{{ asset('images/bg-image.jpg') }}')">
        </div>
    </div>
</body>
</html>