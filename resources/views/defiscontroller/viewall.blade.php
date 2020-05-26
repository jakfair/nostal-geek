@extends('layouts.app')

@section('content')
   <div class="ls_admin">
       <span class="ls_admin_title">Tous les défis</span>
       @foreach($defis as $defi)
           <div class="ls_admin_nom_lien">
               <span class="ls_admin_nom">{{$defi->intitule}}</span>
               <a href="/defi/edit/{{$defi->id}}">modifier</a>
               <a href="/defi/destroy/{{$defi->id}}">supp</a><br/>
           </div>
       @endforeach
   </div>
@endsection

