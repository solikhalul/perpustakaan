<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = [
            [
                'nama' => 'Andi Saputra',
                'email' => 'andi@gmail.com',
                'telepon' => '081234567890',
            ],
            [
                'nama' => 'Budi Santoso',
                'email' => 'budi@gmail.com',
                'telepon' => '081234567891',
            ],
            [
                'nama' => 'Citra Lestari',
                'email' => 'citra@gmail.com',
                'telepon' => '081234567892',
            ],
            [
                'nama' => 'Dinda Permata',
                'email' => 'dinda@gmail.com',
                'telepon' => '081234567893',
            ],
            [
                'nama' => 'Eko Pratama',
                'email' => 'eko@gmail.com',
                'telepon' => '081234567894',
            ],
        ];

        return view('members.index', compact('members'));
    }
}