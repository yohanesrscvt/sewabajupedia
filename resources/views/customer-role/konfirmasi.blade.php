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
    @section('content')
    <form action="/dashboard/customer/category/pakaian/buy/execute" method="post">
        <!-- detail pakaian -->
        @foreach($PakaianDetail as $pd)
        <input type="hidden" name="PakaianID" value="{{$pd->PakaianID}}">
        <input type="hidden" name="PakaianID" value="{{$pd->PakaianID}}">
        <p>{{$pd->PakaianNama}}</p>
        <p>{{$pd->PakaianHarga}}</p>
        <p>{{$pd->DeskripsiSize}}</p>
        <p>Lama Sewa: {{$RentDays}}</p>
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