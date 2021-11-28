@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-8">
            @yield('main')
        </div>
        <div class="col-sm-12 col-md-4">
            @yield('sidebar')
        </div>
    </div>
@endsection

