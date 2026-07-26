<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') — Admin Saka Dirgantara</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 font-sans text-slate-800 antialiased">
    <div class="min-h-screen flex">

        {{-- ===================== SIDEBAR ===================== --}}
        <aside id="admin-sidebar"
               class="fixed z-40 inset-y-0 left-0 w-64 -translate-x-full lg:translate-x-0 transition-transform duration-200 ease-in-out bg-slate-900 text-slate-200 flex flex-col">
            <div class="h-16 flex items-center gap-3 px-5 border-b border-slate-800">
                <img src="{{ asset('img/logo saka.png') }}" alt="Logo Saka" class="w-9 h-9 object-contain">
                <div class="leading-tight">
                    <p class="font-semibold text-white text-sm">SAKA DIRGANTARA</p>
                    <p class="text-xs text-slate-400">Panel Admin</p>
                </div>
            </div>

            <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
                @php
                    $menu = [
                        ['route' => 'admin.dashboard', 'label' => 'Dashboard', 'icon' => 'home'],
                        ['route' => 'admin.news.index', 'label' => 'Dirga News', 'icon' => 'newspaper'],
                        ['route' => 'admin.gallery.index', 'label' => 'Galeri', 'icon' => 'photo'],
                        ['route' => 'admin.members.index', 'label' => 'Data Anggota', 'icon' => 'users'],
                        ['route' => 'admin.pangkalan.index', 'label' => 'Pangkalan', 'icon' => 'map-pin'],
                    ];
                @endphp

                @foreach ($menu as $item)
                    @php $active = request()->routeIs($item['route'].'*'); @endphp
                    <a href="{{ route($item['route']) }}"
                       class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition
                              {{ $active ? 'bg-sky-600 text-white shadow' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">
                        @include('admin.components.icon', ['name' => $item['icon']])
                        <span>{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>

            <div class="border-t border-slate-800 p-3">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-300 hover:bg-red-600 hover:text-white transition">
                        @include('admin.components.icon', ['name' => 'logout'])
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        {{-- Overlay untuk mobile saat sidebar terbuka --}}
        <div id="sidebar-overlay" class="fixed inset-0 z-30 bg-black/40 hidden lg:hidden"></div>

        {{-- ===================== MAIN CONTENT ===================== --}}
        <div class="flex-1 flex flex-col lg:pl-64 min-h-screen">

            {{-- Header --}}
            <header class="sticky top-0 z-20 bg-white border-b border-slate-200 h-16 flex items-center justify-between px-4 sm:px-6">
                <div class="flex items-center gap-3">
                    <button id="sidebar-toggle" class="lg:hidden p-2 rounded-md text-slate-600 hover:bg-slate-100">
                        @include('admin.components.icon', ['name' => 'menu'])
                    </button>
                    <h1 class="text-lg font-semibold text-slate-800">@yield('title', 'Dashboard')</h1>
                </div>

                <div class="flex items-center gap-3">
                    <div class="hidden sm:flex flex-col text-right leading-tight">
                        <span class="text-sm font-medium text-slate-800">{{ Auth::guard('admin')->user()->name }}</span>
                        <span class="text-xs text-slate-400">Administrator</span>
                    </div>
                    <div class="w-9 h-9 rounded-full bg-sky-600 text-white flex items-center justify-center font-semibold text-sm">
                        {{ strtoupper(substr(Auth::guard('admin')->user()->name, 0, 1)) }}
                    </div>
                </div>
            </header>

            {{-- Flash messages --}}
            <div class="px-4 sm:px-6 pt-4">
                @include('admin.components.alerts')
            </div>

            {{-- Page content --}}
            <main class="flex-1 px-4 sm:px-6 py-6">
                @yield('content')
            </main>
        </div>
    </div>

    <script>
        (function () {
            const sidebar = document.getElementById('admin-sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const toggle = document.getElementById('sidebar-toggle');

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            }
            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }

            toggle?.addEventListener('click', () => {
                sidebar.classList.contains('-translate-x-full') ? openSidebar() : closeSidebar();
            });
            overlay?.addEventListener('click', closeSidebar);
        })();
    </script>

    @stack('scripts')
</body>
</html>
