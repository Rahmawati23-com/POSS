<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = [
        'kode',
        'user_id',
        'tanggal',
        'total',
        'pembayaran',
    ];

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($transaksi) {
            // Auto-generate kode jika kosong
            if (empty($transaksi->kode)) {
                $transaksi->kode = static::generateKode();
            }
            
            // Auto-fill tanggal jika kosong
            if (empty($transaksi->tanggal)) {
                $transaksi->tanggal = now();
            }
        });
    }

    public static function generateKode()
    {
        do {
            $kode = 'TRX-' . date('YmdHis') . '-' . rand(1000, 9999);
        } while (static::where('kode', $kode)->exists());
        
        return $kode;
    }

    public function details()
    {
        return $this->hasMany(DetailTransaksi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}