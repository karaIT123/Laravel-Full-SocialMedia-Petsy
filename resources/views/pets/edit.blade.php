@extends('layouts.sidebar')

@section('main')

    @include('pets.form', ['action' => 'update'])

@stop

@section('sidebar')

    @include('pets.sidebar',['tab' => 'pet'])

@stop
