<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;
use App\Models\Transaksi;
use App\Events\TransaksiDigunakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function admindashboard()
    {
        $ruang =  Room::count();
        $users = User::all();
        $user = User::where('role', '=', 'user')->count();
        $used_room = Transaksi::where('status', '=', 'digunakan')->count();
        $transaksi = Transaksi::where('status', 'diterima')->sum('harga');;
        return view('admin.dashboard', compact('ruang', 'user','users','used_room','transaksi'));
    }

    public function adminroom()
    {

        $rooms = Room::all();
        return view('admin.adminroom', compact(['rooms']));

    }

    public function roomdelete($id)
    {
        $room = Room::find($id);
        $room->delete();
        return redirect()->route('adminroom')->with('success', 'Ruangan berhasil dihapus.');
    }

    public function transaksi()
    {
        $transaksi = Transaksi::all();
        return view('admin.transaksi', compact(['transaksi']));
    }
    
    public function showKonfirmasiForm($id)
    {
        $transaksi = Transaksi::find($id);
        return view('admin.transaksi', compact('transaksi'));
    }

    public function konfirmasi(Request $request, $id)
    {
        $transaksi = Transaksi::find($id);

        if ($transaksi) {
            $transaksi->status = $request->input('status');
            $transaksi->save();

            if ($transaksi->status == 'Digunakan') {
                $room = $transaksi->room;
                if ($room) {
                    $room->kondisi = 'Terisi';
                    $room->save();
                }
            } elseif ($transaksi->status == 'Selesai') {
                $room = $transaksi->room;
                if ($room) {
                    $room->kondisi = 'Kosong';
                    $room->save();
                }
            }
        }

        return redirect()->route('transaksi', ['id' => $id])->with('success', 'Status berhasil diperbarui.');
    }

    public function storeroom()
    {
        return view('admin.addroom');
    }

    public function addroom(Request $request)
    {

        $request->validate([
            'nama' => 'required',
            'kode' => 'required',
            'kapasitas' => 'required|numeric',
            'harga' => 'required|numeric',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $path = $request->file('foto')->store('public');
    
        $namaGambar = basename($path);
    
        $registerRoom = Room::create([
            'nama' => $request->nama,
            'kode' => $request->kode,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
            'foto' => $namaGambar, // Simpan nama gambar ke dalam kolom "foto" di database
        ]);
    
        if ($registerRoom) {
            return redirect('/adminroom')->with('success', 'Ruangan berhasil ditambahkan!');
        } else {
            // Handle error jika perlu
            return redirect('/adminroom')->with('error', 'Gagal menambahkan ruangan.');
        }
    }

}
