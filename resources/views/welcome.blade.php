@extends('master')
@section('title','Selamat Datang di SewaBajuPedia')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('/css/welcome.css')}}">
</head>
<body>
    <!-- content -->
    @section('content')
    <div class="box">
        <div class="block"></div>
        <img src="{{asset('/storage/pexels-tembela-bohle-1884581.jpg')}}" alt="">
        <div class="box-text">
            <p class="par" style="font-size: 30px;">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Totam dicta impedit tempore. Iure vel omnis perferendis nihil dolor voluptate neque nulla exercitationem? Aliquid perspiciatis ullam consectetur nesciunt iste quos mollitia?
            </p>
            <a class="btn btn-success btn-block" href="/login" style="font-size: 20px;">Coba Sekarang</a><br>
            Photo by <strong>Tembela Bohle</strong> from Pexels
        </div>
    </div>
    @endsection
</body>
</html>