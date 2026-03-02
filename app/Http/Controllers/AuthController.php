<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $crecidential = $request->validate([
                'email'=> ['required', 'email'],
                'password' => ['required'],
            ]);

            $data = DB::table('users')->where('email', $crecidential['email'])->first();

            if(!$data) {
                return redirect()->back()->with('error', 'email tidak ditemukan');
            }

            if(!Hash::check($crecidential['password'], $data->password)) {
                return redirect()->back()->with('error', 'password salah');
            }

            if($data->role == 'admin') {
                session([
                    'id' => $data->id,
                    'email' => $data->email,
                    'role' => $data->role,
                ]);
                return redirect()->route('admin.dashboard')->with('sukses', 'Login berhasil Mas admin');
            }

            elseif($data->role == 'user') {
                session([
                    'id' => $data->id,
                    'email' => $data->email,
                    'role' => $data->role,
                ]);
                return redirect()->route('user.dashboard')->with('sukses', 'Selamat datang user');
            }
        } catch (\Exception $e) {
             return redirect()->back()->with('error', 'Login gagal mas broo');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget(['id', 'email', 'role']);
        $request->session()->invalidate();

        return redirect('/login')->with('sukses', 'Logout berhasil');
    }
}
