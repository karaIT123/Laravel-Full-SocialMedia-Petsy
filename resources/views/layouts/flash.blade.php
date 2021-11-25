@if(count($errors) > 0)
    <div class="alert alert-danger">
        <strong>ATTENTION !!!</strong> Certain champs n'ont pas été rempli correctement.
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-error">
        {{ session('error') }}
    </div>
@endif
