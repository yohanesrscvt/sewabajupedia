@extends('master')
@section('title','Detail Pakaian')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/detail.css')}}">
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
    <div class="content">
        <div class="kategori-type">
            <div class="kategori-title">
                <h1 style="text-align:center;">Detail</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('storage/' . $pd->PakaianGambar) }}" class="d-block w-100" alt="formal_acara">
                </div>
            </div>
        </div>

        <br>

        <div class="detailWrapper">
            <h1>{{$pd->PakaianNama}}</h1>
            <p>Rp. {{$pd->PakaianHarga}}/hari</p>

            <form action="/dashboard/customer/category/pakaian/buy" method="post">
                @csrf
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Code</th>
                            <td>: {{$pd->PakaianID}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Deskripsi</th>
                            <td>: {{$pd->PakaianDeskripsi}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Ukuran</th>
                            <td>: {{$pd->DeskripsiSize}}</td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="date">Mulai Sewa</label></th>
                            <td> 
                                <input type="date" name="date" id="date" required>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="date2">Selesai Sewa</label></th>
                            <td> 
                                <input type="date" name="date2" id="date2" required>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Tipe Pembayaran</th>
                            <td>
                            <select name="payment_type">
                                @foreach($PaymentType as $pt)
                                <option value="{{$pt->PaymentMethodID}}">{{$pt->PaymentMethodName}}</option>
                                @endforeach
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Tipe Pengiriman</th>
                            <td>
                            <select name="delivery_services">
                                @foreach($DeliveryServices as $ds)
                                <option value="{{$ds->DeliveryServiceID}}">{{$ds->DeliveryServiceName}}</option>
                                @endforeach
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Tipe Laundry</th>
                            <td>
                            <select name="laundry_services">
                                @foreach($LaundryServices as $ls)
                                <option value="{{$ls->LaundryServiceID}}">{{$ls->LaundryServiceName}}</option>
                                @endforeach
                            </select>
                            </td>
                        </tr>
                    </tbody>
                    <br>
                </table>
                <input type="hidden" name="PakaianID" value="{{$pd->PakaianID}}">
                <input type="hidden" name="PakaianHarga" value="{{$pd->PakaianHarga}}">
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-block"> <b> SEWA </b></button>
                </div>
            </form>
        </div>
    </div>
    @endforeach    
    @endsection
</body>
</html>