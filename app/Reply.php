<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    //
    public function conversation(){
        return $this->belongsTo('Wezaworkshop\Conversation');
    }

}
