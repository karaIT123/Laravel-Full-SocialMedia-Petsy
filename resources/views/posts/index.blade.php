@extends('layouts.sidebar')

@section('main')

    <h1>Les photos de mes animaux</h1>
    <hr>

    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-6">
                <h4>{{ $post->name }}</h4>
                <img src="{{ $post->image('thumb') }}" alt="">
            </div>
        @endforeach
    </div>

    <hr>
    <div class="">
        {!! $posts->render() !!}
    </div>


@stop

@section('sidebar')

    @include('sidebar.sidebar',['tab' => 'posts'])

@stop
