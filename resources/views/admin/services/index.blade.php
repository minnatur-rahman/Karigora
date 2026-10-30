<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Service Management | Karigora</title>

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
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,.05);
        }

        .status-active {
            background: #d1e7dd;
            color: #0f5132;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .status-inactive {
            background: #f8d7da;
            color: #842029;
            padding: 5px 10px;
            border-radius: 20px;
        }

        .price-badge {
            background: #cff4fc;
            color: #055160;
            padding: 5px 10px;
            border-radius: 20px;
        }
    </style>
</head>

<body>

<header class="admin-header">
    <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <h2 class="mb-1">Karigora Admin Panel</h2>
            <p class="mb-0">Service Management</p>
        </div>

        <a href="{{ route('admin.categories.index') }}"
           class="btn btn-light">
            Categories
        </a>
    </div>
</header>

<main class="container py-5">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close"
                    data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="main-card">

        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-4">
            <div>
                <h3 class="fw-bold mb-1">সকল সার্ভিস</h3>
                <p class="text-secondary mb-0">
                    মোট সার্ভিস: {{ $services->count() }} টি
                </p>
            </div>

            <a href="{{ route('admin.services.create') }}"
               class="btn btn-success">
                + নতুন সার্ভিস যোগ করুন
            </a>
        </div>

        <input
            type="text"
            id="serviceSearch"
            class="form-control mb-4"
            placeholder="সার্ভিস বা ক্যাটাগরির নাম দিয়ে খুঁজুন...">

        <div class="table-responsive">
            <table class="table table-hover align-middle">

                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>সার্ভিস</th>
                        <th>ক্যাটাগরি</th>
                        <th>মূল্য</th>
                        <th>অবস্থা</th>
                        <th>অ্যাকশন</th>
                    </tr>
                </thead>

                <tbody id="serviceTable">

                    @forelse ($services as $service)
                        <tr class="service-row">

                            <td>{{ $loop->iteration }}</td>

                            <td>
                                <strong>{{ $service->name }}</strong>

                                @if ($service->description)
                                    <div class="small text-secondary">
                                        {{ $service->description }}
                                    </div>
                                @endif

                                <div class="small text-secondary">
                                    {{ $service->slug }}
                                </div>
                            </td>

                            <td>
                                {{ $service->category?->name ?? 'ক্যাটাগরি নেই' }}
                            </td>

                            <td>
                                @if ($service->price_type === 'fixed')
                                    <span class="price-badge">
                                        ৳{{ number_format((float) $service->price, 2) }}
                                    </span>
                                @else
                                    <span class="badge text-bg-warning">
                                        মূল্য আলোচনা সাপেক্ষে
                                    </span>
                                @endif
                            </td>

                            <td>
                                @if ($service->is_active)
                                    <span class="status-active">Active</span>
                                @else
                                    <span class="status-inactive">Inactive</span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex gap-2">

                                    <a
                                        href="{{ route('admin.services.edit', $service) }}"
                                        class="btn btn-sm btn-outline-primary">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.services.destroy', $service) }}"
                                        method="POST"
                                        onsubmit="return confirm('এই সার্ভিসটি ডিলিট করতে চাও?')">

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
                            <td colspan="6" class="text-center py-5">
                                <h5>এখনো কোনো সার্ভিস যোগ করা হয়নি।</h5>
                                <p class="text-secondary">
                                    নতুন সার্ভিস যোগ করে শুরু করো।
                                </p>
                            </td>
                        </tr>
                    @endforelse

                    <tr id="noResults" class="d-none">
                        <td colspan="6" class="text-center py-4">
                            কোনো সার্ভিস পাওয়া যায়নি।
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const searchInput = document.getElementById('serviceSearch');
    const rows = document.querySelectorAll('.service-row');
    const noResults = document.getElementById('noResults');

    searchInput.addEventListener('input', function () {
        const keyword = this.value.toLowerCase().trim();
        let visibleCount = 0;

        rows.forEach(function (row) {
            const matched = row.innerText.toLowerCase().includes(keyword);

            row.style.display = matched ? '' : 'none';

            if (matched) {
                visibleCount++;
            }
        });

        noResults.classList.toggle(
            'd-none',
            visibleCount > 0 || rows.length === 0
        );
    });
</script>

</body>
</html>