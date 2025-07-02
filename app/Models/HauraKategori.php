<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HauraKategori extends Model
{
    use HasFactory;

    protected $fillable = ['nama_kategori'];

    public function ceritas()
    {
        return $this->hasMany(HauraCerita::class, 'id_kategori');
    }
}
