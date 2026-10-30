
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $service->name }} | Karigora</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            color: #1e293b;
        }

        .brand {
            color: #0d9488;
            font-size: 28px;
            font-weight: 800;
            text-decoration: none;
        }

        .detail-card {
            background: white;
            border: 1px solid #e2e8f0;
            border-radius: 18px;
            padding: 32px;
        }

        .btn-karigora {
            background: #0d9488;
            color: white;
            border: none;
        }

        .btn-karigora:hover {
            background: #0f766e;
            color: white;
        }
    </style>
</head>

<body>
    <nav class="navbar bg-white shadow-sm">
        <div class="container">
            <a class="brand" href="{{ route('home') }}">Karigora</a>
            <a href="{{ route('home') }}#services"
               class="btn btn-outline-success">
                সব সার্ভিস
            </a>
        </div>
    </nav>

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="detail-card">

                    <p class="text-secondary">
                        ক্যাটাগরি:
                        {{ $service->category->name }}
                    </p>

                    <h1 class="fw-bold mb-3">
                        {{ $service->name }}
                    </h1>

                    <p class="text-secondary">
                        {{ $service->description ?: 'এই সার্ভিস সম্পর্কে বিস্তারিত জানতে আমাদের সঙ্গে যোগাযোগ করুন।' }}
                    </p>

                    <hr>

                    <h5 class="fw-bold">সার্ভিসের মূল্য</h5>

                    @if ($service->price_type === 'fixed' && $service->price !== null)
                        <h3 class="text-success fw-bold">
                            ৳{{ number_format((float) $service->price, 2) }}
                        </h3>

                        <p class="text-secondary small">
                            এই সার্ভিসের নির্ধারিত মূল্য।
                        </p>
                    @else
                        <h5 class="text-warning-emphasis">
                            মূল্য জানতে যোগাযোগ করুন
                        </h5>

                        <p class="text-secondary small">
                            কাজের বিবরণ অনুযায়ী মূল্য নির্ধারণ করা হবে।
                        </p>
                    @endif

                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="{{ route('home') }}#services"
                           class="btn btn-outline-secondary">
                            ফিরে যান
                        </a>

                            <a href="{{ route('bookings.create', $service->slug) }}"
                               class="btn btn-success">
                                      এখনই বুক করুন
                            </a>
                        
                    </div>

                </div>
            </div>
        </div>
    </main>
</body>
</html>
