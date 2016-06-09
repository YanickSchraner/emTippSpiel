@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Profil</div>

                    <div class="panel-body">
                        <div class="col-md-6">
                            <h3>Meine Wetten</h3>
                            @if($bets->isEmpty())
                                <p>Es sind keine Wetten vorhanden</p>
                            @else
                                <table class="table table-responsive table-hover">
                                    <thead>
                                    <tr>
                                        <th>Spiel</th>
                                        <th>Resultat</th>
                                        <th>Tipp</th>
                                        <th>Erzielte Punkte</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bets as $bet)
                                        <tr>
                                            <td>{{ $bet->game->homeTeam->name ." - ".  $bet->game->awayTeam->name}}</td>
                                            <td>{{ $bet->game->score_home ." : ". $bet->game->score_away }}</td>
                                            <td>{{ $bet->home_Score ." : ". $bet->away_Score }}</td>
                                            <td>{{ $bet->points }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <h3>Rangliste</h3>
                            <table class="table table-responsive table-hover">
                                <thead>
                                <tr>
                                    <th>Rang</th>
                                    <th>Name</th>
                                    <th>Punkte</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $ranking = collect();
                                foreach (Auth::user()->getAllUsers() as $user) {
                                    $ranking->push(['id' => $user->id, 'points' => $user->calculatePoints($user->id), 'name' => $user->name]);
                                }
                                $ranking = $ranking->sortByDesc('points');
                                $rank = 1;
                                ?>
                                @foreach($ranking->toArray() as $user)
                                    <tr>
                                        <td>{{ $rank++ }}</td>
                                        <td>{{ $user['name'] }}</td>
                                        <td>{{ $user['points'] }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
