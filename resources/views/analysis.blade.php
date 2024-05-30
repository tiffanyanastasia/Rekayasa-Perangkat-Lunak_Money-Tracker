<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>landingpage</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist/css/bootstrap.min.css">
    <link href="{{ asset('/css/page.css') }}" rel="stylesheet">
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
                    <div id="analytic">
                        <div class="card">
                            <div class="card-header income-header">
                                <h2>Income Analytic</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="card col-6 chart">
                                        <div class="chartBox">
                                        <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                    <div class="card col-6 chart">
                                        <div class="card income-analytic">
                                            <div class="row">
                                                <div class="col-sm income-dashboard">
                                                    <img src="photo/Family.png" class="img-fluid" alt="...">
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="percentage" name="percentage" min="0" max="100" step="0.01"  placeholder="{{ $total2->firstWhere('Kategori_id', 5) ? number_format($total2->firstWhere('Kategori_id', 5)->percentage, 2) : '0' }}"  readonly>
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="incomemoney" name="incomemoney" min="0" max="100" step="0.01" placeholder="{{ $total2->firstwhere('Kategori_id', 5)->total_kategori ?? '0' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card income-analytic">
                                            <div class="row">
                                                <div class="col-sm income-dashboard">
                                                    <img src="photo/wage.png" class="img-fluid" alt="...">
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="percentage" name="percentage" min="0" max="100" step="0.01" placeholder="{{ $total2->firstWhere('Kategori_id', 6) ? number_format($total2->firstWhere('Kategori_id', 6)->percentage, 2) : '0' }}"  readonly>
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="incomemoney" name="incomemoney" min="0" max="100" step="0.01" placeholder="{{ $total2->firstwhere('Kategori_id', 6)->total_kategori ?? '0' }}" readonly>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="card income-analytic">
                                            <div class="row">
                                                <div class="col-sm income-dashboard">
                                                    <img src="photo/bonus.png" class="img-fluid" alt="...">
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="percentage" name="percentage" min="0" max="100" step="0.01" placeholder="{{ $total2->firstWhere('Kategori_id', 7) ? number_format($total2->firstWhere('Kategori_id', 7)->percentage, 2) : '0' }}"  readonly>
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="incomemoney" name="incomemoney" min="0" max="100" step="0.01" placeholder="{{ $total2->firstwhere('Kategori_id', 7)->total_kategori ?? '0' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card income-analytic">
                                            <div class="row">
                                                <div class="col-sm income-dashboard">
                                                    <img src="photo/Parttime.png" class="img-fluid" alt="...">
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="percentage" name="percentage" min="0" max="100" step="0.01" placeholder="{{ $total2->firstWhere('Kategori_id', 8) ? number_format($total2->firstWhere('Kategori_id', 8)->percentage, 2) : '0' }}"  readonly>
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="incomemoney" name="incomemoney" min="0" max="100" step="0.01" placeholder="{{ $total2->firstwhere('Kategori_id', 8)->total_kategori ?? '0' }}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer income-footer"></div>
                        </div>
                        <div class="card">
                            <div class="card-header income-header">
                                <h2>Expenses Analytic</h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="card col-6 chart">
                                        <div class="chartBox">
                                        <canvas id="myChart1"></canvas>
                                        </div>
                                    </div>
                                    <div class="card col-6 chart">
                                        <div class="card income-analytic">
                                            <div class="row">
                                                <div class="col-sm income-dashboard">
                                                    <img src="photo/food.png" class="img-fluid" alt="...">
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="expensepercentage" name="expensepercentage" min="0" max="100" step="0.01" placeholder="{{ $total->firstWhere('Kategori_id', 1) ? number_format($total->firstWhere('Kategori_id', 1)->percentage, 2) : '0' }}" readonly>
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="expensesmoney" name="expensesmoney" min="0" max="100" step="0.01" placeholder="{{ $total->firstwhere('Kategori_id', 1)->total_kategori ?? '0'}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card income-analytic">
                                            <div class="row">
                                                <div class="col-sm income-dashboard">
                                                    <img src="photo/edu.png" class="img-fluid" alt="...">
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="expensepercentage" name="expensepercentage" min="0" max="100" step="0.01" placeholder="{{ $total->firstWhere('Kategori_id', 2) ? number_format($total->firstWhere('Kategori_id', 2)->percentage, 2) : '0' }}" readonly>
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="expenseincomemoney" name="expensemoney" min="0" max="100" step="0.01" placeholder="{{ $total->firstwhere('Kategori_id', 2)->total_kategori ?? '0' }}" readonly>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="card income-analytic">
                                            <div class="row">
                                                <div class="col-sm income-dashboard">
                                                    <img src="photo/traffic.png" class="img-fluid" alt="...">
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="expensepercentage" name="expensepercentage" min="0" max="100" step="0.01" placeholder="{{ $total->firstWhere('Kategori_id', 3) ? number_format($total->firstWhere('Kategori_id', 3)->percentage, 2) : '0' }}" readonly>
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="expensemoney" name="expensemoney" min="0" max="100" step="0.01"placeholder="{{ $total->firstwhere('Kategori_id', 3)->total_kategori ?? '0'}}" readonly>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="card income-analytic">
                                            <div class="row">
                                                <div class="col-sm income-dashboard">
                                                    <img src="photo/daily.png" class="img-fluid" alt="...">
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="expensepercentage" name="expensepercentage" min="0" max="100" step="0.01" placeholder="{{ $total->firstWhere('Kategori_id', 4) ? number_format($total->firstWhere('Kategori_id', 4)->percentage, 2) : '0' }}" readonly>
                                                </div>
                                                <div class="col-sm income-dashboard">
                                                    <input type="number" id="expensemoney" name="expensemoney" min="0" max="100" step="0.01" placeholder="{{ $total->firstwhere('Kategori_id', 4)->total_kategori ?? '0'}}" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer income-footer"></div>
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
    <script>
        // Income analytic data
        const data = {
    labels: ['Family', 'Wage', 'Bonus', 'Part Time'],
    datasets: [{
        label: 'Income total',
        data: [
            {{ $total2->firstWhere('Kategori_id', 5) ? number_format($total2->firstWhere('Kategori_id', 5)->percentage, 2) : '0' }},
            {{ $total2->firstWhere('Kategori_id', 6) ? number_format($total2->firstWhere('Kategori_id', 6)->percentage, 2) : '0' }},
            {{ $total2->firstWhere('Kategori_id', 7) ? number_format($total2->firstWhere('Kategori_id', 7)->percentage, 2) : '0' }},
            {{ $total2->firstWhere('Kategori_id', 8) ? number_format($total2->firstWhere('Kategori_id', 8)->percentage, 2) : '0' }}
        ],
        backgroundColor: ['#0D9276', '#FC7D36', '#75FC36', '#4262A0'],
        borderWidth: 2,
        cutout: '60%',
        image: ['img1.png', 'img2.png', 'img3.png', 'img4.png'] // Provide the image URLs
    }]
};

