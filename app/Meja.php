<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $guarded=[];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
