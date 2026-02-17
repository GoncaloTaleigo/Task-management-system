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


        
        
        @auth
        @if (auth()->user()->role == 'admin')
        <a href="{{ route('createTask') }}">Create Task</a>
        <div class="filters">
            <a href="{{ route('tasks', ['filter' => 'all']) }}">All Tasks</a>
            <a href="{{ route('tasks', ['filter' => 'today']) }}">Due Today</a>
            <a href="{{ route('tasks', ['filter' => 'overdue']) }}">Overdue</a>
            <a href="{{ route('tasks', ['filter' => 'no-deadline']) }}">No Deadline</a>
        </div>
                <table>
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Assigned to</th>
                        <th>Due date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </thead>

                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->assigned_to }}</td>
                                <td>{{ $task->due_date }}</td>
                                <td>{{ $task->status }}</td>
                                <td>
                                    <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                                    <form action="{{ route('tasks.delete', $task->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" onclick="return confirm('Delete this user?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @elseif (auth()->user()->role == 'employee')
                <table>
                    <thead>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Due date</th>
                        <th>Action</th>
                    </thead>

                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->title }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->status }}</td>
                                <td>{{ $task->due_date }}</td>
                                <td>
                                    <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            @endif

        @endauth
    </div>



</body>

</html>
