<?php

namespace App\Http\Controllers;

use App\Models\Rekening;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Requests\StoreRekeningRequest;
use App\Http\Requests\UpdateRekeningRequest;
use App\Models\Pengeluaran;
use Illuminate\Auth\Events\Validated;

class RekeningController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekening = Rekening::where('user', auth()->user()->id)->get();
        return(view('wallet', compact(['rekening'])));
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
    public function store(StoreRekeningRequest $request)
    {
        $validatedData=$request->validated();
        Rekening::create($validatedData);
        return redirect('/wallet');
    }

    /**
     * Display the specified resource.
     */
    public function show(Rekening $rekening)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rekening = Rekening::find($id);
        return view('editrekening', compact('rekening'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRekeningRequest $request, $id){
        $rekening = Rekening::find($id);
        $rekening -> update($request->validated());
        return redirect('/wallet')->with('success', 'Rekening updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $rekening = Rekening::find($id);

    if (!$rekening) {
        return redirect('/wallet')->with('error', 'Rekening not found');
    }

    $rekening->delete();

    return redirect('/wallet')->with('success', 'Rekening deleted successfully');
}

}
