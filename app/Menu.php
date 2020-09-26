<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public function humans(){
        return $this->hasMany('App\Human');
    }
}
