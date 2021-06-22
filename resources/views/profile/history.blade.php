@extends('master')
@section('title','Riwayat Transaksi')
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
    <div class="container">
        <a href="/profile/main" class="btn btn-outline-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace-fill" viewBox="0 0 16 16">
            <path d="M15.683 3a2 2 0 0 0-2-2h-7.08a2 2 0 0 0-1.519.698L.241 7.35a1 1 0 0 0 0 1.302l4.843 5.65A2 2 0 0 0 6.603 15h7.08a2 2 0 0 0 2-2V3zM5.829 5.854a.5.5 0 1 1 .707-.708l2.147 2.147 2.146-2.147a.5.5 0 1 1 .707.708L9.39 8l2.146 2.146a.5.5 0 0 1-.707.708L8.683 8.707l-2.147 2.147a.5.5 0 0 1-.707-.708L7.976 8 5.829 5.854z"/>
            </svg>
        </a>
        <h1>Riwayat Transaksi</h1>
        @foreach($TransactionData as $td)
        <div class="riwayat">
            <div class="id">Transaction ID: {{$td->TransactionID}}</div>
            <div class="date">Transaction Date: {{$td->TransactionDate}}</div>
            <div class="periode">Rent Periode :
                <span class="mulai">Mulai Sewa : {{$td->MulaiSewa}}</span><br>
                <span class="selesai">Selesai Sewa : {{$td->SelesaiSewa}}</span>
            </div>
            <div class="item">
                <p style="color:white;">ID Pakaian : {{$td->PakaianID}}</p>
                <p style="color:white;">Nama Pakaian : {{$td->PakaianNama}}</p>
            </div>
        </div>
        @endforeach
    </div>
    @endsection
</body>
</html>