@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Gruppen</h1>
                <span class="flag flag-che flag-5x"></span>
                @foreach($groups as $group)
                    <div class="col-md-4 com-sm-4">
                        <group>
                            <table class="table table-stripped table-hover">
                                <thead>
                                <tr>
                                    <th>Gruppe {{$group->name}}</th>
                                </tr>
                                </thead>
                                <tbody class="">
                                @foreach($group->teams as $team)
                                    <tr>
                                        <td><a href="{{ action('TeamsController@getTeam',$team->name) }}">{{ $team->name }}</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </group>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection