<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <form action="/profile/edit/execution" method="post">
        @csrf
        @foreach($UserData as $ud)
            <label for="nama">Nama</label><br>
            <input type="text" name="nama" id="nama" value="{{$ud->CustomerNama}}" required>
            <br><br>
            <label for="phone">Nomor Telepon</label><br>
            <input type="text" name="phone" id="phone" value="{{$ud->CustomerPhone}}" required>
            <br><br>
            <label for="alamat">Alamat</label><br>
            <input type="text" name="alamat" id="alamat" value="{{$ud->CustomerAlamat}}" required>
            <br><br>
        @endforeach

        <p>Change Password</p><br>
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password">
        <br><br>
        <label for="confirm_password">Confirm Password</label><br>
        <input type="password" name="confirm_password" id="confirm_password">
        <br><br>
        <input type="submit" value="Update Profile">
    </form>
</body>
</html>