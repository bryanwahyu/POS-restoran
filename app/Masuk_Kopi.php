<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Masuk_Kopi extends Model
{
    protected $guarded=[];

    public function kopi()
    {
        return $this->belongsTo(Kopi::class);
    }
}
