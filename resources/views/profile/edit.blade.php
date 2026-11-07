
<x-app-layout>

    {{-- Profile Header --}}
    <div class="bg-gradient-to-r from-emerald-700 to-green-600">
        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
            <p class="text-sm font-semibold tracking-wider text-emerald-100">
                KARIGORA ACCOUNT SETTINGS
            </p>

            <h1 class="mt-2 text-3xl font-bold text-white">
                আমার প্রোফাইল
            </h1>

            <p class="mt-2 text-emerald-50">
                আপনার ব্যক্তিগত তথ্য, পাসওয়ার্ড এবং অ্যাকাউন্ট পরিচালনা করুন।
            </p>

            <div class="mt-5">
                <a href="{{ route('dashboard') }}"
                   class="inline-flex items-center rounded-xl bg-white px-5 py-2.5 text-sm font-semibold text-emerald-700 shadow transition hover:bg-emerald-50">
                    ← Dashboard-এ ফিরে যান
                </a>
            </div>
        </div>
    </div>

    {{-- Profile Content --}}
    <div class="min-h-screen bg-slate-50 py-10">
        <div class="mx-auto max-w-7xl space-y-7 px-4 sm:px-6 lg:px-8">

            {{-- User Information Card --}}
            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-100 text-3xl font-bold text-emerald-700">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-slate-800">
                            {{ Auth::user()->name }}
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            {{ Auth::user()->email }}
                        </p>

                        <p class="mt-2 text-xs font-medium text-emerald-700">
                            Karigora Member
                        </p>
                    </div>
                </div>
            </div>

            {{-- Profile Information --}}
            <section class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">
                <div class="border-b border-slate-100 bg-emerald-50 px-6 py-5">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">👤</span>
                        <div>
                            <h2 class="text-lg font-bold text-slate-800">
                                ব্যক্তিগত তথ্য
                            </h2>
                            <p class="text-sm text-slate-500">
                                আপনার নাম ও ইমেইল আপডেট করুন।
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </section>

            {{-- Password Update --}}
            <section class="overflow-hidden rounded-2xl border border-slate-100 bg-white shadow-sm">
                <div class="border-b border-slate-100 bg-blue-50 px-6 py-5">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">🔐</span>
                        <div>
                            <h2 class="text-lg font-bold text-slate-800">
                                পাসওয়ার্ড পরিবর্তন
                            </h2>
                            <p class="text-sm text-slate-500">
                                আপনার অ্যাকাউন্ট নিরাপদ রাখতে পাসওয়ার্ড আপডেট করুন।
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.update-password-form')
                </div>
            </section>

            {{-- Delete Account --}}
            <section class="overflow-hidden rounded-2xl border border-red-100 bg-white shadow-sm">
                <div class="border-b border-red-100 bg-red-50 px-6 py-5">
                    <div class="flex items-center gap-3">
                        <span class="text-2xl">⚠️</span>
                        <div>
                            <h2 class="text-lg font-bold text-red-800">
                                অ্যাকাউন্ট মুছে ফেলুন
                            </h2>
                            <p class="text-sm text-red-600">
                                এই অপশনটি ব্যবহার করার আগে ভালোভাবে ভেবে নিন।
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-6 sm:p-8">
                    @include('profile.partials.delete-user-form')
                </div>
            </section>

            {{-- Footer --}}
            <div class="pb-5 text-center">
                <p class="text-sm text-slate-500">
                    আপনার কাজ, আমাদের দায়িত্ব! ❤️
                </p>
                <p class="mt-1 text-xs text-slate-400">
                    © {{ date('Y') }} Karigora. All rights reserved.
                </p>
            </div>

        </div>
    </div>

</x-app-layout>
