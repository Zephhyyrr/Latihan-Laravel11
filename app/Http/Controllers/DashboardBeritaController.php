<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Berita;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class DashboardBeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $beritas = Berita::orderBy('id', 'asc')->paginate(10);
        return view('dashboard.berita.index', ['beritas' => $beritas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.berita.create', ['kategoris' => Kategori::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'kategori_id' => 'required',
            'file_upload' => 'nullable|image|mimes:png,jpg',
            'body' => 'required',
        ]);
        if ($request->hasFile('file_upload')) {
            $namaFile = 'img_' . time() . '_' . $request->file_upload->getClientOriginalName();
            $request->file_upload->move('images', $namaFile);
        } else {
            $namaFile = 'image_default.jpg';
        }
        $validatedData['file_upload'] = $namaFile;
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50);
        Berita::create($validatedData);
        return redirect('dashboard-berita');
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
        return view('dashboard.berita.edit', [
            'kategoris' => Kategori::all(),
            'berita' => Berita::find($id)
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'kategori_id' => 'required',
            'file_upload' => 'nullable|image|mimes:png,jpg',
            'body' => 'required',
        ]);
        $berita = Berita::find($id);
        if ($request->hasFile('file_upload')) {
            $namaFile = 'img_' . time() . '_' . $request->file_upload->getClientOriginalName();
            $request->file_upload->move('images', $namaFile);
            $validatedData['file_upload'] = $namaFile;
        } else {
            $validatedData['file_upload'] = $berita->file_upload;
        }
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 50);
        $berita->update($validatedData);
        return redirect('dashboard-berita');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Berita::destroy($id);
        return redirect('dashboard-berita')->with('pesan','Data berita berhasil dihapus');
    }
}
