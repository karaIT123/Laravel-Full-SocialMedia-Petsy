@extends('layouts.sidebar')

@section('main')

    @include('pets.form', ['action' => 'store'])

@stop

@section('sidebar')

    @include('pets.sidebar',['tab' => 'profile'])

@stop
