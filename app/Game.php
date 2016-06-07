<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function teams(){
        $this->belongsTo('App\Team');
    }

    public function bets(){
        $this->hasMany('App\Bet');
    }
}
