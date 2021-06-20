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
    @section('content')
    @foreach($PakaianDetail as $pd)
    <form action="/dashboard/customer/category/pakaian/buy" method="post">
        @csrf
        <input type="hidden" name="PakaianID" value="{{$pd->PakaianID}}">
        <input type="hidden" name="PakaianHarga" value="{{$pd->PakaianHarga}}">
        <img src="{{ asset('storage/' . $pd->PakaianGambar) }}" alt="">
        <p>{{$pd->PakaianHarga}}</p>
        <p>{{$pd->PakaianDeskripsi}}</p>
        <p>{{$pd->DeskripsiSize}}</p>
        <label for="date">Mulai Sewa</label>
        <input type="date" name="date" id="date"><br>

        <label for="date2">Selesai Sewa</label>
        <input type="date" name="date2" id="date2"><br>
        
        <select name="payment_type" id="payment">
            @foreach($PaymentType as $pt)
            <option value="{{$pt->PaymentMethodID}}">{{$pt->PaymentMethodName}}</option>
            @endforeach
        </select>
        
        <select name="delivery_services" id="delivery">
            @foreach($DeliveryServices as $ds)
            <option value="{{$ds->DeliveryServicePrice}}">{{$ds->DeliveryServiceName}}</option>
            @endforeach
        </select>
        
        <select name="laundry_services" id="laundry">
            @foreach($LaundryServices as $ls)
            <option value="{{$ls->LaundryServicePrice}}">{{$ls->LaundryServiceName}}</option>
            @endforeach
        </select>
        <button type="submit">Beli Sekarang</button>
    </form>
    @endforeach
    @endsection
</body>
</html>