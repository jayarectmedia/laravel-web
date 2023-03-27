<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function register()
    {
        return view('session/register');
    }

    public function create(Request $request)
    {
        Session::flash('email', $request->email);
        Session::flash('name', $request->name);
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required',
        ], [
            'name.required' => 'Nama wajib di isi',
            'email.required' => 'Email wajib di isi',
            'email.unique' => 'Email anda sudah terdaftar',
            'email.email' => 'Email tidak sesuai',
            'password.required' => 'Password wajib di isi',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ];

        User::create($data);

        $info_login = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($info_login)) {
            return redirect('siswa')->with('success', Auth::user()->name . ' Berhasil login');
        } else {
            return redirect('login')->with('Username dan password salah');
        }
    }
}
