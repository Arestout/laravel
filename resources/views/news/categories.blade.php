@extends('layouts.main')

@section('title', 'Категории')

@section ('menu')
    @include('menu')
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                    <h1>Категории</h1>
            </div>
            <div class="card-body">
    @forelse($categories as $category)
        <a href="{{ route('news.category.show', $category['slug']) }}">
            <h2>{{ $category['name'] }}</h2>
        </a>
    @empty
        Нет категорий
    @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
