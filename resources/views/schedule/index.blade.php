@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1>Spielplan</h1>

                <?php
                $matchday1 = $games->where('matchday', 1)->all();
                $matchday2 = $games->where('matchday', 2)->all();
                $matchday3 = $games->where('matchday', 3)->all();
                ?>
                <div class="col-md-4 com-sm-4">
                    <table class="table table-stripped table-hover">
                        <thead>
                        <tr>
                            <th>Spieltag 1</th>
                        </tr>
                        <tr>
                            <th>Datum</th>
                            <th>Heimmannschaft</th>
                            <th>Auswärtsmannschaft</th>
                            <th>Resultat</th>
                        </tr>
                        </thead>
                        <tbody class="">
                        @foreach( $matchday1 as $game)
                            <tr>
                                <?php
                                $date = \Carbon\Carbon::parse($game->time);
                                setlocale(LC_TIME, config('app.local'));
                                $date = $date->formatLocalized('%A %d %B %Y');
                                ?>
                                <td>{{ $date }}</td>
                                <td><img src="/{{ $game->homeTeam->flagPath }}"
                                         alt="Flagge"> {{ $game->homeTeam->name }}</td>
                                <td><img src="/{{ $game->awayTeam->flagPath }}"
                                         alt="Flagge"> {{ $game->awayTeam->name }}</td>
                                <td>{{ $game->scoreHome . $game->scoreAway }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection