<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

use App\Http\Requests;

class TeamsController extends Controller
{
    public function index()
    {
        $teams = Team::all();
        return view('teams.index')->with('teams', $teams);
    }

    public function getTeam($id)
    {
        $team = Team::where('id', $id)->first();
        return view('teams.team')->with('team', $team);
    }
}
