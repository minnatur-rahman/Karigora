
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>বুকিং সফল | Karigora</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card mx-auto shadow-sm text-center p-4"
         style="max-width: 600px;">
        <h2 class="text-success">বুকিংয়ের অনুরোধ জমা হয়েছে!</h2>
        <p>ধন্যবাদ। আপনার বুকিংয়ের তথ্য আমরা পেয়েছি।</p>

        <p>
            সার্ভিস:
            <strong>{{ $booking->service->name }}</strong>
        </p>

        <p>
            বুকিংয়ের অবস্থা:
            <strong>অপেক্ষমাণ</strong>
        </p>

        <p>আমরা আপনার অনুরোধ যাচাই করে পরবর্তী ব্যবস্থা নেব।</p>

        <a href="{{ route('home') }}" class="btn btn-success">
            হোম পেজে ফিরে যান
        </a>
    </div>
</div>
</body>
</html>
