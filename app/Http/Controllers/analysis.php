<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Pengeluaran;
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
    
        // Perhitungan untuk setiap item dalam total
        foreach ($total as $item) {
            $item->percentage = ($item->total_kategori * 100) / $pengeluaran;
        }
    
        // Mengirim data ke view
        return view('analysis', compact('total', 'pengeluaran'));
    }
    
}
