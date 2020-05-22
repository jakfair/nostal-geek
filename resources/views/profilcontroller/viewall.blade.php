@extends('layouts.app')

@section('content')
    Tous les profils
    @foreach($profils as $profil)
       {{ $user = Auth::user();}}
        {{$profil->nom}}
    @endforeach
@endsection
