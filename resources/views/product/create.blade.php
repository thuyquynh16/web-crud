
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Thêm sản phẩm</title>

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
                    <h2 class="fw-bold">Thêm sản phẩm mới</h2>

                    <p class="text-secondary">
                        Nhập thông tin sản phẩm bên dưới.
                    </p>
                </div>

                <!-- Form -->
                <div class="card form-card">
                    <div class="card-body p-4">

                        <!-- Hiển thị lỗi Validation -->
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
                            action="{{ route('products.store') }}"
                            method="POST"
                            enctype="multipart/form-data">

                            @csrf

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
                                    value="{{ old('name') }}"
                                    placeholder="Nhập tên sản phẩm"
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
                                    value="{{ old('price') }}"
                                    placeholder="Ví dụ: 20000"
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
                                    value="{{ old('quantity', 0) }}"
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
                                    placeholder="Nhập mô tả sản phẩm..."
                                >{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Ảnh -->
                            <div class="mb-4">
                                <label for="image"
                                       class="form-label">

                                    Ảnh sản phẩm
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
                                    Chỉ chấp nhận JPG, JPEG, PNG, WEBP.
                                    Dung lượng tối đa 2 MB.
                                </div>
                            </div>

                            <!-- Nút thao tác -->
                            <div class="d-flex gap-2">

                                <button type="submit"
                                        class="btn btn-primary">

                                    Lưu sản phẩm
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
