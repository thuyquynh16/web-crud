
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
<div class="page">
    <div class="page-header">
        <div>
            <h1>Quản lý người dùng</h1>
            <p class="subtitle">Quản lý thông tin tài khoản trong hệ thống.</p>
        </div>
        <a href="{{ route('users.add') }}" class="btn btn-primary">
            + Thêm người dùng
        </a>
    </div>

    @if (session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert-error">
            <strong>Đã xảy ra lỗi:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="table-wrap">
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ và tên</th>
                    <th>Email</th>
                    <th>Ngày tạo</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td class="user-id">#{{ $user->id }}</td>
                        <td class="user-name">{{ $user->name }}</td>
                        <td class="user-email">{{ $user->email }}</td>
                        <td>
                            {{ $user->created_at
                                ? $user->created_at->format('d/m/Y H:i')
                                : '—' }}
                        </td>
                        <td>
                            <div class="actions">
                                <a class="btn btn-secondary btn-small"
                                   href="{{ route('users.detail', $user->id) }}">
                                    Xem
                                </a>

                                <a class="btn btn-primary btn-small"
                                   href="{{ route('users.edit', $user->id) }}">
                                    Sửa
                                </a>

                                <form action="{{ route('users.delete', $user->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Bạn có chắc chắn muốn xóa người dùng này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-small">
                                        Xóa
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-state">
                            Chưa có người dùng nào. Hãy nhấn “Thêm người dùng” để bắt đầu.
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <div class="pagination">
            <span class="subtitle">
                Tổng số người dùng: {{ $users->total() }}
            </span>
            {{ $users->links() }}
        </div>
    </div>
</div>
</body>
</html>

