@extends('layouts.app')

@section('content')
   Liste de tout les défis pour l'administration
   @foreach($defi as $defis)
       {{$defis->intitule}}
       {{$defis->nbPoint}}

   @endforeach
@endsection

