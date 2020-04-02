<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /*select 
    sum(case when type='credit' then amount else -amount end)
from report;*/
    public function essentialoperationaccounts()
    {
        return $this->hasMany('App\Essentialoperationaccount');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
