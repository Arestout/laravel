@extends('layouts.main')

@section('title', 'Добавить новость')

@section('menu')
    @include('menu')
@endsection

@section('content')
<h2 class="mb-4">Добавить новость</h2>
<form>
    <div class="form-group">
      <label for="title">Заголовок</label>
      <input type="text" class="form-control" name="title" id="title" placeholder="Заголовок">
    </div>
    <div class="form-group">
      <label for="category">Категория</label>
      <select class="form-control" id="category">
        @forelse($categories as $category)
        <option id="{{ $category['id'] }}" value="{{ $category['slug']}}">{{ $category['title'] }}</option>
    @empty
        Нет категорий
    @endforelse
      </select>
    </div>
    <div class="form-group">
      <label for="text">Текст</label>
      <textarea class="form-control" id="text" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Опубликовать</button>
  </form>
@endsection

