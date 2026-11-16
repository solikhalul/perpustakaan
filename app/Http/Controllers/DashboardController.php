<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Member;
use App\Models\Loan;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahBuku = Book::count();
        $jumlahMember = Member::count();
        $jumlahKategori = Category::count();
        $jumlahPeminjaman = Loan::count();

        $jumlahBukuDipinjam = Loan::whereIn('status', [
            'dipinjam',
            'sebagian_dikembalikan'
        ])->count();

        $peminjamanTerbaru = Loan::with([
            'member',
            'user'
        ])->latest()->take(5)->get();

        return view('dashboard.index', compact(
            'jumlahBuku',
            'jumlahMember',
            'jumlahKategori',
            'jumlahPeminjaman',
            'jumlahBukuDipinjam',
            'peminjamanTerbaru'
        ));
    }
}
