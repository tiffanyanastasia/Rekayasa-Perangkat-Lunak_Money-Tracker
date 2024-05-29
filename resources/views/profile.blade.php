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
    <!-- Your page content goes here -->
    <div>
        @if($User && count($User) > 0)
            @foreach ($User as $user)
                <h3>Nama: {{ $user->name }}</h3>
            @endforeach
        @else
            <p>No users found.</p>
        @endif
    </div>
</body>
</html>
