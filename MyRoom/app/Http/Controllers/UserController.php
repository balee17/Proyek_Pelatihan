<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function listroom()
    {
        $list = Room::where('kondisi', 'kosong')->get();
        return view('user.listroom',compact('list'));
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $list = Room::where('nama', 'like', '%' . $keyword . '%')->get();

        return view('user.listroom', ['list' => $list]);
    }

    public function profileuser()
    {
        return view('user.profile');
    }

    public function updateprof(Request $request)
    {           
        $request->validate([
            'password' => 'confirmed',

        ]);
        $user = Auth::user();;
        DB::table('users')
        ->where('id', $user->id)
        ->update([
            'email'=> $request->email,
            'nama'=> $request->nama,
            'password'=> Hash::make($request->password),

        ]);

        return back();
    }

    public function bayar(Request $request, $id)
    {
        $list = Room::find($id);
        $roomId = $id;
        $hourCount = $request->query('hours', 1); 
        $hargaPerJam = Room::find($id)->harga;
        $totalHarga = $hargaPerJam * $hourCount;
       
        return view('user.bayar', compact('list','roomId', 'hourCount','totalHarga'));
    }

    public function pay(Request $request){

        $idUser = Auth::id();

        $idRuangan = request('id_ruangan'); 

        $jumlahPenyewaanAktif = Transaksi::where('id_user', $idUser)
                                ->where('status', '!=', 'selesai')
                                ->count();

        $batasPenyewaan = 2;

        if ($jumlahPenyewaanAktif >= $batasPenyewaan) {
            Session::flash('error', 'Anda sudah mencapai batas maksimal penyewaan.');
            return redirect()->back();
        }

        $pay = transaksi::create([

            'id_user' => $idUser,
            'id_ruangan' => $idRuangan,
            'nama_ruangan'=> $request->nama,
            'kode_ruangan'=> $request->kode,
            'email_user'=> $request->email_user,
            'durasi'=> $request->durasi,
            'harga' => $request->totalHarga,
            'pembayaran' => $request -> pembayaran,
            'status' => "Menunggu Konfirmasi"

        ]);
        
        if($pay){
            return redirect('/home');
        }
    }

    public function riwayat()
    {
        $list = Transaksi::where('id_user', Auth::user()->id)->get();
        return view('user.riwayat', compact('list'));
    }

    public function status($id)
    {

        $room = Transaksi::find($id);
        $room->status = 'Admin akan mengecek ruangan';
        $room->save();

        return redirect('/riwayat')->with('success', 'terimakasih');
    }

}
