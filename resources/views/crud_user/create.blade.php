
@extends('dashboardlogin')

@section('content')
<div class="container">
        <h2>Đăng nhập</h2>
        <form method="POST" action="{{route('postUser')}}">
            @csrf
            <label>Name</label>
            <input type="text" id="name" name="name" placeholder="Nhập name">
            <label>Email</label>
            <input type="text" id="email" name="email" placeholder="Nhập email">         
            <label>Password</label>
            <input type="password" id="password" name="password" placeholder="Nhập password">
            <label>Phone</label>
            <input type="text" id="phone" name="phone" placeholder="Nhập phone">
            <label>Street</label>
            <input type="text" id="street" name="street" placeholder="Nhập street">
            <button class="button">Đăng Ký</button>
            <p>Chưa có tài khoản? <a href="register.html">Đăng ký</a></p>
        </form>
</div>
@endsection
