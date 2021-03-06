<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected  $guarded=[];

    public function detail()
    {
        return $this->hasMany(Detail::class);
    }

}
