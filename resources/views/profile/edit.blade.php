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
    @section('navbar')
    <nav>
        <div class="navigation-bar">
            <div class="item-left">
                <div class="home-nav">
                    <a href="">Home</a>
                </div>
                <div class="kategori-nav">
                    <a href="">Kategori</a>
                </div>
                <div class="about-nav">
                    <a class="about-nav" href="">About</a>
                </div>
                <div class="FAQ-nav">
                    <a class="FAQ-nav" href="">FAQ</a>
                </div>
            </div>

            <!-- <div class="item-right">
                <a href="profile.html">
                    <div class="profile">
                        <img src="../Images/batik.jpg" alt="profile" width="100px" height="100px">
                    </div>
                </a>
            </div> -->
        </div>
    </nav>
    @endsection

    @section('content')
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