<?php

namespace App\Http\Controllers;

use App\Models\M_Kategori;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class MKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $m_kategori = M_Kategori::all();
        confirmDelete('Delete','Are you sure?');
        return view('m_kategori.index', compact('m_kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('m_kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required',

        ]);

        $m_kategori = new M_Kategori();
        $m_kategori->nama_kategori = $request->nama_kategori;

        Alert::success('Success','data berhasil disimpan')->autoClose(1000);
        $m_kategori->save();

        return redirect()->route('m_kategori.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(M_Kategori $m_Kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $m_kategori = M_Kategori::findOrFail($id);
        return view('m_kategori.edit', compact('m_kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama_kategori' => 'required',

        ]);

        $m_kategori = M_Kategori::findOrFail($id);
        $m_kategori->nama_kategori = $request->nama_kategori;


        Alert::success('Success','data berhasil diubah')->autoClose(1000);
        $m_kategori->save();
        return redirect()->route('m_kategori.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $m_kategori = M_Kategori::findOrFail($id);
        $m_kategori->delete();
        Alert::success('success','Data berhasil Dihapus');
        return redirect()->route('m_kategori.index');
    }
}
