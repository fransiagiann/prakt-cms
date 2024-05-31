<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;

class registercontroller extends Controller
{
    public function index()
    {
        return view('layouts.Register.register');
    }

    public function store(Request $request)
    {
       $validatedData = $request->validate([
            'name'=>'required',
            'username'=>'required|unique:users',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5'
        ]);

        User::create($validatedData);

        return redirect('/login')->with('success', 'Register Berhasil');
    }
}
