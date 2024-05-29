<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Rekening;
use App\Http\Requests\StorePemasukanRequest;
use App\Http\Requests\UpdatePemasukanRequest;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class PemasukanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekening = Rekening::where('user', auth()->user()->id)->get();
        $jenis = 'Pemasukan';
        $route = 'pemasukan';
        $kategori = Kategori::where('Jenis', 'Pemasukan')->get();
        return(view('input', compact('rekening', 'jenis', 'route', 'kategori')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePemasukanRequest $request){
        Pemasukan::create($request->except(['_token','submit']));

        $saldo = PemasukanController::saldo($request);

        // Retrieve the Rekening model instance
        $rekening = Rekening::where('id', $request->input('rekening'))->first();

        if($rekening){
            // Update the saldo of the retrieved Rekening model instance
            $rekening->update(['saldo' => $saldo]);

            return redirect('/');
        } else {
            // Handle the case where the Rekening does not exist
            // Redirect or return an error response
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Pemasukan $pemasukan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pemasukan = Pemasukan::find($id);
        $rekening = Rekening::where('user', auth()->user()->id)->get();
        $kategori = Kategori::where('Jenis', 'Pemasukan')->get();
        return view('editpemasukan', compact('pemasukan','kategori','rekening'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePemasukanRequest $request, $id)
    {
        $pemasukan = Pemasukan::find($id);

        // Mengambil rekening awal dari pemasukan yang akan diupdate
        $rekening1 = Rekening::find($pemasukan->rekening);
    
        // Menghitung saldo baru untuk rekening1
        $saldo1 = $rekening1->saldo - $request->jumlahawal;
    
        // Memperbarui saldo rekening1
        $rekening1->update(['saldo' => $saldo1]);

        // Update data pemasukan kecuali _token dan submit
        $pemasukan->update($request->except(['_token', 'submit']));
    
        // Mengambil rekening baru dari request input
        $rekening2 = Rekening::find($request->input('rekening'));
    
        // Menghitung saldo baru untuk rekening2
        $saldo2 = $rekening2->saldo + $request->jumlah;
    
        // Memperbarui saldo rekening2
        $rekening2->update(['saldo' => $saldo2]);
    
        // Redirect dengan pesan sukses
        return redirect('/')->with('success', 'Pemasukan updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pemasukan = Pemasukan::find($id);

        if (!$pemasukan) {
            return redirect('/home')->with('error', 'pemasukan not found');
        }

        $saldo = $pemasukan->jumlah;
        $rekening = Rekening::where('id', $pemasukan->rekening)->first();
        $total = $rekening->saldo - $saldo;
        $rekening->update(['saldo'=>$total]);

        $pemasukan->delete();

        return redirect('/')->with('success', 'Rekening deleted successfully');
    }

    public function saldo($request){
        $jumlah = $request->input('jumlah');
        $jenis = $request->input('rekening');
        $saldo = Rekening::where('id', $jenis)->value('saldo');

        $total = $saldo + $jumlah;

        return $total;
    }
}
