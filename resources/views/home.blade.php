@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2>My Games</h2>
        <div class="col-md-8">
            @foreach(auth()->user()->games as $game) 
                <div class="card">
                    <div class="card-body">
                        <p>
                            Game From {{ $game->created_at->diffForHumans() }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
