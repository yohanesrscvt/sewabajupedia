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
    @foreach($PakaianList as $pl)
    <hr>
    <img src="{{ asset('storage/' . $pl->PakaianGambar) }}" alt="">
    <p>{{$pl->PakaianNama}}</p>
    <p>{{$pl->PakaianHarga}}</p>
    <hr>
    @endforeach
    @endsection
</body>
</html>