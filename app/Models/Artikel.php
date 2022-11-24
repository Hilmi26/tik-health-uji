<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
