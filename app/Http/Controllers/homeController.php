<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function index()
    {
        return view('layouts.main');
    }

    public function dashboard(Request $request)
    {
        return view('contents.dashboard');
    }

    public function files()
    {
        return view('contents.files');
    }

    public function message()
    {
        return view('contents.message');
    }

    public function penilaian(Request $request)
    {
        return view('contents.penilaian');
    }

    public function bookmark()
    {
        return view('contents.bookmark');
    }

    public function users()
    {
        return view('contents.users');
    }
}
