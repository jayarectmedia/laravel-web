<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    function index()
    {
        return view('session/index');
    }

    function login(Request $request)
    {
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'email wajib di isi',
            'password.required' => 'password wajib di isi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($infologin)) {
            //jika auth sukses
            return redirect('siswa')->with('success', 'Berhasil Login');
        } else {
            //jika auth gagal
            return redirect('login')->withErrors('Username dan password yang di masukkan salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('success', 'berhasil logout');
    }
}
