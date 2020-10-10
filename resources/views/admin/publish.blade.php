@extends('layouts.main')

@section('title', 'Добавить новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mb-4">
                <h2>Добавить новость</h2>
            </div>
            <div class="col-md-8">
                <form method="post" action="@if (!$news->id){{ route('admin.publish') }}@else{{ route('admin.update', $news) }}@endif" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $news->title }}">
                    </div>
                    <div class="form-group">
                        <label for="category">Категория</label>
                        <select class="form-control" name="category" id="category">
                            @forelse($categories as $category)
                            <option @if ($category['id'] == old('category') || $category['id'] == $news->category_id) selected @endif id="{{ $category['id'] }}" value="{{ $category['id']}}">{{ $category['name'] }}</option>
                            @empty
                            <option value="0">Нет категорий</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text">Текст</label>
                        <textarea class="form-control" name="text" id="text" rows="3">{{ old('text') ?? $news->text}}</textarea>
                    </div>

                    <div class="form-group">
                        <input type="file" name="image">
                    </div>

                    <div class="form-group">
                        <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif type="checkbox" name="isPrivate" id="isPrivate" value="{{ $news->isPrivate }}">
                        <label for="isPrivate">Приватная</label>
                    </div>
                    <input class="btn btn-outline-primary" type="submit" value="@if ($news->id) Изменить @else Добавить @endif">
                </form>
            </div>
@endsection

        </div>
    </div>
</div>

