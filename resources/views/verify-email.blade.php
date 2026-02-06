<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - NeoAds</title>

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.3/dist/full.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        .bg-custom-blue { background-color: #1a2e6b; }
        .text-custom-blue { color: #1a2e6b; }
    </style>
</head>
<body class="bg-gray-50">

    <div class="min-h-screen flex items-center justify-center p-6">
        <div class="max-w-md w-full bg-white rounded-2xl shadow-lg p-8">

            <!-- Logo -->
            <div class="text-center mb-6">
                <div class="flex items-center justify-center gap-2 mb-3">
                    <div class="w-10 h-10 bg-custom-blue text-white rounded-lg flex items-center justify-center">
                        <span class="font-bold text-xl">N</span>
                    </div>
                    <h1 class="text-3xl font-bold text-custom-blue">NeoAds</h1>
                </div>
                <p class="text-gray-600">
                    Verifikasi email akun Anda
                </p>
            </div>

            <!-- Info -->
            <div class="text-center text-gray-700 mb-6">
                <p>
                    Kami sudah mengirimkan email verifikasi ke alamat email Anda.
                    Silakan buka email tersebut dan klik tombol verifikasi.
                </p>
            </div>

            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            <!-- Resend Verification -->
            <form method="POST" action="{{ route('verification.send') }}" class="space-y-4">
                @csrf

                <button type="submit"
                        class="btn w-full bg-custom-blue hover:bg-blue-900 border-none text-white rounded-xl py-3 font-bold">
                    Kirim Ulang Email Verifikasi
                </button>
            </form>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf
                <button type="submit"
                        class="btn btn-outline w-full rounded-xl border-2 border-custom-blue text-custom-blue hover:bg-custom-blue hover:text-white">
                    Logout
                </button>
            </form>

            <!-- Footer -->
            <div class="text-center text-sm text-gray-500 mt-6">
                Jika email tidak muncul, cek folder <b>Spam</b> atau <b>Promosi</b>.
            </div>
        </div>
    </div>

</body>
</html>
