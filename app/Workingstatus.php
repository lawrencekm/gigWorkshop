<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Workingstatus extends Model
{
    //
    public function users(){
        return $this->hasMany('Wezaworkshop\User');
    }
}
