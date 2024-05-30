<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOney | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include your navbar layout -->
    @include('layouts.nav')
</head>
<body>
    <h1>Register</h1>
    <form action="/register" method="post">
        @csrf
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Username"> <br>
        @error('name') 
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email"> <br>
        @error('email') 
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password"> <br>
        @error('password') 
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <input type="submit" name="submit" value="Save">
    </form>
</body>
</html>
