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
        @foreach ($rekening as $r)
            <h3>Nama Rekening: {{ $r->nama_rekening }}</h3>
            <h3>Saldo: Rp. {{ $r->saldo }}</h3>
            <button onclick="location.href='wallet/{{ $r->id }}/edit'" type="button">
                Edit</button>
                <form action="{{ route('wallet.destroy', $r->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this rekening?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                
        @endforeach
        <br><br>
        <button onclick="location.href='/add'" type="button">
            Tambah Rekening</button>
    </div>
</body>
</html>
