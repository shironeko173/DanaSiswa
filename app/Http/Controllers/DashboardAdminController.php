<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Tabungan;
use App\Models\Deposit;
use App\Models\Penarikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardAdminController extends Controller
{
    public function index(){

        $users = User::where('role','user')->count();
        $jumlah = Deposit::where('status','approve')->sum('jmlh_deposit');
        $total = DB::table('tabungan')->sum('saldo');
       
        $deposito = DB::table('deposit')->select('jmlh_deposit')->where('status', '=', 'pending')->get();
        $hasil = $deposito->count();
        $br1 = DB::table('deposit')->select('jmlh_deposit')->where('status', '=', 'approve')->get();
        $br2 = DB::table('penarikan')->select('jmlh_penarikan')->where('status', '=', 'approve')->get();
        $selesaidep = $br1->count();
        $selesaipen = $br2->count();
        $dt1 = DB::table('deposit')->select('jmlh_deposit')->where('status', '=', 'reject')->get();
        $dt2 = DB::table('penarikan')->select('jmlh_penarikan')->where('status', '=', 'reject')->get();
        $ditolakdep = $dt1->count();
        $ditolakpen = $dt2->count();
        $pendingdep = DB::table('deposit')->select('id')->where('status', '=', 'pending')->count();
        $pendingpen = DB::table('penarikan')->select('id')->where('status', '=', 'pending')->count();

        $penarikan = Penarikan::where('status','approve')->sum('jmlh_penarikan');
        $dp1 = DB::table('deposit')->count('id');
        $dp2 = DB::table('penarikan')->count('id');

        return view('admin.dashboard',compact('users', 'jumlah', 'hasil', 'pendingdep', 'total', 'penarikan', 'dp1', 'dp2', 'selesaidep', 'ditolakdep', 'pendingpen', 'selesaipen', 'ditolakpen'));
    }
} 
