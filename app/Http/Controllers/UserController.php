<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function home()
    {
        return view('user.welcome');
    }

    public function about()
    {
        return view('user.about');
    }

    public function products()
    {
        return view('user.products');
    }

    public function history()
    {
        return view('user.history');
    }

    public function contact()
    {
        return view('user.contact');
    }
}
