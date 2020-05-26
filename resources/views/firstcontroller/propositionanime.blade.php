@extends('layouts.app')

@section('content')
    @foreach($animes as $anime)
        <div class="card-discovery" style="background-image: url('{{$anime->banniere}}');">
            <div class="text">
                <h3>{{$anime->nom}}</h3>
                <a href="/fiche/{{$anime->fiche_id}}">Découvrir !</a>
            </div>
        </div>
    @endforeach
@endsection
