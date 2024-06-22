<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DashboardUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('dashboard.user.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.user.create', ['users' => User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => ['required', 'confirmed', 'min:8'],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'email_verified_at'=>now(),
            'remember_token'=>Str::random(10),
        ]);
        return redirect ('dashboard-user')->with('pesan','Userb berhasil dibuat');
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
        return view ('dashboard.user.edit', ['users'=>User::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
        $user = User::findOrFail($id);
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        if (!empty($request->password)) {
            $request->validate([
                'password' => 'min:8|confirmed',
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('dashboard-user')->with('pesan', 'User berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);
        return redirect('dashboard-user')->with('pesan','User dihapus');
    }

    public function updateStatus($id)
    {
        $user = User::where('id', $id)->first();
        if ($user->status == 'aktif') {
            User::where('id', $id)->update([
                'status' => 'disable',
            ]);
        } else {
            User::where('id', $id)->update([
                'status' => 'aktif',
            ]);
        }
        return redirect('dashboard-user')->with('pesan', 'Status user berhasil di Update');
    }
}
