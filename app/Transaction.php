<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    public function transactiontatus(){
        return $this->belongsTo('Wezaworkshop\Transactionstatus');
    }
    public function transactionmethod(){
        return $this->belongsTo('Wezaworkshop\Transactionmethod');
    }
    public function transactiontype(){
        return $this->belongsTo('Wezaworkshop\Transactionmethod');
    }
    public function user(){
        return $this->belongsTo('Wezaworkshop\User');
    }
    public function order(){
        return $this->belongsTo('Wezaworkshop\Order');
    }
}
