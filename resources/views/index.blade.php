@extends('layouts.main')

@section('title', 'Главная')

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                {{ $errors->first('err') }}
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h1>Главная</h1>

            </div>
            <div class="card-body">

            </div>
        </div>
    </div>
</div>
@endsection




