<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriTokoh extends Model
{
    protected $fillable = ['nama'];

    public function testimonis()
    {
        return $this->hasMany(Testimoni::class);
    }
}
