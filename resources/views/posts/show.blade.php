@extends('layouts.app')
    @section('content')
        <div class="page-header">
            <h1>{{$post->name}}</h1>
        </div>
        <hr>
        <p class="text-center">
            <img src="{{ url($post->image('large')) }}" alt="" class="img-responsive w-100">
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

