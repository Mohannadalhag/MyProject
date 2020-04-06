<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegisteredOperationAccounts extends Model
{
    public function registeredoperation(){
        return $this->belongsTo('App\RegisteredOperation');
    }
    public function account(){
        return $this->belongsTo('App\Account');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
