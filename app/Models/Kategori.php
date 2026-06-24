<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['nama', 'slug', 'deskripsi', 'is_active'];

    // Relasi ke barang
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
