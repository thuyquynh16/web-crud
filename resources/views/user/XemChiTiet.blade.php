
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết người dùng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="page">
    <div class="page-header">
        <div>
            <h1>Chi tiết người dùng</h1>
            <p class="subtitle">Thông tin tài khoản trong hệ thống.</p>
        </div>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">
            ← Quay lại
        </a>
    </div>

    <div class="card">
        <div class="detail-grid">
            <div class="detail-label">Mã người dùng</div>
            <div class="detail-value">
                <span class="badge">#{{ $user->id }}</span>
            </div>

            <div class="detail-label">Họ và tên</div>
            <div class="detail-value">{{ $user->name }}</div>

            <div class="detail-label">Email</div>
            <div class="detail-value">{{ $user->email }}</div>

            <div class="detail-label">Xác thực email</div>
            <div class="detail-value">
                {{ $user->email_verified_at
                    ? $user->email_verified_at->format('d/m/Y H:i')
                    : 'Chưa xác thực' }}
            </div>

            <div class="detail-label">Ngày tạo</div>
            <div class="detail-value">
                {{ $user->created_at
                    ? $user->created_at->format('d/m/Y H:i')
                    : '—' }}
            </div>

            <div class="detail-label">Cập nhật lần cuối</div>
            <div class="detail-value">
                {{ $user->updated_at
                    ? $user->updated_at->format('d/m/Y H:i')
                    : '—' }}
            </div>
        </div>

        <div class="form-actions">`
            <a href="{{ route('users.edit', $user->id) }}"
               class="btn btn-primary">
                Sửa thông tin
            </a>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">
                Quay lại danh sách
            </a>
        </div>
    </div>
</div>
</body>
</html>

