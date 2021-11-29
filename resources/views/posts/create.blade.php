@extends('layouts.sidebar')

@section('main')

    @include('posts.form', ['action' => 'store'])

@stop

@section('sidebar')

    @include('sidebar.sidebar',['tab' => 'post'])

@stop
