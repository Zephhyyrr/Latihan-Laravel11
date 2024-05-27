<?php

namespace App\Http\Controllers;
use App\Models\Prodi;
use App\Models\DashboardDosen;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DashboardDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dosens = Dosen::orderBy('id', 'asc')->paginate(10);
        return view('dashboard.dosen.index', ['dsn' => $dosens]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.dosen.create',['prodis'=>Prodi::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:dosens',
            'nama_lengkap' => 'required | min:2',
            'email' => 'required',
            'no_telp'=>'required',
            'prodi_id' => 'required',
            'alamat' => 'nullable',
        ]);
        Dosen::create($validated);
        return redirect('dashboard-dosen');
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
        return view('dashboard.dosen.edit',['prodis'=>Prodi::all(),'dosen'=>Dosen::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nik' => 'required',
            'nama_lengkap' => 'required | min:2',
            'email' => 'required',
            'no_telp'=>'required',
            'prodi_id' => 'required',
            'alamat' => 'nullable',
        ]);
        Dosen::where('id',$id)->update($validated);
        return redirect('dashboard-dosen')->with('pesan','Data berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Dosen::destroy($id);
        return redirect('dashboard-dosen')->with('pesan','Data berhasil terhapus');
    }
}
