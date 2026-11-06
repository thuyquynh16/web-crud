
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chi tiết sản phẩm</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>

<body class="bg-light">

<div class="container py-5">

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white py-3">
            <h4 class="mb-0">Chi tiết sản phẩm</h4>
        </div>

        <div class="card-body p-4">

            <div class="row g-4">

                {{-- Ảnh sản phẩm --}}
                <div class="col-md-4 text-center">
                    @if ($product->image)
                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            class="img-fluid rounded border"
                            style="max-height: 300px; object-fit: contain;"
                            alt="Ảnh sản phẩm">
                    @else
                        <div class="border rounded bg-light p-5 text-muted">
                            Chưa có ảnh sản phẩm
                        </div>
                    @endif
                </div>

                {{-- Thông tin sản phẩm --}}
                <div class="col-md-8">

                    <h3 class="text-primary mb-4">
                        {{ $product->name }}
                    </h3>

                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 35%">Mã sản phẩm</th>
                            <td>{{ $product->id }}</td>
                        </tr>

                        <tr>
                            <th>Giá</th>
                            <td class="text-danger fw-bold">
                                {{ number_format($product->price, 0, ',', '.') }} đ
                            </td>
                        </tr>

                        <tr>
                            <th>Số lượng</th>
                            <td>
                                <span class="badge bg-secondary">
                                    {{ $product->quantity }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <th>Mô tả</th>
                            <td>
                                {{ $product->description ?: 'Chưa có mô tả' }}
                            </td>
                        </tr>
                    </table>

                    {{-- Nút chức năng --}}
                    <div class="mt-4 d-flex gap-2">
                        <a href="{{ route('products.index') }}"
                           class="btn btn-secondary">
                            Quay lại danh sách
                        </a>

                        <a href="{{ route('products.edit', $product->id) }}"
                           class="btn btn-primary">
                            Sửa sản phẩm
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>
