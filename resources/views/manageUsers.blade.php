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


        <table>
            <thead>
                <th>#</th>
                <th>Full name</th>
                <th>Username</th>
                <th>Role</th>
                <th>Actions</th>
            </thead>

            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->full_name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}">Edit</a>
                            <form action="{{ route('users.delete', $user->id) }}" method="POST"
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
    </div>



</body>

</html>
