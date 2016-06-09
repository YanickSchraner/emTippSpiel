<?php

namespace App\Http\Controllers;

use App\Bet;
use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bets = Bet::where('user_id', '=', Auth::user()->id)->get();
        return view('home')->with('bets', $bets);
    }
}
