<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ক্যাটাগরি সম্পাদনা | Karigora Admin</title>

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

        .icon-option:hover,
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
                <p class="mb-0">ক্যাটাগরির তথ্য পরিবর্তন করুন</p>
            </div>

            <a href="{{ route('admin.categories.index') }}"
               class="btn btn-light">
                ← সব ক্যাটাগরি
            </a>

        </div>
    </header>

    <!-- Main Content -->
    <main class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-8">

                <div class="form-card">

                    <h3 class="fw-bold mb-2">ক্যাটাগরি সম্পাদনা</h3>

                    <p class="text-secondary mb-4">
                        আপনি বর্তমানে "{{ $category->name }}" ক্যাটাগরিটি সম্পাদনা করছেন।
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

                    <!-- Edit Form -->
                    <form action="{{ route('admin.categories.update', $category) }}"
                          method="POST">

                        @csrf
                        @method('PUT')

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
                                value="{{ old('name', $category->name) }}"
                                maxlength="255"
                                required>

                        </div>

                        <!-- Slug -->
                        <div class="mb-4">

                            <label for="slug" class="form-label">
                                Slug <span class="required">*</span>
                            </label>

                            <input
                                type="text"
                                name="slug"
                                id="slug"
                                class="form-control"
                                value="{{ old('slug', $category->slug) }}"
                                maxlength="255"
                                required>

                            <div class="form-text">
                                উদাহরণ: fridge-technician
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
                                placeholder="সার্ভিসের বিবরণ লিখুন...">{{ old('description', $category->description) }}</textarea>

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
                                value="{{ old('icon', $category->icon) }}"
                                maxlength="50"
                                placeholder="যেমন: 🔧">

                            <div class="mt-3">

                                <p class="small text-secondary mb-2">
                                    অথবা নিচের Icon-এ ক্লিক করুন:
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
                                    {{ (string) old('is_active', (int) $category->is_active) === '1' ? 'selected' : '' }}>
                                    Active — হোমপেজে দেখাবে
                                </option>

                                <option value="0"
                                    {{ (string) old('is_active', (int) $category->is_active) === '0' ? 'selected' : '' }}>
                                    Inactive — হোমপেজে দেখাবে না
                                </option>

                            </select>

                        </div>

                        <!-- Buttons -->
                        <div class="d-flex gap-2 flex-wrap">

                            <button type="submit" class="btn btn-success px-4">
                                পরিবর্তন সেভ করুন
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