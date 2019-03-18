<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    //
    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }
    public function orders(){
        return $this->belongsToMany(Order::class)->withTimestamps();
    }
}
