<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    public function dashboard(Request $request)
    {
        return view('frontend.home');
    }
}
