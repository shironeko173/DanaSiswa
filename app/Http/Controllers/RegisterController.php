<?php
 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class RegisterController extends Controller
{
    public function index(){
        return view('register'); 
    }
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'nama' => ['required', 'min:5', 'max:50'],
            'email' => 'required|email:dns|unique:users',
            'nis' => 'required|max:12',
            'password' => 'required|min:8|max:255|confirmed'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
       

        User::create($validatedData);
        return redirect('/login')->with('success', 'Account created Successfully!');
    }

    //add Admin - in superadmin
    public function tambah(){
        return view('admin.addmin');  
    }
    public function addbase(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => ['required', 'min:5', 'max:255'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255',
            'role' => 'required'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        User::create($validatedData);

        return redirect('/add-admin')->with('success', 'Account created Successfully!');
    }
}
