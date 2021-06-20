@extends('master')
@section('title','Konfirmasi')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <form action="/dashboard/customer/category/pakaian/buy/execute" method="post">
        <!-- detail pakaian -->
        @foreach($PakaianDetail as $pd)
        <input type="hidden" name="PakaianID" value="{{$pd->PakaianID}}">
        <p>{{$pd->PakaianNama}}</p>
        <p>{{$pd->PakaianHarga}}</p>
        <p>{{$pd->DeskripsiSize}}</p>
        <p>Lama Sewa: {{$RentDays}} hari</p>
        <br><br>
        <h1>Detail Pembayaran</h1>
        <p>Biaya Per Hari: {{$pd->PakaianHarga}}</p>
        @endforeach

        <!-- delivery -->
        @foreach($DeliveryServices as $ds)
        <p>Biaya Antar: {{$ds->DeliveryServicePrice}}</p>
        @endforeach

        <!-- laundry -->
        @foreach($LaundryServices as $ls)
        <p>Biaya Laundry: {{$ls->LaundryServicePrice}}</p>
        @endforeach

        <button type="submit">Konfirmasi Beli</button>
    </form>

    <!-- total -->
    <p id="total"></p>
    <script>
        var DeliveryFee;
        var LaundryFee;
        var PakaianFee;
        @foreach($DeliveryServices as $ds)
            DeliveryFee = {{$ds->DeliveryServicePrice}};
        @endforeach

        @foreach($LaundryServices as $ls)
            LaundryFee = {{$ls->LaundryServicePrice}};
        @endforeach

        @foreach($PakaianDetail as $pd)
            PakaianFee = {{$pd->PakaianHarga}};
        @endforeach

        var total = ({{$RentDays}} * PakaianFee) + LaundryFee + DeliveryFee;
        document.getElementById("total").innerHTML = "Total: " + total;
    </script>
    @endsection
</body>
</html>