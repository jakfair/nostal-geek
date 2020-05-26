@extends('layouts.app')

@section('content')
    @if(Auth::user()->admin == 1)
    <div class="ls_admin">
        <span class="ls_admin_title">Tous les profils</span>
    @foreach($profils as $profil)
        <div class="ls_admin_nom_lien">
            <span class="ls_admin_nom"> {{$profil->name}}</span>
            <a href="/profil/edit/{{$profil->id}}">modifier</a>
            <a href="/profil/destroy/{{$profil->id}}">supp</a><br/>
        </div>
    @endforeach
    </div>
    @else
        vous n'êtes pas autorisé à venir ici
    @endif
@endsection
