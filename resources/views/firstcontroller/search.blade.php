@extends('layouts.app')

@section('content')
@foreach($fiches as $fiche)
    {{$fiche->nom}}
    @endforeach
@endsection
