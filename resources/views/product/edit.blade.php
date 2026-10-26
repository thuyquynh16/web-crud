```blade
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa sản phẩm</title>
</head>
<body>
    <h1>Sửa sản phẩm</h1>

    @if ($errors->any())
        <ul style="color: red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('products.update', $product->id) }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <p>
            <label>Tên sản phẩm:</label><br>
            <input type="text" name="name"
                   value="{{ old('name', $product->name) }}" required>
        </p>

        <p>
            <label>Giá:</label><br>
            <input type="number" name="price" min="0" step="0.01"
                   value="{{ old('price', $product->price) }}" required>
        </p>

        <p>
            <label>Số lượng:</label><br>
            <input type="number" name="quantity" min="0"
                   value="{{ old('quantity', $product->quantity) }}" required>
        </p>

        <p>
            <label>Mô tả:</label><br>
            <textarea name="description">{{ old('description', $product->description) }}</textarea>
        </p>

        <p>
            <label>Ảnh hiện tại:</label><br>
            @if ($product->image)
                <img src="{{ asset('storage/' . $product->image) }}"
                     width="120" alt="Ảnh sản phẩm">
            @else
                Chưa có ảnh
            @endif
        </p>

        <p>
            <label>Chọn ảnh mới (nếu muốn đổi):</label><br>
            <input type="file" name="image" accept="image/*">
        </p>

        <button type="submit">Cập nhật sản phẩm</button>
        <a href="{{ route('products.index') }}">Quay lại</a>
    </form>
</body>
</html>
