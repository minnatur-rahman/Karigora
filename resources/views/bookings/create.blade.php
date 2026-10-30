
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>বুকিং করুন | Karigora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 700px;">
        <div class="card-body p-4">
            <h2 class="mb-2">সার্ভিস বুক করুন</h2>
            <p class="text-muted">
                সার্ভিস: <strong>{{ $service->name }}</strong>
            </p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST"
                  action="{{ route('bookings.store', $service->slug) }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">আপনার নাম *</label>
                    <input type="text" name="customer_name"
                           class="form-control" required maxlength="255"
                           value="{{ old('customer_name') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">মোবাইল নম্বর *</label>
                    <input type="tel" name="phone"
                           class="form-control" required
                           placeholder="01XXXXXXXXX"
                           value="{{ old('phone') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">সম্পূর্ণ ঠিকানা *</label>
                    <input type="text" name="address"
                           class="form-control" required maxlength="255"
                           value="{{ old('address') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">এলাকা / শহর *</label>
                    <input type="text" name="area"
                           class="form-control" required maxlength="255"
                           value="{{ old('area') }}">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">তারিখ *</label>
                        <input type="date" name="booking_date"
                               class="form-control" required
                               min="{{ now()->toDateString() }}"
                               value="{{ old('booking_date') }}">
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">পছন্দের সময় *</label>
                        <input type="time" name="booking_time"
                               class="form-control" required
                               value="{{ old('booking_time') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">সমস্যার বিবরণ</label>
                    <textarea name="problem_description"
                              class="form-control" rows="4"
                              maxlength="2000">{{ old('problem_description') }}</textarea>
                </div>

                @if ($service->price_type === 'fixed')
                    <div class="alert alert-success">
                        নির্ধারিত মূল্য: ৳{{ number_format((float) $service->price, 2) }}
                    </div>
                @else
                    <div class="alert alert-info">
                        এটি কোটেশনভিত্তিক সার্ভিস। বুকিংয়ের পর মূল্য জানানো হবে।
                    </div>
                @endif

                <button type="submit" class="btn btn-success w-100">
                    বুকিং জমা দিন
                </button>

                <a href="{{ route('services.show', $service->slug) }}"
                   class="btn btn-outline-secondary w-100 mt-2">
                    ফিরে যান
                </a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
