<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Connexa</title>
</head>
<body>
    <h1>Welcome, {{ Auth::user()->name }}</h1>
    <p>You are now logged in!</p>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>