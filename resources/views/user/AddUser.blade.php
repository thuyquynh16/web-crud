
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm người dùng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
<div class="page">
    <div class="page-header">
        <div>
            <h1>Thêm người dùng</h1>
            <p class="subtitle">Nhập thông tin để tạo tài khoản mới.</p>
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            ← Quay lại
        </a>
    </div>

    <div class="card">
        @if ($errors->any())
            <div class="alert-error">
                <strong>Vui lòng kiểm tra lại thông tin:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.save') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Họ và tên</label>
                <input class="form-control" id="name" type="text"
                       name="name" value="{{ old('name') }}"
                       placeholder="Ví dụ: Nguyễn Văn An" required>
            </div>

            <div class="form-group">
                <label for="email">Địa chỉ email</label>
                <input class="form-control" id="email" type="email"
                       name="email" value="{{ old('email') }}"
                       placeholder="name@example.com" required>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu</label>
                <input class="form-control" id="password" type="password"
                       name="password" minlength="8"
                       placeholder="Nhập mật khẩu" required>
                <span class="form-hint">Mật khẩu phải có ít nhất 8 ký tự.</span>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Xác nhận mật khẩu</label>
                <input class="form-control" id="password_confirmation"
                       type="password" name="password_confirmation"
                       minlength="8" placeholder="Nhập lại mật khẩu" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Lưu người dùng
                </button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">
                    Hủy
                </a>
            </div>
        </form>
    </div>
</div>
</body>
</html>

