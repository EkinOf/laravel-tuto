@extends('layouts.web')

@section('title')
    Formulaire de création d'un bar
@endsection

@section('content')
    <div>
        <h1>Formulaire : </h1>
        {!! Form::open(['route' => 'bars.store']) !!}
        <label for="name">Nom du bar</label>
        <input type="text" name="name">
        <br>
        <br>
        <label for="location">Adresse du bar</label>
        <textarea name="location"></textarea>
        <br>
        <br>
        {!! Form::submit('Envoyer le formulaire') !!}
        {!! Form::close() !!}
    </div>
@endsection
