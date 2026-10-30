<!DOCTYPE html>

<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Karigora | আপনার প্রয়োজনে, দক্ষ কারিগরের সমাধান</title>

```
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f8fafc;
        color: #1e293b;
    }

    .navbar-brand {
        font-size: 28px;
        font-weight: 800;
        color: #0d9488 !important;
    }




    .hero {
        padding: 75px 20px;
        background: linear-gradient(135deg, #ccfbf1, #f0fdfa);
        text-align: center;
    }

    .hero h1 {
        font-weight: 800;
        font-size: clamp(30px, 5vw, 48px);
    }

    .hero p {
        color: #475569;
        font-size: 18px;
    }

    .search-box {
        max-width: 650px;
        margin: 28px auto 0;
    }

    .service-card {
        background: white;
        border: 1px solid #e2e8f0;
        border-radius: 16px;
        padding: 28px 15px;
        text-align: center;
        height: 100%;
        transition: 0.2s;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.07);
    }

    .service-icon {
        font-size: 42px;
        margin-bottom: 12px;
    }

    .section-title {
        font-weight: 800;
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

    footer {
        background: #0f172a;
        color: #cbd5e1;
        padding: 28px 0;
        margin-top: 60px;
    }
</style>
```

</head>

<body>

<nav class="navbar navbar-expand-lg bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">Karigora</a>

```
    <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#mainNav"
            aria-controls="mainNav" aria-expanded="false"
            aria-label="মেনু খুলুন">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mainNav">
        <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">
            <li class="nav-item">
                <a class="nav-link" href="#services">সার্ভিসসমূহ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#how-it-works">কীভাবে কাজ করে</a>
            </li>
            <li class="nav-item">
                <a class="btn btn-karigora px-4" href="#services">সার্ভিস বুক করুন</a>
            </li>
        </ul>
    </div>
</div>
```

</nav>

<section class="hero">
    <div class="container">
        <h1>আপনার প্রয়োজন,<br>দক্ষ কারিগরের সমাধান</h1>

```
    <p class="mt-3">
        আপনার এলাকার বিশ্বস্ত কারিগর খুঁজুন সহজেই।
    </p>

    <form class="search-box" id="serviceSearch">
        <div class="input-group input-group-lg">
            <input type="search" id="searchInput"
                   class="form-control"
                   placeholder="কোন সার্ভিস খুঁজছেন?"
                   aria-label="সার্ভিস খুঁজুন">

            <button class="btn btn-karigora" type="submit">
                খুঁজুন
            </button>
        </div>
    </form>

    <div class="mt-3 small text-secondary">
        মোটর রিওয়াইন্ডিং · এসি · প্লাম্বিং · ইলেকট্রিক্যাল
    </div>
</div>
```

</section>

<section class="container py-5" id="services">
    <div class="text-center mb-4">
        <h2 class="section-title">আমাদের সার্ভিসসমূহ</h2>
        <p class="text-secondary">
            আপনার প্রয়োজন অনুযায়ী সার্ভিস বেছে নিন
        </p>
    </div>

