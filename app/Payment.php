<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    public function paymentstatus(){
        return $this->belongsTo('wezaworkshop\Paymentstatus');
    }
    public function paymentmethod(){
        return $this->belongsTo('wezaworkshop\Paymentmethod');
    }
    public function user(){
        return $this->belongsTo('wezaworkshop\User');
    }
}
