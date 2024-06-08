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
        return view('dashboard.berita.create',['kategoris'=>Kategori::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData=$request->validate([
            'title'=>'required',
            'kategori_id'=>'required',
            'file_upload'=>'nullable|image|mimes:png,jpg',
            'body'=>'required',
        ]);
        if($request->hasFile('file_upload')){
            $namaFile='img_'.time().'_'.$request->file_upload->getClientOriginalName();
            $request->file_upload->move('images',$namaFile);
        }else{
            $namaFile='image_default.jpg';
        }
        $validatedData['file_upload']=$namaFile;
        $validatedData['user_id']=auth()->user()->id;
        $validatedData['excerpt']=Str::limit(strip_tags($request->body),50);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
