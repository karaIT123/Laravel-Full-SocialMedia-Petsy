@extends('layouts.sidebar')

@section('main')

    @include('pets.form', ['action' => 'update'])

@stop

@section('sidebar')

    @include('sidebar.sidebar',['tab' => 'pet'])

@stop
