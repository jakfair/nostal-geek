@extends('layouts.app')

@section('content')
    @foreach($lienamis as $lienami)
        {{$lienami->email}}
    {{$lienami->status}}
    @endforeach
@endsection
