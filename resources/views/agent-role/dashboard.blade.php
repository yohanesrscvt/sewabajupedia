<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
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
    <hr>
    <img src="" alt="">
    <p>Title</p><br>
    <p>Rp. null/hari</p><br>
    <p>Rating null of 5</p>
    <a href="">Edit</a>
    <a href="">Hapus</a>
    <hr>
    <!-- end product view -->

</body>
</html>