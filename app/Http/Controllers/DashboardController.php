<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBuku = 8;
        $jumlahMember = 5;
        $jumlahKategori = 5;

        return view('dashboard.index', compact(
            'jumlahBuku',
            'jumlahMember',
            'jumlahKategori'
        ));
    }
}