<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/createTask.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>

<body>

    <x-header></x-header>

    <div class="content">
        <x-sidebar></x-sidebar>

        <form action="{{ route('createUser') }}" method="post">
            @csrf

            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif


            <h2>Create User</h2>

            <div class="form-element">
                <label for="full_name">Fullname</label>
                <input type="text" name="full_name">
            </div>
            <div class="form-element">
                <label for="username">Username</label>
                <input type="text" name="username" id="">
            </div>
            <div class="form-element">
                <label for="email">Email</label>
                <input type="text" name="email" id="">
            </div>
    
            <div class="form-element">
                <label for="password">Password</label>
                <input type="text" name="password" id="">
            </div>


            <input type="submit" value="Create user">

        </form>
    </div>



</body>

</html>
