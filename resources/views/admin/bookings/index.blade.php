@extends('admin.layouts.app')

@section('admin-content')

<div class="space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col justify-between gap-3 sm:flex-row sm:items-center">

        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                বুকিং তালিকা
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Karigora-এর সকল বুকিং পরিচালনা করুন।
            </p>
        </div>

        <a href="{{ route('home') }}"
           class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 transition hover:bg-gray-50">
            🌐 হোম পেজ
        </a>

    </div>

    {{-- Booking Card --}}
    <div class="overflow-hidden rounded-xl bg-white shadow-sm">

        <div class="border-b border-gray-200 px-5 py-4">

            <h2 class="text-lg font-semibold text-gray-800">
                সকল বুকিং
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                মোট বুকিং: {{ $bookings->total() }} টি
            </p>

        </div>

        {{-- Booking Table --}}
        <div class="w-full overflow-x-auto">

            <table class="w-full min-w-[850px] text-left text-sm">

                <thead class="bg-gray-50 text-gray-600">

                    <tr>
                        <th class="whitespace-nowrap px-5 py-4">আইডি</th>
                        <th class="whitespace-nowrap px-5 py-4">গ্রাহক</th>
                        <th class="whitespace-nowrap px-5 py-4">সার্ভিস</th>
                        <th class="whitespace-nowrap px-5 py-4">মোবাইল</th>
                        <th class="whitespace-nowrap px-5 py-4">তারিখ</th>
                        <th class="whitespace-nowrap px-5 py-4">স্ট্যাটাস</th>
                        <th class="whitespace-nowrap px-5 py-4">বিস্তারিত</th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-100">

                    @forelse ($bookings as $booking)

                        <tr class="transition hover:bg-gray-50">

                            {{-- ID --}}
                            <td class="px-5 py-4 font-semibold text-gray-700">
                                #{{ $booking->id }}
                            </td>

                            {{-- Customer --}}
                            <td class="px-5 py-4">
                                <span class="font-semibold text-gray-800">
                                    {{ $booking->customer_name }}
                                </span>
                            </td>

                            {{-- Service --}}
                            <td class="px-5 py-4 text-gray-700">
                                {{ $booking->service?->name ?? 'সার্ভিস নেই' }}
                            </td>

                            {{-- Phone --}}
                            <td class="whitespace-nowrap px-5 py-4 text-gray-700">
                                {{ $booking->phone }}
                            </td>

                            {{-- Booking Date --}}
                            <td class="whitespace-nowrap px-5 py-4 text-gray-700">
                                {{ $booking->booking_date->format('d-m-Y') }}
                            </td>

                            {{-- Status --}}
                            <td class="px-5 py-4">

                                @switch($booking->status)

                                    @case('pending')
                                        <span class="rounded-full bg-yellow-100 px-3 py-1 text-xs font-semibold text-yellow-800">
                                            অপেক্ষমাণ
                                        </span>
                                        @break

                                    @case('confirmed')
                                        <span class="rounded-full bg-blue-100 px-3 py-1 text-xs font-semibold text-blue-800">
                                            নিশ্চিত
                                        </span>
                                        @break

                                    @case('completed')
                                        <span class="rounded-full bg-green-100 px-3 py-1 text-xs font-semibold text-green-800">
                                            সম্পন্ন
                                        </span>
                                        @break

                                    @case('cancelled')
                                        <span class="rounded-full bg-red-100 px-3 py-1 text-xs font-semibold text-red-800">
                                            বাতিল
                                        </span>
                                        @break

                                    @default
                                        <span class="rounded-full bg-gray-100 px-3 py-1 text-xs font-semibold text-gray-700">
                                            {{ $booking->status }}
                                        </span>

                                @endswitch

                            </td>

                            {{-- Details --}}
                            <td class="px-5 py-4">

                                <a href="{{ route('admin.bookings.show', $booking) }}"
                                   class="inline-flex items-center rounded-lg border border-green-300 px-3 py-2 text-xs font-semibold text-green-700 transition hover:bg-green-50">
                                    বিস্তারিত দেখুন
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="px-5 py-12 text-center">

                                <div class="text-4xl">
                                    📅
                                </div>

                                <h3 class="mt-3 text-lg font-semibold text-gray-700">
                                    এখনো কোনো বুকিং নেই।
                                </h3>

                                <p class="mt-1 text-sm text-gray-500">
                                    নতুন বুকিং এলে এখানে দেখা যাবে।
                                </p>

                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

    {{-- Pagination --}}
    <div class="overflow-x-auto">
        {{ $bookings->links() }}
    </div>

</div>

@endsection
