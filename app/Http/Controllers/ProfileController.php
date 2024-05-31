<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profile=Profile::all();
        return view('profiledashboard', ['profile'=>$profile]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('createprofile');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'skils'=>'required'

        ]);

        Profile::create($validateData);
        return redirect('/dashboard/profile');
    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        return view('editprofile',[
            'profile' => $profile,
        ]);
    }

   
    public function update(Request $request, Profile $profile)
    {
        $validateData = $request->validate([
            'nama'=>'required',
            'alamat'=>'required',
            'skils'=>'required'

        ]);

       $profile->update($validateData);
       return redirect('/dashboard/profile')->with('succes', 'Profile berhasil diupdate');
       
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profiles)
    {
        $profiles->delete();
        return redirect('/dashboard/profile');
    }
}
