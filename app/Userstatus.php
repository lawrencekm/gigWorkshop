<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Userstatus extends Model
{
    //
    public function users(){
        return $this->hasMany('wezaworkshop\User');
    }
}
