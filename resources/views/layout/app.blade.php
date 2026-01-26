<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'NeoAds')</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
      integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer" />

    
</head>

<body class="bg-gray-100">
<div class="min-h-screen flex">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-white min-h-screen flex flex-col">

        {{-- Logo --}}
       <div class="h-16 flex items-center gap-3 px-6 font-bold text-xl text-blue-900">
            <img src="{{ asset('images/logo.png') }}"
                alt="NeoAds Logo"
                class="h-8 w-auto">

            <span>NeoAds</span>
        </div>

        {{-- User Info + Logout --}}
        <div class="px-6 py-4 flex items-center gap-3">
            <div class="relative inline-block">
                <!-- FOTO PROFIL -->
                <img
                    src="{{ asset('images/profile.png') }}"
                    class="w-10 h-10 rounded-full cursor-pointer"
                    onclick="toggleDropdown()"
                    alt="Profile"
                >

                <!-- DROPDOWN -->
                <div
                    id="profileDropdown"
                    class="hidden absolute left-full top-0 ml-3 w-40 bg-white border rounded shadow-lg z-50"
                >
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                    <button type="submit" class="flex items-center w-full text-left px-4 py-2 hover:bg-gray-100" style="color: #0b1a3d;">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                        <span>Logout</span>
                    </button>
                    </form>
                </div>
            </div>

            <div class="text-sm leading-tight">
                <div class="font-semibold text-gray-800">
                    {{ Auth::user()->name }}
                </div>
                <div class="text-gray-500">
                    {{ Auth::user()->email }}
                </div>
            </div>
        </div>

        {{-- Menu --}}
        <nav class="flex-1 px-4 pt-2 space-y-1 text-sm">

            {{-- Iklan --}}
            <a href="{{ route('iklan.index') }}"
               class="sidebar-link {{ request()->routeIs('iklan.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M11 5.882V19.236a.5.5 0 01-.766.424L5.556 16H4a2 2 0 01-2-2V10a2 2 0 012-2h1.556l4.678-3.542a.5.5 0 01.766.424z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M15 8l2-2m0 10l-2-2m2-4l3 1m-3 2l3-1" />
                </svg>
                Iklan
            </a>

            {{-- Monitoring --}}
            <a href=""
               class="sidebar-link {{ request()->routeIs('monitoring.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M4 19h16M4 15l4-4 4 4 4-6 4 6"/>
                </svg>
                Monitoring
            </a>

            {{-- Pembayaran --}}
            <a href="{{ route('pembayaran.index') }}"
               class="sidebar-link {{ request()->routeIs('pembayaran.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                Pembayaran
            </a>

            {{-- Profile --}}
            <a href="{{ route('profile.index') }}"
               class="sidebar-link {{ request()->routeIs('profile.*') ? 'active' : '' }}">
                <svg class="icon" fill="none" viewBox="0 0 24 24">
                    <path stroke-width="2" d="M12 12a5 5 0 100-10 5 5 0 000 10zM4 22a8 8 0 0116 0"/>
                </svg>
                Profile
            </a>
        </nav>
    </aside>

    {{-- CONTENT --}}
    <main class="flex-1 p-8">
        @yield('content')
    </main>

</div>

<script>
function toggleDropdown() {
    document.getElementById('profileDropdown').classList.toggle('hidden');
}

// optional: klik di luar → dropdown nutup
document.addEventListener('click', function (event) {
    const dropdown = document.getElementById('profileDropdown');
    const profile = event.target.closest('img');

    if (!profile && !dropdown.contains(event.target)) {
        dropdown.classList.add('hidden');
    }
});
</script>

</body>
</html>
