
@extends('admin.layouts.app')

@section('admin-content')

<div class="mx-auto max-w-4xl space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 sm:text-3xl">
                নতুন সার্ভিস তৈরি করুন
            </h1>
            <p class="mt-2 text-sm text-gray-500">
                নতুন সার্ভিসের প্রয়োজনীয় তথ্য পূরণ করুন।
            </p>
        </div>

        <a href="{{ route('admin.services.index') }}"
           class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2.5 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
            ← সব সার্ভিস
        </a>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="rounded-xl border border-red-200 bg-red-50 p-4 text-red-700">
            <p class="font-semibold">দয়া করে ভুলগুলো ঠিক করুন:</p>

            <ul class="mt-2 list-inside list-disc space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- No Active Categories --}}
    @if ($categories->isEmpty())
        <div class="rounded-xl border border-yellow-200 bg-yellow-50 p-4 text-yellow-800">
            <p class="font-semibold">কোনো Active Category নেই।</p>
            <p class="mt-1 text-sm">
                প্রথমে একটি Category তৈরি করুন অথবা কোনো Category Active করুন।
            </p>
            <a href="{{ route('admin.categories.index') }}"
               class="mt-3 inline-block text-sm font-semibold underline">
                Category দেখুন →
            </a>
        </div>
    @endif

    {{-- Service Form --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 shadow-sm sm:p-8">

        <div class="mb-6 border-b border-gray-100 pb-5">
            <h2 class="text-xl font-bold text-gray-800">
                সার্ভিসের তথ্য
            </h2>
            <p class="mt-1 text-sm text-gray-500">
                প্রয়োজনীয় তথ্য দিয়ে নতুন সার্ভিস তৈরি করুন।
            </p>
        </div>

        <form action="{{ route('admin.services.store') }}" method="POST">
            @csrf

            {{-- Category --}}
            <div class="mb-6">
                <label for="category_id" class="mb-2 block text-sm font-semibold text-gray-700">
                    ক্যাটাগরি <span class="text-red-500">*</span>
                </label>

                <select
                    name="category_id"
                    id="category_id"
                    required
                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >
                    <option value="">ক্যাটাগরি নির্বাচন করুন</option>

                    @foreach ($categories as $category)
                        <option
                            value="{{ $category->id }}"
                            {{ old('category_id') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>

                @error('category_id')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Service Name --}}
            <div class="mb-6">
                <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">
                    সার্ভিসের নাম <span class="text-red-500">*</span>
                </label>

                <input
                    type="text"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    placeholder="যেমন: AC Servicing"
                    maxlength="255"
                    required
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >

                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
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
                    placeholder="যেমন: ac-servicing"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >

                @error('slug')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <p class="mt-2 text-xs text-gray-500">
                    খালি রাখলে Controller-এর নিয়ম অনুযায়ী সার্ভিসের নাম থেকে Slug তৈরি হবে।
                </p>
            </div>

            {{-- Description --}}
            <div class="mb-6">
                <label for="description" class="mb-2 block text-sm font-semibold text-gray-700">
                    সার্ভিসের বিবরণ
                </label>

                <textarea
                    name="description"
                    id="description"
                    rows="4"
                    placeholder="সার্ভিসে কী কী কাজ করা হবে লিখুন..."
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >{{ old('description') }}</textarea>

                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price Type --}}
            <div class="mb-6">
                <label for="price_type" class="mb-2 block text-sm font-semibold text-gray-700">
                    মূল্য নির্ধারণ পদ্ধতি <span class="text-red-500">*</span>
                </label>

                <select
                    name="price_type"
                    id="price_type"
                    required
                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >
                    <option value="fixed"
                        {{ old('price_type', 'fixed') === 'fixed' ? 'selected' : '' }}>
                        Fixed Price — নির্দিষ্ট মূল্য
                    </option>

                    <option value="quote"
                        {{ old('price_type') === 'quote' ? 'selected' : '' }}>
                        Request a Quote — কাজ দেখে মূল্য নির্ধারণ
                    </option>
                </select>

                @error('price_type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Price --}}
            <div class="mb-6" id="priceWrapper">
                <label for="price" class="mb-2 block text-sm font-semibold text-gray-700">
                    মূল্য (টাকা)
                </label>

                <input
                    type="number"
                    name="price"
                    id="price"
                    value="{{ old('price') }}"
                    min="0"
                    step="0.01"
                    placeholder="যেমন: 800"
                    class="w-full rounded-lg border border-gray-300 px-4 py-3 text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >

                @error('price')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror

                <p class="mt-2 text-xs text-gray-500">
                    Fixed Price বেছে নিলে মূল্য দিতে হবে।
                </p>
            </div>

            {{-- Status --}}
            <div class="mb-8">
                <label for="is_active" class="mb-2 block text-sm font-semibold text-gray-700">
                    সার্ভিসের অবস্থা
                </label>

                <select
                    name="is_active"
                    id="is_active"
                    required
                    class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                >
                    <option value="1"
                        {{ old('is_active', '1') === '1' ? 'selected' : '' }}>
                        Active — গ্রাহক দেখতে পাবেন
                    </option>

                    <option value="0"
                        {{ old('is_active') === '0' ? 'selected' : '' }}>
                        Inactive — গ্রাহক দেখতে পাবেন না
                    </option>
                </select>

                @error('is_active')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Buttons --}}
            <div class="flex flex-col-reverse gap-3 border-t border-gray-100 pt-6 sm:flex-row">

                <a href="{{ route('admin.services.index') }}"
                   class="inline-flex items-center justify-center rounded-lg border border-gray-300 px-5 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">
                    বাতিল
                </a>

                <button
                    type="submit"
                    {{ $categories->isEmpty() ? 'disabled' : '' }}
                    class="inline-flex items-center justify-center rounded-lg bg-blue-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-blue-700 disabled:cursor-not-allowed disabled:bg-gray-400"
                >
                    + সার্ভিস সেভ করুন
                </button>

            </div>

        </form>
    </div>

</div>

{{-- JavaScript --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    // Slug Generation
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

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

    // Fixed Price / Quote
    const priceType = document.getElementById('price_type');
    const priceWrapper = document.getElementById('priceWrapper');
    const priceInput = document.getElementById('price');

    function updatePriceField() {
        const isFixed = priceType.value === 'fixed';

        priceWrapper.style.display = isFixed ? 'block' : 'none';
        priceInput.required = isFixed;

        if (!isFixed) {
            priceInput.value = '';
        }
    }

    priceType.addEventListener('change', updatePriceField);
    updatePriceField();

});
</script>

@endsection
