<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Lupa Password - NeoAds</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow">

        <h2 class="text-2xl font-bold text-center text-[#1a2e6b] mb-2">
            Lupa Password?
        </h2>
        <p class="text-center text-gray-600 mb-6">
            Masukkan email Anda untuk menerima link reset password
        </p>

        @if(session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <input type="email" name="email"
                   placeholder="email@email.com"
                   required
                   class="input input-bordered w-full mb-4" />

            <button class="btn w-full bg-[#1a2e6b] text-white hover:bg-blue-900">
                Kirim Link Reset
            </button>
        </form>

        <div class="text-center mt-4 text-sm">
            <a href="/login" class="text-[#1a2e6b] font-bold">
                Kembali ke Login
            </a>
        </div>

    </div>
</body>
</html>
