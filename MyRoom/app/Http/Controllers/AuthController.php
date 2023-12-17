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
            'email' => ['required', 'unique:users'],
            'nama' => ['required', 'unique:users'],
        ], [
            'email.unique' => 'Email sudah terdaftar. Silakan gunakan email lain.',
            'nama.unique' => 'Username sudah terdaftar. Silakan gunakan username lain.',
        ]);

        $RegisterUser = User::create([
            'email' => $request->email,
            'nama' => $request->nama,
            'role' => 'user',
            'password' => Hash::make($request->password),
        ]);
        if($RegisterUser){
            return redirect('/')->with('success', 'Registrasi berhasil');
        }

    }
    public function ceklogin(Request $request)
    {
        
        $credentials = $request->validate([
            'email_atau_username' => ['required'],
            'password' => ['required'],
        ]);
    
        $fieldType = filter_var($request->email_atau_username, FILTER_VALIDATE_EMAIL) ? 'email' : 'nama';
        $credentials[$fieldType] = $request->email_atau_username;
        unset($credentials['email_atau_username']);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/home');
        }

        return redirect()->back()->withInput()->with('error', 'Email, Username atau password salah');
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

    public function logout(Request $request)
    {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
    }

}
