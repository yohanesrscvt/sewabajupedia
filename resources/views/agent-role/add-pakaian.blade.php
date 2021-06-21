@extends('master')
@section('title','Add Pakaian')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/editperpakaian.css')}}">
</head>
<body>
    <!-- navbar -->
    @section('navbar')
    <nav>
        <div class="navigation-bar">
            <div class="item-left">
                <div class="home-nav">
                    <a href="/dashboard/agent">Home</a>
                </div>

                @if($role == "Customer") 
                <div class="kategori-nav">
                    <a href="/dashboard/customer/category">Kategori</a>
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
                <!-- profile picture -->
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
    <div class="content">
        
    </div>


    <form action="/dashboard/agent/add/execution" method="post" enctype="multipart/form-data">
        @csrf
        <div class="edit-clothes">
            <div class ="header-edit">
                <p>Add Pakaian</p>
            </div>
            <div class="form-new">
                <div class="form2">
                    <label for="cloth-name">Nama Pakaian</label>
                    <br>
                    <input type="text" name="nama" id="cloth-name" required>
                </div>
                <div class="form2">
                    <label for="cloth-desc">Deskripsi Pakaian</label>
                    <br>
                    <textarea name="deskripsi" id="cloth-desc" required style="resize:none;"></textarea>
                </div>
                <div class="form2">
                    <label for="cloth-price">Harga Sewa Pakaian</label>
                    <br>
                    <input type="number" name="harga" id="cloth-price" required>
                </div>
                <div class="form2">
                    <label for="cloth-pict">Gambar</label>
                    <br>
                    <input type="file" name="gambar" id="cloth-pict" required>
                </div>
                <div class="form2">
                    <label for="stock">Stock</label>
                    <br>
                    <input type="number" name="stock" id="stock" required>
                </div>
                <div class="form2">
                    <label for="kategori">Kategori</label><br>
                    <select name="kategori" id="kategori" required>
                        @foreach($Kategori as $k)
                            <option value="{{$k->KategoriID}}">{{$k->KategoriNama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form2">
                    <label for="size">Ukuran Pakaian</label>
                    <select name="size" id="size" required>
                        @foreach($Size as $s)
                            <option value="{{$s->SizeID}}">{{$s->DeskripsiSize}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="submit" value="+ Add Data" class="btn btn-success btn-block">
        </div>
    </form>
    @endsection
</body>
</html>