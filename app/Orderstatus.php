<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Orderstatus extends Model
{
    //
    public function orders(){
        return $this->hasMany('Wezaworkshop\Order');
    }
}
