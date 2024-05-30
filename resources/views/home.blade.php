<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>landingpage</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link href="{{ asset('/css/page.css') }}" rel="stylesheet">
    <script>
        function showSection() {
            var selectedValue = document.getElementById('input').value;
            document.getElementById('pemasukanSection').style.display = selectedValue === 'Pemasukan' ? 'block' : 'none';
            document.getElementById('pengeluaranSection').style.display = selectedValue === 'Pengeluaran' ? 'block' : 'none';
        }
    </script>
</head>

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
                    <div id="budgeteer" class="active tab-pane fade in show">
                        <div class="font">
                        <h2>Delve into Wealth Wonders with BUDGETEER</h2>
                        </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="col-sm-4">
                                    </div>
                                    <div class="form row">
                                        <div class="form-group col-md-6">
                                            <label for="inputTotal">Total</label>
                                            <input type="number" class="form-control" id="inputTotal"  value= {{ $total }} readonly step="1000">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputIncome">Income</label>
                                            <input type="number" class="form-control" id="inputIncome" value={{ $jumlahpengeluaran }} readonly >
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="inputExpense">Expense</label>
                                            <input type="number" class="form-control" id="inputExpense" value={{ $jumlahpemasukan }} readonly>
                                        </div>
                                        <div class="form-group col-md-12 mt-3">
                                            <button class="btn btn-danger" onclick="location.href='/pemasukan'">Add Income</button>
                                            <button class="btn btn-danger" onclick="location.href='/pengeluaran'">Add Expense</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header custom-header">
                                    <div class="mt-3">
                                        <select name="input" id="input" onchange="showSection()" class="form-select">
                                            <option value="Pemasukan">Pemasukan</option>
                                            <option value="Pengeluaran">Pengeluaran</option>
                                        </select>
                                    </div>
                            
                                </div>
                                <div class="card-body">
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
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
</body>
</html>
