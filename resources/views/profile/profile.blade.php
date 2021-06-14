@extends('master')
@section('title','My Profile')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/profile.css')}}">
</head>
<body>
    @foreach($UserData as $ud)
    <!-- navbar -->
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
    <!-- content -->
    @section('content')
    <div class="container">
        <a href="/profile/back" class="btn btn-outline-danger">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
        <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
        </svg>
        </a>
        <h1>Profile</h1>
        <div class="detail">
            <div class="kiri">
                <img src="{{asset('storage/' . $ud->CustomerPicturePath)}}" width="100px" height="100px">
                <p>{{$ud->CustomerNama}}</p>
                <p>{{$ud->CustomerEmail}}</p>
                <p>{{$ud->CustomerPhone}}</p>
            </div>
            <div class="kanan">
                <div class="saldo">
                    <h3>Saldo E-Money</h3>
                    <p>Menambak saldo dan melihat riwayat transaksi dilakukan</p>
                    <div class="buttons">
                        <h4 style="color:white;"><span class="badge bg-secondary">Saldo anda : {{$ud->CustomerSaldo}}</span></h4>
                        <a href="" class="btn btn-success"> TopUp Saldo</>
                        <a href="" class="btn btn-warning" style="color:white; margin-left:5px;">Riwayat Transaksi</a>
                    </div>
                </div>
                <div class="saldo">
                    <h3>Pengaturan akun</h3>
                    <p>Pengaturan akun yang meliputi edit data diri dan penggantian password</p>
                    <a href="/profile/edit" class="btn btn-info btn-block">Edit Akun</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
    @endforeach
</body>
</html>