<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    //
    public function user(){
        return $this->belongsTo('Wezaworkshop\User');
    }
    public function order(){
        return $this->belongsTo('Wezaworkshop\Order');
    }
}
