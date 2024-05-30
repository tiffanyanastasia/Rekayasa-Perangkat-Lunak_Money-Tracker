<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link href="{{ asset('/css/page.css') }}" rel="stylesheet">
    <style>
      .dropdown-content {
        display: none;
        position: absolute;
        right: 0;
        background-color: white;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
      }
      .dropdown:hover .dropdown-content {
        display: block;
      }
      .dropdown-content form {
        margin: 0;
      }
      .dropdown-content .btn {
        width: 100%;
        border: none;
      }
      .card-nav {
        overflow: visible;
        margin: 0;
        border: none;
      }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="card text-center card-nav">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/analysis">Analysis</a></li>
                    <li class="nav-item"><a class="nav-link" href="/wallet">Wallet</a></li>
                    @auth
                    <li class="nav-item dropdown ms-auto">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <div class="dropdown-content">
                            <form action="/logout" method="post" class="px-4 py-3">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100">Logout</button>
                            </form>
                        </div>
                    </li>
                    @endauth
                    @guest
                    <li class="nav-item ms-auto">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script src="{{ asset('js/page.js') }}"></script>
</body>
</html>
