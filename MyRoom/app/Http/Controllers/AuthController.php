<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function cekregis(Request $request)
    {
        $request->validate([
            'email' => ['required', 'unique:users',]
        ]);

        $RegisterUser = User::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);
        if($RegisterUser){
            return redirect('/');
        }

    }
    public function ceklogin(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/home');
        }
    }
    public function ceklogin2(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            if (Auth::user()->role == 'admin') {
                return redirect()->intended('/adminhome'); 
            } else {
                Auth::logout();
                return redirect('/')->withErrors(['error' => 'You do not have admin privileges.']);
            }
        }
        return redirect('/')->withErrors(['error' => 'Invalid credentials.']);
    }

}
