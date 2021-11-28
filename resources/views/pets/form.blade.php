

<div class="container">
    <div class="row justify-content-center">
        <!--<div class="col-md-8">
            <div class="row">
                <div class="col-md-4 text-end"><h3>Ajouter une espèce</h3></div>
                <div class="col-md-6">-</div>
            </div>
        </div>-->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $action == "store" ? __('Ajouter un animal') :  __('Editer l\'animal ')  }} <b>{{  $pet->name }}</b></div>

                <div class="card-body">


                    {!! Form::model($pet,
                    ['files' => true,
                    'url' => action("App\Http\Controllers\PetsController@$action",$pet),
                    'method' => $action == "store" ? "POST" : "PUT"]) !!}

                    @if($pet->avatar)
                        <div class="form-group row">
                            {{ Form::label(null, 'Profil', ['class' => 'col-md-4 col-form-label text-md-end fs-1']) }}


                            <div class="col-md-6">
                                <img src="{{ url($pet->avatar) }}" alt="">
                            </div>
                        </div>

                    @endif
                    <div class="form-group row">
                        {{ Form::label(null, 'Avatar', ['class' => 'col-md-4 col-form-label text-md-end']) }}


                        <div class="col-md-6">
                            {!! Form::file("avatar", ['class' => 'form-control']) !!}

                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label(null, 'Nom', ['class' => "col-md-4 col-form-label text-md-end  "]) }}
                        <div class="col-md-6">
                            {!! Form::text("name", null, ['class' => 'form-control', 'autofocus']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label(null, 'Sexe', ['class' => "col-md-4 col-form-label text-md-end  "]) }}
                        <div class="col-md-6">
                            {!! Form::select("gender", ['F' => 'Femelle', 'M' => 'Male'], null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label(null, 'Espèce', ['class' => 'col-md-4 col-form-label text-md-end']) }}
                        <div class="col-md-6">
                            {!! Form::select("species_id",DB::table('species')->pluck('name','id'), null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label(null, 'Anniversaire', ['class' => "col-md-4 col-form-label text-md-end  "]) }}
                        <div class="col-md-6">
                            {!! Form::text("birthday", $pet->birthday ? $pet->birthday->format('d/m/Y') : null, ['class' => 'form-control form-datepicker', 'id' => 'datetimepicker10']) !!}

                        </div>

                    </div>


                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            {!! Form::button( $action == "store" ? __('Ajouter') :  __('Editer'), ['class' => 'btn btn-primary mt-3', 'type' => 'submit']) !!}
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>
