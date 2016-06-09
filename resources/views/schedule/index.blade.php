@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div style="padding-right: 20px; padding-left: 20px;">
                @if ($errors->has('homeScore'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $errors->first('homeScore') }}</li>
                        </ul>
                    </div>
                @endif
                @if ($errors->has('awayScore'))
                    <div class="alert alert-danger">
                        <ul>
                            <li>{{ $errors->first('awayScore') }}</li>
                        </ul>
                    </div>
                @endif

                <h1>Spielplan</h1>

                <?php
                $matchday1 = $games->where('matchday', 1)->all();
                $matchday2 = $games->where('matchday', 2)->all();
                $matchday3 = $games->where('matchday', 3)->all();
                ?>
                <div class="col-md-6 col-sm-6">
                    <h4>Spieltag 1</h4>
                    <table class="table table-stripped table-hover">
                        <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Gruppe</th>
                            <th>Heimmannschaft</th>
                            <th>Auswärtsmannschaft</th>
                            <th>Resultat</th>
                            @if(Auth::check())
                                <th>Tipp</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $matchday1 as $game)
                            <tr>
                                <td>{{ $game->time }}</td>
                                <td>{{ 'Gruppe ' . $game->homeTeam->group->name }}</td>
                                <td><img src="/{{ $game->homeTeam->flagPath }}"
                                         alt="Flagge"> {{ $game->homeTeam->name }}</td>
                                <td><img src="/{{ $game->awayTeam->flagPath }}"
                                         alt="Flagge"> {{ $game->awayTeam->name }}</td>
                                <td>{{ $game->score_home ." : ". $game->score_away }}</td>
                                @if(Auth::check())
                                    <?php $filtered = $bets->where('game_id', $game->id)?>
                                    @if($filtered->isEmpty())
                                        <td>
                                            <button data-game_id="{{ $game->id }}"
                                                    data-home_team="{{ $game->homeTeam->name }}"
                                                    data-away_team="{{ $game->awayTeam->name }}"
                                                    class="btn btn-xs btn-info"
                                                    data-toggle="modal" data-target="#betModal">Tippen
                                            </button>
                                        </td>
                                    @else
                                        <td>
                                            {{ $filtered->first()->home_Score ." : ". $filtered->first()->away_Score }}
                                        </td>
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6 col-sm-6">
                    <h4>Spieltag 2</h4>
                    <table class="table table-stripped table-hover">
                        <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Gruppe</th>
                            <th>Heimmannschaft</th>
                            <th>Auswärtsmannschaft</th>
                            <th>Resultat</th>
                            @if(Auth::check())
                                <th>Tipp</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $matchday2 as $game)
                            <tr>
                                <td>{{ $game->time }}</td>
                                <td>{{ 'Gruppe ' . $game->homeTeam->group->name }}</td>
                                <td><img src="/{{ $game->homeTeam->flagPath }}"
                                         alt="Flagge"> {{ $game->homeTeam->name }}</td>
                                <td><img src="/{{ $game->awayTeam->flagPath }}"
                                         alt="Flagge"> {{ $game->awayTeam->name }}</td>
                                <td>{{ $game->score_home ." : ". $game->score_away }}</td>
                                @if(Auth::check())
                                    <?php $filtered = $bets->where('game_id', $game->id)?>
                                    @if($filtered->isEmpty())
                                        <td>
                                            <button data-game_id="{{ $game->id }}"
                                                    data-home_team="{{ $game->homeTeam->name }}"
                                                    data-away_team="{{ $game->awayTeam->name }}"
                                                    class="btn btn-xs btn-info"
                                                    data-toggle="modal" data-target="#betModal">Tippen
                                            </button>
                                        </td>
                                    @else
                                        <td>
                                            {{ $filtered->first()->home_Score ." : ". $filtered->first()->away_Score }}
                                        </td>
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6 col-sm-6">
                    <h4>Spieltag 3</h4>
                    <table class="table table-stripped table-hover">
                        <thead>
                        <tr>
                            <th>Datum</th>
                            <th>Gruppe</th>
                            <th>Heimmannschaft</th>
                            <th>Auswärtsmannschaft</th>
                            <th>Resultat</th>
                            @if(Auth::check())
                                <th>Tipp</th>
                            @endif
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $matchday3 as $game)
                            <tr>
                                <td>{{ $game->time }}</td>
                                <td>{{ 'Gruppe ' . $game->homeTeam->group->name }}</td>
                                <td><img src="/{{ $game->homeTeam->flagPath }}"
                                         alt="Flagge"> {{ $game->homeTeam->name }}</td>
                                <td><img src="/{{ $game->awayTeam->flagPath }}"
                                         alt="Flagge"> {{ $game->awayTeam->name }}</td>
                                <td>{{ $game->score_home ." : ". $game->score_away }}</td>
                                @if(Auth::check())
                                    <?php $filtered = $bets->where('game_id', $game->id)?>
                                    @if($filtered->isEmpty())
                                        <td>
                                            <button data-game_id="{{ $game->id }}"
                                                    data-home_team="{{ $game->homeTeam->name }}"
                                                    data-away_team="{{ $game->awayTeam->name }}"
                                                    class="btn btn-xs btn-info"
                                                    data-toggle="modal" data-target="#betModal">Tippen
                                            </button>
                                        </td>
                                    @else
                                        <td>
                                            {{ $filtered->first()->home_Score ." : ". $filtered->first()->away_Score }}
                                        </td>
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    @if(Auth::check())
        <div class="modal fade" id="betModal" tabindex="-1" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Tippen</h4>
                    </div>
                    <div class="modal-body">
                        <p>Geben Sie Ihr Tipp ab:</p>
                        {!! Form::open(['class' => 'form-horizontal']) !!}
                        {{ Form::hidden('user_id', Auth::user()->id) }}
                        {{ Form::hidden('game_id', null, ['id' => 'gameIdModal']) }}
                        <div class="form-group">
                            {!! Form::label('homeScore', 'Heimteam: ', ['id' => 'homeTeam']) !!}
                            {!! Form::number('homeScore', null, ['class' => 'form-control', 'min' => 0, 'max' => 20, 'required']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('awayScore', 'Auswärtsteam: ', ['id' => 'awayTeam']) !!}
                            {!! Form::number('awayScore', null, ['class' => 'form-control', 'min' => 0, 'max' => 20, 'required']) !!}
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Schliessen</button>
                        {!! Form::submit('Tippen', ['class' => 'btn btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    @endif
    <script type="application/javascript">
        $('#betModal').on('show.bs.modal', function (e) {
            //get data-id attribute of the clicked element
            var gameId = $(e.relatedTarget).data('game_id');
            var homeTeam = $(e.relatedTarget).data('home_team');
            var awayTeam = $(e.relatedTarget).data('away_team');
            $("#gameIdModal").val(gameId);
            $("#homeTeam").text(homeTeam);
            $("#awayTeam").text(awayTeam);
        });
    </script>
@endsection