<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;

class User extends Authenticatable
{
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

    public function bets(){
        return $this->hasMany('App\Bet');
    }

    public function getAllUsers(){
        return User::all();
    }

    public function calculatePoints($userId){
        $bets = Bet::where('user_id', '=', $userId)->get();
        $points = $bets->sum('points');
        return $points;
    }

    public static function getRanking(){
        $bets = Bet::all();
        $users = User::all();
        foreach ($users as $user){
            $userBets = $bets->filter('user_id', $user->id);
        }
    }
}
