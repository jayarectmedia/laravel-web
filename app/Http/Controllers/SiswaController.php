<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::orderBy('nomor_induk', 'desc')->paginate(5);
        return view('siswa/index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('nomor_induk', $request->nomor_induk);
        Session::flash('name', $request->name);
        Session::flash('alamat', $request->alamat);
        $request->validate([
            'nomor_induk' => 'required|numeric',
            'name' => 'required',
            'alamat' => 'required',
            'foto' => 'required|mimes:jpeg,jpg,png,gif',
        ], [
            'nomor_induk.required' => 'Nomor induk wajib di isi',
            'nomor_induk.numeric' => 'Nomor induk wajib di isi dalam angka',
            'name.required' => 'Nama wajib di isi',
            'alamat.required' => 'Alamat wajib di isi',
            'foto.required' => 'Foto wajib di isi',
            'foto.mimes' => 'Foto hanya diperbolehkan berkestensi JPEG, JPG, PNG, GIF'
        ]);
        $foto_file = $request->file('foto');
        $foto_extension = $foto_file->extension();
        $foto_name = date('ymdhis') . "." . $foto_extension;
        $foto_file->move(public_path('foto'), $foto_name);

        $data = [
            'nomor_induk' => $request->input('nomor_induk'),
            'name' => $request->input('name'),
            'alamat' => $request->input('alamat'),
            'foto' => $foto_name,
        ];

        Siswa::create($data);

        return redirect('siswa')->with('success', 'Berhasil memasukkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Siswa::where('id', $id)->first();
        return view('siswa/detail')->with('data', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Siswa::where('id', $id)->first();
        return view('siswa/edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
        ], [
            'name.required' => 'Nama wajib di isi',
            'alamat.required' => 'Alamat wajib di isi',
        ]);
        $data = [
            'name' => $request->input('name'),
            'alamat' => $request->input('alamat'),
        ];

        if ($request->hasFile('foto')) {
            $request->validate([
                'foto' => 'mimes:jpeg,jpg,png,gif',
            ], [
                'foto.mimes' => 'Foto hanya diperbolehkan berkestensi JPEG, JPG, PNG, GIF'
            ]);
            $foto_file = $request->file('foto');
            $foto_extension = $foto_file->extension();
            $foto_name = date('ymdhis') . "." . $foto_extension;
            $foto_file->move(public_path('foto'), $foto_name);

            $data_foto = Siswa::where('id', $id)->first();
            File::delete(public_path('foto') . '/' . $data_foto->foto);

            $data['foto'] = $foto_name;
        }

        Siswa::where('id', $id)->update($data);
        return redirect('/siswa')->with('success', 'Data berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Siswa::where('id', $id)->first();
        File::delete(public_path('foto') . '/' . $data->foto);
        Siswa::where('id', $id)->delete();
        return redirect('/siswa')->with('success', 'Data Berhasil di hapus');
    }
}
