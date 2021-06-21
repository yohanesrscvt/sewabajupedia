@extends('master')
@section('title','Edit Profile')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    @foreach($UserData as $ud)
    @section('content')
    <a href="/profile/main" class="btn btn-outline-danger">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
        <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
        </svg>
    </a>
    <form action="/profile/edit/execution" method="post" enctype="multipart/form-data">
        @csrf
            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama" value="{{$ud->CustomerNama}}" required>
            <br><br>
            <label for="phone">Nomor Telepon</label><br>
            <input type="text" name="phone" id="phone" value="{{$ud->CustomerPhone}}" required>
            <br><br>
            <label for="alamat">Alamat</label><br>
            <input type="text" name="alamat" id="alamat" value="{{$ud->CustomerAlamat}}" required>
            <br><br>
            <input type="hidden" name="file_temp" value="{{$ud->CustomerPicturePath}}">
        <hr>
        <p>Change Picture</p>
        <input type="file" name="file" id="file">
        <hr>
        <p>Change Password</p><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password">
        <br><br>
        <label for="confirm_password">Confirm Password</label><br>
        <input type="password" name="confirm_password" id="confirm_password">
        <br><br>
        <input type="submit" value="Update Profile">
    </form>
    @endsection
    @endforeach
</body>
</html>