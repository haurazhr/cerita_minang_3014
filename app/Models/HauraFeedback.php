<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HauraFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_cerita',
        'rating',
        'komentar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function cerita()
    {
        return $this->belongsTo(HauraCerita::class, 'id_cerita');
    }
}
