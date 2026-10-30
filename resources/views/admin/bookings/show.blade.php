<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>বুকিং বিস্তারিত | Karigora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card mx-auto" style="max-width: 800px;">
        <div class="card-body p-4">
            <h2>বুকিং #{{ $booking->id }}</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <hr>

            <p><strong>গ্রাহক:</strong> {{ $booking->customer_name }}</p>
            <p><strong>মোবাইল:</strong> {{ $booking->phone }}</p>
            <p><strong>সার্ভিস:</strong> {{ $booking->service->name ?? 'সার্ভিস নেই' }}</p>
            <p><strong>ঠিকানা:</strong> {{ $booking->address }}</p>
            <p><strong>এলাকা:</strong> {{ $booking->area }}</p>
            <p><strong>তারিখ:</strong> {{ $booking->booking_date->format('d-m-Y') }}</p>
            <p><strong>সময়:</strong> {{ $booking->booking_time }}</p>
            <p><strong>সমস্যার বিবরণ:</strong> {{ $booking->problem_description ?: 'বিবরণ দেওয়া হয়নি' }}</p>
            <p><strong>মূল্য:</strong>
                @if ($booking->price_type === 'fixed')
                    ৳{{ number_format((float) $booking->price, 2) }}
                @else
                    কোটেশন প্রয়োজন
                @endif
            </p>
            <p><strong>বর্তমান অবস্থা:</strong> {{ $booking->status }}</p>

            <hr>

            <h5>বুকিংয়ের অবস্থা পরিবর্তন</h5>

            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST"
                  action="{{ route('admin.bookings.updateStatus', $booking) }}">
                @csrf
                @method('PATCH')

                <select name="status" class="form-select mb-3" required>
                    <option value="pending" @selected($booking->status === 'pending')>অপেক্ষমাণ</option>
                    <option value="confirmed" @selected($booking->status === 'confirmed')>নিশ্চিত</option>
                    <option value="completed" @selected($booking->status === 'completed')>সম্পন্ন</option>
                    <option value="cancelled" @selected($booking->status === 'cancelled')>বাতিল</option>
                </select>

                <button class="btn btn-success" type="submit">
                    স্ট্যাটাস আপডেট
                </button>
                <a href="{{ route('admin.bookings.index') }}"
                   class="btn btn-outline-secondary">
                    বুকিং তালিকায় ফিরুন
                </a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
