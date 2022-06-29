<?php

use App\Models\Artikel;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'nama_genre'
    ];
    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'id');
    }
}
