<!DOCTYPE html>
<html>

<head>
    <title>Blog App</title>
</head>

<body>
    <nav>
        @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        @else
            <p>Logged in as {{ Auth::user()->name }}</p>
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                Logout
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endguest
    </nav>

    @yield('content')
</body>

</html>