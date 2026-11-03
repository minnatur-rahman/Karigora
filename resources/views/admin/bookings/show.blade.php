
@extends('admin.layouts.app')

@section('admin-content')

<div class="mx-auto max-w-4xl space-y-6">

    {{-- Page Header --}}
    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 sm:text-3xl">
                বুকিং বিস্তারিত
            </h1>
            <p class="mt-2 text-sm text-gray-600">
                বুকিং নম্বর: #{{ $booking->id }}
            </p>
        </div>

        <a href="{{ route('admin.bookings.index') }}"
           class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">
            ← বুকিং তালিকায় ফিরুন
        </a>
    </div>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="rounded-lg border border-green-200 bg-green-50 p-4 text-sm font-medium text-green-800">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700">
            <p class="mb-1 font-semibold">সমস্যা হয়েছে:</p>
            <ul class="list-inside list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Booking Information --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        <div class="border-b border-gray-200 bg-gray-50 px-5 py-4 sm:px-6">
            <h2 class="text-lg font-bold text-gray-800">
                গ্রাহক ও বুকিংয়ের তথ্য
            </h2>
        </div>

        <div class="p-5 sm:p-6">
            <dl class="grid grid-cols-1 gap-5 sm:grid-cols-2">

                <div>
                    <dt class="text-sm font-medium text-gray-500">গ্রাহকের নাম</dt>
                    <dd class="mt-1 break-words text-base font-semibold text-gray-800">
                        {{ $booking->customer_name }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">মোবাইল নম্বর</dt>
                    <dd class="mt-1 break-words text-base font-semibold text-gray-800">
                        {{ $booking->phone }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">সার্ভিস</dt>
                    <dd class="mt-1 break-words text-base font-semibold text-gray-800">
                        {{ $booking->service?->name ?? 'সার্ভিস নেই' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">এলাকা</dt>
                    <dd class="mt-1 break-words text-base text-gray-800">
                        {{ $booking->area ?: 'উল্লেখ করা হয়নি' }}
                    </dd>
                </div>

                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">ঠিকানা</dt>
                    <dd class="mt-1 whitespace-pre-line break-words text-base text-gray-800">
                        {{ $booking->address ?: 'ঠিকানা দেওয়া হয়নি' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">বুকিংয়ের তারিখ</dt>
                    <dd class="mt-1 text-base font-semibold text-gray-800">
                        {{ $booking->booking_date?->format('d-m-Y') ?? 'তারিখ দেওয়া হয়নি' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">বুকিংয়ের সময়</dt>
                    <dd class="mt-1 text-base font-semibold text-gray-800">
                        {{ $booking->booking_time ?: 'সময় দেওয়া হয়নি' }}
                    </dd>
                </div>

                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500">সমস্যার বিবরণ</dt>
                    <dd class="mt-1 whitespace-pre-line break-words text-base leading-7 text-gray-800">
                        {{ $booking->problem_description ?: 'বিবরণ দেওয়া হয়নি' }}
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">মূল্য</dt>
                    <dd class="mt-1 text-lg font-bold text-gray-800">
                        @if ($booking->price_type === 'fixed')
                            ৳{{ number_format((float) $booking->price, 2) }}
                        @else
                            কোটেশন প্রয়োজন
                        @endif
                    </dd>
                </div>

                <div>
                    <dt class="text-sm font-medium text-gray-500">বর্তমান অবস্থা</dt>
                    <dd class="mt-2">
                        @php
                            $statusStyles = [
                                'pending' => 'bg-yellow-100 text-yellow-800',
                                'confirmed' => 'bg-blue-100 text-blue-800',
                                'completed' => 'bg-green-100 text-green-800',
                                'cancelled' => 'bg-red-100 text-red-800',
                            ];

                            $statusLabels = [
                                'pending' => 'অপেক্ষমাণ',
                                'confirmed' => 'নিশ্চিত',
                                'completed' => 'সম্পন্ন',
                                'cancelled' => 'বাতিল',
                            ];
                        @endphp

                        <span class="inline-flex rounded-full px-3 py-1 text-sm font-semibold {{ $statusStyles[$booking->status] ?? 'bg-gray-100 text-gray-700' }}">
                            {{ $statusLabels[$booking->status] ?? $booking->status }}
                        </span>
                    </dd>
                </div>

            </dl>
        </div>
    </div>

    {{-- Update Booking Status --}}
    <div class="rounded-xl border border-gray-200 bg-white p-5 shadow-sm sm:p-6">

        <h2 class="text-lg font-bold text-gray-800">
            বুকিংয়ের অবস্থা পরিবর্তন
        </h2>

        <p class="mt-1 text-sm text-gray-500">
            বুকিংয়ের বর্তমান অবস্থা অনুযায়ী নতুন স্ট্যাটাস নির্বাচন করুন।
        </p>

        <form method="POST"
              action="{{ route('admin.bookings.updateStatus', $booking) }}"
              class="mt-5 space-y-5">

            @csrf
            @method('PATCH')

            <div>
                <label for="status"
                       class="mb-2 block text-sm font-semibold text-gray-700">
                    নতুন স্ট্যাটাস
                </label>

                <select name="status"
                        id="status"
                        required
                        class="w-full rounded-lg border border-gray-300 bg-white px-4 py-3 text-sm text-gray-800 outline-none transition focus:border-blue-500 focus:ring-2 focus:ring-blue-100 sm:max-w-md">

                    <option value="pending"
                        {{ old('status', $booking->status) === 'pending' ? 'selected' : '' }}>
                        অপেক্ষমাণ
                    </option>

                    <option value="confirmed"
                        {{ old('status', $booking->status) === 'confirmed' ? 'selected' : '' }}>
                        নিশ্চিত
                    </option>

                    <option value="completed"
                        {{ old('status', $booking->status) === 'completed' ? 'selected' : '' }}>
                        সম্পন্ন
                    </option>

                    <option value="cancelled"
                        {{ old('status', $booking->status) === 'cancelled' ? 'selected' : '' }}>
                        বাতিল
                    </option>

                </select>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row">

                <button type="submit"
                        class="inline-flex items-center justify-center rounded-lg bg-green-600 px-6 py-3 text-sm font-semibold text-white transition hover:bg-green-700">
                    স্ট্যাটাস আপডেট করুন
                </button>

                <a href="{{ route('admin.bookings.index') }}"
                   class="inline-flex items-center justify-center rounded-lg border border-gray-300 bg-white px-6 py-3 text-sm font-semibold text-gray-700 transition hover:bg-gray-100">
                    বুকিং তালিকায় ফিরুন
                </a>

            </div>
        </form>
    </div>

</div>

@endsection
