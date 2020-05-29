@extends('layouts.app')

@section('content')
    @if(Auth::user()->admin == 1)
   <div class="ls_admin">
       <span class="ls_admin_title">Tous les défis</span>
       @foreach($defis as $defi)
           <div class="ls_admin_nom_lien {{$defi->defis_status}}">
               <div class="ls_admin_nom">{{$defi->intitule}}</div>
               <div class="ls_admin_nomjeu">{{$defi->nom}}</div><br>
               @if($defi->defis_status == "a confirmer")
               <a href="/defi/confirmer/{{$defi->defis_id}}">Confirmer</a>
               @endif
               <a href="/defi/edit/{{$defi->defis_id}}">modifier</a>
               <a href="/defi/destroy/{{$defi->defis_id}}">supp</a><br/>
           </div>
       @endforeach
   </div>
    @else
    vous n'êtes pas autorisé à venir ici
    @endif
@endsection

