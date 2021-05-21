<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <h1>Profile</h1>
    
    @foreach($UserData as $ud)
        <p>Nama: {{$ud->CustomerNama}}</p><br>
        <p>Email: {{$ud->CustomerEmail}}</p><br>
        <p>No telp: {{$ud->CustomerPhone}}</p><br>
        <p>Saldo: {{$ud->CustomerSaldo}}</p><br>
        <img src="{{asset('storage/' . $ud->CustomerPicturePath)}}" alt="">
        <a href="">Edit akun saya</a><br>
        <a href="">Hapus akun saya</a><br>
    @endforeach
</body>
</html>