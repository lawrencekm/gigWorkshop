<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    public function disciplines(){
        return $this->belongsToMany('wezaworkshop\Discipline');
    }
    public function transactionstatus(){
        return $this->belongsTo('wezaworkshop\Transactionstatus');
    }
    public function bids(){
        return $this->hasMany('wezaworkshop\Bid');
    }
    public function transactions(){
        return $this->hasMany('wezaworkshop\Transaction');
    }
    public function orderstatus(){
        return $this->belongsTo('wezaworkshop\Orderstatus');
    }
    public function typeofwork(){
        return $this->belongsTo('wezaworkshop\Typeofwork');
    }
    public function citation(){
        return $this->belongsTo('wezaworkshop\Citation');
    }
}
