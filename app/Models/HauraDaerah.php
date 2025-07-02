<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HauraDaerah extends Model
{
    use HasFactory;

    protected $fillable = ['nama_daerah'];

    public function ceritas()
    {
        return $this->hasMany(HauraCerita::class, 'id_daerah');
    }
}
