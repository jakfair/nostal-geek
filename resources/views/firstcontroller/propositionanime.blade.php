@extends('layouts.app')

@section('content')
    @foreach($anime as $oeuvres)
        <div class="card-discovery" style="background-image: url('/img/jak_3.jpg');">
            <div class="text">
                <h3>{{$oeuvres->nom}}</h3>
                <a href="#">Consulter maintenant</a>
            </div>
        </div>
    @endforeach
@endsection
