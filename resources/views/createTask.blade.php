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

        <form action="/createTask" method="post">
            @csrf

            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif


            <h2>Create task</h2>

            <div class="form-element">
                <label for="title">Title</label>
                <input type="text" name="title">
            </div>
            <div class="form-element">
                <label for="description">Description</label>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div class="form-element">
                <label for="due_date">Due date</label>
                <input type="date" name="due_date" id="">
            </div>
            <div class="form-element">
                <label for="assigned_to">Assigned to</label>
                <select name="assigned_to" id="">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->full_name }}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Create task">

        </form>
    </div>



</body>

</html>
