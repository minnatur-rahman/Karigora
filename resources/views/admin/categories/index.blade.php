<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Categories | Karigora Admin</title>

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

        .main-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.05);
        }

        .category-icon {
            font-size: 25px;
        }

        .status-active {
            background: #d1e7dd;
            color: #0f5132;
            padding: 5px 12px;
            border-radius: 20px;
        }

        .status-inactive {
            background: #f8d7da;
            color: #842029;
            padding: 5px 12px;
            border-radius: 20px;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header class="admin-header">
        <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <h2 class="mb-1">Karigora Admin Panel</h2>
                <p class="mb-0">ক্যাটাগরি পরিচালনা করুন</p>
            </div>

            <a href="{{ route('home') }}" class="btn btn-light">
                হোমপেজ দেখুন
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container py-5">

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>সমস্যা হয়েছে:</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="main-card">

            <!-- Title and Add Button -->
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">

                <div>
                    <h3 class="fw-bold mb-1">সকল ক্যাটাগরি</h3>

                    <p class="text-secondary mb-0">
                        মোট ক্যাটাগরি: {{ $categories->count() }} টি
                    </p>
                </div>

                <a href="{{ route('admin.categories.create') }}"
                   class="btn btn-success">
                    + নতুন ক্যাটাগরি যোগ করুন
                </a>

            </div>

            <!-- Search -->
            <div class="mb-4">
                <input
                    type="text"
                    id="categorySearch"
                    class="form-control"
                    placeholder="ক্যাটাগরির নাম দিয়ে খুঁজুন..."
                >
            </div>

            <!-- Category Table -->
            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>আইকন</th>
                            <th>ক্যাটাগরির নাম</th>
                            <th>Slug</th>
                            <th>অবস্থা</th>
                            <th>তৈরির তারিখ</th>
                            <th>অ্যাকশন</th>
                        </tr>
                    </thead>

                    <tbody id="categoryTable">

                        @forelse ($categories as $category)

                            <tr class="category-row">

                                <td>{{ $loop->iteration }}</td>

                                <td class="category-icon">
                                    {{ $category->icon ?? '🔧' }}
                                </td>

                                <td>
                                    <strong>{{ $category->name }}</strong>

                                    @if ($category->description)
                                        <div class="small text-secondary">
                                            {{ $category->description }}
                                        </div>
                                    @endif
                                </td>

                                <td>
                                    <code>{{ $category->slug }}</code>
                                </td>

                                <td>
                                    @if ($category->is_active)
                                        <span class="status-active">
                                            সক্রিয়
                                        </span>
                                    @else
                                        <span class="status-inactive">
                                            নিষ্ক্রিয়
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    {{ $category->created_at->format('d-m-Y') }}
                                </td>

                                <td>
                                    <div class="d-flex gap-2">

                                        <a
                                            href="{{ route('admin.categories.edit', $category) }}"
                                            class="btn btn-sm btn-outline-primary">
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('admin.categories.destroy', $category) }}"
                                            method="POST"
                                            onsubmit="return confirm('আপনি কি এই ক্যাটাগরি মুছে ফেলতে চান?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger">
                                                Delete
                                            </button>

                                        </form>

                                    </div>
                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <h5>এখনো কোনো ক্যাটাগরি নেই!</h5>

                                    <p class="text-secondary">
                                        নতুন ক্যাটাগরি যোগ করে শুরু করুন।
                                    </p>

                                    <a href="{{ route('admin.categories.create') }}"
                                       class="btn btn-success">
                                        ক্যাটাগরি যোগ করুন
                                    </a>
                                </td>
                            </tr>

                        @endforelse

                        <tr id="noSearchResult" class="d-none">
                            <td colspan="7" class="text-center py-4">
                                কোনো ক্যাটাগরি পাওয়া যায়নি।
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JavaScript Search -->
    <script>
        const searchInput = document.getElementById('categorySearch');
        const categoryRows = document.querySelectorAll('.category-row');
        const noSearchResult = document.getElementById('noSearchResult');

        searchInput.addEventListener('input', function () {
            const searchText = this.value.toLowerCase().trim();
            let visibleCount = 0;

            categoryRows.forEach(function (row) {
                const categoryText = row.innerText.toLowerCase();
                const matched = categoryText.includes(searchText);

                row.style.display = matched ? '' : 'none';

                if (matched) {
                    visibleCount++;
                }
            });

            noSearchResult.classList.toggle(
                'd-none',
                visibleCount > 0 || categoryRows.length === 0
            );
        });
    </script>

</body>
</html>