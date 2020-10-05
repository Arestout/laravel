@extends('layouts.main')

@section('title')
    @parent Категории
@endsection

@section ('menu')
    @include('menu')
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
    @if ($news)
    <div class="card-header">
        <h1>Новости категории {{ $category }}</h1>
    </div>
        @forelse($news as $item)
        <div class="card-body">
            <h2>{{ $item['title'] }}</h2>
            @if (!$item['isPrivate'])
                <a href="{{ route('news.one', $item['id']) }}">Подробнее..</a>
            @endif
        </div>
        @empty
            Нет новостей
        @endforelse
    @else
        Нет такой категории
    @endif
@endsection
        </div>
    </div>
</div>

