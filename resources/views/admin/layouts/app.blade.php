<x-app-layout>
    <div class="min-h-screen bg-gray-100">

        {{-- Mobile Header --}}
        <div class="flex items-center justify-between bg-gray-900 px-4 py-4 md:hidden">

            <a href="{{ route('admin.dashboard') }}"
               class="text-xl font-bold text-white">
                🔧 Karigora
            </a>

            <button
                type="button"
                id="adminMenuButton"
                class="rounded-lg bg-gray-800 px-4 py-2 text-white hover:bg-gray-700"
            >
                ☰ Menu
            </button>

        </div>

        <div class="relative flex min-h-screen">

            {{-- Shared Sidebar --}}
            @include('admin.partials.sidebar')

            {{-- Main Content --}}
            <main class="min-w-0 flex-1 p-4 sm:p-6 lg:p-8">
                @yield('admin-content')
            </main>

        </div>

    </div>

    {{-- Mobile Sidebar Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const menuButton = document.getElementById('adminMenuButton');
            const sidebar = document.getElementById('adminSidebar');

            if (!menuButton || !sidebar) return;

            menuButton.addEventListener('click', function () {
                sidebar.classList.toggle('-translate-x-full');
            });

        });
    </script>

</x-app-layout>
