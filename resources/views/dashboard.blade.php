<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>

    <x-header></x-header>

    <div class="content">
        <x-sidebar></x-sidebar>


        <div class="content__list">
            @auth
                @if (auth()->user()->role == 'admin')
                    <div>
                        {{ $employees }} Employees

                    </div>
                    <div>
                        {{ $tasks }} Tasks

                    </div>

                    <div>
                        {{ $dueDate }} due today
                    </div>
                    <div>
                        {{ $noDeadline }} No deadline
                    </div>
                    <div>
                        {{ $pending }} Pending
                    </div>
                    <div>
                        {{ $inProgress }} In progress
                    </div>
                    <div>
                        {{ $completed }} Completed
                    </div>
                    <div>
                        {{ $overdue }} Overdue
                    </div>
                @endif

                @if (auth()->user()->role == 'employee')
                    <div>
                        {{ $myTasks }}My tasks
                    </div>

            
                @endif
            @endauth

        </div>
    </div>



</body>

</html>
