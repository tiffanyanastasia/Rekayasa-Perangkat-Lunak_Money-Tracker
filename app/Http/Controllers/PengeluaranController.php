<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Models\Kategori;
use App\Models\Pengeluaran;
use App\Http\Requests\StorePengeluaranRequest;
use App\Http\Requests\UpdatePengeluaranRequest;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekening = Rekening::where('user', auth()->user()->id)->get();
        $jenis = 'Pengeluaran';
        $route = 'pengeluaran';
        $kategori = Kategori::where('Jenis', 'Pengeluaran')->get();
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
    
    public function store(StorePengeluaranRequest $request){
        Pengeluaran::create($request->except(['_token','submit']));

        $saldo = PengeluaranController::saldo($request);

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
    public function show(Pengeluaran $pengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pengeluaran = Pengeluaran::find($id);
        $rekening = Rekening::where('user', auth()->user()->id)->get();
        $kategori = Kategori::where('Jenis', 'Pengeluaran')->get();
        return view('editpengeluaran', compact('pengeluaran','kategori','rekening'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePengeluaranRequest $request, $id)
{
    // Mengambil data pengeluaran berdasarkan id
    $pengeluaran = Pengeluaran::find($id);

    // Mengambil rekening awal dari pengeluaran yang akan diupdate
    $rekening1 = Rekening::find($pengeluaran->rekening);

    // Menghitung saldo baru untuk rekening1
    $saldo1 = $rekening1->saldo + $request->jumlahawal;

    // Memperbarui saldo rekening1
    $rekening1->update(['saldo' => $saldo1]);

    // Update data pengeluaran kecuali _token dan submit
    $pengeluaran->update($request->except(['_token', 'submit']));

    // Mengambil rekening baru dari request input
    $rekening2 = Rekening::find($request->input('rekening'));

    // Menghitung saldo baru untuk rekening2
    $saldo2 = $rekening2->saldo - $request->jumlah;

    // Memperbarui saldo rekening2
    $rekening2->update(['saldo' => $saldo2]);

    // Redirect dengan pesan sukses
    return redirect('/')->with('success', 'Pengeluaran updated successfully');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::find($id);

        if (!$pengeluaran) {
            return redirect('/home')->with('error', 'pengeluaran not found');
        }

        $saldo = $pengeluaran->jumlah;
        $rekening = Rekening::where('id', $pengeluaran->rekening)->first();
        $total = $rekening->saldo + $saldo;
        $rekening->update(['saldo'=>$total]);

        $pengeluaran->delete();

        return redirect('/')->with('success', 'Rekening deleted successfully');
    }
    public function saldo($request){
        $jumlah = $request->input('jumlah');
        $rekening = $request->input('rekening');
        $saldo = Rekening::where('id', $rekening)->value('saldo');

        $total = $saldo - $jumlah;
        return $total;
    }
}
