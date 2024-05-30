<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>expense</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"> 
    <link href="{{ asset('/css/income.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container py-5">
        <div class="card text-center">
            <div class="card-header">
                <ul class="nav nav-tabs card-header-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#budgeteer" data-bs-toggle="tab">PENGELUARAN</a></li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content p-4">
                    <div id="budgeteer" class="active tab-pane fade in show">
                        <form class="expenseForm" action="/pengeluaran/{{ $pengeluaran->id }}/edit" method="POST" onsubmit="addExpense(); return false;">
                            @csrf
                            <input type="hidden" name="user" value="{{ auth()->user()->id }}">
                            <input type="hidden" id="jumlahawal" name="jumlahawal" value="{{ $pengeluaran->jumlah }}">  
                            <div class="mb-3">
                                <label for="chooseexpense" class="form-label">Expense's Category</label>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-10 my-4">
                                    <div class="card img-card" data-name="Food">
                                        <img src="{{ asset('photo/food.png') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <input type="radio" name="Kategori_id" value="1" class="form-check-input">
                                            <h2 class="card-title">FOOD</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-10 my-4">
                                    <div class="card img-card" data-name="Education">
                                        <img src="{{ asset('photo/edu.png') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <input type="radio" name="Kategori_id" value="2" class="form-check-input">
                                            <h2 class="card-title">EDUCATION</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-10 my-4">
                                    <div class="card img-card" data-name="Traffic">
                                        <img src="{{ asset('photo/traffic.png') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <input type="radio" name="Kategori_id" value="3" class="form-check-input">
                                            <h2 class="card-title">TRAFFIC</h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-10 my-4">
                                    <div class="card img-card" data-name="Daily">
                                        <img src="{{ asset('photo/daily.png') }}" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <input type="radio" name="Kategori_id" value="4" class="form-check-input">
                                            <h2 class="card-title">DAILY</h2>
                                        </div>
                                    </div>
                                </div>
                                <select name="rekening" id="rekening">
                                    @foreach ($rekening as $r)
                                    <option value="{{ $r->id }}" {{ $r->id == $pengeluaran->rekening_id ? 'selected' : '' }}>{{ $r->nama_rekening }}</option>
                                    @endforeach
                                </select><br>
                            </div>
                            <div class="mb-3">
                                <label for="number" class="form-label">Expenses</label>
                                <input type="number" class="form-control" id="nominal" name="jumlah" value="{{ $pengeluaran->jumlah }}">
                            </div>
                            <input type="submit" class="btn btn-success btn-block" name="submit" value="Save">
                        </form>
                        <div class="buttonback">
                            <input type="button" class="btn btn-secondary btn-block" value="Back" onclick="confirmBack();">
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </div>   

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy'
            });
        
            $('.img-card').click(function () {
                var radio = $(this).find('input[type="radio"]');
                radio.prop('checked', true);
                $('.img-card').removeClass('selected');
                $(this).addClass('selected');
            });
        
            $('.expenseForm').submit(function (event) {
                alert('Expense saved!');
            });
        });

        function confirmBack() {
            if (confirm("Are you sure you want to go back? Your expense won't be saved.")) {
                window.location.href = '/';
            }
        }

        function addExpense() {
            const expenseAmount = parseFloat(document.getElementById('nominal').value) || 0;
            const expenseCategory = document.querySelector('input[name="Kategori_id"]:checked');
            const expenseDate = document.getElementById('expenseDate').value;

            if (expenseAmount > 0 && expenseCategory && expenseDate) {
                const expenseData = {
                    category: expenseCategory.nextElementSibling.textContent,
                    amount: expenseAmount
                };

                // Store expense data in localStorage
                localStorage.setItem('expenseData', JSON.stringify(expenseData));

                alert('Expense saved!');
                // Redirect to page.html
                window.location.href = 'page.html';
            } else {
                alert('Please fill in all fields.');
            }
        }
    </script>
</body>
</html>
