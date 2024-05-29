<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOney | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include your navbar layout -->
    @include('layouts.nav')
</head>
<body>
    <h1>Login</h1>
    <form action="/login" method="post">
        @csrf
        <input type="text" name="name" placeholder="Username"> <br>
        <input type="password" name="password" placeholder="Password"> <br>
        <input type="submit" name="submit" value="Login">
    </form>
        <a href="/register">Create Account</a><br>
    @if (session()->has('loginerror'))
        {{ session('loginerror') }}
    @endif
</body>
</html>
