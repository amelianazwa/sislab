<?php

namespace App\Http\Controllers;

use App\Models\D_Ruangan;
use App\Models\Ruangan;
use App\Models\Barang;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class DRuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $d_ruangan =  D_Ruangan::all();
        confirmDelete('Delete','Are you sure?');
        return view('d_ruangan.index', compact('d_ruangan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $ruangan =  Ruangan::all();
        $barang =  Barang::all();
        return view('d_ruangan.create', compact('ruangan','barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [

        ]);

        $d_ruangan = new D_Ruangan();
        $d_ruangan->id_ruangan = $request->id_ruangan;
        $d_ruangan->id_barang = $request->id_barang;


        Alert::success('Success','data berhasil disimpan')->autoClose(1000);
        $d_ruangan->save();

        return redirect()->route('d_ruangan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(D_Ruangan $d_Ruangan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    $ruangan = Ruangan::all();
    $barang = Barang::all();
    $d_ruangan = D_Ruangan::findOrFail($id);
        return view('d_ruangan.edit', compact('d_ruangan', 'ruangan', 'barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

        ]);

        $d_ruangan = D_Ruangan::findOrFail($id);
        $d_ruangan->id_ruangan = $request->id_ruangan;
        $d_ruangan->id_barang = $request->id_barang;

        Alert::success('Success','data berhasil diubah')->autoClose(1000);
        $d_ruangan->save();
        return redirect()->route('d_ruangan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $d_ruangan = D_Ruangan::findOrFail($id);
        $d_ruangan->delete();
        Alert::success('success','Data berhasil Dihapus');
        return redirect()->route('d_ruangan.index');
    }
}
