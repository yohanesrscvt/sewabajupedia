<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- prevent back button -->
    <script type="text/javascript">
        function preventBack(){
            window.history.forward();
        }
        setTimeout(() => {
            preventBack()
        }, 0);
        window.onunload = function(){null};
    </script>
    <!-- header and footer css -->
    <link rel="stylesheet" href="{{ asset('css/header.css')}}">
    <link rel="stylesheet" href="{{ asset('css/footer.css')}}">
    <!-- external sources -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- header -->
    <header>
        <h1>SewaBajuPedia</h1>
        <p>Situs penyewa baju no.1 di Indonesia</p>
    </header>

    <!-- content -->
    @yield('content')

    <!-- footer -->
    <footer>
        <div class="follow-link">
            <p>Follow SewaBajuPedia</p>
            <div class="social-media">
                <a href="/maintenance" class="fa fa-facebook fa-2x"></a>
                <a href="/maintenance" class="fa fa-twitter fa-2x"></a>
                <a href="/maintenance" class="fa fa-instagram fa-2x"></a>
            </div>
        </div>
        <div class="copyright">
            <p>© Copyright 2021 PT. Sewa Baju Pedia</p>
        </div>
    </footer>
</body>
</html>