<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    public function paymentstatus(){
        return $this->belongsTo('Wezaworkshop\Paymentstatus');
    }
    public function paymentmethod(){
        return $this->belongsTo('Wezaworkshop\Paymentmethod');
    }
    public function user(){
        return $this->belongsTo('Wezaworkshop\User');
    }
}
