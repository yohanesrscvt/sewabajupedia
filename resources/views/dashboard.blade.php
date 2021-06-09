<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <!-- customer -->
    @if() 
        <h1>This is Customer Dashboard</h1><br>

        @foreach($CustomerData as $c)
            <img src='{{$c->CustomerPicturePath}}' alt="User Profile Image"><br>
            <p>Saldo: {{$c->CustomerSaldo}}</p><br>
        @endforeach

        <!-- change role -->
        <select name="role" id="role" onchange="location = this.value;" autofocus>
            <option value="">Customer</option>
            <option value="/set_agent">Agent</option>
        </select><br>

        <a href="">My Account</a><br>
        <a href="/logout">Logout</a>
    @elseif()
        <h1>This is Agent Dashboard</h1><br>
        
        @foreach($AgentData as $a)
            <img src='{{$a->AgentPicturePath}}' alt="User Profile Image"><br>
            <p>Saldo: {{$a->AgentSaldo}}</p><br>
        @endforeach

        <!-- change role -->
        <select name="role" id="role" onchange="location = this.value;" autofocus>
            <option value="">Agent</option>
            <option value="/set_customer">Customer</option>
        </select><br>
        <!-- end change role -->

        <a href="">My Account</a><br>
        <a href="/logout">Logout</a>

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
</body>
</html>