<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kelas;

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

    public function about()
    {
        return view('contents.about');
    }

    public function message()
    {
        return view('contents.message');
    }

    public function penilaian(Request $request)
    {
        $kelas = Kelas::all();
        
        return view('contents.penilaian',compact('kelas'));
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
