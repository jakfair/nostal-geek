@extends('layouts.app')

@section('content')
    @foreach($cinemas as $cinema)
        <div class="card-discovery" style="background-image: url('{{$cinema->banniere}}');">
            <div class="text">
                <h3>{{$cinema->nom}}</h3>
                <a href="#">Découvrir !</a>
            </div>
        </div>
    @endforeach
@endsection
