<?php

namespace App\Http\Controllers;

use App\Models\AdminCamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCampController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = AdminCamp::all();
        return $admin;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminCamp $adminCamp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminCamp $adminCamp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminCamp $adminCamp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminCamp $adminCamp)
    {
        //
    }

    public function login(Request $request)
    {
        $request -> validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);
    
    if(Auth::guard('admin')->attempt($request->only('email', 'password'), $request->has('remember'))){
    $request->session()->regenerate();
    return redirect()->intended('/');
    };
    }

}
