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
    @section('content')
    @foreach($UserData as $ud)
    <div class="container">
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
                        <div class="nominal">
                            {{$ud->CustomerSaldo}}
                        </div>
                        <button type="button" class="btn btn-success">TopUp</button>
                        <a href="riwayat.html">
                            <button type="button" class="btn btn-warning">Riwayat</button>
                        </a>
                    </div>
                </div>
                <div class="saldo">
                    <h3>Pengaturan akun</h3>
                    <p>Pengaturan akun yang meliputi edit data diri dan penghapusan akun</p>
                    <a href="" class="d-grid gap-2">
                        <button type="button" class="btn btn-success">Edit akun saya</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    @endsection
</body>
</html>