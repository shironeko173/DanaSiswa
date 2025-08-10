<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Deposit;
use App\Models\Notif;
use App\Models\Tabungan;
use App\Models\Penarikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Auth;
 
class DashboardUserController extends Controller
{
    public function index(){

        $rdeposit = Deposit::orderBy('created_at', 'DESC')->where('user_id', auth()->user()->id)->limit(3)->get();
        $rpenarikan = Penarikan::orderBy('created_at', 'DESC')->where('user_id', auth()->user()->id)->limit(3)->get();

        $jdepo = Deposit::where('user_id', auth()->user()->id)
                        ->where('status','approve')
                        ->sum('jmlh_deposit');
        $jnarik = Penarikan::where('user_id', auth()->user()->id)
                        ->where('status','approve')
                        ->sum('jmlh_penarikan');
        $notifikasi = Notif::where('user_id', auth()->user()->id)
                            ->where('status','1')->get();
        return view('user.dashboard',compact('rdeposit', 'rpenarikan', 'jdepo', 'jnarik', 'notifikasi'));
    }

    public function tampil(){
        $deposit = Deposit::where('user_id', auth()->user()->id)->paginate(8);
        $penarikan = Penarikan::where('user_id', auth()->user()->id)->paginate(8);
        return view('user.riwayat', compact('deposit', 'penarikan'));
    }

    public function updatenotif(Request $request){
        $santri = Notif::where('id', $request->id_notif)
        ->update([
               'status' => $request->status
        ]);

        return redirect('/user');
    }
}
