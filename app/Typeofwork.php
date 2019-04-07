<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Typeofwork extends Model
{
    //
    public function orders(){
        return $this->hasMany('Wezaworkshop\Order');
    }
}
