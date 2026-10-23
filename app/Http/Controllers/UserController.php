<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class UserController extends Controller
{
     // Xem danh sách người dùng
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);

        return view('user.index', compact('users'));
    }

    // Hiển thị form thêm
    public function AddUser()
    {
        return view('user.AddUser');
    }

    // Lưu người dùng mới
    public function SaveNewUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email này đã được sử dụng.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')
            ->with('success', 'Thêm người dùng thành công.');
    }

    // Xem chi tiết
    public function XemChiTiet($id)
    {
        $user = User::findOrFail($id);

        return view('user.XemChiTiet', compact('user'));
    }

    // Hiển thị form sửa
    public function EditUser($id)
    {
        $user = User::findOrFail($id);

        return view('user.EditUser', compact('user'));
    }

    // Cập nhật người dùng
    public function UpdateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'password' => 'nullable|string|min:8|confirmed',
        ], [
            'name.required' => 'Vui lòng nhập họ tên.',
            'email.required' => 'Vui lòng nhập email.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email này đã được sử dụng.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password.confirmed' => 'Mật khẩu xác nhận không khớp.',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        // Chỉ đổi mật khẩu khi người dùng nhập mật khẩu mới
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'Cập nhật người dùng thành công.');
    }

    // Xóa người dùng
    public function DeleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Xóa người dùng thành công.');
    }
}
