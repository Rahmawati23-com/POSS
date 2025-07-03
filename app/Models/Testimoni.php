<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Testimoni extends Model
{
    protected $table = 'testimonis'; 
    
    protected $fillable = [
        'nama_tokoh',
        'komentar', 
        'rating',
        'produk_id',
        'kategori_tokoh_id',
        'foto',
        'tanggal' 
    ];
    
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
    
    public function kategoriTokoh()
    {
        return $this->belongsTo(KategoriTokoh::class);
    }
}