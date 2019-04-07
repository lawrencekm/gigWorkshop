<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Educationlevel extends Model
{


    //
    public function users(){
        return $this->hasMany('Wezaworkshop\Users');
    }
}
