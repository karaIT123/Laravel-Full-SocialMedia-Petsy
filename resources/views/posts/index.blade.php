@extends('layouts.sidebar')

@section('main')

    <h1>Les photos de mes animaux</h1>
    <hr>

    <div class="row">
        @foreach($posts as $post)
            <div class="col-md-6 mb-5">
                <a class="text-decoration-none" href="{{ route('posts.show',$post) }}">
                    <h4>{{ $post->name }}</h4>
                    <img src="{{ $post->image('thumb') }}" alt="">
                </a>
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
