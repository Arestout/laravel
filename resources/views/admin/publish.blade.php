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
                <form method="post" action="{{ route('admin.publish')}}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="category">Категория</label>
                        <select class="form-control" name="category" id="category">
                            @forelse($categories as $category)
                            <option @if ($category['id'] == old('category')) selected @endif id="{{ $category['id'] }}" value="{{ $category['id']}}">{{ $category['title'] }}</option>
                            @empty
                            <option value="0">Нет категорий</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text">Текст</label>
                        <textarea class="form-control" name="text" id="text" rows="3">{{ old('text')}}</textarea>
                    </div>
                    <div class="form-group">
                        <input @if (old('isPrivate')) checked @endif type="checkbox" name="isPrivate" id="isPrivate" value="1">
                        <label for="isPrivate">Приватная</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Опубликовать</button>
                </form>
            </div>
@endsection
        </div>
    </div>
</div>

