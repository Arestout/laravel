@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                    <h1>Новости</h1>
            </div>
            <div class="card-body">
    @forelse($news as $item)
        <h2>{{ $item['title'] }}</h2>
        @if (!$item['isPrivate'])
            <a href="{{ route('news.one', $item['id']) }}">Подробнее...</a><br>
        @endif
        <hr>
    @empty
        <p>Нет новостей</p>
    @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

