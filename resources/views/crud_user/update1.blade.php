
@extends('dashboardlogin')

@section('content')
<div class="container">
        <h2>Màn hình cập nhật</h2>
        <form action="update.php" method="POST">
            <input type="text" name="username" placeholder="Username" required value="xxx">
            <input type="password" name="password" placeholder="Mật khẩu" required value="xxx">
            <input type="password" name="confirm_password" placeholder="Nhập lại mật khẩu" required value="xxx">
            <input type="email" name="email" placeholder="Email" required value="xxx">
            <button class="button" type="submit">Cập nhật</button>
        </form>
        <p><a href="login.html">Đã có tài khoản? Đăng nhập</a></p>
</div>
@endsection
