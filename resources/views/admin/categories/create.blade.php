@extends('admin.layouts.app')

@section('admin-content')

<div class="mx-auto max-w-4xl space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 sm:text-3xl">
                নতুন ক্যাটাগরি তৈরি করুন
            </h1>
            <p class="mt-2 text-sm text-gray-500">
                নতুন সার্ভিস ক্যাটাগরির তথ্য পূরণ করুন।
            </p>
        </div>

        <a href="{{ route('admin.categories.index') }}"
           class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
            ← সব ক্যাটাগরি
        </a>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
            <p class="font-semibold">দয়া করে নিচের ভুলগুলো ঠিক করুন:</p>

            <ul class="mt-2 list-inside list-disc space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Category Form Card --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm sm:p-8">

        <div class="mb-6 border-b border-gray-100 pb-5">
            <h2 class="text-xl font-bold text-gray-800">
                ক্যাটাগরির তথ্য
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                * চিহ্নিত ফিল্ডগুলো পূরণ করা আবশ্যক।
            </p>
        </div>

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            {{-- Category Name --}}
            <div class="mb-6">
                <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">
                    ক্যাটাগরির নাম <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    placeholder="যেমন: ফ্রিজ টেকনিশিয়ান"
                    maxlength="255"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >

                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <p class="mt-2 text-xs text-gray-500">
                    ক্যাটাগরির নাম বাংলা বা ইংরেজিতে লিখতে পারেন।
                </p>
            </div>

            {{-- Slug --}}
            <div class="mb-6">
                <label for="slug" class="mb-2 block text-sm font-semibold text-gray-700">
                    Slug
                </label>

                <input
                    type="text"
                    name="slug"
                    id="slug"
                    value="{{ old('slug') }}"
                    placeholder="যেমন: fridge-technician"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >

                @error('slug')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <p class="mt-2 text-xs text-gray-500">
                    খালি রাখলে আপনার Controller-এর নিয়ম অনুযায়ী Slug তৈরি হবে।
                    ইংরেজি অক্ষর ব্যবহার করা ভালো।
                </p>
            </div>

            {{-- Description --}}
            <div class="mb-6">
                <label for="description" class="mb-2 block text-sm font-semibold text-gray-700">
                    ক্যাটাগরির বিবরণ
                </label>

                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    placeholder="এই সার্ভিসে কী ধরনের কাজ করা হয় লিখুন..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-800 outline-none transition placeholder:text-gray-400 focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >{{ old('description') }}</textarea>

                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Category Icon --}}
            <div class="mb-6">
                <label for="icon" class="mb-2 block text-sm font-semibold text-gray-700">
                    ক্যাটাগরি Icon
                </label>

                <input
                    type="text"
                    name="icon"
                    id="icon"
                    value="{{ old('icon', '🔧') }}"
                    placeholder="একটি Emoji দিন"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >

                @error('icon')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <p class="mb-3 mt-3 text-sm text-gray-500">
                    অথবা নিচের Icon-এ ক্লিক করুন:
                </p>

                <div class="flex flex-wrap gap-2">
                    @foreach (['⚙️', '❄️', '🔧', '⚡', '🚰', '🧹', '🎨', '🛠️'] as $emoji)
                        <button
                            type="button"
                            data-icon="{{ $emoji }}"
                            aria-label="Icon {{ $emoji }}"
                            class="icon-option rounded-lg border border-gray-300 bg-white px-3 py-2 text-2xl transition hover:border-blue-500 hover:bg-blue-50"
                        >{{ $emoji }}</button>
                    @endforeach
                </div>
            </div>

            {{-- Active Status --}}
            <div class="mb-8">
                <label for="is_active" class="mb-2 block text-sm font-semibold text-gray-700">
                    ক্যাটাগরির অবস্থা
                </label>

                <select
                    name="is_active"
                    id="is_active"
                    required
                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >
                    <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>
                        Active — হোমপেজে দেখাবে
                    </option>

                    <option value="0" {{ old('is_active') === '0' ? 'selected' : '' }}>
                        Inactive — হোমপেজে দেখাবে না
                    </option>
                </select>

                @error('is_active')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Action Buttons --}}
            <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 sm:flex-row">
                <a
                    href="{{ route('admin.categories.index') }}"
                    class="inline-flex items-center justify-center rounded-lg border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100"
                >
                    বাতিল
                </a>

                <button
                    type="submit"
                    class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                >
                    + ক্যাটাগরি সেভ করুন
                </button>
            </div>

        </form>
    </div>

</div>

{{-- JavaScript: Slug and Icon Selection --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');
    const iconInput = document.getElementById('icon');
    const iconButtons = document.querySelectorAll('.icon-option');

    if (nameInput && slugInput) {
        let slugManuallyEdited = slugInput.value.trim() !== '';

        slugInput.addEventListener('input', function () {
            slugManuallyEdited = this.value.trim() !== '';
        });

        nameInput.addEventListener('input', function () {
            if (!slugManuallyEdited) {
                slugInput.value = this.value
                    .toLowerCase()
                    .trim()
                    .replace(/[^a-z0-9\s-]/g, '')
                    .replace(/\s+/g, '-')
                    .replace(/-+/g, '-');
            }
        });
    }

    iconButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            if (iconInput) {
                iconInput.value = this.dataset.icon;
            }

            iconButtons.forEach(function (item) {
                item.classList.remove('border-blue-500', 'bg-blue-100');
                item.classList.add('border-gray-300', 'bg-white');
            });

            this.classList.remove('border-gray-300', 'bg-white');
            this.classList.add('border-blue-500', 'bg-blue-100');
        });
    });
});
</script>

@endsection
