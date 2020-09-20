<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kopi extends Model
{
    protected $guarded=[];


    public function masuk()
    {
        return $this->hasMany(Masuk_Kopi::class);
    }
    public function keluar()
    {
        return $this->hasMany(Keluar_Kopi::class);
    }
}
