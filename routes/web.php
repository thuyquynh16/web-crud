
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Product;

Route::get('/', function () {
    return redirect()->route('users.index');
});

// QUẢN LÝ USER
Route::prefix('users')->name('users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');

    Route::get('/add', [UserController::class, 'AddUser'])->name('add');
    Route::post('/save', [UserController::class, 'SaveNewUser'])->name('save');

    Route::get('/detail/{id}', [UserController::class, 'XemChiTiet'])->name('detail');

    Route::get('/edit/{id}', [UserController::class, 'EditUser'])->name('edit');
    Route::put('/update/{id}', [UserController::class, 'UpdateUser'])->name('update');

    Route::delete('/delete/{id}', [UserController::class, 'DeleteUser'])->name('delete');
});

// QUẢN LÝ PRODUCT
Route::prefix('products')->name('products.')->group(function () {
    Route::get('/', [Product::class, 'index'])->name('index');
    Route::get('/create', [Product::class, 'create'])->name('create');
    Route::post('/', [Product::class, 'store'])->name('store');

    Route::get('/{id}', [Product::class, 'show'])->name('show');
    Route::get('/{id}/edit', [Product::class, 'edit'])->name('edit');
    Route::put('/{id}', [Product::class, 'update'])->name('update');
    Route::delete('/{id}', [Product::class, 'destroy'])->name('destroy');
});
