<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public function transactiontatus(){
        return $this->belongsTo('wezaworkshop\Transactionstatus');
    }
    public function transactionmethod(){
        return $this->belongsTo('wezaworkshop\Transactionmethod');
    }
    public function transactiontype(){
        return $this->belongsTo('wezaworkshop\Transactionmethod');
    }
    public function user(){
        return $this->belongsTo('wezaworkshop\User');
    }
    public function order(){
        return $this->belongsTo('wezaworkshop\Order');
    }
}
