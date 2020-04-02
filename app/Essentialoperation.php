<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Essentialoperation extends Model
{
    public function essentialoperationaccounts()
    {
        return $this->hasMany('App\Essentialoperationaccount');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
