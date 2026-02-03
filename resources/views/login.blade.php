<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>

    <div class="login-container">
        <h1>LOGIN</h1>
        <form action="/login" method="post">
            @csrf
            <div class="form-element">
                <label for="">User Name</label>
                <input type="text" name="username">
            </div>
            <div class="form-element">
                <label for="password">Password</label>
                <input type="password" name="password">
            </div>
            <input type="submit" value="Login">
        </form>
    </div>

</body>

</html>
