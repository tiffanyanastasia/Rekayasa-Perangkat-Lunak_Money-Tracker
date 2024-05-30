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
    <h1>{{ $jenis }}</h1>
    <form action="/{{ $route }}" method="post">
        @csrf
        <input type="hidden" name="user" value="{{ auth()->user()->id }}">
        <input type="text" name="jumlah" placeholder="Jumlah"> <br>
        @foreach ($kategori as $kategori)
            <input type="radio" name="Kategori_id" value="{{ $kategori->id }}">{{ $kategori->NamaKategori }}
        @endforeach
        <br>
        <select name="rekening" id="rekening">
            @foreach ($rekening as $r)
                <option value="{{ $r->id }}">{{ $r->nama_rekening }}</option>
            @endforeach
        </select><br>
        
        <input type="submit" name="submit" value="Save">
    </form>
    @if ( $jenis == "pengeluaran")
        @if (session()->has('saldotakcukup'))
            {{ session('loginerror') }}
        @endif
    @endif
</body>
</html>
