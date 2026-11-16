<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_anggota',
        'nama',
        'email',
        'telepon',
        'alamat',
        'status',
    ];

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}