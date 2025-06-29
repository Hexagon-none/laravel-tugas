<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class HomeController extends Controller
{
    public function index()
    {
        $jumlahKelas = Kelas::count();
        $terakhirKelas = Kelas::latest()->first();

        return view('dashboard', compact('jumlahKelas', 'terakhirKelas'));
    }
}
