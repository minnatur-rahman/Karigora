<aside id="adminSidebar"
       class="fixed left-0 top-0 z-50 min-h-screen w-64 shrink-0 -translate-x-full bg-gray-900 text-white transition-transform duration-300 md:sticky md:top-0 md:translate-x-0">

    {{-- Logo --}}
    <div class="border-b border-gray-700 px-6 py-6">

        <div class="flex items-center justify-between">

            <a href="{{ route('admin.dashboard') }}"
               class="text-2xl font-bold">
                🔧 Karigora
            </a>

            <button
                type="button"
                id="closeAdminMenu"
                class="text-xl text-gray-400 hover:text-white md:hidden"
            >
                ✕
            </button>

        </div>

        <p class="mt-1 text-sm text-gray-400">
            Admin Panel
        </p>

    </div>

    {{-- Navigation --}}
    <nav class="space-y-2 px-4 py-6">

        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 rounded-lg px-4 py-3 transition
           {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <span>📊</span>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('admin.categories.index') }}"
           class="flex items-center gap-3 rounded-lg px-4 py-3 transition
           {{ request()->routeIs('admin.categories.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <span>📁</span>
            <span>Categories</span>
        </a>

        <a href="{{ route('admin.services.index') }}"
           class="flex items-center gap-3 rounded-lg px-4 py-3 transition
           {{ request()->routeIs('admin.services.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <span>🛠️</span>
            <span>Services</span>
        </a>

        <a href="{{ route('admin.bookings.index') }}"
           class="flex items-center gap-3 rounded-lg px-4 py-3 transition
           {{ request()->routeIs('admin.bookings.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-800 hover:text-white' }}">
            <span>📅</span>
            <span>Bookings</span>
        </a>

        <div class="my-5 border-t border-gray-700"></div>

        <a href="{{ route('home') }}"
           class="flex items-center gap-3 rounded-lg px-4 py-3 text-gray-300 hover:bg-gray-800 hover:text-white">
            <span>🌐</span>
            <span>Visit Website</span>
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                    class="flex w-full items-center gap-3 rounded-lg px-4 py-3 text-left text-red-400 hover:bg-gray-800 hover:text-red-300">
                <span>🚪</span>
                <span>Logout</span>
            </button>
        </form>

    </nav>
</aside>

<script>
    document.addEventListener('DOMContentLoaded', function () {

        const closeButton = document.getElementById('closeAdminMenu');
        const sidebar = document.getElementById('adminSidebar');

        if (closeButton && sidebar) {
            closeButton.addEventListener('click', function () {
                sidebar.classList.add('-translate-x-full');
            });
        }

    });
</script>
