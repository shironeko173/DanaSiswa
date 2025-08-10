<?php

namespace App\Http\Controllers;

use App\Models\Deposit;
use App\Models\Penarikan;
use App\Models\Tabungan;
use App\Models\User;
use Illuminate\Http\Request; 
use RealRashid\SweetAlert\Facades\Alert;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::where('role', '=', 'user')->get(); 
        return view('admin.users.user', compact('users'));
    }

    public function validasi()
    {
        $users = User::where('role', '=', 'in_queue')->get(); 
        return view('admin.users.validasi', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        // $users = User::findOrFail($request->users_id);
        // $users->update($request->all());

        $tabungan = new Tabungan();
        $tabungan->id = $request->id;
        $tabungan->user_id = $request->id;
        $tabungan->saldo = 0;
        $tabungan->save();

        $users = User::findOrFail($request->users_id);
        $users->role = $request->role;
        $users->save();

        
        Alert::success('Success', 'User berhasil di Verify')->autoClose(4000);
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) 
    {
        $user =User::find($id); 
        $user->delete();

        return redirect()->route('users.index');
    }
}
