<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>নতুন ক্যাটাগরি | Karigora Admin</title>

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
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
        }

        .form-label {
            font-weight: 600;
        }

        .required {
            color: red;
        }

        .icon-option {
            cursor: pointer;
            font-size: 25px;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 8px 12px;
            margin: 4px;
            background: white;
        }

        .icon-option:hover {
            background: #d1e7dd;
        }

        .icon-option.selected {
            background: #d1e7dd;
            border-color: #198754;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="admin-header">
        <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">

            <div>
                <h2 class="mb-1">Karigora Admin Panel</h2>
                <p class="mb-0">নতুন সার্ভিস ক্যাটাগরি তৈরি করুন</p>
            </div>

            <a href="{{ route('admin.categories.index') }}"
               class="btn btn-light">
                ← সব ক্যাটাগরি
            </a>

        </div>
    </header>

    <!-- Main Form -->
    <main class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="form-card">

                    <h3 class="fw-bold mb-2">নতুন ক্যাটাগরি যোগ করুন</h3>

                    <p class="text-secondary mb-4">
                        নিচের তথ্যগুলো পূরণ করে নতুন ক্যাটাগরি তৈরি করুন।
                    </p>

                    <!-- Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>দয়া করে ভুলগুলো ঠিক করুন:</strong>

                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Category Form -->
                    <form action="{{ route('admin.categories.store') }}"
                          method="POST">

                        @csrf

                        <!-- Category Name -->
                        <div class="mb-4">

                            <label for="name" class="form-label">
                                ক্যাটাগরির নাম <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                value="{{ old('name') }}"
                                placeholder="যেমন: ফ্রিজ টেকনিশিয়ান"
                                maxlength="255"
                                required>

                            <div class="form-text">
                                সার্ভিসের নাম বাংলায় বা ইংরেজিতে লিখতে পারো।
                            </div>

                        </div>

                        <!-- Slug -->
                        <div class="mb-4">

                            <label for="slug" class="form-label">
                                Slug
                            </label>

                            <input
                                type="text"
                                name="slug"
                                id="slug"
                                class="form-control"
                                value="{{ old('slug') }}"
                                placeholder="যেমন: fridge-technician">

                            <div class="form-text">
                                খালি রাখলে নাম থেকে স্বয়ংক্রিয়ভাবে Slug তৈরি হবে।
                                ইংরেজি অক্ষর ব্যবহার করা ভালো।
                            </div>

                        </div>

                        <!-- Description -->
                        <div class="mb-4">

                            <label for="description" class="form-label">
                                ক্যাটাগরির বিবরণ
                            </label>

                            <textarea
                                name="description"
                                id="description"
                                class="form-control"
                                rows="4"
                                placeholder="এই সার্ভিসে কী ধরনের কাজ করা হয় লিখুন...">{{ old('description') }}</textarea>

                        </div>

                        <!-- Icon -->
                        <div class="mb-4">

                            <label for="icon" class="form-label">
                                ক্যাটাগরি Icon
                            </label>

                            <input
                                type="text"
                                name="icon"
                                id="icon"
                                class="form-control"
                                value="{{ old('icon', '🔧') }}"
                                placeholder="একটি Emoji দিন">

                            <div class="mt-3">
                                <p class="small text-secondary mb-2">
                                    অথবা নিচের Icon-এ ক্লিক করো:
                                </p>

                                <button type="button" class="icon-option" data-icon="⚙️">⚙️</button>
                                <button type="button" class="icon-option" data-icon="❄️">❄️</button>
                                <button type="button" class="icon-option" data-icon="🔧">🔧</button>
                                <button type="button" class="icon-option" data-icon="⚡">⚡</button>
                                <button type="button" class="icon-option" data-icon="🚰">🚰</button>
                                <button type="button" class="icon-option" data-icon="🧹">🧹</button>
                                <button type="button" class="icon-option" data-icon="🎨">🎨</button>
                                <button type="button" class="icon-option" data-icon="🛠️">🛠️</button>
                            </div>

                        </div>

                        <!-- Active Status -->
                        <div class="mb-4">

                            <label for="is_active" class="form-label">
                                ক্যাটাগরির অবস্থা
                            </label>

                            <select
                                name="is_active"
                                id="is_active"
                                class="form-select"
                                required>

                                <option value="1"
                                    {{ old('is_active', '1') == '1' ? 'selected' : '' }}>
                                    Active — হোমপেজে দেখাবে
                                </option>

                                <option value="0"
                                    {{ old('is_active') === '0' ? 'selected' : '' }}>
                                    Inactive — হোমপেজে দেখাবে না
                                </option>

                            </select>

                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2 flex-wrap">

                            <button type="submit" class="btn btn-success px-4">
                                + ক্যাটাগরি সেভ করুন
                            </button>

                            <a href="{{ route('admin.categories.index') }}"
                               class="btn btn-outline-secondary px-4">
                                বাতিল
                            </a>

                        </div>

                    </form>

                </div>

            </div>
        </div>

    </main>

    <!-- JavaScript -->
    <script>
        // ক্যাটাগরির নাম থেকে Slug তৈরি
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

        // Icon বাটনে ক্লিক করলে Icon ইনপুটে বসবে
        const iconInput = document.getElementById('icon');
        const iconButtons = document.querySelectorAll('.icon-option');

        iconButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                iconInput.value = this.dataset.icon;

                iconButtons.forEach(function (item) {
                    item.classList.remove('selected');
                });

                this.classList.add('selected');
            });
        });
    </script>

</body>
</html>