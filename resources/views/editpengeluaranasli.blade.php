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
    <div class="container mt-5">
        <h1>Edit Pengeluaran</h1>
        <form action="/pengeluaran/{{ $pengeluaran->id }}/edit" method="post">
            @csrf
            <input type="hidden" name="user" value="{{ auth()->user()->id }}">
            <input type="hidden" id="jumlahawal" name="jumlahawal" value="{{ $pengeluaran->jumlah }}">

            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" value="{{ $pengeluaran->jumlah }}">
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label><br>
                @foreach ($kategori as $k)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="Kategori_id" id="kategori{{ $k->id }}" value="{{ $k->id }}" {{ $k->id == $pengeluaran->kategori_id ? 'checked' : '' }}>
                        <label class="form-check-label" for="kategori{{ $k->id }}">{{ $k->NamaKategori }}</label>
                    </div>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="rekening" class="form-label">Rekening</label>
                <select class="form-select" id="rekening" name="rekening">
                    @foreach ($rekening as $r)
                        <option value="{{ $r->id }}" {{ $r->id == $pengeluaran->rekening_id ? 'selected' : '' }}>{{ $r->nama_rekening }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+J1lwF0vn60PYhAJ1RrBxAGpJdKaT" crossorigin="anonymous"></script>
</body>
</html>
