
@extends('admin.layouts.app')

@section('admin-content')

<div class="space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                সকল সার্ভিস
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                সার্ভিস পরিচালনা করুন।
                মোট সার্ভিস: {{ $services->count() }} টি
            </p>
        </div>

        <a href="{{ route('admin.services.create') }}"
           class="inline-flex items-center justify-center rounded-lg bg-green-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-green-700">
            + নতুন সার্ভিস যোগ করুন
        </a>

    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 px-5 py-4 text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 px-5 py-4 text-red-800">

            <strong>সমস্যা হয়েছে:</strong>

            <ul class="mt-2 list-inside list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>
    @endif

    {{-- Main Card --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-sm">

        {{-- Search --}}
        <div class="border-b border-gray-200 p-5">

            <input
                type="text"
                id="serviceSearch"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                placeholder="সার্ভিস বা ক্যাটাগরির নাম দিয়ে খুঁজুন..."
            >

        </div>

        {{-- Service Table --}}
        <div class="w-full overflow-x-auto">

            <table class="w-full min-w-[850px] text-left text-sm">

                <thead class="bg-gray-50 text-gray-600">

                    <tr>
                        <th class="whitespace-nowrap px-5 py-4">#</th>
                        <th class="whitespace-nowrap px-5 py-4">সার্ভিস</th>
                        <th class="whitespace-nowrap px-5 py-4">ক্যাটাগরি</th>
                        <th class="whitespace-nowrap px-5 py-4">মূল্য</th>
                        <th class="whitespace-nowrap px-5 py-4">অবস্থা</th>
                        <th class="whitespace-nowrap px-5 py-4">অ্যাকশন</th>
                    </tr>

                </thead>

                <tbody id="serviceTable" class="divide-y divide-gray-100">

                    @forelse ($services as $service)

                        <tr class="service-row transition hover:bg-gray-50">

                            {{-- Serial --}}
                            <td class="px-5 py-4 text-gray-600">
                                {{ $loop->iteration }}
                            </td>

                            {{-- Service Information --}}
                            <td class="min-w-[220px] px-5 py-4">

                                <div class="break-words font-semibold text-gray-900">
                                    {{ $service->name }}
                                </div>

                                @if ($service->description)
                                    <div class="mt-1 whitespace-normal break-words text-xs text-gray-600">
                                        {{ $service->description }}
                                    </div>
                                @endif

                                <div class="mt-1 break-all text-xs text-gray-400">
                                    {{ $service->slug }}
                                </div>

                            </td>

                            {{-- Category --}}
                            <td class="px-5 py-4 text-gray-700">

                                {{ $service->category?->name ?? 'ক্যাটাগরি নেই' }}

                            </td>

                            {{-- Price --}}
                            <td class="whitespace-nowrap px-5 py-4">

                                @if ($service->price_type === 'fixed')

                                    <span class="rounded-full bg-cyan-100 px-3 py-1 text-xs font-semibold text-cyan-800">
                                        ৳{{ number_format((float) $service->price, 2) }}
                                    </span>

                                @else

                                    <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">
                                        মূল্য আলোচনা সাপেক্ষে
                                    </span>

                                @endif

                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-4">

                                @if ($service->is_active)

                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        Active
                                    </span>

                                @else

                                    <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                        Inactive
                                    </span>

                                @endif

                            </td>

                            {{-- Actions --}}
                            <td class="px-5 py-4">

                                <div class="flex items-center gap-2">

                                    {{-- Edit --}}
                                    <a href="{{ route('admin.services.edit', $service) }}"
                                       class="rounded-md border border-blue-300 px-3 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-50">
                                        Edit
                                    </a>

                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('admin.services.destroy', $service) }}"
                                        method="POST"
                                        onsubmit="return confirm('এই সার্ভিসটি ডিলিট করতে চাও?')"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="rounded-md border border-red-300 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-50"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="px-5 py-12 text-center">

                                <h3 class="text-lg font-semibold text-gray-700">
                                    এখনো কোনো সার্ভিস যোগ করা হয়নি।
                                </h3>

                                <p class="mt-2 text-sm text-gray-500">
                                    নতুন সার্ভিস যোগ করে শুরু করো।
                                </p>

                                <a href="{{ route('admin.services.create') }}"
                                   class="mt-4 inline-block rounded-lg bg-green-600 px-5 py-2 text-sm font-semibold text-white hover:bg-green-700">
                                    নতুন সার্ভিস যোগ করুন
                                </a>

                            </td>
                        </tr>

                    @endforelse

                    {{-- No Search Result --}}
                    <tr id="noResults" class="hidden">

                        <td colspan="6" class="px-5 py-8 text-center text-gray-500">
                            কোনো সার্ভিস পাওয়া যায়নি।
                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

{{-- JavaScript Search --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const searchInput = document.getElementById('serviceSearch');
        const rows = document.querySelectorAll('.service-row');
        const noResults = document.getElementById('noResults');

        if (!searchInput) return;

        function normalizeText(text) {
            return text
                .toLocaleLowerCase()
                .normalize('NFKC')
                .trim();
        }

        searchInput.addEventListener('input', function () {

            const keyword = normalizeText(this.value);
            let visibleCount = 0;

            rows.forEach(function (row) {

                const rowText = normalizeText(row.innerText);
                const matched = rowText.includes(keyword);

                row.style.display = matched ? '' : 'none';

                if (matched) {
                    visibleCount++;
                }

            });

            noResults.classList.toggle(
                'hidden',
                visibleCount > 0 || rows.length === 0
            );

        });

    });
</script>

@endsection
