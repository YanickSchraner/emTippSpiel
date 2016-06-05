@extends('layouts.app')

@section('content')
    <h1>Teams</h1>
    @foreach($teams as $team)
        <team>
            <h3>{{$team->name}}</h3>
        </team>
    @endforeach
@endsection