const segmentImage = {
    id: 'segmentImage',
    afterDatasetDraw(chart, args, plugins) {
        const { ctx } = chart;
        const angle = Math.PI / 180;
        const width = 50; // Adjust the width as needed

        ctx.save();
        chart.getDatasetMeta(0).data.forEach((datapoint, index) => {
            const image = new Image();
            image.src = data.datasets[0].image[index];
            const x = datapoint.tooltipPosition().x;
            const y = datapoint.tooltipPosition().y;

            ctx.beginPath();
            ctx.arc(x, y, width / 2, 0, angle * 360, false);
            ctx.fillStyle = 'transparent';
            ctx.fill();

            ctx.drawImage(image, x - width / 2, y - width / 2, width, width);
        });

        ctx.restore();
    }
};

const config = {
    type: 'doughnut',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false, // Ensure the chart maintains the aspect ratio
    },
    plugins: [segmentImage]
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);

// Expense analytic data
const data1 = {
    labels: ['Food', 'Education', 'Traffic', 'Daily'],
    datasets: [{
        label: 'Expenses total',
        data: [
            {{ $total->firstWhere('Kategori_id', 1) ? number_format($total->firstWhere('Kategori_id', 1)->percentage, 2) : '0' }},
            {{ $total->firstWhere('Kategori_id', 2) ? number_format($total->firstWhere('Kategori_id', 2)->percentage, 2) : '0' }},
            {{ $total->firstWhere('Kategori_id', 3) ? number_format($total->firstWhere('Kategori_id', 3)->percentage, 2) : '0' }},
            {{ $total->firstWhere('Kategori_id', 4) ? number_format($total->firstWhere('Kategori_id', 4)->percentage, 2) : '0' }}
        ],
        backgroundColor: ['#0D9276', '#FC7D36', '#75FC36', '#4262A0'],
        borderWidth: 2,
        cutout: '60%',
        image1: ['img1.png', 'img2.png', 'img3.png', 'img4.png'] // Provide the image URLs
    }]
};

const segmentImage1 = {
    id: 'segmentImage1',
    afterDatasetDraw(chart, args, plugins) {
        const { ctx } = chart;
        const angle = Math.PI / 180;
        const width = 50; // Adjust the width as needed

        ctx.save();
        chart.getDatasetMeta(0).data.forEach((datapoint, index) => {
            const image1 = new Image();
            image1.src = data1.datasets[0].image1[index];
            const x = datapoint.tooltipPosition().x;
            const y = datapoint.tooltipPosition().y;

            ctx.beginPath();
            ctx.arc(x, y, width / 2, 0, angle * 360, false);
            ctx.fillStyle = 'transparent';
            ctx.fill();

            ctx.drawImage(image1, x - width / 2, y - width / 2, width, width);
        });

        ctx.restore();
    }
};

const config1 = {
    type: 'doughnut',
    data: data1,
    options: {
        responsive: true,
        maintainAspectRatio: false, // Ensure the chart maintains the aspect ratio
    },
    plugins: [segmentImage1]
};

const myChart1 = new Chart(
    document.getElementById('myChart1'),
    config1
);

    </script>
</body>
</html>

the chart gone please fix it