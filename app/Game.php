<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['created_at', 'updated_at'];


    public function homeTeam()
    {
        return $this->belongsTo('App\Team', 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo('App\Team', 'away_team_id');
    }

    public function getScoreHomeAttribute($value)
    {
        if (is_null($value)) {
            return '-';
        }
        return $value;
    }

    public function getScoreAwayAttribute($value)
    {
        if (is_null($value)) {
            return '-';
        }
        return $value;
    }

    public function getTimeAttribute($value)
    {
        $value = Carbon::parse($value);
        setlocale(LC_TIME, 'de_CH.UTF-8');
        return $value->formatLocalized('%A %d %B %Y');
    }

    public function getCreatedAtAttribute($value)
    {
        $value = Carbon::parse($value);
        $value->addYear();
        setlocale(LC_TIME, 'de_CH.UTF-8');
        return $value->formatLocalized('%A %d %B %Y');
    }


    public function bets()
    {
        return $this->hasMany('App\Bet');
    }
}
