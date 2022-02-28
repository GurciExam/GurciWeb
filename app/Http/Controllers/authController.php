<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Guru;

use Illuminate\Support\Str;
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

    public function signUp(Request $request)
    {
        // $validatedData = $request->validate([   
        //     'email' => 'required|max:50|email',
        //     'password' => 'required',
        //     'confirmPasword' => 'required',
        // ]);

        if(isset($request->password) && isset($request->email) && isset($request->nama) && isset($request->nip)){
            if($request->password == $request->confirmPassword){

                    $emailCek = User::where('email',$request->email)->first();
                    $nipCek = Guru::where('nip',$request->nip)->first();

                    // dd(substr($request->nama,0,25));

                if(!isset($emailCek) && !isset($nipCek)){
                    $user = new User;
                    $user->email = $request->email;
                    if (strlen($request->nama) > 25 ) {
                        $user->nama = substr($request->nama,0,24);
                    }else{
                        $user->nama = $request->nama;
                    }
                    $user->password = bcrypt($request->password);
                    $user->remember_token = Str::random(40);
                    $user->save();

                    $guru = new Guru;
                    if (strlen($request->nama) > 25 ) {
                        $guru->namaGuru = substr($request->nama,0,24);
                    }else{
                        $guru->namaGuru = $request->nama;
                    }
                    $guru->nip = $request->nip;
                    $guru->User()->associate($user); 
                    $guru->save();

                    return redirect('/')->with('success','Berhasil Daftar!');
                }
                
                return redirect('/')->with('error','Email atau nip Sudah ada!');

            }

            return redirect('/')->with('error','Password berbeda!');
            
        }
        
        return redirect('/')->with('error','Harap isi dengan lengkap!');

    }
}
