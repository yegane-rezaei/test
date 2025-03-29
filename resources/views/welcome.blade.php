

@extends('layout')
@section('title','home page')
@section('content')
    welcome
    @auth
        {{auth()->user()->name}}
    @endauth
@endsection