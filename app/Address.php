<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    //
    public function user(){
        return $this->hasOne('Wezaworkshop\User');
    }

}
