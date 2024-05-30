<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Money | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Include your navbar layout -->
    @include('layouts.nav')
</head>
<body>
    <!-- File: resources/views/analysis.blade.php -->
    <table>
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Kategori ID</th>
                <th>Total Kategori</th>
                <th>Persentase</th>
            </tr>
        </thead>
        <tbody>
            @foreach($total as $item)
                <tr>
                    <td>{{ $item->month }}</td>
                    <td>{{ optional($item->kategori)->NamaKategori ?? 'Kategori Tidak Ditemukan' }}</td>
                    <td>{{ $item->total_kategori }}</td>
                    <td>{{ number_format($item->percentage, 2) }}%</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
