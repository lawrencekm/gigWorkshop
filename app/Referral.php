<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    //
    public function user(){
        return $this->belongsTo('Wezaworksho\User');
    }
}
