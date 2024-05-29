<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar with Dropdown</title>
  <!-- Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">MOney</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/analysis">Analysis</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/wallet">Wallet</a>
          </li>
        </ul>

        <ul class="navbar-nav ms-auto">
          @auth
              {{ auth()->user()->name }}
              <form action="/logout" method="post">
                @csrf
                <button type="submit"> Logout</button>
              </form>
          @endauth
          @guest
          <li class="nav-item">
            <a class="nav-link" href="/login">Login</a>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
