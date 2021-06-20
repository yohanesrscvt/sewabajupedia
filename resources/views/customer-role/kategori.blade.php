@extends('master')
@section('title','Kategori')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/kategori.css')}}">
</head>
<body>
    <!-- navbar -->
    @section('navbar')
    <nav>
        <div class="navigation-bar">
            <div class="item-left">
                <div class="home-nav">
                    <a href="/dashboard/customer">Home</a>
                </div>

                <div class="kategori-nav">
                    <a href="" style="color:green;">Kategori</a>
                </div>

                <div class="about-nav">
                    <a class="about-nav" href="">About</a>
                </div>
                <div class="FAQ-nav">
                    <a class="FAQ-nav" href="">FAQ</a>
                </div>
            </div>

            <div class="item-right">
                <!-- profile picture -->
                <a href="/profile/main">
                    <div class="profile">
                        @foreach($CustomerData as $c)
                        <img src="{{asset('storage/' . $c->CustomerPicturePath)}}" alt="profile">
                        @endforeach
                    </div>
                </a>

                <!-- change role -->
                <select name="role" id="role" onchange="location = this.value;" autofocus>
                    <option value="" selected>Customer</option>
                    <option value="/set_agent">Agent</option>
                </select>
            </div>
        </div>
    </nav>
    @endsection

    @section('content')
    <div class="content">
        <div class="kategori-title">
            <h1>Kategori</h1>
        </div>
        <div class="category-view">
            <div class="category-list">
                <a href="/dashboard/customer/category/K1">
                    <img src="{{asset('storage/Images/party_dress.jpg')}}" alt="">
                </a>
                <h6>Pesta</h6>
            </div>
            <div class="category-list">
                <a href="/dashboard/customer/category/K2">
                    <img src="{{asset('storage/Images/formal.jpg')}}" alt="">
                </a>
                <h6>Formal</h6>
            </div>
            <div class="category-list">
                <a href="/dashboard/customer/category/K3">
                    <img src="{{asset('storage/Images/adat.jfif')}}" alt="">
                </a>
                <h6>Adat</h6>
            </div>
            <div class="category-list">
                <a href="/dashboard/customer/category/K4">
                    <img src="{{asset('storage/Images/batik.jpg')}}" alt="">
                </a>
                <h6>Batik</h6>
            </div>
            <div class="category-list">
                <a href="/dashboard/customer/category/K5">
                    <img src="{{asset('storage/Images/cosplay.jpg')}}" alt="">
                </a>
                <h6>Cosplay</h6>
            </div>
            <div class="category-list">
                <a href="/dashboard/customer/category/K6">
                    <img src="{{asset('storage/Images/dress.jpg')}}" alt="">
                </a>
                <h6>Gaun</h6>
            </div>
            <div class="category-list">
                <a href="/dashboard/customer/category/K7">
                    <img src="{{asset('storage/Images/jas.jpg')}}" alt="">
                </a>
                <h6>Jas</h6>
            </div>
            <div class="category-list">
                <a href="/dashboard/customer/category/K8">
                    <img src="{{asset('storage/Images/baby.jpg')}}" alt="">
                </a>
                <h6>Baby</h6>
            </div>
            <div class="category-list">
                <a href="/dashboard/customer/category/K9">
                    Lainnya jika anda belum menemukan kategori yang sesuai
                </a>
            </div>
        </div>
        
    </div>
    @endsection
</body>
</html>