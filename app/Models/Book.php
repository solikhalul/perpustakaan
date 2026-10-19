<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'judul',
        'penulis',
        'tahun_terbit',
        'stok',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}