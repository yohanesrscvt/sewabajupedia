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
    <img src="" alt="User Profile Image"><br>
    <p>Saldo: null</p><br>

    <!-- change role -->
    <select name="role" id="role" onchange="location = this.value;" autofocus>
        <option value="">Agent</option>
        <option value="/set_customer">Customer</option>
    </select><br>

    <a href="">My Account</a><br>
    <a href="/logout">Logout</a>
</body>
</html>