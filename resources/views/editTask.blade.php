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

        <form action="{{ route('tasks.update', $task) }}" method="post">
            @csrf
            @method('PUT')
            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif


            <h2>Edit user</h2>

            <div class="form-element">
                <label for="full_name">Full name</label>
                {{-- <input type="text" name="full_name" value="{{ old('full_name', $user->full_name) }}"> --}}
            </div>
            <div class="form-element">
                <label for="username">Username</label>
                {{-- <input type="text" name="username" value="{{ old('full_name', $user->username) }}"> --}}
            </div>
            <div class="form-element">
                <label for="password">Password</label>
                <input type="password" name="password" id="">
            </div>

            <input type="submit" value="Update">

        </form>
    </div>



</body>

</html>
