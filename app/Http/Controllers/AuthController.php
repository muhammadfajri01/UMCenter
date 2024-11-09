<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function registerView()
    {
        return view('auth.register');
    }
    public function login(Request $request)
    {
        $request->validate([
            'iduser' => 'required|numeric|digits_between:10,10',
            'password' => 'required',
        ]);
        $credentials = $request->only('iduser', 'password');

        if (!auth()->attempt($credentials)) {
            return redirect()->back()->withErrors(['iduser' => 'Invalid credentials.']);
        }

        return redirect()->route('dashboard');
    }

    public function register(Request $request)
    {
        $request->validate([
            'iduser' => 'required|numeric|digits_between:10,10',
            'nama' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:5|max:10',
        ]);

        $iduser = $request->input('iduser');
        $nama = $request->input('nama');
        $password = $request->input('password');

        $user = User::create([
            'iduser' => $iduser,
            'nama' => $nama,
            'password' => Hash::make($password),
        ]);

        return redirect()->route('login')->with('success', 'Registrasi Berhasil.');
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
