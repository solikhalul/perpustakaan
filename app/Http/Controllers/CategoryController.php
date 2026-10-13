<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = [
            'Fiksi',
            'Non-Fiksi',
            'Teknologi',
            'Pendidikan',
            'Sejarah',
        ];

        return view('categories.index', compact('categories'));
    }
}