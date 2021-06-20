@extends('master')
@section('title','Home')
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
                    <a href="" style="color:green;">Home</a>
                </div>

                @if($role == "Customer") 
                <div class="kategori-nav">
                    <a href="">Kategori</a>
                </div>
                @endif

                <div class="about-nav">
                    <a class="about-nav" href="">About</a>
                </div>
                <div class="FAQ-nav">
                    <a class="FAQ-nav" href="">FAQ</a>
                </div>
            </div>

            <div class="item-right">
                <a href="/profile/main">
                    <div class="profile">
                    @if($role == "Customer") 
                        @foreach($CustomerData as $c)
                        <img src="{{asset('storage/' . $c->CustomerPicturePath)}}" alt="profile">
                        @endforeach
                    @elseif($role == "Agent")
                        @foreach($AgentData as $a)
                            <img src="{{asset('storage/' . $a->AgentPicturePath)}}" alt="profile">
                        @endforeach
                    @endif
                    </div>
                </a>

                <!-- change role -->
                @if($role == "Customer") 
                <select name="role" id="role" onchange="location = this.value;" autofocus>
                    <option value="" selected>Customer</option>
                    <option value="/set_agent">Agent</option>
                </select>
                @elseif($role == "Agent")
                <select name="role" id="role" onchange="location = this.value;" autofocus>
                    <option value="/set_customer">Customer</option>
                    <option value="" selected>Agent</option>
                </select>
                @endif
            </div>
        </div>
    </nav>
    @endsection

    @section('content')
    <!-- customer -->
    @if($role == "Customer") 

    <!-- agent -->
    @elseif($role == "Agent")
        <a href="/dashboard/agent/add">Add Product</a>
        <hr>
        <br>
        <br>

        <!-- product view -->
        @foreach($PakaianData as $pd)
            <hr>
            <img src="{{asset('storage/' . $pd->PakaianGambar)}}" alt="" height="50px" width="50px">
            <p>{{$pd->PakaianNama}}</p><br>
            <p>Rp. {{$pd->PakaianHarga}}/hari</p><br>
            <p>Rating {{$pd->PakaianRating}} of 5</p>
            <a href="/dashboard/agent/edit/{{$pd->PakaianID}}">Edit</a>
            <a href="/dashboard/agent/delete/{{$pd->PakaianID}}/execution">Hapus</a>
            <hr>
        @endforeach
        <!-- end product view -->
    @endif
    @endsection
</body>
</html>