<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class CrudUserController extends Controller
{
    public function login()
    {
        return view('crud_user.login1');
    }

    // Xử lý đăng nhập
    public function authUser(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('user.list') // Chuyển hướng đúng route
                ->withSuccess('Signed in');
        }

        return redirect("login")->withErrors(['email' => 'Login details are not valid']);
    }

    // Hiển thị trang đăng ký
    public function createUser()
    {
        return view('crud_user.create');
    }

    // Xử lý đăng ký người dùng
    public function postUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'mssv' => 'required|string|unique:users',
            'address' => 'required|string',
            // 'phone' => 'required|max:10',
            // 'street' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mssv' => $request->mssv,
            'address' => $request->address,
            // 'phone' => $request->phone,
            // 'street' => $request->street,
        ]);

        return redirect("login")->withSuccess('Account created successfully. Please login.');
    }

    // Xem chi tiết user
    public function readUser(Request $request)
    {
        $user = User::find($request->get('id'));
        return view('crud_user.read', ['messi' => $user]);
    }

    // Xóa user
    public function deleteUser(Request $request)
    {
        User::destroy($request->get('id'));
        return redirect()->route('user.list')->withSuccess('User deleted successfully.');
    }

    // Hiển thị form cập nhật user
    public function updateUser(Request $request)
    {
        $user = User::find($request->get('id'));
        return view('crud_user.update', ['user' => $user]);
    }

    // Xử lý cập nhật user
    public function postUpdateUser(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $request->id,
            'password' => 'nullable|min:6',
        ]);

        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;

        // Nếu có password mới, mã hóa trước khi lưu
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.list')->withSuccess('User updated successfully.');
    }

    // Danh sách người dùng
    public function listUser()
    {
        if (Auth::check()) {
            $users = User::all();
            return view('crud_user.list', ['users' => $users]);
        }

        return redirect("login")->withErrors(['auth' => 'You are not allowed to access this page.']);
    }

    // Đăng xuất
    public function signOut()
    {
        Session::flush();
        Auth::logout();
        return redirect("login")->withSuccess('You have logged out successfully.');
    }

}
