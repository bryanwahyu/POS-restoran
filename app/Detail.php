<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    Protected $guarded=[];

    public function order()
    {
        return $this->belongsTo(order::class);
    }
    public function menu()
    {
        return $this->belongTo(Menu::class);
    }
    
}
