
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return redirect()->route('users.index');
});

Route::prefix('users')->name('users.')->group(function () {
    // Danh sách người dùng
    Route::get('/', [UserController::class, 'index'])->name('index');

    // Thêm người dùng
    Route::get('/add', [UserController::class, 'AddUser'])->name('add');
    Route::post('/save', [UserController::class, 'SaveNewUser'])->name('save');

    // Xem chi tiết
    Route::get('/detail/{id}', [UserController::class, 'XemChiTiet'])->name('detail');

    // Sửa người dùng
    Route::get('/edit/{id}', [UserController::class, 'EditUser'])->name('edit');
    Route::put('/update/{id}', [UserController::class, 'UpdateUser'])->name('update');

    // Xóa người dùng
    Route::delete('/delete/{id}', [UserController::class, 'DeleteUser'])->name('delete');
});
