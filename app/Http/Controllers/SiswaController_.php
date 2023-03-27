<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        // $data = Siswa::all();
        $data = Siswa::orderBy('nomor_induk', 'desc')->paginate(1);
        return view('siswa/index')->with('data', $data);
    }

    public function detail($id)
    {
        $data = Siswa::where('id', $id)->first();
        return view('siswa/detail')->with('data', $data);
    }

    public function create()
    {

    }

    public function delete()
    {
        
    }
}
