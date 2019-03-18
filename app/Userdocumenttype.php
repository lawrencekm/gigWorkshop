<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Userdocumenttype extends Model
{
    //
    public function userdocuments(){
        return $this->hasMany('wezaworkshop\Userdocument');
    }
}
