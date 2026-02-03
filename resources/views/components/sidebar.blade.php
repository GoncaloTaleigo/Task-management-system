<aside>
    <img src="{{ asset('images/icons8-profile-32.png') }}" alt="">

    <ul>
        @auth

            @if (auth()->user()->role === 'admin')
                <li><img src="{{ asset('images/dashboard.png') }}" alt=""><a
                        href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li><a href="{{ route('manageUsers') }}">Manage users</a></li>
                <li><a href="{{ route('createTask') }}">Create task</a></li>
                <li><a href="{{ route('tasks') }}">All tasks</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>
            @endif


        @endauth
    </ul>

</aside>
