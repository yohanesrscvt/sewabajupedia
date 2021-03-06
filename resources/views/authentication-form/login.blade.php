@extends('master')
@section('title','Login')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css')}}">
    <link href='https://fonts.googleapis.com/css?family=Sanchez' rel='stylesheet'>
</head>
<body>
    @section('content')
    <!-- body -->
    <div class="content">
        <div class="form-list">
            <div class="judul-login">
                <h1>LOGIN</h1>
            </div>
            <!-- modified form -->
            <form action="/login/process" method="post" class="form">
                @csrf
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
                
                <button id="submit-button" type="submit" >Login</button>
            </form>

            <!-- alert message -->
            @if(Session::get('fail'))
                <script>
                    swal("Sorry", "{{Session::get('fail')}}", "error");
                </script>
            @elseif(Session::get('success'))
                <script>
                    swal("Horay", "{{Session::get('success')}}", "success");
                </script>
            @endif
            
            <div class="already-login">
                <p>Belum memiliki akun?</p>
                <a href="/register">Daftar Sekarang</a>
                <p></p>
            </div>
        </div>
    </div>
    @endsection
</body>
</html>