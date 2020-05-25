@extends('layouts.app')

@section('content')
   Liste de tout les défis pour l'administration
@foreach($general as $generals)
   {{$generals->intitule}}
   {{$generals->nbPoint}}
@endforeach
   @foreach($defi as $defis)
       {{$defis->intitule}}
       {{$defis->nbPoint}}

   @endforeach
@endsection

