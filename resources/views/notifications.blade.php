<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/manageUsers.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>

<body>

    <x-header></x-header>

    <div class="content">
        <x-sidebar></x-sidebar>

        @foreach (auth()->user()->unreadNotifications as $notification)
            <div>
                {{ $notification->data['description'] }}
                <strong>{{ $notification->data['title'] }}</strong>
            </div>
        @endforeach



    </div>



</body>

</html>
