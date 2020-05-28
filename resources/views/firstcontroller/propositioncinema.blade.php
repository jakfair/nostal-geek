@extends('layouts.app')

@section('content')
    @foreach($cinemas as $cinema)
        <a href="/fiche/{{$cinema->fiche_id}}">
        <div class="card-discovery" style="background-image: url('{{$cinema->banniere}}');">
            <div class="text">
                <h3>{{$cinema->nom}}</h3>
                <span>Découvrir !</span>
            </div>
        </div>
        </a>
    @endforeach
@endsection
