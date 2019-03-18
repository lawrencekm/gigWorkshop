<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Transactionmethod extends Model
{
    //
    public function transactions(){
        return $this->hasMany('wezaworkshop\Transaction');
    }
}
