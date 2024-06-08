<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect('/login');
    }
}
