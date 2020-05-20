@extends('layouts.app')

@section('content')
    Vu d'une page d'animé/jeu vidéo
    {{$fiche -> nom}}
    {!!$fiche -> lien!!}
    @include('defiscontroller.form')
@endsection
