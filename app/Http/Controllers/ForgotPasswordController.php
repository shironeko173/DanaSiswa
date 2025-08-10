<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User; 
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Mail;
use Carbon\Carbon; 

class ForgotPasswordController extends Controller
{
    public function forgot(){
        return view('forgot');
    }
    public function password(Request $request){
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => bcrypt($token), 
            'created_at' => Carbon::now()
          ]);

        Mail::send('forget-password-email', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->back()->with(['succes' => 'kode telah terkirim']);
    }
    public function getPassword($token) { 
 
        return view('reset', ['token' => $token]);
     }
     public function submitResetPasswordForm(Request $request)
      {

        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
            'token' => 'required'
            
        ]);

        $updatePassword = DB::table('password_resets')->where('email' , 'token')->first();

        // if(!$updatePassword){
        //     return back()->withInput()->with('Error', 'Invalid token!');
        // }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('success', 'Your password has been changed!');
  }
}


