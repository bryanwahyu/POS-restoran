<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masuk_bahan extends Model
{
    protected $guarded=[];

    public function bahan()
    {
        return $this->belongsTo(Bahan::class);
    }
    
}
