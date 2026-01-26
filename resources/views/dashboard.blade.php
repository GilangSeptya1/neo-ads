<!DOCTYPE html>
<html lang="id" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - NeoAds</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <div class="flex h-screen overflow-hidden">
        <div class="w-64 bg-blue-900 text-white flex flex-col">
            <div class="p-6 text-2xl font-bold flex items-center gap-2">
                <img src="{{ asset('images/logo.png') }}" class="w-8 h-8" alt="">
                NeoAds
            </div>
            <nav class="flex-1 px-4 space-y-2">
                <a href="#" class="flex items-center gap-3 p-3 bg-blue-800 rounded-lg">
                    <span class="text-lg">🏠</span> Dashboard
                </a>
                <a href="#" class="flex items-center gap-3 p-3 hover:bg-blue-800 rounded-lg transition">
                    <span class="text-lg">📊</span> Statistik Iklan
                </a>
                <a href="#" class="flex items-center gap-3 p-3 hover:bg-blue-800 rounded-lg transition">
                    <span class="text-lg">👤</span> Profil User
                </a>
            </nav>
            <div class="p-4 border-t border-blue-800">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-error btn-sm w-full">Logout</button>
                </form>
            </div>
        </div>

        <div class="flex-1 flex flex-col overflow-y-auto p-8">
            <header class="flex justify-between items-center mb-8">
                <h1 class="text-2xl font-bold">Selamat Datang, {{ Auth::user()->name }}!</h1>
                <div class="avatar placeholder">
                    <div class="bg-blue-900 text-white rounded-full w-12">
                        <span>{{ substr(Auth::user()->name, 0, 1) }}</span>
                    </div>
                </div>
            </header>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="stat bg-white shadow rounded-xl">
                    <div class="stat-title text-gray-500">Total Iklan</div>
                    <div class="stat-value text-blue-900">12</div>
                    <div class="stat-desc text-green-600">↗︎ 2 dari bulan lalu</div>
                </div>
                <div class="stat bg-white shadow rounded-xl">
                    <div class="stat-title text-gray-500">Tayangan (Impressions)</div>
                    <div class="stat-value text-blue-900">45.2K</div>
                    <div class="stat-desc text-green-600">↗︎ 14% kenaikan</div>
                </div>
                <div class="stat bg-white shadow rounded-xl">
                    <div class="stat-title text-gray-500">Klik Iklan</div>
                    <div class="stat-value text-blue-900">1,200</div>
                    <div class="stat-desc">CTR: 2.6%</div>
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow">
                <h3 class="text-lg font-bold mb-4">Aktivitas Terakhir</h3>
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <thead>
                            <tr>
                                <th>Nama Iklan</th>
                                <th>Status</th>
                                <th>Tanggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Campaign Iklan Mobil A</td>
                                <td><span class="badge badge-success">Aktif</span></td>
                                <td>19 Jan 2026</td>
                                <td><button class="btn btn-ghost btn-xs text-blue-700">Detail</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>
</html>