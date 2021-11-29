@extends('layouts.sidebar')

@section('main')

    <div class="row justify-content-end">
        <div class="col-md-12">
        <!--<div class="col-md-8">-->
            <div class="card">
                <div class="card-header">Mon compte</div>
                <div class="card-body">
                    {!! Form::model($user, ['files' => true]) !!}

                    @if($user->avatar)
                        <div class="form-group row">
                            {{ Form::label(null, 'Profil', ['class' => 'col-md-4 col-form-label text-md-end fs-1']) }}


                            <div class="col-md-6">
                                <img src="{{ url($user->avatar) }}" alt="">
                            </div>
                        </div>

                    @endif
                    <div class="form-group row">
                        {{ Form::label(null, 'Avatar', ['class' => 'col-md-4 col-form-label text-md-end']) }}


                        <div class="col-md-6">
                            {!! Form::file("avatar", ['class' => 'form-control']) !!}

                            @error('avatar')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label(null, 'E-mail', ['class' => 'col-md-4 col-form-label text-md-end']) }}


                        <div class="col-md-6">
                            {!! Form::email("email",  null, ['class' => 'form-control', 'readonly']) !!}

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">

                        {{ Form::label(null, 'Nom d\'utilisateur', ['class' => 'col-md-4 col-form-label text-md-end']) }}

                        <div class="col-md-6">

                            {!! Form::text("name", null, ['class' => 'form-control', 'autofocus']) !!}

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label(null, 'Prenom', ['class' => 'col-md-4 col-form-label text-md-end']) }}

                        <div class="col-md-6">
                            {!! Form::text("firstname", null, ['class' => 'form-control']) !!}

                            @error('firstname')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label(null, 'Nom', ['class' => 'col-md-4 col-form-label text-md-end']) }}

                        <div class="col-md-6">
                        {!! Form::text("lastname", null, ['class' => 'form-control']) !!}

                            @error('lastname')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0 mt-3">
                        <div class="col-md-6 offset-md-4">

                            {!! Form::button('Editer', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@section('sidebar')
    @include('sidebar.sidebar',['tab' => 'profile'])
@endsection

