<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function authenticate(Request $request)
    { 
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
            
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            if (Auth::check() && Auth::user()->role == 'admin') {
                return redirect()->intended('/admin');
            }
             elseif (Auth::check() && Auth::user()->role == 'SuperAdmin'){
                return redirect()->intended('/admin');
            } 
             elseif (Auth::check() && Auth::user()->role == 'user'){
                return redirect()->intended('/user');
            } else {
                return redirect('/logouts');
            }
           
        }
        
        return back()->with('loginError', 'Login failed!');


    }
    public function logout(Request $request)
    {
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
     
        return redirect('/home');
    }

    //not verify akun
    public function logouts(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();
        return redirect('/login')->with('info', 'Mohon maaf, akun anda sedang dalam proses Verifikasi.');
    }
}
