@extends('master')
@section('title','Kategori')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    @section('content')
    @foreach($KategoriData as $kd)
    <hr>
    <img src="{{ asset($kd->KategoriPicturePath) }}" alt="">
    <a href="/dashboard/customer/category/{{$kd->KategoriID}}">{{$kd->KategoriNama}}</a>
    <hr>
    @endforeach
    @endsection
</body>
</html>