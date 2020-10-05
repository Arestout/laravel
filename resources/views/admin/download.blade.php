@extends('layouts.main')

@section('title', 'test 2')

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h1>Скачать новости</h1>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('admin.download')}}">
                    @csrf
                    <div class="form-group col-md-4">
                        <label for="category">Выберете категорию</label>
                        <select class="form-control" name="category" id="category">
                            @forelse($categories as $category)
                            <option id="{{ $category['id'] }}" value="{{ $category['id']}}">{{ $category['title'] }}</option>
                            @empty
                            <option value="0">Нет категорий</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <button type="submit" class="btn btn-primary">Скачать</button>
                    </div>
                </form>
            </div>
@endsection
        </div>
    </div>
</div>
