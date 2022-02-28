<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Session;

class authController extends Controller
{
    public function login(Request $request)
    {
        $data = User::where('email',$request->email)->first();
        if($data){
            if(\Hash::check($request->password,$data->password)){
                session(['session_login' => true]);
                $request->session()->put('data',$request->input());
                Session::put('user_id',$data['id']);

                return redirect('/')->with(['success' => 'berhasil Masuk!']);
            }
        }
        return redirect('/')->with(['error' => 'Email atau Password Salah!']);
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with(['success','berhasil logout!']);
    }
}
