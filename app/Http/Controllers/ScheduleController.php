<?php

namespace App\Http\Controllers;

use App\Game;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;

class ScheduleController extends Controller
{
    public function index()
    {
        $games = Game::all();
        $date = Carbon::parse($games->first()->time);
        setlocale(LC_TIME, config('app.local'));
        $date = $date->formatLocalized('%A %d %B %Y');
        $games->first()->time = $date;
        return view('schedule.index')->with('games', $games);
    }
}
