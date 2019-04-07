<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Userdocument extends Model
{
    //
    public function user(){
        return $this->belongsTo('Wezaworkshop\User');
    }
    public function userdocumenttype(){
        return $this->belongsTo('Wezaworkshop\Userdocumenttype');
    }
}
