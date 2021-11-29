@extends('layouts.sidebar')

@section('main')

    @include('pets.form', ['action' => 'store'])

@stop

@section('sidebar')

    @include('sidebar.sidebar',['tab' => 'profile'])

@stop
