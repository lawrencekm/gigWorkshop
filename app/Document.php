<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    public function order(){
        return $this->belongsTo('wezaworkshop\Order');
    }
    public function documenttype(){
        return $this->belongsTo('wezaworkshop\Documenttype');
    }
}
