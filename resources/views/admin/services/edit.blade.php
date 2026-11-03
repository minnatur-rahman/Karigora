
@extends('admin.layouts.app')

@section('admin-content')

<div class="mx-auto max-w-4xl space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 sm:text-3xl">
                সার্ভিস সম্পাদনা
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                সার্ভিস: {{ $service->name }}
            </p>
        </div>

        <a href="{{ route('admin.services.index') }}"
           class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">
            ← সব সার্ভিস
        </a>
    </div>

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 p-4 text-red-700">
            <p class="mb-2 font-semibold">নিচের সমস্যাগুলো ঠিক করুন:</p>
            <ul class="list-inside list-disc space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Edit Form --}}
    <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm sm:p-8">

        <h2 class="mb-6 text-xl font-bold text-gray-800">
            সার্ভিসের তথ্য পরিবর্তন করুন
        </h2>

        @if ($categories->isEmpty())
            <div class="mb-6 rounded-lg border border-yellow-200 bg-yellow-50 p-4 text-sm text-yellow-800">
                কোনো ক্যাটাগরি নেই। সার্ভিস সম্পাদনা করার আগে একটি ক্যাটাগরি তৈরি করুন।
                <a href="{{ route('admin.categories.create') }}"
                   class="ml-1 font-semibold underline">
                    ক্যাটাগরি তৈরি করুন
                </a>
            </div>
        @endif

        <form action="{{ route('admin.services.update', $service) }}"
              method="POST"
              class="space-y-6">

            @csrf
            @method('PUT')

            {{-- Category --}}
            <div>
                <label for="category_id"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    ক্যাটাগরি <span class="text-red-500">*</span>
                </label>

                <select name="category_id"
                        id="category_id"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ (string) old('category_id', $service->category_id) === (string) $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            {{-- Service Name --}}
            <div>
                <label for="name"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    সার্ভিসের নাম <span class="text-red-500">*</span>
                </label>

                <input type="text"
                       name="name"
                       id="name"
                       value="{{ old('name', $service->name) }}"
                       maxlength="255"
                       required
                       class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                       placeholder="সার্ভিসের নাম লিখুন">
            </div>

            {{-- Slug --}}
            <div>
                <label for="slug"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    Slug <span class="text-red-500">*</span>
                </label>

                <input type="text"
                       name="slug"
                       id="slug"
                       value="{{ old('slug', $service->slug) }}"
                       maxlength="255"
                       required
                       class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                       placeholder="service-name">

                <p class="mt-1 text-xs text-gray-500">
                    URL-এ ব্যবহারের জন্য ইংরেজি অক্ষর ও হাইফেন ব্যবহার করুন।
                </p>
            </div>

            {{-- Description --}}
            <div>
                <label for="description"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    সার্ভিসের বিবরণ
                </label>

                <textarea name="description"
                          id="description"
                          rows="4"
                          class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                          placeholder="সার্ভিস সম্পর্কে বিস্তারিত লিখুন">{{ old('description', $service->description) }}</textarea>
            </div>

            {{-- Price Type --}}
            <div>
                <label for="price_type"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    মূল্য নির্ধারণ পদ্ধতি <span class="text-red-500">*</span>
                </label>

                <select name="price_type"
                        id="price_type"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    <option value="fixed"
                        {{ old('price_type', $service->price_type) === 'fixed' ? 'selected' : '' }}>
                        Fixed Price — নির্দিষ্ট মূল্য
                    </option>

                    <option value="quote"
                        {{ old('price_type', $service->price_type) === 'quote' ? 'selected' : '' }}>
                        Request a Quote — মূল্য আলোচনা সাপেক্ষে
                    </option>

                </select>
            </div>

            {{-- Price --}}
            <div id="priceWrapper">
                <label for="price"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    মূল্য (টাকা)
                </label>

                <input type="number"
                       name="price"
                       id="price"
                       value="{{ old('price', $service->price) }}"
                       min="0"
                       step="0.01"
                       class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100"
                       placeholder="যেমন: 500.00">

                <p class="mt-1 text-xs text-gray-500">
                    Fixed Price নির্বাচন করলে মূল্য দিতে হবে।
                </p>
            </div>

            {{-- Status --}}
            <div>
                <label for="is_active"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    সার্ভিসের অবস্থা <span class="text-red-500">*</span>
                </label>

                <select name="is_active"
                        id="is_active"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100">

                    <option value="1"
                        {{ (string) old('is_active', (int) $service->is_active) === '1' ? 'selected' : '' }}>
                        Active — চালু
                    </option>

                    <option value="0"
                        {{ (string) old('is_active', (int) $service->is_active) === '0' ? 'selected' : '' }}>
                        Inactive — বন্ধ
                    </option>

                </select>
            </div>

            {{-- Buttons --}}
            <div class="flex flex-col gap-3 border-t border-gray-100 pt-5 sm:flex-row">

                <button type="submit"
                        @if ($categories->isEmpty()) disabled @endif
                        class="inline-flex items-center justify-center rounded-lg bg-green-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-green-700 disabled:cursor-not-allowed disabled:opacity-50">
                    পরিবর্তন সেভ করুন
                </button>

                <a href="{{ route('admin.services.index') }}"
                   class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">
                    বাতিল
                </a>

            </div>

        </form>
    </div>
</div>

{{-- Price Field Toggle --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const priceType = document.getElementById('price_type');
    const priceWrapper = document.getElementById('priceWrapper');
    const priceInput = document.getElementById('price');

    if (!priceType || !priceWrapper || !priceInput) {
        return;
    }

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
