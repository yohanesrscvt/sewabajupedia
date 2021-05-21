<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delele Akun</title>
</head>
<body>
    <form action="/profile/delete/execution" method="post">
        @csrf
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" required>
        <br><br>
        <label for="confirm_password">Confirm Password</label><br>
        <input type="password" name="confirm_password" id="confirm_password" required>
        <br><br>
        <input type="submit" value="Delete Profile">
    </form>
</body>
</html>