@extends('master')
@section('title','Kategori')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/kategori_formal.css')}}">
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
                    <a href="/dashboard/customer/category">Kategori</a>
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
        <div></div>
        <div class="kategori-type">
            <div class="kategori-title">
                <h1>{{$Kategori->KategoriNama}}</h1>
            </div>
        </div>

        <div class="kategori-choose">
            <p></p>
        </div>

        <div class="list-cloth">
            @foreach($PakaianList as $pl)
            <a href="/dashboard/customer/category/pakaian/{{$pl->PakaianID}}" class="cloth-card" style="text-decoration:none;">
                <img src="{{asset('storage/' . $pl->PakaianGambar)}}" alt="">
                <div class="card-text">
                    <p>{{$pl->PakaianNama}}</p>
                    <p class="price">Rp. {{$pl->PakaianHarga}}/hari</p>
                    <div class="stars">
                        &#9733;{{$pl->PakaianRating}} of 5
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
    @endsection
</body>
</html>