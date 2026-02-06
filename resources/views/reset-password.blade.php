<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Reset Password - NeoAds</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow">

        <h2 class="text-2xl font-bold text-center text-[#1a2e6b] mb-4">
            Reset Password
        </h2>

        @if($errors->any())
            <div class="alert alert-error mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <input type="email" name="email"
                   placeholder="Email"
                   required
                   class="input input-bordered w-full mb-3">

            <input type="password" name="password"
                   placeholder="Password Baru"
                   required
                   class="input input-bordered w-full mb-3">

            <input type="password" name="password_confirmation"
                   placeholder="Konfirmasi Password"
                   required
                   class="input input-bordered w-full mb-4">

            <button class="btn w-full bg-[#1a2e6b] text-white hover:bg-blue-900">
                Reset Password
            </button>
        </form>

    </div>
</body>
</html>
