@extends('layouts.app')

@section('content')
    <h1>Gérer les espèces</h1>

    <p class="text-end">
        <a href="{{ route('species.create') }}" class="btn btn-primary">Ajouter une espèce</a>
    </p>


    <table class="table table-striped   text-end ">
        <thead>
        <tr>
            <th scope="col">#ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Slug</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($species as $s)
                <tr>
                    <th scope="row">{{ $s->id }}</th>
                    <td>{{ $s->name }}</td>
                    <td>{{ $s->slug }}</td>
                    <td>
                        <a href="{{ action('App\Http\Controllers\SpeciesController@edit',$s) }}" class="btn btn-primary">Editer</a>
                        <a href="{{ action('App\Http\Controllers\SpeciesController@destroy',$s) }}" class="btn btn-danger"
                           data-method="delete"
                           data-confirm="return confirm('Voulez-vous vraiment supprimer cette espèce')"
                        >Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
