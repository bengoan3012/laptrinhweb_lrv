
@extends('dashboardlogin')

@section('content')
<div class="container">
        <h2>Đăng nhập</h2>
        <form method="POST" action="{{route('authUser')}}">
            @csrf
            <label>Email</label>
            <input type="text" id="email" name="email" placeholder="Nhập email">
            <label>Password</label>
            <input type="password" id="password" name="password" placeholder="Nhập password">
            <button type="submit" class="button">Đăng nhập</button>
            <p>Chưa có tài khoản? <a href="{{route('createUser')}}">Đăng ký</a></p>
        </form>
</div>
@endsection
