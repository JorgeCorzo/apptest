<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Human extends Model
{
    public function menu(){
        return $this->belongsTo('App\Menu');
    }
}
