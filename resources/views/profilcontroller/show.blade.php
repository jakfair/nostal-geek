@extends('layouts.app')

@section('content')
@foreach($lienoeuvres as $lienoeuvre)
    {{$lienoeuvre->nom}}
@endforeach
    @if($user->id == $profil->id)

    @else
        @if($lienami == "none")
        <form method="post" id="formAmi" action="/profil/addami">
            @csrf
            <input hidden value="{{$profil->id}}" name="idami">
            <button type="submit">Envoyer</button>
        </form>
            @else
                {{$lienami->status}}
            @endif
    @endif
<div id="info-general">
    <img class="avatar" src="{{$user->avatar}}">
    <div class="infos">
        <h4>{{$user->name}}</h4>
        <span>{{$user->age}} ans</span>
        <p>{{$user->bio}}</p>
        <span>Niveau: {{$user->nbpoints}}</span>
    </div>
</div>
    <div id="top">
        <h2>Ses top 1:</h2>
        <div id="soustop">
            <div id="topjeu">
                <h3>Jeux vidéo</h3>
                <a href="#"><img src="/img/jak_3.jpg"></a>
            </div>
            <div id="topanime">
                <h3>Dessin animé</h3>
                <a href="#"><img src="/img/il-etait-une-fois-la-vie-dvd.jpg"></a>
            </div>
        </div>


    </div>
@endsection
