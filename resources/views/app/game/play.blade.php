@extends('layouts.app')

@section('content')
<h4>Game For {{ $game->created_at->toFormattedDateString() }}</h4>
@endsection