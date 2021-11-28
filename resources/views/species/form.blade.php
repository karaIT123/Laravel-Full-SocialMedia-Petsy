

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
                <div class="card-header">{{ $action == "store" ? __('Ajouter une espèces') :  __('Editer une espèces') }}</div>

                <div class="card-body">

                    {!! Form::model($species,
                    ['url' => action("App\Http\Controllers\SpeciesController@$action",$species),
                    'method' => $action == "store" ? "POST" : "PUT"]) !!}
                    <div class="form-group row">
                        {{ Form::label(null, 'Nom', ['class' => "col-md-4 col-form-label text-md-end  "]) }}
                        <div class="col-md-6">
                            {!! Form::text("name", null, ['class' => 'form-control', 'autofocus']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label(null, 'Slug', ['class' => 'col-md-4 col-form-label text-md-end']) }}
                        <div class="col-md-6">
                            {!! Form::text("slug", null, ['class' => 'form-control']) !!}
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
