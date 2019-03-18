<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Transactionstatus extends Model
{
    //
    public function orders(){
        return $this->hasMany('wezaworkshop\Order');
    }
    public function transactions(){
        return $this->hasMany('wezaworkshop\Transaction');
    }
}
