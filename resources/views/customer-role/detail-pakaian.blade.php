@extends('master')
@section('title','Detail Pakaian')
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
    @foreach($PakaianDetail as $pd)
    <form action="/dashboard/customer/category/pakaian/buy" method="post">
        @csrf
        <input type="hidden" name="PakaianID" value="{{$pd->PakaianID}}">
        <input type="hidden" name="PakaianHarga" value="{{$pd->PakaianHarga}}">
        <img src="{{ asset('storage/' . $pd->PakaianGambar) }}" alt="">
        <p>{{$pd->PakaianNama}}</p>
        <p>{{$pd->PakaianHarga}}</p>
        <p>{{$pd->PakaianDeskripsi}}</p>
        <p>{{$pd->DeskripsiSize}}</p>
        <label for="date">Mulai Sewa</label>
        <input type="date" name="date" id="date" required><br>

        <label for="date2">Selesai Sewa</label>
        <input type="date" name="date2" id="date2" required><br>
        
        <select name="payment_type" id="payment">
            @foreach($PaymentType as $pt)
            <option value="{{$pt->PaymentMethodID}}">{{$pt->PaymentMethodName}}</option>
            @endforeach
        </select>
        
        <select name="delivery_services" id="delivery">
            @foreach($DeliveryServices as $ds)
            <option value="{{$ds->DeliveryServiceID}}">{{$ds->DeliveryServiceName}}</option>
            @endforeach
        </select>
        
        <select name="laundry_services" id="laundry">
            @foreach($LaundryServices as $ls)
            <option value="{{$ls->LaundryServiceID}}">{{$ls->LaundryServiceName}}</option>
            @endforeach
        </select>
        <button type="submit">Beli Sekarang</button>
    </form>
    @endforeach
    @endsection
</body>
</html>