```
<div class="row g-4" id="serviceList">
    @forelse ($categories as $category)
        <div
            class="col-12 col-md-6 col-xl-4 service-item"
            data-search="{{ $category->name }} {{ $category->slug }} {{ $category->description ?? '' }} @foreach ($category->services as $service) {{ $service->name }} {{ $service->description ?? '' }} {{ $service->slug }} @endforeach"
        >
            <div class="service-card text-start">
                <div class="text-center">
                    <div class="service-icon">
                        {{ $category->icon ?? '🔧' }}
                    </div>

                    <h4 class="fw-bold">
                        {{ $category->name }}
                    </h4>

                    @if ($category->description)
                        <p class="text-secondary small">
                            {{ $category->description }}
                        </p>
                    @endif
                </div>

                <hr>

                @forelse ($category->services as $service)
                    <div class="border rounded-3 p-3 mb-3 service-detail">
                        <h6 class="fw-bold mb-2">
                            {{ $service->name }}
                        </h6>

                        @if ($service->description)
                            <p class="text-secondary small mb-2">
                                {{ $service->description }}
                            </p>
                        @endif

                        <div class="mb-3">
                            @if ($service->price_type === 'fixed' && $service->price !== null)
                                <span class="badge bg-success-subtle text-success-emphasis">
                                    মূল্য: ৳{{ number_format((float) $service->price, 2) }}
                                </span>
                            @else
                                <span class="badge bg-warning-subtle text-warning-emphasis">
                                    মূল্য জানতে যোগাযোগ করুন
                                </span>
                            @endif
                        </div>

                        <a href="{{ route('services.show', $service->slug) }}"
                           class="btn btn-sm btn-outline-success">
                              বিস্তারিত
                        </a>
                       
                    </div>
                @empty
                    <p class="text-secondary small text-center mb-0">
                        এই ক্যাটাগরিতে এখনো কোনো সার্ভিস যোগ করা হয়নি।
                    </p>
                @endforelse
            </div>
        </div>
    @empty
        <div class="col-12 text-center">
            <p class="text-secondary">
                বর্তমানে কোনো ক্যাটাগরি পাওয়া যাচ্ছে না।
            </p>
        </div>
    @endforelse

    <div class="col-12 text-center d-none" id="noResults">
        <p class="text-secondary">
            কোনো সার্ভিস পাওয়া যায়নি। অন্য শব্দ দিয়ে খুঁজুন।
        </p>
    </div>
</div>
```

</section>


<section class="container py-4" id="how-it-works">
    <div class="text-center mb-4">
        <h2 class="section-title">কীভাবে কাজ করে?</h2>
        <p class="text-secondary">মাত্র তিনটি সহজ ধাপে সার্ভিস নিন</p>
    </div>

```
<div class="row g-4 text-center">
    <div class="col-md-4">
        <div class="service-card">
            <div class="service-icon">🔎</div>
            <h5>১. সার্ভিস বেছে নিন</h5>
            <p class="text-secondary">আপনার প্রয়োজনীয় সার্ভিস খুঁজুন।</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="service-card">
            <div class="service-icon">📅</div>
            <h5>২. বুকিং করুন</h5>
            <p class="text-secondary">আপনার কাজের বিবরণ ও সময় জানান।</p>
        </div>
    </div>

    <div class="col-md-4">
        <div class="service-card">
            <div class="service-icon">🧑‍🔧</div>
            <h5>৩. কারিগরের সেবা নিন</h5>
            <p class="text-secondary">কারিগরের সঙ্গে কাজের সময় সমন্বয় করুন।</p>
        </div>
    </div>
</div>
```

</section>

<footer>
    <div class="container text-center">
        <h4 class="fw-bold text-white">Karigora</h4>
        <p class="mb-2">আপনার প্রয়োজনে, দক্ষ কারিগরের সমাধান।</p>
        <small>© {{ date('Y') }} Karigora. সর্বস্বত্ব সংরক্ষিত।</small>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script> 
   
const searchForm = document.getElementById('serviceSearch');
const searchInput = document.getElementById('searchInput');
const serviceItems = document.querySelectorAll('.service-item');
const noResults = document.getElementById('noResults');

function filterServices() {
    const keyword = searchInput.value.trim().toLocaleLowerCase();
    let visibleCount = 0;

    serviceItems.forEach(function (item) {
        const searchableText = (
            item.innerText + ' ' + (item.dataset.search || '')
        ).toLocaleLowerCase();

        const matched = searchableText.includes(keyword);

        item.classList.toggle('d-none', !matched);

        if (matched) {
            visibleCount++;
        }
    });

    noResults.classList.toggle('d-none', visibleCount > 0);
}

searchForm.addEventListener('submit', function (event) {
    event.preventDefault();
    filterServices();

    document.getElementById('services').scrollIntoView({
        behavior: 'smooth'
    });
});

searchInput.addEventListener('input', filterServices);

</script>

</body>
</html>
