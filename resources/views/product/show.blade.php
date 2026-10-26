```blade
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chi tiết sản phẩm</title>
</head>
<body>
    <h1>Chi tiết sản phẩm</h1>

    <p>
        <strong>Mã sản phẩm:</strong>
        {{ $product->id }}
    </p>

    <p>
        <strong>Tên sản phẩm:</strong>
        {{ $product->name }}
    </p>

    <p>
        <strong>Giá:</strong>
        {{ number_format($product->price) }} đ
    </p>

    <p>
        <strong>Số lượng:</strong>
        {{ $product->quantity }}
    </p>

    <p>
        <strong>Mô tả:</strong>
        {{ $product->description ?: 'Chưa có mô tả' }}
    </p>

    <p>
        <strong>Ảnh sản phẩm:</strong><br>

        @if ($product->image)
            <img
                src="{{ asset('storage/' . $product->image) }}"
                width="250"
                alt="Ảnh sản phẩm">
        @else
            Chưa có ảnh sản phẩm.
        @endif
    </p>

    <p>
        <a href="{{ route('products.index') }}">Quay lại danh sách</a>
        |
        <a href="{{ route('products.edit', $product->id) }}">Sửa sản phẩm</a>
    </p>
</body>
</html>
