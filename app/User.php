<?php

namespace Wezaworkshop;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    //1:1 with address
    public function address(){
        return $this->morphMany('Wezaworkshop\Address','addressable');
    }
    public function payments(){
        return $this->hasMany('Wezaworkshop\Payment');
    }
    public function userstatus(){
        return $this->belongsTo('Wezaworkshop\Userstatus');
    }
    public function roles(){
        return $this->belongsToMany('Wezaworkshop\Role');
    }
    public function disciplines(){
        return $this->belongsToMany(Discipline::class)->withTimestamps();
    }
    public function bids(){
        return $this->hasMany('Wezaworkshop\Bid');
    }
    public function workingstatus(){
        return $this->belongsTo('Wezaworkshop\Workingstatus');
    }
    public function referrals(){
        return $this->hasMany('Wezaworkshop\Referral');
    }

    
}
