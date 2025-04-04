
@extends('dashboardlogin')

@section('content')
    <div class="container">
        <h2>Danh sách user</h2>
        <table>
            <tr>
                <th>#</th>
                <th>Username</th>
                <th>Email</th>
                <!-- <th>Phone</th>
                <th>Street</th> -->
                <th>Thao tác</th>
            </tr>
            <tr>
                @foreach($users as $lstuser)
                <td>{{$lstuser->id}}</td>
                <td>{{$lstuser->name}}</td>
                <td>{{$lstuser->email}}</td>
                <!-- <td>{{$lstuser->phone}}</td>
                <td>{{$lstuser->street}}</td> -->
                <td class="actions">
                <a href="{{ route('user.updateUser', ['id' => $lstuser->id]) }}">Edit</a> | <a href="#">View</a> | <a href="#">Delete</a>
                </td>
                @endforeach
            </tr>
        </table>
        
        <div class="pagination">
            <a href="#">Previous</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">Next</a>
        </div>
    </div>
    @endsection

