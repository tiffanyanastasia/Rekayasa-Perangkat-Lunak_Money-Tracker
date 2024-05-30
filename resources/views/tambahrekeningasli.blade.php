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
    <h1>Tambah Rekening</h1>
    <form action="/add" method="post">
        @csrf
        <input type="hidden" name="user" value="{{ auth()->user()->id }}">
        <input type="text" name="nama_rekening" class="form-control @error  ('nama_rekening') is-invalid @enderror" placeholder="NamaRekening"> <br>
        @error('nama_rekening')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <input type="number" name="saldo" class="form-control @error  ('saldo') is-invalid @enderror" placeholder="Saldo"> <br>
        @error('saldo')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
        <input type="submit" name="submit" value="Save">
    </form>
</body>
</html>
