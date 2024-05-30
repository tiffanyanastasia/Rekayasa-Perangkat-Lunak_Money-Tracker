<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengeluaran;
use App\Models\Pemasukan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class analysis extends Controller
{
    public function index(){
        // Mendapatkan total per kategori per bulan
        $user_id = auth()->user()->id;

$total = Pengeluaran::select(
        DB::raw('MONTH(created_at) as month'),
        'Kategori_id',
        DB::raw('SUM(jumlah) as total_kategori')
    )
    ->where('user', $user_id)
    ->groupBy('month', 'kategori_id')
    ->with('kategori')
    ->get();

    
        // Mendapatkan total pengeluaran
        $pengeluaran = DB::table('pengeluarans')->where('user', $user_id)->sum('jumlah');

$total2 = Pemasukan::select(
        DB::raw('MONTH(created_at) as month'),
        'Kategori_id',
        DB::raw('SUM(jumlah) as total_kategori')
    )
    ->where('user', $user_id)
    ->groupBy('month', 'kategori_id')
    ->with('kategori')
    ->get();

    
        // Mendapatkan total pengeluaran
        $pemasukan = DB::table('pemasukans')->where('user', $user_id)->sum('jumlah');
    
        // Perhitungan untuk setiap item dalam total
        foreach ($total as $item) {
            $item->percentage = ($item->total_kategori * 100) / $pengeluaran;
        }

        foreach ($total2 as $item2) {
            $item2->percentage = ($item2->total_kategori * 100) / $pemasukan;
        }
    
        // Mengirim data ke view
        return view('analysis', compact('total', 'pengeluaran', 'total2', 'pemasukan'));
    }
    
}
