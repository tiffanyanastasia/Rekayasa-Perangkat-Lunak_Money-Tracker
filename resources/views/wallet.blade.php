<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link href="{{ asset('/css/page.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .grid-fix {
        grid-template-columns: auto auto auto;
    }
</style>
<body>
    <div class="container py-5">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    @include('layouts.nav')
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content p-4">
                    <div id="wallet" class="tab-pane fade show active">
                        <div class="card card-wallet">
                            <div class="card-header header-wallet">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-danger mt-2" data-bs-toggle="modal" data-bs-target="#addwallet">
                                    <p style="margin: 0;">+ Add Wallet</p>
                                </button>
                                <!-- Add Wallet Modal -->
                                <div class="modal fade" id="addwallet" tabindex="-1" aria-labelledby="addwalletmodal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="addwalletmodal">Let's manage your money</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/add" method="post">
                                                    @csrf
                                                    <input type="hidden" name="user" value="{{ auth()->user()->id }}">
                                                    <div class="mb-3">
                                                        <label for="rekeningcategory" class="form-label">Category</label>
                                                        <input type="text" name="nama_rekening" class="form-control @error('nama_rekening') is-invalid @enderror" placeholder="NamaRekening"> <br>
                                                        @error('nama_rekening')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                        <input type="number" name="saldo" class="form-control @error('saldo') is-invalid @enderror" placeholder="Saldo"> <br>
                                                        @error('saldo')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" name="submit" value="Save">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Wallet Modal -->
                                <div class="modal fade" id="editwallet" tabindex="-1" aria-labelledby="editwalletmodal" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editwalletmodal">Edit Wallet</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editWalletForm" action="" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="user" value="{{ auth()->user()->id }}">
                                                    <div class="mb-3">
                                                        <label for="rekeningcategory" class="form-label">Category</label>
                                                        <input type="text" id="edit_nama_rekening" name="nama_rekening" class="form-control @error('nama_rekening') is-invalid @enderror">
                                                        @error('nama_rekening')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                        <input type="number" id="edit_saldo" name="saldo" class="form-control @error('saldo') is-invalid @enderror">
                                                        @error('saldo')
                                                        <div class="invalid-feedback">
                                                            {{ $message }}
                                                        </div>
                                                        @enderror
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-primary" name="submit" value="Save">
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                                @foreach ($rekening as $r)
                                
                                    <div class="card-body body-money-wallet">
                                        <div class="card wallet-wallet">
                                            <div class="card-header header-body-money-wallet">
                                                <input type="text" class="form-control" id="rekeningcategory" name="nama_rekening" placeholder="{{ $r->nama_rekening }}" readonly>
                                            </div>
                                            <div class="card-body body-body-money-wallet">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <p>Total Tabungan Rp.</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="number" class="form-control" id="totalwallet" name="saldo" placeholder="{{ number_format($r->saldo, 2, ',', '.') }}" readonly>
                                                    </div>
                                                    <div class="mt-2 edit-btn-div">
                                                        <button style="width:100px; background-color:blue;" type="button" class="btn btn-danger edit-button" onclick="toModal('{{ $r->nama_rekening }}', '{{ $r->saldo }}', '{{ $r->id }}')" data-bs-toggle="modal" data-bs-target="#editwallet">
                                                            <p style="margin: 0;">Edit</p>
                                                        </button>
                                                        <form action="{{ route('wallet.destroy', $r->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this rekening?');" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button style="width:100px; background-color: red;" type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                @endforeach
                            
                        </div> <!-- end card-wallet -->
                    </div> <!-- end wallet tab-pane -->
                </div> <!-- end tab-content -->
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div> <!-- end container -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGFyyQsI1Hk/hk7LrZl9zTztJW5bQu5HjxN/CPNP5JX4" crossorigin="anonymous"></script>

    <script type="text/javascript">
        function toModal(nama_rekening, saldo, id) {
            $('#edit_nama_rekening').val(nama_rekening);
            $('#edit_saldo').val(saldo);
            $('#editWalletForm').attr('action', '/wallet/' + id + '/edit');
        }
    </script>
</body>
</html>