<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard/index');
    }

    public function about()
    {
        return view('dashboard/about');
    }

    public function contact()
    {
        $judul = "ini adalah Halaman contact";
        $data = [
            'judul' => $judul,
            'kontak' => [
                "email" => "info.saput@gmail.com",
                "instagram" => "@jaya.saptr"
            ],
        ];
        return view('dashboard/contact')->with($data);
    }
}
