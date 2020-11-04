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
                <form method="post" action="@if (!$news->id){{ route('admin.news.store') }}@else{{ route('admin.news.update', $news) }}@endif" enctype="multipart/form-data">
                    @csrf
                   @if($news->id) @method('PUT') @endif
                    <div class="form-group">
                        <label for="title">Заголовок</label>
                        @if($errors->has('title'))
                            <div class="alert alert-danger" role="alert">
                                @foreach($errors->get('title') as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $news->title }}">
                    </div>
                    <div class="form-group">
                        <label for="category">Категория</label>
                        @if ($errors->has('category_id'))
                            <div class="alert alert-danger" role="alert">
                                @foreach ($errors->get('category_id') as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        <select class="form-control" name="category" id="category">
                            @forelse($categories as $item)

                            @if (old('category'))
                                <option @if ($item->id == old('category')) selected
                                        @endif value="{{ $item->id }}">{{ $item->name }}
                            @else
                                <option @if ($item->id == $news->category_id) selected
                                        @endif value="{{ $item->id }}">{{ $item->name }}</option>
                            @endif

                        @empty

                            <option value="0">Нет категорий</option>
                        @endforelse
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="text">Текст</label>
                        @if ($errors->has('text'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('text') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                        <textarea class="form-control" name="text" id="text" rows="3">{{ old('text') ?? $news->text}}</textarea>
                    </div>

                    <div class="form-group">
                        @if ($errors->has('image'))
                        <div class="alert alert-danger" role="alert">
                            @foreach ($errors->get('image') as $error)
                                {{ $error }}
                            @endforeach
                        </div>
                    @endif
                        <input type="file" name="image">
                    </div>

                    <div class="form-group">
                        <input @if ($news->isPrivate == 1 || old('isPrivate') == 1) checked @endif type="checkbox" name="isPrivate" id="isPrivate" value="{{ $news->isPrivate }}">
                        <label for="isPrivate">Приватная</label>
                    </div>
                    <button class="btn btn-outline-primary" type="submit">@if ($news->id) Изменить @else Добавить @endif</button>
                </form>
            </div>
@endsection

        </div>
    </div>
</div>

