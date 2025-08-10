<?php
 
namespace App\Http\Controllers;

use App\Models\Notif;
use App\Models\Deposit;
use App\Models\Tabungan;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class DepositController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $deposit = Deposit::where('status', '!=', 'pending')->paginate(8); 
        return view('admin.deposit.deposit', compact('deposit'));
    } 

    //search
    public function search( request $request)
    { 
        // $created_at
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $deposit = Deposit::where('status', '!=', 'pending')
        ->where('created_at', '>=', $fromDate)
        ->where('created_at', '<=', $toDate)
        ->get();
        // dd($query); 

        return view('admin.deposit.deposit', compact('deposit'));
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function validasi()
    {
        $deposit = Deposit::where('status', '=', 'pending')->get(); 
        return view('admin.deposit.validasi', compact('deposit'));
    }

    public function deposito()
    {
        return view('user.deposit', [
            'deposit' => Deposit::where('user_id', auth()->user()->id)->get(),
        ]);
    }

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
        // $data = $request->all();
        // $data['user_id'] = $request->user_id;
        // $data['jmlh_deposit'] = $request->jmlh_deposit;
        // $data['buktitf'] = $request->file('buktitf')->store('deposit');

        $validatedData = $request->validate([
            
            'buktitf' => 'required|image|file|max:1024',      //file|max => untuk ukran file dlm bntk kb
        ]); 
        $validatedData['user_id'] = auth()->user()->id;
        $validatedData['jmlh_deposit'] = $request->jmlh_deposit;
        $validatedData['buktitf'] = $request->file('buktitf')->store('deposit');

        Deposit::create($validatedData);
        // Alert::success('Success', 'Success!! Deposit anda berhasil diajukan')->autoClose(4000);
        return redirect('/Deposit-User')->with('success', 'Yeay, Password berhasil diganti!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        if ($request->status == 'approve') {
            $tabungan = Tabungan::findOrFail($request->userid);
            $tabungan->saldo += $request->jumlah;
            $tabungan->save();
 
            $deposit = Deposit::findOrFail($request->deposit_id);
            $deposit->status = $request->status;
            $deposit->save();

            $pesan = $request->all();
            $pesan['user_id'] = $request->userid;
            $pesan['pesan'] = $request->pesan;
            $pesan['status'] = 1; 
            Notif::create($pesan);
             
        } else {
            $deposit = Deposit::findOrFail($request->deposit_id);
            $deposit->status = $request->status;
            $deposit->save();

            $pesan = $request->all();
            $pesan['user_id'] = $request->userid;
            $pesan['pesan'] = $request->pesan;
            $pesan['status'] = 1;
            Notif::create($pesan);
        } 

        Alert::success('Success', 'Validasi Deposit User berhasil di Update')->autoClose(4000);
        return redirect()->route('deposit.index');
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
