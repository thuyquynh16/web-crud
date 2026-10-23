
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa người dùng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="page">
    <div class="page-header">
        <div>
            <h1>Sửa người dùng</h1>
            <p class="subtitle">Cập nhật thông tin tài khoản #{{ $user->id }}.</p>
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

        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Họ và tên</label>
                <input class="form-control" id="name" type="text"
                       name="name"
                       value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Địa chỉ email</label>
                <input class="form-control" id="email" type="email"
                       name="email"
                       value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label for="password">Mật khẩu mới (không bắt buộc)</label>
                <input class="form-control" id="password" type="password"
                       name="password" minlength="8"
                       placeholder="Để trống nếu không muốn đổi mật khẩu">
                <span class="form-hint">
                    Chỉ nhập mật khẩu khi bạn muốn thay đổi mật khẩu hiện tại.
                </span>
            </div>

            <div class="form-group">
                <label for="password_confirmation">Xác nhận mật khẩu mới</label>
                <input class="form-control" id="password_confirmation"
                       type="password" name="password_confirmation"
                       minlength="8" placeholder="Nhập lại mật khẩu mới">
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Lưu thay đổi
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

