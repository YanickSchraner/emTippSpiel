<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function group(){
        return $this->belongsTo('App\Group');
    }

    public function games(){
        return $this->hasMany('App\Game');
    }
}
