@extends('layouts.app')

@section('content')
    <h1>{{ $team->name }}</h1>
        <team>
            Gruppe: {{ $team->group->name }}
        </team>
@endsection