<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Budgeteer</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link href="{{ asset('/css/login.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form id="loginForm" class="form-login" action="/login" method="post">
            @csrf
            <h1>WELCOME to BUDGETEER</h1>
            <div class="form-group">
                <p>Username</p>
                <input type="text" id="name" class="form-control" name="name" placeholder="Username">
            </div>
            <div class="form-group">
                <p>Password</p>
                <input type="password" class="form-control" name="password" placeholder="Password">
                @if (session()->has('loginerror'))
                {{ session('loginerror') }}
                @endif
            </div>
            <input type="submit" class="btn btn-success btn-block" name="submit" value="Log in">
            <div class="submit-register">
                <p>Not on Budgeteer yet?</p>
                <input type="button" class="btn btn-outline-success btn-block" name="signup" value="Sign Up" onclick="window.location.href='/register'">
            </div>
        </form>
    </div>

    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('loginForm').addEventListener('submit', function(event) {
            // Ambil nilai username dari form
            var username = document.getElementById('username').value;
            // Simpan username di local storage
            localStorage.setItem('username', username);
            // Arahkan pengguna ke halaman dashboard
            window.location.href = 'page.html';
            // Hindari pengiriman form secara default
            event.preventDefault();
        });
    </script>
</body>
</html>
