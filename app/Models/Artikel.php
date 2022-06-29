<?php

namespace App\Models;

use App\Models\Comment;
use App\Models\Genre;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $fillable = [
        'comment_id', 'artikel_id', 'judul_artikel', 'gambar_artikel', 'isi_artikel'
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class, 'id');
    }
}
