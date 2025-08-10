<?php

namespace App\Http\Controllers;

use App\Models\Notif;
use App\Models\Penarikan;
use App\Models\Tabungan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PenarikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penarikan = Penarikan::where('status', '!=', 'pending')->get(); 
        return view('admin.penarikan.penarikan', compact('penarikan'));
    }

     //search
     public function search( request $request)
     {
         // $created_at
         $fromDate = $request->input('fromDate');
         $toDate = $request->input('toDate');
 
         $penarikan = Penarikan::where('status', '!=', 'pending')
         ->where('created_at', '>=', $fromDate)
         ->where('created_at', '<=', $toDate)
         ->get();
         // dd($query); 
 
         return view('admin.penarikan.penarikan', compact('penarikan'));
     }

    public function validasi()
    {
        $penarikan = Penarikan::where('status', '=', 'pending')->get(); 
        return view('admin.penarikan.validasi', compact('penarikan'));
    }

    public function penarikan()
    {
        return view('user.penarikan', [
            'penarikan' => Penarikan::where('user_id', auth()->user()->id)->get()
        ]);
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
        $saldosekarang = Tabungan::find($request->user_id);

        if ($saldosekarang->saldo < $request->jmlh_penarikan) {
            Alert::error('error', 'Mohon maaf, jumlah penarikan melebihi saldo anda sekarang.')->autoClose(4000);
            return redirect('/Penarikan-User'); 
        } 
        $data = $request->all();
        $data['user_id'] = $request->user_id;
        $data['nama_bank'] = $request->nama_bank;
        $data['nama_akunbank'] = $request->nama_akunbank;
        $data['no_rek'] = $request->no_rek;
        $data['jmlh_penarikan'] = $request->jmlh_penarikan;

        Penarikan::create($data);
        Alert::success('info', 'Mohon tunggu sebentar, Permintaan penarikan anda sedang diproses..')->autoClose(4000);
        return redirect('/Penarikan-User');
        
        
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
    public function update(Request $request, $id)
    { 
        if ($request->status == 'approve') {
            $tabungan = Tabungan::findOrFail($request->userid);
            $tabungan->saldo -= $request->jumlah;
            $tabungan->save();

            $penarikan = Penarikan::findOrFail($request->penarikan_id);
            $penarikan->status = $request->status;
            $penarikan->save();

            //notifikasi user

            $pesan = $request->all();
            $pesan['user_id'] = $request->userid;
            $pesan['pesan'] = $request->pesan;
            $pesan['status'] = 1;
    
            Notif::create($pesan);
             
        } else {
            $penarikan = Penarikan::findOrFail($request->penarikan_id);
            $penarikan->status = $request->status;
            $penarikan->save();

            $pesan = $request->all();
            $pesan['user_id'] = $request->userid;
            $pesan['pesan'] = $request->pesan;
            $pesan['status'] = 1;
            Notif::create($pesan);
        }

        Alert::success('Success', 'Validasi Penarikan User berhasil di Update')->autoClose(4000);
        return redirect()->route('penarikan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
