<?php

namespace App\Http\Controllers;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;

class Home extends Controller
{
    public function index(){
        $jumlahpemasukan = DB::table('pemasukans')
        ->where('user', auth()->user()->id)
        ->sum('jumlah');
        $jumlahpengeluaran = DB::table('pengeluarans')
        ->where('user', auth()->user()->id)
        ->sum('jumlah');
        $saldo = DB::table('rekenings')->sum('saldo');
        $total = $saldo - $jumlahpengeluaran;
        $pemasukan = Pemasukan::where('user', auth()->user()->id)->get();
        $pengeluaran = Pengeluaran::where('user', auth()->user()->id)->get();
        return(view('home',compact(['jumlahpemasukan', 'jumlahpengeluaran', 'total', 'pengeluaran', 'pemasukan'])));
    }
}
