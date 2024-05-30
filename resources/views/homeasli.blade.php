<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOney | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include your navbar layout -->
    @include('layouts.nav')
    <script>
        function showSection() {
            var selectedValue = document.getElementById('input').value;
            document.getElementById('pemasukanSection').style.display = selectedValue === 'Pemasukan' ? 'block' : 'none';
            document.getElementById('pengeluaranSection').style.display = selectedValue === 'Pengeluaran' ? 'block' : 'none';
        }
    </script>
</head>
<body>
    <!-- Your page content goes here -->
    <div class="container mt-4">
        <h6>Pemasukan: Rp. {{ $jumlahpemasukan }}</h6>
        <h6>Pengeluaran: Rp. {{ $jumlahpengeluaran }}</h6>
        <h6>Total: Rp. {{ $total }}</h6>

        <div class="mt-3">
            <button onclick="location.href='/pemasukan'" type="button" class="btn btn-primary">Pemasukan</button>
            <button onclick="location.href='/pengeluaran'" type="button" class="btn btn-secondary">Pengeluaran</button>
        </div>

        <div class="mt-3">
            <select name="input" id="input" onchange="showSection()" class="form-select">
                <option value="Pemasukan">Pemasukan</option>
                <option value="Pengeluaran">Pengeluaran</option>
            </select>
        </div>

        <div id="pemasukanSection" class="mt-4" style="display: none;">
            @foreach ($pemasukan as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ optional($item->kategori)->NamaKategori ?? 'Kategori Tidak Ditemukan' }}</h5>
                        <p class="card-text">Jumlah: Rp. {{ $item->jumlah }}</p>
                        <button onclick="location.href='/pemasukan/{{ $item->id }}/edit'" type="button" class="btn btn-warning">Edit</button>
                        <form action="/pemasukan/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div id="pengeluaranSection" class="mt-4" style="display: none;">
            @foreach ($pengeluaran as $item)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">{{ optional($item->kategori)->NamaKategori ?? 'Kategori Tidak Ditemukan' }}</h5>
                        <p class="card-text">Jumlah: Rp. {{ $item->jumlah }}</p>
                        <button onclick="location.href='/pengeluaran/{{ $item->id }}/edit'" type="button" class="btn btn-warning">Edit</button>
                        <form action="/pengeluaran/{{ $item->id }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-qL3o7F2VqvY2P7XT8V4htyplJo5XoaRRjFsttL30odqF6U8A1FfPyIBuO5RPc5O3" crossorigin="anonymous"></script>
</body>
</html>
