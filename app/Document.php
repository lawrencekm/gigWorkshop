<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    public function order(){
        return $this->belongsTo('Wezaworkshop\Order');
    }
    public function documenttype(){
        return $this->belongsTo('Wezaworkshop\Documenttype');
    }
}
