<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nomor_anggota', 'telepon', 'tanggal_bergabung', 'status', 'alamat'];

    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class);
    }
}
