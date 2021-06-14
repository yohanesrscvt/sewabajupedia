@extends('master')
@section('title','Register')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/register.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Sanchez' rel='stylesheet'>
</head>
<body>
    @section('content')
    <!-- body -->
    <div class="content">
        <div class="form-list">
            <div class="judul-register">
                <h1>REGISTER</h1>
            </div>
            
            <!-- modified form -->
            <form action="/register/add-account" method="post" class="form"> 
                @csrf
                <div class="name">
                    <label for="nama">Nama Lengkap</label>
                    <br>
                    <input type="text" name="nama" id="nama" required>
                </div>

                <div class="email">
                    <label for="email">Email</label>
                    <br>
                    <input type="email" name="email" id="email" required>
                </div>

                <div class="password">
                    <label for="password">Password</label>
                    <br>
                    <input type="password" name="password" id="password" required>
                </div>

                <div class="conf-password">
                    <label for="confirm_password">Konfirmasi Password</label>
                    <br>
                    <input type="password" name="confirm_password" id="confirm_password" required>
                </div>
                <button id="submit-button" type="submit" >Register</button>
            </form>

            <!-- alert message -->
            @if(Session::get('fail'))
                <script>
                    alert("{{Session::get('fail')}}")
                </script>
            @endif

            <div class="already-register">
                <p>Sudah memiliki akun?</p>
                <a href="/login">Masuk Sekarang</a>
            </div>
        </div>    
    </div>
    @endsection
</body>
</html>