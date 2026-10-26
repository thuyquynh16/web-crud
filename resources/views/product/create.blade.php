
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm sản phẩm</title>
</head>
<body>
    <h1>Thêm sản phẩm mới</h1>

    @if ($errors->any())
        <ul style="color: red">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('products.store') }}" method="POST"
          enctype="multipart/form-data">
        @csrf

        <p>
            <label>Tên sản phẩm:</label><br>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </p>

        <p>
            <label>Giá:</label><br>
            <input type="number" name="price" min="0" step="0.01"
                   value="{{ old('price') }}" required>
        </p>

        <p>
            <label>Số lượng:</label><br>
            <input type="number" name="quantity" min="0"
                   value="{{ old('quantity', 0) }}" required>
        </p>

        <p>
            <label>Mô tả:</label><br>
            <textarea name="description">{{ old('description') }}</textarea>
        </p>

        <p>
            <label>Ảnh sản phẩm:</label><br>
            <input type="file" name="image" accept="image/*">
        </p>

        <button type="submit">Lưu sản phẩm</button>
        <a href="{{ route('products.index') }}">Quay lại</a>
    </form>
</body>
</html>
