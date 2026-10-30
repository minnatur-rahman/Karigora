
<x-app-layout>

    <div class="flex min-h-screen bg-gray-100">

        {{-- ================= SIDEBAR ================= --}}

        <aside class="w-64 bg-gray-900 text-white min-h-screen flex flex-col">

            {{-- Logo --}}
            <div class="px-6 py-7 border-b border-gray-700">
                <h1 class="text-2xl font-bold text-center">
                    Karigora
                    <span class="text-blue-400">Admin</span>
                </h1>
                <p class="text-gray-400 text-xs text-center mt-2">
                    Administration Panel
                </p>
            </div>

            {{-- Navigation --}}
            <nav class="flex-1 px-4 py-6 space-y-2">

                <p class="text-xs uppercase text-gray-500 font-semibold px-3 mb-3">
                    Main Menu
                </p>

                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition
                   {{ request()->routeIs('admin.dashboard') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                    <span>🏠</span>
                    <span>Dashboard</span>
                </a>

                <a href="{{ route('admin.categories.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition
                   {{ request()->routeIs('admin.categories.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                    <span>📂</span>
                    <span>Categories</span>
                </a>

                <a href="{{ route('admin.services.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition
                   {{ request()->routeIs('admin.services.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                    <span>🛠️</span>
                    <span>Services</span>
                </a>

                <a href="{{ route('admin.bookings.index') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg transition
                   {{ request()->routeIs('admin.bookings.*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                    <span>📅</span>
                    <span>Bookings</span>
                </a>

                <div class="border-t border-gray-700 my-5"></div>

                <p class="text-xs uppercase text-gray-500 font-semibold px-3 mb-3">
                    Website
                </p>

                <a href="{{ route('home') }}"
                   class="flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 transition">
                    <span>🌐</span>
                    <span>Visit Website</span>
                </a>

            </nav>

            {{-- Logout --}}
            <div class="p-4 border-t border-gray-700">

                <div class="text-sm text-gray-400 mb-3">
                    Logged in as Admin
                </div>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button type="submit"
                        class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-red-400 hover:bg-red-600 hover:text-white transition">
                        <span>🚪</span>
                        <span>Logout</span>
                    </button>
                </form>

            </div>

        </aside>


        {{-- ================= MAIN CONTENT ================= --}}

        <main class="flex-1 min-w-0 p-5 md:p-8 lg:p-10">

            {{-- Header --}}
            <div class="flex flex-wrap justify-between items-center gap-4 mb-8">

                <div>
                    <h2 class="text-3xl font-bold text-gray-800">
                        Dashboard
                    </h2>

                    <p class="text-gray-500 mt-2">
                        Welcome back! Manage your Karigora platform.
                    </p>
                </div>

                <div class="bg-white px-5 py-3 rounded-xl shadow-sm">
                    <span class="text-gray-500 text-sm">
                        Admin Panel
                    </span>
                </div>

            </div>


            {{-- ================= STATISTICS CARDS ================= --}}

            <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-6">

                {{-- Categories --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-blue-500">

                    <div class="flex justify-between items-center">

                        <div>
                            <p class="text-gray-500 text-sm">
                                Total Categories
                            </p>

                            <h3 class="text-3xl font-bold text-gray-800 mt-3">
                                {{ $totalCategories }}
                            </h3>
                        </div>

                        <div class="bg-blue-100 text-blue-600 rounded-xl p-4 text-2xl">
                            📂
                        </div>

                    </div>

                    <a href="{{ route('admin.categories.index') }}"
                       class="text-blue-600 text-sm mt-4 inline-block hover:underline">
                        Manage Categories →
                    </a>

                </div>


                {{-- Services --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-green-500">

                    <div class="flex justify-between items-center">

                        <div>
                            <p class="text-gray-500 text-sm">
                                Total Services
                            </p>

                            <h3 class="text-3xl font-bold text-gray-800 mt-3">
                                {{ $totalServices }}
                            </h3>
                        </div>

                        <div class="bg-green-100 text-green-600 rounded-xl p-4 text-2xl">
                            🛠️
                        </div>

                    </div>

                    <a href="{{ route('admin.services.index') }}"
                       class="text-green-600 text-sm mt-4 inline-block hover:underline">
                        Manage Services →
                    </a>

                </div>


                {{-- Bookings --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-purple-500">

                    <div class="flex justify-between items-center">

                        <div>
                            <p class="text-gray-500 text-sm">
                                Total Bookings
                            </p>

                            <h3 class="text-3xl font-bold text-gray-800 mt-3">
                                {{ $totalBookings }}
                            </h3>
                        </div>

                        <div class="bg-purple-100 text-purple-600 rounded-xl p-4 text-2xl">
                            📅
                        </div>

                    </div>

                    <a href="{{ route('admin.bookings.index') }}"
                       class="text-purple-600 text-sm mt-4 inline-block hover:underline">
                        Manage Bookings →
                    </a>

                </div>


                {{-- Pending Bookings --}}
                <div class="bg-white rounded-xl shadow-sm p-6 border-l-4 border-orange-500">

                    <div class="flex justify-between items-center">

                        <div>
                            <p class="text-gray-500 text-sm">
                                Pending Bookings
                            </p>

                            <h3 class="text-3xl font-bold text-gray-800 mt-3">
                                {{ $pendingBookings }}
                            </h3>
                        </div>

                        <div class="bg-orange-100 text-orange-600 rounded-xl p-4 text-2xl">
                            ⏳
                        </div>

                    </div>

                    <a href="{{ route('admin.bookings.index') }}"
                       class="text-orange-600 text-sm mt-4 inline-block hover:underline">
                        View Pending →
                    </a>

                </div>

            </div>


            {{-- ================= RECENT BOOKINGS ================= --}}

            <div class="bg-white rounded-xl shadow-sm mt-8">

                <div class="flex justify-between items-center p-6 border-b">

                    <div>
                        <h3 class="text-xl font-bold text-gray-800">
                            Recent Bookings
                        </h3>

                        <p class="text-gray-500 text-sm mt-1">
                            Latest customer booking activities
                        </p>
                    </div>

                    <a href="{{ route('admin.bookings.index') }}"
                       class="text-blue-600 text-sm font-semibold hover:underline">
                        View All →
                    </a>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full text-left">

                        <thead class="bg-gray-50 text-gray-600 text-sm">

                            <tr>
                                <th class="px-6 py-4">Booking ID</th>
                                <th class="px-6 py-4">Status</th>
                                <th class="px-6 py-4">Booking Date</th>
                                <th class="px-6 py-4">Action</th>
                            </tr>

                        </thead>


                        <tbody class="divide-y divide-gray-100">

                            @forelse($recentBookings as $booking)

                                <tr class="hover:bg-gray-50 transition">

                                    <td class="px-6 py-4 font-semibold text-gray-700">
                                        #{{ $booking->id }}
                                    </td>

                                    <td class="px-6 py-4">

                                        <span class="px-3 py-1 rounded-full text-xs font-semibold
                                            {{ $booking->status === 'pending'
                                                ? 'bg-yellow-100 text-yellow-700'
                                                : ($booking->status === 'confirmed'
                                                    ? 'bg-green-100 text-green-700'
                                                    : 'bg-gray-100 text-gray-700') }}">

                                            {{ ucfirst($booking->status) }}

                                        </span>

                                    </td>

                                    <td class="px-6 py-4 text-gray-500 text-sm">
                                        {{ $booking->created_at->format('d M Y') }}
                                    </td>

                                    <td class="px-6 py-4">

                                        <a href="{{ route('admin.bookings.show', $booking->id) }}"
                                           class="text-blue-600 hover:underline text-sm font-semibold">
                                            View Details
                                        </a>

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="4"
                                        class="px-6 py-10 text-center text-gray-500">
                                        No bookings found.
                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- ================= QUICK MANAGEMENT ================= --}}

            <div class="mt-8">

                <h3 class="text-xl font-bold text-gray-800 mb-5">
                    Quick Management
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">


                    <a href="{{ route('admin.categories.index') }}"
                       class="bg-blue-600 hover:bg-blue-700 text-white rounded-xl p-6 shadow-sm transition">

                        <div class="text-3xl mb-4">📂</div>

                        <h4 class="text-xl font-bold">
                            Categories
                        </h4>

                        <p class="text-blue-100 text-sm mt-2">
                            Create and manage service categories.
                        </p>

                    </a>


                    <a href="{{ route('admin.services.index') }}"
                       class="bg-green-600 hover:bg-green-700 text-white rounded-xl p-6 shadow-sm transition">

                        <div class="text-3xl mb-4">🛠️</div>

                        <h4 class="text-xl font-bold">
                            Services
                        </h4>

                        <p class="text-green-100 text-sm mt-2">
                            Add, edit and manage services.
                        </p>

                    </a>


                    <a href="{{ route('admin.bookings.index') }}"
                       class="bg-purple-600 hover:bg-purple-700 text-white rounded-xl p-6 shadow-sm transition">

                        <div class="text-3xl mb-4">📅</div>

                        <h4 class="text-xl font-bold">
                            Bookings
                        </h4>

                        <p class="text-purple-100 text-sm mt-2">
                            View and manage customer bookings.
                        </p>

                    </a>

                </div>

            </div>


            {{-- Footer --}}
            <div class="text-center text-gray-400 text-sm mt-10">
                © {{ date('Y') }} Karigora. Admin Panel.
            </div>

        </main>

    </div>

</x-app-layout>
