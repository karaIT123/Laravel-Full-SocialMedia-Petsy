@extends('layouts.app')

@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Inscription</div>

                <div class="card-body">
                    {!! Form::open(['url' => 'register', 'method' => 'POST']) !!}


                        @csrf

                        <div class="form-group row">

                            {{ Form::label(null, 'Nom d\'utilisateur', ['class' => 'col-md-4 col-form-label text-md-right']) }}

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
                            {{ Form::label(null, 'E-mail', ['class' => 'col-md-4 col-form-label text-md-right']) }}


                            <div class="col-md-6">
                                {!! Form::email("email", null, ['class' => 'form-control']) !!}

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label(null, 'Mot de passe', ['class' => 'col-md-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                {!! Form::password("password", ['class' => 'form-control']) !!}

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            {{ Form::label(null, 'Confirmez le mot de passe', ['class' => 'col-md-4 col-form-label text-md-right']) }}

                            <div class="col-md-6">
                                {!! Form::password("password_confirmation", ['class' => 'form-control']) !!}
                                <!--<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">-->
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">

                                {!! Form::button('S\'inscrire', ['class' => 'btn btn-primary', 'type' => 'submit']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                        <!--
                    </form>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
