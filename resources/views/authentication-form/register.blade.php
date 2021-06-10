<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="{{ asset('css/register.css')}}">
    <link rel="stylesheet" href="{{ asset('css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('css/footer.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Sanchez' rel='stylesheet'>
    <script type="text/javascript">
        function preventBack(){
            window.history.forward();
        }
        setTimeout(() => {
            preventBack()
        }, 0);
        window.onunload = function(){null};
    </script>
</head>
<body>
    <!-- header -->
    <header>
        <h1>SewaBajuPedia</h1>
        <p>Situs penyewa baju no.1 di Indonesia</p>
    </header>

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
                    <input type="password" name="password" id="password">
                </div>

                <div class="conf-password">
                    <label for="confirm_password">Konfirmasi Password</label>
                    <br>
                    <input type="password" name="confirm_password" id="confirm_password">
                </div>
                <button id="submit-button" type="submit" >Register</button>
            </form>

            <div class="already-register">
                <p>Sudah memiliki akun?</p>
                <a href="/login">Masuk Sekarang</a>
            </div>
        </div>
        
    </div>
    
    <!-- footer -->
    <footer>
        <div class="follow-link">
            <p>Follow SewaBajuPedia</p>
            <div class="social-media">
                <a href="#" class="fa fa-facebook fa-2x"></a>
                <a href="#" class="fa fa-twitter fa-2x"></a>
                <a href="#" class="fa fa-instagram fa-2x"></a>
            </div>
        </div>
        <div class="copyright">
            <p>© Copyright 2021 PT. Sewa Baju Pedia</p>
        </div>
    </footer>
</body>
</html>