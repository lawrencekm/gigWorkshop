<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Citation extends Model
{
    //
    public function orders(){
        return $this->hasMany('wezaworkshop\Order');
    }
}
