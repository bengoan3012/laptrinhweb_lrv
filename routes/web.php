<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Định nghĩa các route cho ứng dụng
|
*/

// Trang chính (mặc định là trang login)
Route::get('/', function () {
    return view('crud_user.login');
});

//  Dashboard (chỉ hiển thị nếu user đã đăng nhập)
Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [CrudUserController::class, 'dashboard'])->name('dashboard');

    //  Hiển thị danh sách người dùng
    Route::get('users', [CrudUserController::class, 'listUser'])->name('user.list');

    //  Xem chi tiết user (cần truyền ID)
    Route::get('user/{id}', [CrudUserController::class, 'readUser'])->name('user.readUser');

    //  Xóa user (cần truyền ID, dùng method DELETE)
    Route::delete('user/{id}', [CrudUserController::class, 'deleteUser'])->name('user.deleteUser');

    //  Hiển thị form cập nhật user
    Route::get('user/{id}/edit', [CrudUserController::class, 'updateUser'])->name('user.updateUser');

    //  Xử lý cập nhật user
    Route::post('user/{id}/edit', [CrudUserController::class, 'postUpdateUser'])->name('user.postUpdateUser');

    //  Đăng xuất
    Route::post('signout', [CrudUserController::class, 'signOut'])->name('signout');
});

//  Đăng nhập
Route::get('login', [CrudUserController::class, 'login'])->name('login');
Route::post('login', [CrudUserController::class, 'authUser'])->name('user.authUser');

//  Đăng ký user
Route::get('register', [CrudUserController::class, 'createUser'])->name('user.createUser');
Route::post('register', [CrudUserController::class, 'postUser'])->name('user.postUser');
