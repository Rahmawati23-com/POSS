<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode', 'nama', 'harga', 'stok', 'rating', 'min_stok',
        'jenis_produk_id', 'kategori_tokoh_id', 'deskripsi', 'foto'
    ];

    protected $casts = [
        'harga' => 'decimal:2',
        'rating' => 'decimal:1',
        'stok' => 'integer',
        'min_stok' => 'integer',
    ];

    public function jenisProduk()
    {
        return $this->belongsTo(JenisProduk::class);
    }

    public function testimonis()
    {
        return $this->hasMany(Testimoni::class);
    }

    public function kategoriTokoh()
    {
        return $this->belongsTo(KategoriTokoh::class);
    }

    public function getFormattedHargaAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    public function scopeAvailable($query)
    {
        return $query->where('stok', '>', 0);
    }

    public function scopeByJenis($query, $jenisId)
    {
        return $query->where('jenis_produk_id', $jenisId);
    }
}