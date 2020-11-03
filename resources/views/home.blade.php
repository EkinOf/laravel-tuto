@extends('layouts.web')

@section('title')
    Index du site
@endsection

@section('content')
    <div>
        <h1>Liste des pages disponibles : </h1>
        <ul>
            <li><a href="{!! route('home') !!}">Index</a></li>
            <li><a href="{!! route('bars.index') !!}">Liste des bars</a></li>
        </ul>
    </div>
@endsection
