@extends('admin.layouts.app')

@section('admin-content')

<div class="space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                সকল ক্যাটাগরি
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                ক্যাটাগরি পরিচালনা করুন।
                মোট ক্যাটাগরি: {{ $categories->count() }} টি
            </p>
        </div>

        <a href="{{ route('admin.categories.create') }}"
           class="inline-flex items-center justify-center rounded-lg bg-green-600 px-5 py-3 text-sm font-semibold text-white shadow-sm transition hover:bg-green-700">
            + নতুন ক্যাটাগরি যোগ করুন
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
                id="categorySearch"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 text-sm focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                placeholder="ক্যাটাগরির নাম দিয়ে খুঁজুন..."
            >
        </div>

        {{-- Category Table --}}
        <div class="w-full overflow-x-auto">

            <table class="w-full min-w-[850px] text-left text-sm">

                <thead class="bg-gray-50 text-gray-600">
                    <tr>
                        <th class="whitespace-nowrap px-5 py-4">#</th>
                        <th class="whitespace-nowrap px-5 py-4">আইকন</th>
                        <th class="whitespace-nowrap px-5 py-4">ক্যাটাগরির নাম</th>
                        <th class="whitespace-nowrap px-5 py-4">Slug</th>
                        <th class="whitespace-nowrap px-5 py-4">অবস্থা</th>
                        <th class="whitespace-nowrap px-5 py-4">তৈরির তারিখ</th>
                        <th class="whitespace-nowrap px-5 py-4">অ্যাকশন</th>
                    </tr>
                </thead>

                <tbody id="categoryTable" class="divide-y divide-gray-100">

                    @forelse ($categories as $category)

                        <tr class="category-row transition hover:bg-gray-50">

                            <td class="px-5 py-4 text-gray-600">
                                {{ $loop->iteration }}
                            </td>

                            <td class="px-5 py-4 text-2xl">
                                {{ $category->icon ?? '🔧' }}
                            </td>

                            <td class="min-w-[180px] px-5 py-4">
                          <div class="break-words font-semibold text-gray-900">
                                {{ $category->name }}
                          </div>

                            @if ($category->description)
                         <div class="mt-1 whitespace-normal break-words text-xs text-gray-600">
                            {{ $category->description }}
                         </div>
    @endif
</td>

                            <td class="px-5 py-4">
                                <code class="rounded bg-gray-100 px-2 py-1 text-xs text-gray-700">
                                    {{ $category->slug }}
                                </code>
                            </td>

                            <td class="px-5 py-4">

                                @if ($category->is_active)
                                    <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-700">
                                        সক্রিয়
                                    </span>
                                @else
                                    <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-700">
                                        নিষ্ক্রিয়
                                    </span>
                                @endif

                            </td>

                            <td class="whitespace-nowrap px-5 py-4 text-gray-600">
                                {{ $category->created_at->format('d-m-Y') }}
                            </td>

                            <td class="px-5 py-4">

                                <div class="flex items-center gap-2">

                                    {{-- Edit --}}
                                    <a href="{{ route('admin.categories.edit', $category) }}"
                                       class="rounded-md border border-blue-300 px-3 py-2 text-xs font-semibold text-blue-600 transition hover:bg-blue-50">
                                        Edit
                                    </a>

                                    {{-- Delete --}}
                                    <form
                                        action="{{ route('admin.categories.destroy', $category) }}"
                                        method="POST"
                                        onsubmit="return confirm('আপনি কি এই ক্যাটাগরি মুছে ফেলতে চান?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="rounded-md border border-red-300 px-3 py-2 text-xs font-semibold text-red-600 transition hover:bg-red-50">
                                            Delete
                                        </button>
                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-5 py-12 text-center">

                                <h3 class="text-lg font-semibold text-gray-700">
                                    এখনো কোনো ক্যাটাগরি নেই!
                                </h3>

                                <p class="mt-2 text-sm text-gray-500">
                                    নতুন ক্যাটাগরি যোগ করে শুরু করুন।
                                </p>

                                <a href="{{ route('admin.categories.create') }}"
                                   class="mt-4 inline-block rounded-lg bg-green-600 px-5 py-2 text-sm font-semibold text-white hover:bg-green-700">
                                    ক্যাটাগরি যোগ করুন
                                </a>

                            </td>
                        </tr>

                    @endforelse

                    {{-- Search Empty Result --}}
                    <tr id="noSearchResult" class="hidden">
                        <td colspan="7" class="px-5 py-8 text-center text-gray-500">
                            কোনো ক্যাটাগরি পাওয়া যায়নি।
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

    const searchInput = document.getElementById('categorySearch');
    const categoryRows = document.querySelectorAll('.category-row');
    const noSearchResult = document.getElementById('noSearchResult');

    if (!searchInput) return;

    function normalizeText(text) {
        return text
            .toLocaleLowerCase()
            .normalize('NFKC')
            .trim();
    }

    searchInput.addEventListener('input', function () {

        const searchText = normalizeText(this.value);
        let visibleCount = 0;

        categoryRows.forEach(function (row) {

            const categoryText = normalizeText(row.innerText);
            const matched = categoryText.includes(searchText);

            row.style.display = matched ? '' : 'none';

            if (matched) {
                visibleCount++;
            }

        });

        noSearchResult.classList.toggle(
            'hidden',
            visibleCount > 0 || categoryRows.length === 0
        );

    });

});

</script>

@endsection
