
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Karigora | আপনার প্রয়োজনে দক্ষ কারিগরের সমাধান</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #0d9488;
            --primary-dark: #0f766e;
            --dark: #102a35;
            --light: #f5f9fa;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: 'Hind Siliguri', sans-serif;
            background: var(--light);
            color: #1e293b;
        }

        html {
            scroll-behavior: smooth;
        }

        .navbar {
            background: rgba(255,255,255,.96);
            backdrop-filter: blur(12px);
        }

        .navbar-brand {
            font-size: 28px;
            font-weight: 800;
            color: var(--primary) !important;
        }

        .btn-karigora {
            background: var(--primary);
            color: white;
            border: 0;
            border-radius: 10px;
            padding: 11px 24px;
            font-weight: 600;
            transition: .25s;
        }

        .btn-karigora:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        /* HERO */

        .hero {
            position: relative;
            overflow: hidden;
            padding: 90px 0;
            background: linear-gradient(120deg, #e0f7f3, #f0fdfa 55%, #dbeafe);
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 350px;
            height: 350px;
            border-radius: 50%;
            background: rgba(13,148,136,.08);
            top: -150px;
            right: -80px;
        }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-tag {
            display: inline-block;
            padding: 8px 16px;
            background: white;
            color: var(--primary-dark);
            border-radius: 30px;
            font-size: 14px;
            font-weight: 700;
            box-shadow: 0 4px 15px rgba(0,0,0,.05);
        }

        .hero h1 {
            font-size: clamp(34px, 5vw, 58px);
            font-weight: 800;
            line-height: 1.35;
            color: var(--dark);
            margin-top: 22px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero-description {
            font-size: 18px;
            color: #64748b;
            line-height: 1.8;
            max-width: 520px;
        }

        .hero-search {
            max-width: 560px;
            margin-top: 28px;
            padding: 7px;
            background: white;
            border-radius: 14px;
            box-shadow: 0 10px 35px rgba(0,0,0,.08);
        }

        .hero-search .form-control {
            border: none;
            box-shadow: none;
            padding: 14px;
            background: transparent;
        }

        .hero-image {
            position: relative;
            min-height: 390px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .hero-image img {
            width: 100%;
            max-width: 520px;
            height: 380px;
            object-fit: cover;
            border-radius: 35px;
            box-shadow: 0 25px 60px rgba(15,118,110,.18);
        }

        .hero-floating {
            position: absolute;
            left: -5px;
            bottom: 35px;
            background: white;
            padding: 14px 20px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,.1);
            font-weight: 600;
        }

        /* COMMON SECTION */

        .section-space {
            padding: 75px 0;
        }

        .section-heading {
            font-size: 34px;
            font-weight: 800;
            color: var(--dark);
        }

        .section-subtitle {
            color: #64748b;
            font-size: 16px;
        }

        /* CATEGORY */

        .category-card {
            display: block;
            position: relative;
            overflow: hidden;
            height: 100%;
            min-height: 210px;
            padding: 25px 18px;
            border-radius: 20px;
            text-decoration: none;
            border: 1px solid rgba(0,0,0,.04);
            transition: .3s;
        }

        .category-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 18px 35px rgba(0,0,0,.10);
        }

        .category-icon {
            width: 72px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
            font-size: 38px;
            background: rgba(255,255,255,.8);
            margin-bottom: 18px;
        }

        .category-card h4 {
            font-size: 21px;
            font-weight: 700;
            color: var(--dark);
        }

        .category-card p {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 0;
        }

        .category-card .category-arrow {
            position: absolute;
            right: 20px;
            bottom: 20px;
            font-size: 23px;
            color: #64748b;
        }

        .cat-0 { background: #e0f2fe; }
        .cat-1 { background: #dcfce7; }
        .cat-2 { background: #fef3c7; }
        .cat-3 { background: #fce7f3; }
        .cat-4 { background: #ede9fe; }
        .cat-5 { background: #ffedd5; }

       
/* PREMIUM SERVICE CARDS */

.service-box {
    position: relative;
    background: #ffffff;
    border: 1px solid #e5eeee;
    border-radius: 22px;
    padding: 25px;
    height: 100%;
    display: flex;
    flex-direction: column;
    overflow: hidden;
    transition: all .3s ease;
    box-shadow: 0 5px 20px rgba(15, 50, 60, .035);
}

.service-box:hover {
    transform: translateY(-8px);
    border-color: #99f6e4;
    box-shadow: 0 18px 40px rgba(13, 148, 136, .13);
}

.service-top {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 22px;
}

.service-icon-box {
    width: 65px;
    height: 65px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    background: #e0fdfa;
    transition: .3s;
}

.service-box:hover .service-icon-box {
    transform: rotate(-5deg) scale(1.07);
}

.service-category-badge {
    font-size: 12px;
    font-weight: 700;
    background: #f0fdfa;
    color: #0f766e;
    padding: 7px 12px;
    border-radius: 30px;
}

.service-box h5 {
    font-size: 21px;
    font-weight: 800;
    color: #102a35;
    margin-bottom: 10px;
}

.service-description {
    color: #64748b;
    font-size: 14px;
    line-height: 1.8;
    min-height: 50px;
    margin-bottom: 20px;
}

.service-price-area {
    background: #f8fafc;
    border: 1px solid #edf2f3;
    border-radius: 13px;
    padding: 12px 15px;
    margin-bottom: 20px;
}

.service-price-label {
    color: #64748b;
    font-size: 12px;
    display: block;
    margin-bottom: 3px;
}

.price-badge {
    display: inline-block;
    color: #047857;
    font-size: 18px;
    font-weight: 800;
}

.negotiable-badge {
    color: #b45309;
    font-size: 14px;
    font-weight: 700;
}

.service-details-btn {
    margin-top: auto;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    padding: 12px;
    border-radius: 12px;
    text-decoration: none;
    background: #0d9488;
    color: white;
    font-weight: 700;
    transition: .25s;
}

.service-details-btn:hover {
    background: #0f766e;
    color: white;
}

@media(max-width: 576px) {
    .service-box {
        padding: 18px;
        border-radius: 18px;
    }

    .service-box h5 {
        font-size: 18px;
    }
}


        /* HOW IT WORKS */

        .step-card {
            background: white;
            border-radius: 18px;
            padding: 30px 20px;
            height: 100%;
            border: 1px solid #e8eef0;
        }

        .step-icon {
            width: 75px;
            height: 75px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #ccfbf1;
            color: var(--primary-dark);
            font-size: 36px;
            border-radius: 22px;
        }

        .step-card h5 {
            font-weight: 700;
        }

        /* CTA */

        .cta-section {
            background: linear-gradient(120deg, #0f766e, #0d9488);
            color: white;
            border-radius: 25px;
            padding: 50px 30px;
        }

        footer {
            background: #102a35;
            color: #cbd5e1;
            padding: 40px 0 25px;
            margin-top: 75px;
        }

        footer h4 {
            color: white;
            font-weight: 800;
        }

        .no-results {
            display: none;
        }

        @media(max-width: 767px) {
            .hero {
                padding: 55px 0;
            }

            .hero-image {
                min-height: auto;
                margin-top: 35px;
            }

            .hero-image img {
                height: 260px;
            }

            .hero-floating {
                left: 5px;
                bottom: 10px;
                font-size: 13px;
            }

            .section-space {
                padding: 55px 0;
            }

            .section-heading {
                font-size: 28px;
            }

            .category-card {
                min-height: 185px;
                padding: 18px 14px;
            }

            .category-icon {
                width: 58px;
                height: 58px;
                font-size: 30px;
            }
        }
    </style>
</head>

<body>

<!-- NAVBAR -->

<nav class="navbar navbar-expand-lg sticky-top shadow-sm">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            🔧 Karigora
        </a>

        <button class="navbar-toggler" type="button"
            data-bs-toggle="collapse" data-bs-target="#mainNav"
            aria-label="মেনু খুলুন">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNav">

            <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-3">

                <li class="nav-item">
                    <a class="nav-link" href="#categories">ক্যাটাগরি</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#services">সার্ভিসসমূহ</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#how-it-works">কীভাবে কাজ করে</a>
                </li>

                <li class="nav-item mt-2 mt-lg-0">
                    <a class="btn btn-karigora" href="#categories">
                        সার্ভিস খুঁজুন →
                    </a>
                </li>

            </ul>

        </div>
    </div>
</nav>


<!-- HERO SECTION -->

<section class="hero">

    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 hero-content">

                <span class="hero-tag">
                    ✨ আপনার বিশ্বস্ত সার্ভিস মার্কেটপ্লেস
                </span>

                <h1>
                    আপনার প্রয়োজনে,<br>
                    <span>দক্ষ কারিগরের</span><br>
                    সমাধান।
                </h1>

                <p class="hero-description mt-3">
                    বাসা কিংবা অফিসের যেকোনো কাজের জন্য
                    খুঁজে নিন দক্ষ ও অভিজ্ঞ কারিগর।
                    সহজেই সার্ভিস বেছে নিন এবং বুকিং করুন।
                </p>

                <form class="hero-search" id="serviceSearch">

                    <div class="input-group">

                        <input type="search"
                            id="searchInput"
                            class="form-control"
                            placeholder="কোন সার্ভিস খুঁজছেন? যেমন: এসি, ইলেকট্রিক্যাল..."
                            aria-label="সার্ভিস খুঁজুন">

                        <button class="btn btn-karigora" type="submit">
                            🔍 খুঁজুন
                        </button>

                    </div>

                </form>

                <div class="mt-4 text-secondary small">
                    🔧 দক্ষ কারিগর
                    &nbsp; • &nbsp;
                    ⚡ সহজ বুকিং
                    &nbsp; • &nbsp;
                    🏠 ঘরে বসেই সার্ভিস
                </div>

            </div>


            <div class="col-lg-6">

                <div class="hero-image">

                    <img
                        src="https://media.istockphoto.com/id/2229653648/vector/professional-electrician-tools-set.jpg?s=612x612&w=0&k=20&c=FR58XuKMDCIVeuWCAwIDQxApuGMViK0wEPtN55x96s0="
                        alt="দক্ষ ইলেকট্রিক্যাল কারিগর"
                        onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1581578731548-c64695cc6952?w=1000';">

                    <div class="hero-floating">
                        🧑‍🔧 আপনার কাজের জন্য দক্ষ কারিগর
                    </div>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- CATEGORY SECTION -->

<section class="section-space" id="categories">

    <div class="container">

        <div class="text-center mb-5">

            <span class="hero-tag">আমাদের ক্যাটাগরি</span>

            <h2 class="section-heading mt-3">
                আপনার প্রয়োজনীয় সার্ভিস বেছে নিন
            </h2>

            <p class="section-subtitle">
                এক জায়গায় আপনার প্রয়োজনীয় সকল সার্ভিস।
            </p>

        </div>


        <div class="row g-4" id="categoryList">

            @forelse ($categories as $index => $category)

                <div class="col-6 col-md-4 col-lg-3 category-item"
                    data-search="{{ $category->name }} {{ $category->slug }} {{ $category->description ?? '' }} @foreach ($category->services as $service) {{ $service->name }} {{ $service->description ?? '' }} {{ $service->slug }} @endforeach">

                    <a href="#category-{{ $category->id }}"
                        class="category-card cat-{{ $index % 6 }}">

                        <div class="category-icon">
                            {{ $category->icon ?: '🔧' }}
                        </div>

                        <h4>{{ $category->name }}</h4>

                        <p>
                            {{ $category->description ?: 'দক্ষ কারিগরের মাধ্যমে সেবা নিন' }}
                        </p>

                        <span class="category-arrow">↗</span>

                    </a>

                </div>

            @empty

                <div class="col-12 text-center">
                    <p>বর্তমানে কোনো ক্যাটাগরি পাওয়া যাচ্ছে না।</p>
                </div>

            @endforelse

        </div>

    </div>

</section>


<!-- SERVICES SECTION -->
<section class="section-space bg-white" id="services">
    <div class="container">

        <div class="text-center mb-5">
            <span class="hero-tag">সার্ভিস কালেকশন</span>
            <h2 class="section-heading mt-3">আমাদের সার্ভিসসমূহ</h2>
            <p class="section-subtitle">
                ক্যাটাগরি অনুযায়ী আপনার পছন্দের সার্ভিস বেছে নিন।
            </p>
        </div>

        <div class="row g-4" id="serviceList">

            @forelse ($categories as $category)
                @foreach ($category->services as $service)

                    <div
                        class="col-12 col-md-6 service-item"
                        id="{{ $loop->first ? 'category-'.$category->id : '' }}"
                        data-search="{{ $category->name }} {{ $category->slug }} {{ $service->name }} {{ $service->slug }} {{ $service->description ?? '' }}"
                    >
                        <div class="service-box">

                            <div class="service-top">
                                <div class="service-icon-box">
                                    {{ $category->icon ?: '🔧' }}
                                </div>

                                <span class="service-category-badge">
                                    {{ $category->name }}
                                </span>
                            </div>

                            <h5>{{ $service->name }}</h5>

                            <p class="service-description">
                                {{ $service->description ?: 'এই সার্ভিস সম্পর্কে বিস্তারিত জানতে দেখুন।' }}
                            </p>

                            <div class="service-price-area">
                                <span class="service-price-label">সার্ভিস মূল্য</span>

                                @if ($service->price_type === 'fixed' && $service->price !== null)
                                    <span class="price-badge">
                                        ৳{{ number_format((float) $service->price, 2) }}
                                    </span>
                                @else
                                    <span class="negotiable-badge">
                                        মূল্য জানতে যোগাযোগ করুন
                                    </span>
                                @endif
                            </div>

                            <a href="{{ route('services.show', $service->slug) }}"
                               class="service-details-btn">
                                বিস্তারিত দেখুন →
                            </a>

                        </div>
                    </div>

                @endforeach
            @empty
                <div class="col-12 text-center">
                    <p class="text-secondary">বর্তমানে কোনো সার্ভিস পাওয়া যাচ্ছে না।</p>
                </div>
            @endforelse

        </div>

        <div id="noResults" class="text-center py-5 no-results" style="display:none;">
            <div style="font-size:50px;">🔎</div>
            <h5 class="fw-bold mt-3">কোনো সার্ভিস পাওয়া যায়নি!</h5>
            <p class="text-secondary">অন্য শব্দ দিয়ে খুঁজুন।</p>
        </div>

    </div>
</section>

<!-- HOW IT WORKS -->

<section class="section-space" id="how-it-works">

    <div class="container">

        <div class="text-center mb-5">

            <span class="hero-tag">সহজ প্রক্রিয়া</span>

            <h2 class="section-heading mt-3">
                কীভাবে কাজ করে?
            </h2>

            <p class="section-subtitle">
                মাত্র তিনটি সহজ ধাপে সার্ভিস নিন।
            </p>

        </div>


        <div class="row g-4 text-center">

            <div class="col-md-4">

                <div class="step-card">

                    <div class="step-icon">🔎</div>

                    <h5>১. সার্ভিস বেছে নিন</h5>

                    <p class="text-secondary">
                        আপনার প্রয়োজনীয় ক্যাটাগরি ও সার্ভিস খুঁজুন।
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="step-card">

                    <div class="step-icon">📅</div>

                    <h5>২. বুকিং করুন</h5>

                    <p class="text-secondary">
                        সার্ভিস নির্বাচন করে আপনার কাজের বিবরণ জানান।
                    </p>

                </div>

            </div>


            <div class="col-md-4">

                <div class="step-card">

                    <div class="step-icon">🧑‍🔧</div>

                    <h5>৩. সেবা গ্রহণ করুন</h5>

                    <p class="text-secondary">
                        দক্ষ কারিগরের মাধ্যমে আপনার কাজ সম্পন্ন করুন।
                    </p>

                </div>

            </div>

        </div>

    </div>

</section>


<!-- CALL TO ACTION -->

<section class="container">

    <div class="cta-section text-center">

        <h2 class="fw-bold mb-3">
            আপনার কাজের জন্য কারিগর খুঁজছেন?
        </h2>

        <p class="mb-4">
            আপনার প্রয়োজনীয় সার্ভিস বেছে নিয়ে আজই বুকিং করুন।
        </p>

        <a href="#categories"
            class="btn btn-light btn-lg rounded-3 px-4 fw-bold"
            style="color:#0f766e;">
            সার্ভিস খুঁজুন →
        </a>

    </div>

</section>


<!-- FOOTER -->

<footer>

    <div class="container text-center">

        <h4>🔧 Karigora</h4>

        <p class="mb-2">
            আপনার প্রয়োজনে, দক্ষ কারিগরের সমাধান।
        </p>

        <div class="border-top border-secondary mt-4 pt-3">

            <small>
                © {{ date('Y') }} Karigora. সর্বস্বত্ব সংরক্ষিত।
            </small>

        </div>

    </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<!-- SEARCH SCRIPT -->

<script>

document.addEventListener('DOMContentLoaded', function () {

    const searchForm = document.getElementById('serviceSearch');
    const searchInput = document.getElementById('searchInput');

    const categoryItems = document.querySelectorAll('.category-item');
    const serviceItems = document.querySelectorAll('.service-item');

    const categorySections = document.querySelectorAll('.service-category-section');
    const noResults = document.getElementById('noResults');

    function normalizeText(text) {
        return text.toLocaleLowerCase().normalize('NFKC').trim();
    }

    function filterServices() {

        const keyword = normalizeText(searchInput.value);

        let visibleCount = 0;

        // Filter category cards
        categoryItems.forEach(function (item) {

            const text = normalizeText(
                item.innerText + ' ' + (item.dataset.search || '')
            );

            const matched = text.includes(keyword);

            item.classList.toggle('d-none', !matched);

        });


        // Filter service cards
        serviceItems.forEach(function (item) {

            const text = normalizeText(
                item.innerText + ' ' + (item.dataset.search || '')
            );

            const matched = text.includes(keyword);

            item.classList.toggle('d-none', !matched);

            if (matched) {
                visibleCount++;
            }

        });


        // Hide empty category sections
        categorySections.forEach(function (section) {

            const visibleServices = section.querySelectorAll(
                '.service-item:not(.d-none)'
            );

            section.classList.toggle(
                'd-none',
                keyword !== '' && visibleServices.length === 0
            );

        });


        noResults.style.display =
            keyword !== '' && visibleCount === 0 ? 'block' : 'none';

    }


    searchForm.addEventListener('submit', function (event) {

        event.preventDefault();

        filterServices();

        document.getElementById('services').scrollIntoView({
            behavior: 'smooth'
        });

    });


    searchInput.addEventListener('input', filterServices);


    // Category card click: search reset
    document.querySelectorAll('.category-card').forEach(function (card) {

        card.addEventListener('click', function () {

            searchInput.value = '';

            categoryItems.forEach(function (item) {
                item.classList.remove('d-none');
            });

            serviceItems.forEach(function (item) {
                item.classList.remove('d-none');
            });

            categorySections.forEach(function (section) {
                section.classList.remove('d-none');
            });

            noResults.style.display = 'none';

        });

    });

});

</script>

</body>
</html>
