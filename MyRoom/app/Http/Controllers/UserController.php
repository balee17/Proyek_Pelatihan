<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
}
