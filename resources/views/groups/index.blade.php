@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Gruppen</h1>
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
                                        <td><a href="{{ action('TeamsController@getTeam', $team->id) }}">{{ $team->name }}</a></td>
                                        <td><img src="/{{ $team->flagPath }}" alt="Flagge"></td>
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