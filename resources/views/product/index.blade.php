
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý sản phẩm</title>
</head>
<body>
    <h1>Danh sách sản phẩm</h1>

    @if (session('success'))
        <p style="color: green">{{ session('success') }}</p>
    @endif

    <a href="{{ route('products.create') }}">+ Thêm sản phẩm</a>

    <table border="1" cellpadding="8" cellspacing="0">
        <thead>
            <tr>
                <th>Mã</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Ảnh</th>
                <th>Thao tác</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price) }} đ</td>
                    <td>{{ $product->quantity }}</td>
                    <td>
                        @if ($product->image)
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                width="80"
                                alt="Ảnh sản phẩm"
                            >
                        @else
                            Chưa có ảnh
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('products.show', $product->id) }}">
                            Chi tiết
                        </a>

                        <a href="{{ route('products.edit', $product->id) }}">
                            Sửa
                        </a>

                        <form
                            action="{{ route('products.destroy', $product->id) }}"
                            method="POST"
                            style="display:inline"
                            onsubmit="return confirm('Cậu có chắc muốn xóa sản phẩm này?')"
                        >
                            @csrf
                            @method('DELETE')
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Chưa có sản phẩm nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
