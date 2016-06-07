<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

use App\Http\Requests;

class GroupsController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('groups.index')->with('groups',$groups);
    }
}
