<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bahan extends Model
{
    protected $guarded=[];

    public function masuk()
    {
        return $this->hasMany(Masuk_bahan::class);
    }
    public function keluar()
    {
        return $this->hasMany(Keluar_bahan::class);
    }
}
