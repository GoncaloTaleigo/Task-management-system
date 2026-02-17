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

        @auth
            @if (auth()->user()->role=="admin")
            <form action="{{ route('tasks.update', $task) }}" method="post">
                @csrf
                @method('PUT')
    
                @if (session('success'))
                    <div class="success">
                        {{ session('success') }}
                    </div>
                @endif
    
                <h2>Edit task</h2>
    
                <div class="form-element">
                    <label for="title">Title</label>
                    <input type="text" name="title" value="{{ old('title', $task->title) }}">
                </div>
                <div class="form-element">
                    <label for="description">Description</label>
                    <textarea name="description" id="" cols="30" rows="10"
                        value="{{ old('description', $task->description) }}"></textarea>
                </div>
                <div class="form-element">
                    <label for="due_date">Due date</label>
                    <input type="date" name="due_date" id="" value="{{ old('due_date', $task->due_date) }}">
                </div>
                <div class="form-element">
                    <label for="assigned_to">Assigned to</label>
                    <select name="assigned_to" id="">
                        @foreach ($employees as $employee)
                            <option value="{{ $employee->id }}"
                                {{ old('assigned_to', $task->assigned_to) == $employee->id ? 'selected' : '' }}>
                                {{ $employee->full_name }}</option>
                        @endforeach
                    </select>
                </div>
    
                <input type="submit" value="Update task">
    
            </form>

            @elseif (auth()->user()->role=="employee")
                <form action="{{ route('tasks.update', $task) }}" method="post">
                @csrf
                @method('PUT')
    
                @if (session('success'))
                    <div class="success">
                        {{ session('success') }}
                    </div>
                @endif
    
                <h2>Edit task</h2>

                <p>Title: {{ old('title', $task->title) }}</p>
                <p>description: {{ old('title', $task->description) }}</p>
    
          
                <div class="form-element">
                    <label for="status">Status</label>
                    <select name="status" id="">
                       <option value="pending">Pending</option>
                       <option value="in progress">In progress</option>
                       <option value="Completed">Completed</option>
                    </select>
                </div>
    
                <input type="submit" value="Update task">
    
            </form>
                
            @endif
        @endauth

    </div>



</body>

</html>
