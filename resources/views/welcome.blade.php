
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Hệ thống quản lý</title>

    <link rel="stylesheet" href="{{ asset('css/styleWelcome.css') }}">
</head>

<body>

    <h1>HỆ THỐNG QUẢN LÝ</h1>

    <p>Vui lòng chọn chức năng bạn muốn sử dụng</p>

    <div class="menu">

        <a href="{{ route('users.index') }}">
            <h2>Quản lý người dùng</h2>
            <p>Quản lý danh sách người dùng</p>
        </a>

        <a href="{{ route('products.index') }}">
            <h2>Quản lý hàng hóa</h2>
            <p>Quản lý danh sách hàng hóa</p>
        </a>

    </div>

</body>
</html>
