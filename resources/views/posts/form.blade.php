

<div class="container">
    <div class="row justify-content-center">
        <!--<div class="col-md-8">
            <div class="row">
                <div class="col-md-4 text-end"><h3>Ajouter une espèce</h3></div>
                <div class="col-md-6">-</div>
            </div>
        </div>-->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ $action == "store" ? __('Ajouter un animal') :  __('Editer l\'animal ')  }} <b>{{  $post->name }}</b></div>

                <div class="card-body">


                    {!! Form::model($post,
                    ['files' => true,
                    'url' => action("App\Http\Controllers\PostsController@$action",$post),
                    'method' => $action == "store" ? "POST" : "PUT"]) !!}

                    <div class="form-group row">
                        {{ Form::label(null, 'Image', ['class' => 'col-md-4 col-form-label text-md-end']) }}

                        <div class="col-md-6">
                            {!! Form::file("image", ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label(null, 'Nom', ['class' => "col-md-4 col-form-label text-md-end  "]) }}
                        <div class="col-md-6">
                            {!! Form::text("name", null, ['class' => 'form-control', 'autofocus']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label(null, 'Animaux', ['class' => 'col-md-4 col-form-label text-md-end']) }}
                        <div class="col-md-6">
                            {!! Form::select("species_id",Auth::user()->pets()->pluck('name','id'), null, ['class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="form-group row">
                        {{ Form::label(null, 'Description', ['class' => "col-md-4 col-form-label text-md-end  "]) }}
                        <div class="col-md-6">
                            {!! Form::textarea("content", null, ['class' => 'form-control']) !!}
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
