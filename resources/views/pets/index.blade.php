@extends('layouts.sidebar')

@section('main')
    <h1>Gérer mes animaux</h1>

    <p class="text-end">
        <a href="{{ route('pets.create') }}" class="btn btn-primary">Ajouter un animal</a>
    </p>


    <table class="table table-striped  text-end ">
        <thead>
        <tr>
            <!--<th scope="col">#ID</th>-->
            <th scope="col">Avatar</th>
            <th scope="col">Nom</th>
            <th scope="col">Sexe</th>
            <th scope="col">Âge</th>
            <th scope="col">Espèce</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
            @foreach($pets as $pet)
                <tr>
                    <!--<th scope="row"> $pet->id }}</th>-->
                    <td><img src="{{ url($pet->avatar) }}?{{time()}}" class="rounded-circle" width="50" alt="Avatar"></td>
                    <td>{{ $pet->name }}</td>
                    <td>{{ $pet->gender }}</td>
                    <td>{{ $pet->age > 1 ? " $pet->age ans" : " $pet->age an"}} </td>
                    <td>{{ $pet->species->name }}</td>
                    <td>
                        <a href="{{ route('pets.edit',$pet) }}" class="btn btn-primary">Editer</a>
                        <a href="{{ route('pets.destroy',$pet) }}" class="btn btn-danger"
                           data-method="delete"
                           data-confirm="return confirm('Voulez-vous vraiment supprimer cet animal')"
                        >Supprimer</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('sidebar')
    @include('sidebar.sidebar',['tab' => 'pet'])
@endsection
