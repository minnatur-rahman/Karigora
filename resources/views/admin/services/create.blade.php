<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>নতুন সার্ভিস | Karigora</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <style>
        body {
            background: #f4f7f6;
            font-family: Arial, sans-serif;
        }

        .admin-header {
            background: #198754;
            color: white;
            padding: 22px 0;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,.05);
        }

        .form-label {
            font-weight: 600;
        }
    </style>
</head>

<body>

<header class="admin-header">
    <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h2 class="mb-1">Karigora Admin Panel</h2>
            <p class="mb-0">নতুন সার্ভিস তৈরি করুন</p>
        </div>

        <a href="{{ route('admin.services.index') }}"
           class="btn btn-light">
            ← সব সার্ভিস
        </a>
    </div>
</header>

<main class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="form-card">

                <h3 class="fw-bold mb-2">নতুন সার্ভিস যোগ করুন</h3>

                <p class="text-secondary mb-4">
                    সার্ভিসের তথ্য পূরণ করে সেভ করুন।
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

                @if ($categories->isEmpty())
                    <div class="alert alert-warning">
                        কোনো Active Category নেই। প্রথমে একটি Category Active করুন।
                    </div>
                @endif

                <form action="{{ route('admin.services.store') }}"
                      method="POST">

                    @csrf

                    <!-- Category -->
                    <div class="mb-4">
                        <label for="category_id" class="form-label">
                            ক্যাটাগরি <span class="text-danger">*</span>
                        </label>

                        <select name="category_id"
                                id="category_id"
                                class="form-select"
                                required>

                            <option value="">ক্যাটাগরি নির্বাচন করুন</option>

                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <!-- Service Name -->
                    <div class="mb-4">
                        <label for="name" class="form-label">
                            সার্ভিসের নাম <span class="text-danger">*</span>
                        </label>

                        <input
                            type="text"
                            name="name"
                            id="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            placeholder="যেমন: AC Servicing"
                            maxlength="255"
                            required>
                    </div>

                    <!-- Slug -->
                    <div class="mb-4">
                        <label for="slug" class="form-label">Slug</label>

                        <input
                            type="text"
                            name="slug"
                            id="slug"
                            class="form-control"
                            value="{{ old('slug') }}"
                            placeholder="যেমন: ac-servicing">

                        <div class="form-text">
                            খালি রাখলে সার্ভিসের নাম থেকে Slug তৈরি হবে।
                            ইংরেজি অক্ষর ব্যবহার করো।
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="mb-4">
                        <label for="description" class="form-label">
                            সার্ভিসের বিবরণ
                        </label>

                        <textarea
                            name="description"
                            id="description"
                            class="form-control"
                            rows="4"
                            placeholder="সার্ভিসে কী কী কাজ করা হবে লিখো...">{{ old('description') }}</textarea>
                    </div>

                    <!-- Price Type -->
                    <div class="mb-4">
                        <label for="price_type" class="form-label">
                            মূল্য নির্ধারণ পদ্ধতি <span class="text-danger">*</span>
                        </label>

                        <select name="price_type"
                                id="price_type"
                                class="form-select"
                                required>

                            <option value="fixed"
                                {{ old('price_type', 'fixed') === 'fixed' ? 'selected' : '' }}>
                                Fixed Price — নির্দিষ্ট মূল্য
                            </option>

                            <option value="quote"
                                {{ old('price_type') === 'quote' ? 'selected' : '' }}>
                                Request a Quote — কাজ দেখে মূল্য নির্ধারণ
                            </option>

                        </select>
                    </div>

                    <!-- Price -->
                    <div class="mb-4" id="priceWrapper">
                        <label for="price" class="form-label">
                            মূল্য (টাকা)
                        </label>

                        <input
                            type="number"
                            name="price"
                            id="price"
                            class="form-control"
                            value="{{ old('price') }}"
                            min="0"
                            step="0.01"
                            placeholder="যেমন: 800">

                        <div class="form-text">
                            Fixed Price বেছে নিলে মূল্য দিতে হবে।
                        </div>
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label for="is_active" class="form-label">
                            সার্ভিসের অবস্থা
                        </label>

                        <select name="is_active"
                                id="is_active"
                                class="form-select"
                                required>

                            <option value="1"
                                {{ old('is_active', '1') === '1' ? 'selected' : '' }}>
                                Active — গ্রাহক দেখতে পাবেন
                            </option>

                            <option value="0"
                                {{ old('is_active') === '0' ? 'selected' : '' }}>
                                Inactive — গ্রাহক দেখতে পাবেন না
                            </option>

                        </select>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-2 flex-wrap">
                        <button type="submit"
                                class="btn btn-success px-4"
                                {{ $categories->isEmpty() ? 'disabled' : '' }}>
                            + সার্ভিস সেভ করুন
                        </button>

                        <a href="{{ route('admin.services.index') }}"
                           class="btn btn-outline-secondary px-4">
                            বাতিল
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

</main>

<script>
    // নাম থেকে Slug তৈরি
    const nameInput = document.getElementById('name');
    const slugInput = document.getElementById('slug');

    let slugManuallyEdited = slugInput.value.trim() !== '';

    slugInput.addEventListener('input', function () {
        slugManuallyEdited = this.value.trim() !== '';
    });

    nameInput.addEventListener('input', function () {
        if (!slugManuallyEdited) {
            slugInput.value = this.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9\s-]/g, '')
                .replace(/\s+/g, '-')
                .replace(/-+/g, '-');
        }
    });

    // Fixed Price / Quote নির্বাচন অনুযায়ী মূল্য ইনপুট
    const priceType = document.getElementById('price_type');
    const priceWrapper = document.getElementById('priceWrapper');
    const priceInput = document.getElementById('price');

    function updatePriceField() {
        const isFixed = priceType.value === 'fixed';

        priceWrapper.style.display = isFixed ? 'block' : 'none';
        priceInput.required = isFixed;

        if (!isFixed) {
            priceInput.value = '';
        }
    }

    priceType.addEventListener('change', updatePriceField);
    updatePriceField();
</script>

</body>
</html>