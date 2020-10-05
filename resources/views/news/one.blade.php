@extends('layouts.main')

@section('title', 'Новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
    @if ($news)
        @if (!$news['isPrivate'])
        <div class="card-header">
            <h1>{{ $news['title'] }}</h1>
        </div>
        <div class="card-body">
            <p>{{ $news['text'] }}</p>
        </div>
        @else
            Зарегистрируйтесь для просмотра
        @endif
    @else
        Нет новости с таким id
    @endif
@endsection
        </div>
    </div>
</div>
