<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Transactionstatus extends Model
{
    //
    public function orders(){
        return $this->hasMany('Wezaworkshop\Order');
    }
    public function transactions(){
        return $this->hasMany('Wezaworkshop\Transaction');
    }
}
