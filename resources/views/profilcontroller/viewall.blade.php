@extends('layouts.app')

@section('content')
    Tous les profils
    @foreach($profils as $profil)
        {{$profil->name}}
    @endforeach
@endsection
