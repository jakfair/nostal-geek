@extends('layouts.app')

@section('content')
    @if(Auth::user()->admin == 1)
        <div class="ls_admin">
            <span class="ls_admin_title">Tous les Success</span>
            @foreach($success as $succes)
                <div class="ls_admin_nom_lien {{$succes->status}}">
                    <div class="ls_admin_nom success_nom">{{$succes->intitule}}</div>
                    @if($succes->status == "a confirmer")
                        <a href="/success/confirmer/{{$succes->id}}">Confirmer</a>
                    @endif
                    <a href="/success/edit/{{$succes->id}}">modifier</a>
                    <a href="/success/destroy/{{$succes->id}}">supp</a><br/>
                </div>
            @endforeach
        </div>
    @else
    vous n'êtes pas autorisé à venir ici
    @endif
@endsection

