
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quản lý sản phẩm</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <!-- CSS riêng -->
    <link rel="stylesheet" href="{{ asset('css/styleProduct.css') }}">
</head>

<body>

    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('products.index') }}">
                PRODUCT MANAGEMENT
            </a>
        </div>
    </nav>

    <div class="container py-5">

        <!-- Tiêu đề và nút chức năng -->
        <div class="d-flex flex-wrap justify-content-between
                    align-items-center gap-3 mb-4">

            <div>
                <h2 class="page-title mb-1">Quản lý sản phẩm</h2>

                <p class="text-secondary mb-0">
                    Danh sách và thông tin sản phẩm
                </p>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary">
                    ← Trang chủ
                </a>

                <a href="{{ route('products.create') }}" class="btn btn-primary">
                    + Thêm sản phẩm
                </a>
            </div>

        </div>

        <!-- Thông báo thành công -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show"
                 role="alert">

                {{ session('success') }}

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="alert">
                </button>
            </div>
        @endif

        <!-- Thông báo lỗi Validation -->
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <strong>Dữ liệu chưa hợp lệ!</strong>

                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Bảng sản phẩm -->
        <div class="card main-card">
            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover mb-0">

                        <thead>
                            <tr>
                                <th class="px-4">Mã</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Số lượng</th>
                                <th>Ảnh</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse ($products as $product)

                                <tr>
                                    <td class="px-4">
                                        {{ $product->id }}
                                    </td>

                                    <td>
                                        <span class="fw-semibold">
                                            {{ $product->name }}
                                        </span>
                                    </td>

                                    <td class="price">
                                        {{ number_format($product->price, 0, ',', '.') }} đ
                                    </td>

                                    <td>
                                        <span class="badge bg-secondary">
                                            {{ $product->quantity }}
                                        </span>
                                    </td>

                                    <td>
                                        @if ($product->image)
                                            <img
                                                src="{{ asset('storage/' . $product->image) }}"
                                                class="product-image"
                                                alt="Ảnh sản phẩm"
                                            >
                                        @else
                                            <span class="text-muted">
                                                Chưa có ảnh
                                            </span>
                                        @endif
                                    </td>

                                    <td class="text-center action-buttons">

                                        <a href="{{ route('products.show', $product->id) }}"
                                           class="btn btn-sm btn-secondary">
                                            Chi tiết
                                        </a>

                                        <a href="{{ route('products.edit', $product->id) }}"
                                           class="btn btn-sm btn-primary">
                                            Sửa
                                        </a>

                                        <form
                                            action="{{ route('products.destroy', $product->id) }}"
                                            method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Cậu có chắc muốn xóa sản phẩm này?')">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger">
                                                Xóa
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                            @empty

                                <tr>
                                    <td colspan="6" class="text-center py-5">

                                        <h5 class="text-secondary">
                                            Chưa có sản phẩm nào
                                        </h5>

                                        <p class="text-muted">
                                            Hãy thêm sản phẩm đầu tiên của cậu.
                                        </p>

                                        <a href="{{ route('products.create') }}"
                                           class="btn btn-primary">
                                            + Thêm sản phẩm
                                        </a>

                                    </td>
                                </tr>

                            @endforelse
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

        <!-- Tổng số sản phẩm -->
        <div class="text-secondary mt-3">
            Tổng số sản phẩm:
            <strong>{{ $products->count() }}</strong>
        </div>

    </div>

    <!-- Bootstrap JavaScript -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>

</body>
</html>
