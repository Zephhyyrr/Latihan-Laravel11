<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;
// use Illuminate\Routing\Controller;


class DashboardProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Prodi::orderBy('id', 'asc')->paginate(10);
        return view('dashboard.prodi.index', ['prd' => $prodis]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.prodi.create',['prodis'=>Prodi::all()]);
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_prodi' => 'required',
        ]);
        Prodi::create($validated);
        return redirect('dashboard-prodi')->with('Prodi berhasil dibuat');
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
        return view('dashboard.prodi.edit',['prd'=>Prodi::find($id)]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama_prodi' => 'required',
        ]);
        Prodi::where('id',$id)->update($validated);
        return redirect('dashboard-prodi')->with('Berhasil Edit Prodi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Prodi::destroy($id);
        return redirect('dashboard-prodi')->with('pesan','Data berhasil terhapus');
    }
}
