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
    <!-- content -->
    @section('content')
    <div class="container">
        <a href="/profile/back" class="btn btn-outline-danger">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
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
                    <p>Menambah saldo dan melihat riwayat transaksi dilakukan</p>
                    <div class="buttons">
                        <h4 style="color:white;"><span class="badge bg-secondary">Saldo anda : {{$ud->CustomerSaldo}}</span></h4>
                        <a href="/profile/topup" class="btn btn-success"> TopUp Saldo</>
                        <a href="/profile/history-transaction" class="btn btn-warning" style="color:white; margin-left:5px;">Riwayat Transaksi Pembelian</a>
                    </div>
                </div>
                <div class="saldo">
                    <h3>Pengaturan akun</h3>
                    <p>Pengaturan akun yang meliputi edit data diri,penggantian password, dan logout</p>
                    <a href="/profile/edit" class="btn btn-info btn-block">Edit Akun</a>
                    <a href="/logout" class="btn btn-danger btn-block">Logout</a>
                </div>
            </div>
        </div>
    </div>

    @if(Session::get('success'))
        <script>
            swal("Success", "{{Session::get('success')}}", "success");
        </script>
    @endif
    
    @endsection
    @endforeach
</body>
</html>