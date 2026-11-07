
<x-app-layout>
    <div class="min-h-screen bg-slate-50">

        {{-- Header --}}
        <div class="bg-gradient-to-r from-emerald-700 to-green-600">
            <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">
                <div class="flex flex-col justify-between gap-6 sm:flex-row sm:items-center">
                    <div>
                        <p class="text-sm font-medium text-emerald-100">
                            KARIGORA USER DASHBOARD
                        </p>

                        <h1 class="mt-2 text-3xl font-bold text-white sm:text-4xl">
                            স্বাগতম, {{ Auth::user()->name }}!
                        </h1>

                        <p class="mt-3 text-emerald-50">
                            আপনার প্রয়োজনীয় সার্ভিস খুঁজুন, বুকিং করুন এবং
                            আপনার অ্যাকাউন্ট পরিচালনা করুন।
                        </p>
                    </div>

                    <a href="{{ route('home') }}#services"
                       class="inline-flex items-center justify-center rounded-xl bg-white px-6 py-3 font-semibold text-emerald-700 shadow-lg transition hover:bg-emerald-50">
                        সার্ভিস খুঁজুন →
                    </a>
                </div>
            </div>
        </div>

        {{-- Main Content --}}
        <div class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8">

            {{-- Welcome Card --}}
            <div class="rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                <div class="flex flex-col gap-4 sm:flex-row sm:items-center">
                    <div class="flex h-16 w-16 items-center justify-center rounded-2xl bg-emerald-100 text-2xl font-bold text-emerald-700">
                        {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                    </div>

                    <div>
                        <h2 class="text-xl font-bold text-slate-800">
                            আপনার Karigora অ্যাকাউন্ট
                        </h2>

                        <p class="mt-1 text-sm text-slate-500">
                            {{ Auth::user()->email }}
                        </p>

                        <span class="mt-2 inline-flex rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                            সক্রিয় অ্যাকাউন্ট
                        </span>
                    </div>
                </div>
            </div>

            {{-- Quick Action Cards --}}
            <div class="mt-8">
                <h2 class="text-xl font-bold text-slate-800">
                    আপনার জন্য শর্টকাট
                </h2>

                <p class="mt-1 text-sm text-slate-500">
                    সহজেই প্রয়োজনীয় কাজগুলো সম্পন্ন করুন।
                </p>

                <div class="mt-5 grid gap-5 sm:grid-cols-2 lg:grid-cols-3">

                    {{-- Services --}}
                    <a href="{{ route('home') }}#services"
                       class="group rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-2xl">
                            🔧
                        </div>

                        <h3 class="mt-5 text-lg font-bold text-slate-800">
                            সার্ভিস খুঁজুন
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            আপনার প্রয়োজন অনুযায়ী দক্ষ কারিগর ও সার্ভিস খুঁজে নিন।
                        </p>

                        <p class="mt-4 font-semibold text-emerald-700 group-hover:underline">
                            সার্ভিস দেখুন →
                        </p>
                    </a>

                    {{-- Categories --}}
                    <a href="{{ route('home') }}#categories"
                       class="group rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-100 text-2xl">
                            📂
                        </div>

                        <h3 class="mt-5 text-lg font-bold text-slate-800">
                            সকল ক্যাটাগরি
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            বিভিন্ন ধরনের কাজের ক্যাটাগরি থেকে আপনার পছন্দ বেছে নিন।
                        </p>

                        <p class="mt-4 font-semibold text-emerald-700 group-hover:underline">
                            ক্যাটাগরি দেখুন →
                        </p>
                    </a>

                    {{-- Profile --}}
                    <a href="{{ route('profile.edit') }}"
                       class="group rounded-2xl border border-slate-100 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-purple-100 text-2xl">
                            👤
                        </div>

                        <h3 class="mt-5 text-lg font-bold text-slate-800">
                            আমার প্রোফাইল
                        </h3>

                        <p class="mt-2 text-sm leading-6 text-slate-500">
                            আপনার নাম, ইমেইল ও পাসওয়ার্ড পরিবর্তন করুন।
                        </p>

                        <p class="mt-4 font-semibold text-emerald-700 group-hover:underline">
                            প্রোফাইল দেখুন →
                        </p>
                    </a>

                </div>
            </div>

            {{-- Account Information --}}
            <div class="mt-10 rounded-2xl border border-slate-100 bg-white p-6 shadow-sm">
                <h2 class="text-xl font-bold text-slate-800">
                    অ্যাকাউন্টের তথ্য
                </h2>

                <div class="mt-5 grid gap-5 sm:grid-cols-2">

                    <div class="rounded-xl bg-slate-50 p-4">
                        <p class="text-sm text-slate-500">আপনার নাম</p>
                        <p class="mt-1 font-semibold text-slate-800">
                            {{ Auth::user()->name }}
                        </p>
                    </div>

                    <div class="rounded-xl bg-slate-50 p-4">
                        <p class="text-sm text-slate-500">ইমেইল ঠিকানা</p>
                        <p class="mt-1 break-all font-semibold text-slate-800">
                            {{ Auth::user()->email }}
                        </p>
                    </div>

                    <div class="rounded-xl bg-slate-50 p-4">
                        <p class="text-sm text-slate-500">সদস্য হয়েছেন</p>
                        <p class="mt-1 font-semibold text-slate-800">
                            {{ Auth::user()->created_at->format('d M Y') }}
                        </p>
                    </div>

                    <div class="rounded-xl bg-slate-50 p-4">
                        <p class="text-sm text-slate-500">অ্যাকাউন্টের ধরন</p>
                        <p class="mt-1 font-semibold text-emerald-700">
                            সাধারণ User
                        </p>
                    </div>

                </div>

                <div class="mt-6">
                    <a href="{{ route('profile.edit') }}"
                       class="inline-flex rounded-xl bg-emerald-600 px-5 py-3 text-sm font-semibold text-white transition hover:bg-emerald-700">
                        প্রোফাইল আপডেট করুন
                    </a>
                </div>
            </div>

            {{-- Bottom Message --}}
            <div class="mt-8 rounded-2xl bg-emerald-50 px-6 py-8 text-center">
                <h2 class="text-xl font-bold text-emerald-800">
                    আপনার কাজ, আমাদের দায়িত্ব!
                </h2>

                <p class="mx-auto mt-2 max-w-2xl text-sm leading-6 text-emerald-700">
                    Karigora-এর মাধ্যমে সহজেই আপনার প্রয়োজনীয় সার্ভিস খুঁজে নিন।
                    আপনার দৈনন্দিন কাজকে আরও সহজ করাই আমাদের লক্ষ্য।
                </p>

                <a href="{{ route('home') }}"
                   class="mt-5 inline-flex rounded-xl bg-emerald-700 px-6 py-3 font-semibold text-white transition hover:bg-emerald-800">
                    Karigora Home Page
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
