@extends('layouts.app')

@section('content')

    <!--<h1>Ajouter une espèce</h1>-->

    @include('pets.form', ['action' => 'store'])

@stop
