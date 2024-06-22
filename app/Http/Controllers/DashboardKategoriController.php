<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class DashboardKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategoris = Kategori::latest()->paginate(10);
        return view('dashboard.kategori.index',['kategoris' => $kategoris]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.kategori.create',['prodis'=>Kategori::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);
        Kategori::create($validated);
        return redirect('dashboard-kategori')->with('Kategori berhasil dibuat');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view ('dashboard.kategori.edit' ,['kategoris'=>Kategori::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);
        Kategori::where('id',$id)->update($validated);
        return redirect('dashboard-kategori')->with('Berhasil Edit Kategori');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Kategori::destroy($id);
        return redirect ('dashboard-kategori')->with('pesan','Kategori berhasil dihapus');
    }
}
