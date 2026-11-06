
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sửa sản phẩm</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #212529;
        }

        .form-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0, 0, 0, 0.05);
        }

        .form-label {
            font-weight: 600;
        }

        .required {
            color: #dc3545;
        }

        .current-image {
            width: 180px;
            height: 180px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #dee2e6;
            background-color: #fff;
        }
    </style>
</head>

<body>

    <!-- Thanh điều hướng -->
    <nav class="navbar navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold"
               href="{{ route('products.index') }}">
                PRODUCT MANAGEMENT
            </a>
        </div>
    </nav>

    <div class="container py-5">

        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">

                <!-- Tiêu đề -->
                <div class="mb-4">
                    <h2 class="fw-bold">Sửa sản phẩm</h2>

                    <p class="text-secondary">
                        Cập nhật thông tin sản phẩm
                        <strong>#{{ $product->id }}</strong>
                    </p>
                </div>

                <!-- Form -->
                <div class="card form-card">
                    <div class="card-body p-4">

                        <!-- Thông báo lỗi tổng quát -->
                        @if ($errors->any())
                            <div class="alert alert-danger"
                                 role="alert">

                                <strong>
                                    Vui lòng kiểm tra lại dữ liệu!
                                </strong>

                                <ul class="mb-0 mt-2">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form
                            action="{{ route('products.update', $product->id) }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <!-- Tên sản phẩm -->
                            <div class="mb-3">
                                <label for="name"
                                       class="form-label">

                                    Tên sản phẩm
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $product->name) }}"
                                    maxlength="255"
                                    required
                                >

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Giá -->
                            <div class="mb-3">
                                <label for="price"
                                       class="form-label">

                                    Giá sản phẩm (VNĐ)
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="price"
                                    id="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price', $product->price) }}"
                                    min="0"
                                    step="0.01"
                                    required
                                >

                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-text">
                                    Giá phải lớn hơn hoặc bằng 0.
                                </div>
                            </div>

                            <!-- Số lượng -->
                            <div class="mb-3">
                                <label for="quantity"
                                       class="form-label">

                                    Số lượng
                                    <span class="required">*</span>
                                </label>

                                <input
                                    type="number"
                                    name="quantity"
                                    id="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    value="{{ old('quantity', $product->quantity) }}"
                                    min="0"
                                    step="1"
                                    required
                                >

                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Mô tả -->
                            <div class="mb-3">
                                <label for="description"
                                       class="form-label">

                                    Mô tả sản phẩm
                                </label>

                                <textarea
                                    name="description"
                                    id="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    rows="4"
                                >{{ old('description', $product->description) }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Ảnh hiện tại -->
                            <div class="mb-3">
                                <label class="form-label">
                                    Ảnh hiện tại
                                </label>

                                <div>
                                    @if ($product->image)
                                        <img
                                            src="{{ asset('storage/' . $product->image) }}"
                                            class="current-image"
                                            alt="Ảnh sản phẩm hiện tại"
                                        >
                                    @else
                                        <div class="text-secondary">
                                            Sản phẩm chưa có ảnh.
                                        </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Chọn ảnh mới -->
                            <div class="mb-4">
                                <label for="image"
                                       class="form-label">

                                    Chọn ảnh mới
                                </label>

                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    accept=".jpg,.jpeg,.png,.webp"
                                >

                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                <div class="form-text">
                                    Không chọn ảnh nếu muốn giữ ảnh hiện tại.
                                    JPG, JPEG, PNG, WEBP; tối đa 2 MB.
                                </div>
                            </div>

                            <!-- Nút thao tác -->
                            <div class="d-flex gap-2">

                                <button type="submit"
                                        class="btn btn-primary">

                                    Cập nhật sản phẩm
                                </button>

                                <a href="{{ route('products.index') }}"
                                   class="btn btn-outline-secondary">

                                    Quay lại
                                </a>

                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

    </div>

</body>
</html>
