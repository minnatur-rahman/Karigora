<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>বুকিং তালিকা | Karigora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <h2 class="mb-4">Karigora — বুকিং তালিকা</h2>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead>
                    <tr>
                        <th>আইডি</th>
                        <th>গ্রাহক</th>
                        <th>সার্ভিস</th>
                        <th>মোবাইল</th>
                        <th>তারিখ</th>
                        <th>স্ট্যাটাস</th>
                        <th>বিস্তারিত</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->customer_name }}</td>
                            <td>{{ $booking->service->name ?? 'সার্ভিস নেই' }}</td>
                            <td>{{ $booking->phone }}</td>
                            <td>{{ $booking->booking_date->format('d-m-Y') }}</td>
                            <td>
                                @switch($booking->status)
                                    @case('pending') অপেক্ষমাণ @break
                                    @case('confirmed') নিশ্চিত @break
                                    @case('completed') সম্পন্ন @break
                                    @case('cancelled') বাতিল @break
                                @endswitch
                            </td>
                            <td>
                                <a href="{{ route('admin.bookings.show', $booking) }}"
                                   class="btn btn-sm btn-outline-success">
                                    দেখুন
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                এখনো কোনো বুকিং নেই।
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $bookings->links() }}
    </div>

    <a href="{{ route('home') }}" class="btn btn-outline-secondary mt-3">
        হোম পেজ
    </a>
</div>
</body>
</html>
