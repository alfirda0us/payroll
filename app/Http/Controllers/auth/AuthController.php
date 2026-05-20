<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //

    public function login(){

        if(Auth::check()){
            if(Auth::user()->role == 'admin'){
                return redirect('/admin')->with('message','berhasil login sebagai admin');
            }elseif(Auth::user()->role == 'user' ){
                return redirect('/attendance')->with('message','berhasil login sebagai user');
            }
            
        }else{
            return view('auth.login')->with('message','gagal login');
        }
    }

    public function actionLogin(Request $request){
         $credential =   $request->validate([
                'email' => 'required|email',
                'password'=>'required'
            ]);

            if(Auth::attempt($credential))  {
                if(Auth::user()->role == 'admin'){
                    return redirect('/admin')->with('message','berhasil login sebagai admin');
                }elseif(Auth::user()->role == 'user'){
                     return redirect('/attendance')->with('message','berhasil login sebagai user');
                }
            }else{
                return redirect()->back()->with('message','email dan password tidak sesuai');
            }

    }

    public function logout(){
        Auth::logout();
        return redirect('/')->with('message','berhasil logout');
    }
}
