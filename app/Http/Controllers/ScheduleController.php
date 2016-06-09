<?php

namespace App\Http\Controllers;

use App\Bet;
use App\Game;
use Auth;

use App\Http\Requests;

class ScheduleController extends Controller
{
    public function index()
    {
        $games = Game::oldest('time')->get();
        $bets = Bet::where('user_id', '=', Auth::user()->id)->get();
        return view('schedule.index')->with('games', $games)->with('bets', $bets);
    }

    public function placeBet(Requests\PlaceBet $request)
    {
        Bet::create($request->all());
        return redirect('schedule');
    }
}
