@extends('layouts.app')

@section('content')
    Vu d'un défi dépendant de l'url (id du défi)

        {{$defi->intitule}}
        {{$defi->nbPoint}}


@endsection
