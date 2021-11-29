@extends('layouts.app')
    @section('content')

        <h1>{{$post->name}}</h1>

        <hr>
        <p class="text-center">
            <img src="{{ url($post->image('large')) }}" alt="" class="img-responsive w-100">
        </p>

        <p class="text-end">
            @if(Auth::user() && Auth::user()->id == $post->user_id)
                <a href="{{ route('posts.edit',$post) }}" class="btn btn-primary">Editer</a>
            @endif
        </p>

        <div class="row">
            <div class="col-md-8">
                <h2>Commentaires</h2>
            </div>
            <div class="col-md-4">
                <h2>Présent sur cette photo</h2>
                <div class="div list-group">
                    @foreach($post->pets as $pet)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            {{ $pet->name }}
                            <span class="badge bg-primary rounded-pill">{{ $pet->age }} ans </span>
                        </li>
                    @endforeach
                </div>
            </div>
        </div>
    @endsection

