<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HauraCerita extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'isi_cerita',
        'nilai_moral',
        'id_kategori',
        'id_daerah',
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(HauraKategori::class, 'id_kategori');
    }

    public function daerah()
    {
        return $this->belongsTo(HauraDaerah::class, 'id_daerah');
    }

    public function feedbacks()
    {
        return $this->hasMany(HauraFeedback::class, 'id_cerita');
    }

    public function averageRating()
    {
        return $this->feedbacks()->whereNotNull('rating')->avg('rating');
    }
}
