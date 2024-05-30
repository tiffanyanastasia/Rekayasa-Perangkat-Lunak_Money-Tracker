<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Budgeteer</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link href="{{ asset('/css/register.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form class="form-signup" action="/register" method="post">
            @csrf
            <h1>WELCOME to BUDGETEER</h1>
            <div class="form-group" >
                <p>Username</p>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <p>Email</p>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="">
            </div>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <div class="form-group">
                <p>Password</p>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="">
            </div>
            @error('password')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <input type="submit" class="btn btn-success btn-block" name="submit" value="Sign Up">
            <div class="submit-login">
                <p>Already have an account?</p>
                <input type="button" class="btn btn-outline-success btn-block" name="Login" value="Log in" onclick="window.location.href='/login'">
            </div>
        </form>
    </div>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>