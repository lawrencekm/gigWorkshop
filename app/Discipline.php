<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    //
    public function users(){
        return $this->belongsToMany('wezaworkshop\User');
    }
}
