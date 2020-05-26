@extends('layouts.app')

@section('content')
    @if(Auth::user()->admin == 1)
   <div class="ls_admin">
       <span class="ls_admin_title">Tous les défis</span>
       @foreach($success as $succes)
           <div class="ls_admin_nom_lien">
               <span class="ls_admin_nom">{{$succes->intitule}}</span>
               <a href="/success/edit/{{$succes->id}}">modifier</a>
               <a href="/success/destroy/{{$succes->id}}">supp</a><br/>
           </div>
       @endforeach
   </div>
    @else
    vous n'êtes pas autorisé à venir ici
    @endif
@endsection

