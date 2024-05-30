<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MOney | Edit Rekening</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include your navbar layout -->
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>Edit Rekening</h2>
                    </div>
                    <div class="card-body">
                        <form action="/wallet/{{ $rekening->id }}/edit" method="post">
                            @csrf
                            <input type="hidden" name="user" value="{{ auth()->user()->id }}">
                            <div class="mb-3">
                                <label for="nama_rekening" class="form-label">Category</label>
                                <input type="text" id="nama_rekening" name="nama_rekening" class="form-control @error('nama_rekening') is-invalid @enderror" placeholder="NamaRekening" value="{{ $rekening->nama_rekening }}">
                                @error('nama_rekening')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="saldo" class="form-label">Saldo</label>
                                <input type="number" id="saldo" name="saldo" class="form-control @error('saldo') is-invalid @enderror" placeholder="Saldo" value="{{ $rekening->saldo }}">
                                @error('saldo')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
