<?php

namespace Wezaworkshop;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //
    public function replies(){
        return $this->hasMany('Wezaworkshop\Reply');
    }

}
