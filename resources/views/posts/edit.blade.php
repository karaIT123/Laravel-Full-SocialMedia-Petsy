@extends('layouts.sidebar')

@section('main')

    @include('posts.form', ['action' => 'update'])

@stop

@section('sidebar')

    @include('sidebar.sidebar',['tab' => 'post'])

@stop
