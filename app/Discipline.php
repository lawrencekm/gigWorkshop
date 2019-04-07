<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    //
    public function users(){
        return $this->belongsToMany('Wezaworkshop\User')->withTimestamps();
    }
    public function orders(){
        return $this->belongsToMany('Wezaworkshop\Order')->withTimestamps();
    }
}
