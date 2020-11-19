<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded=[];

    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }

    public function detail()
    {
        return $this->hasMany(Detail::class);
    }
    
}
