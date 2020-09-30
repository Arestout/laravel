@extends('layouts.main')

@section('title', 'Новости')

@section('menu')
    @include('menu')
@endsection

@section('content')
    @forelse($news as $item)
        <h2>{{ $item['title'] }}</h2>
        @if (!$item['isPrivate'])
            <a href="{{ route('news.one', $item['id']) }}">Подробнее...</a><br>
        @endif
        <hr>
    @empty
        <p>Нет новостей</p>
    @endforelse
@endsection

