<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Transactiontype extends Model
{
    //
    public function transactions(){
        return $this->hasMany('Wezaworkshop\Transaction');
    }
}
