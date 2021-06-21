@extends('master')
@section('title','Konfirmasi')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/kategori_formal.css')}}">
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
    <div class="content">
        <div class="kategori-type">
            <div class="kategori-title">
                <h1>Konfirmasi Pembayaran</h1>
            </div>
        </div>

        @foreach($PakaianDetail as $pd)
        <div class="detailWrapper">
            <h1>{{$pd->PakaianNama}}</h1>
            <p>Rp. {{$pd->PakaianHarga}}/hari</p>

            <form action="/dashboard/customer/category/pakaian/buy/execute" method="post">
                @csrf
                <input type="hidden" name="AgentID" value="{{$pd->AgentID}}">
                <input type="hidden" name="PakaianHarga2" value="{{$pd->PakaianHarga}}">
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row">Code</th>
                            <td>: {{$pd->PakaianID}}</td>
                            <input type="hidden" name="PakaianID" value="{{$pd->PakaianID}}">
                        </tr>
                        <tr>
                            <th scope="row">Deskripsi</th>
                            <td>: {{$pd->PakaianDeskripsi}}</td>
                        </tr>
                        <tr>
                            <th scope="row">Ukuran</th>
                            <td>: {{$pd->DeskripsiSize}} </td>
                        </tr>
                        <tr>
                            <th scope="row"><label for="hari" class="form-label">Sewa Untuk</label></th>
                            <td>: {{$RentDays}} hari </td>
                            <input type="hidden" name="LamaSewa" value="{{$RentDays}}">
                        </tr>
                        <tr>
                            @foreach($PaymentType as $pt)
                                <input type="hidden" name="PaymentMethodID" value="{{$pt->PaymentMethodID}}">
                                <th scope="row">Tipe Pembayaran</th>
                                <td>: {{$pt->PaymentMethodName}} </td>
                            @endforeach
                        </tr>
                    </tbody>
                    <br>
                    <br>
                </table>
                <div class="detailPembayaran">
                    <h2>Detail Pembayaran</h2>
                    <table class="table">
                        <tbody>
                            <tr>
                                <th scope="row">Biaya Per Hari</th>
                                <td>: Rp. {{$pd->PakaianHarga}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Biaya Antar</th>
                                <!-- delivery -->
                                @foreach($DeliveryServices as $ds)
                                    <input type="hidden" name="DeliveryServiceID" value="{{$ds->DeliveryServiceID}}">
                                    <input type="hidden" name="DeliveryServicePrice" value="{{$ds->DeliveryServicePrice}}">
                                    <td>: Rp. {{$ds->DeliveryServicePrice}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Biaya Laundry</th>
                                <!-- laundry -->
                                @foreach($LaundryServices as $ls)
                                    <input type="hidden" name="LaundryServiceID" value="{{$ls->LaundryServiceID}}">
                                    <input type="hidden" name="LaundryServicePrice" value="{{$ls->LaundryServicePrice}}">
                                    <td>: Rp. {{$ls->LaundryServicePrice}}</td>
                                @endforeach
                            </tr>
                            <tr>
                                <th scope="row">Total Pembayaran</th>
                                <td id="total">: Rp. xxx.xxx</td>
                            </tr>

                        </tbody>
                    </table>
                </div>

                <!-- hidden input -->
                <input type="hidden" name="MulaiSewa" value="{{ $StartRent }}">
                <input type="hidden" name="SelesaiSewa" value="{{ $FinalRent }}">
                
                @foreach($CustomerData as $c)
                <input type="hidden" name="CustomerSaldo" value="{{ $c->CustomerSaldo }}">
                @endforeach
                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-success btn-block"> <b> Konfirmasi Sewa </b></button>
                </div>
            </form>
        @endforeach
        </div>
    </div>

    <!-- total -->
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
        document.getElementById("total").innerHTML = ": " + total;
    </script>
    @endsection
</body>
</html>