<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Essentialoperationaccount extends Model
{
    public function essentialoperation(){
        return $this->belongsTo('App\Essentialoperation');
    }
    public function account(){
        return $this->belongsTo('App\Account');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
}
