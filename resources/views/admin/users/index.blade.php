@extends('layouts.main')

@section('title', 'Редакция пользователей')

@section('menu')
    @include('menu')
@endsection


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div id="card-body" class="card-body">
                        <h2>Редакция пользователей</h2>
                        @forelse($users as $user)
                            <h3>{{ $user->name }}</h3>
                            <p class="status" data-status-id="{{ $user->id }}">Статус: {{ $user->is_admin ? 'Admin' : 'User'}}</p>
                            <form method="post" action="{{ route('admin.users.destroy', $user) }}">
                                <a class="btn btn-success" href="{{ route('admin.users.edit', $user) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-info" id="toggle" data-id="{{ $user->id }}">Change Status</button>
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        @empty
                        Нет новостей
                        @endforelse
                    </div>
                    <div class="card-body">
                    {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function () {
            document.getElementById('card-body').addEventListener('click', (event) => {
                if(event.target && event.target.matches('button.btn-info')) {
                    const id = event.target.getAttribute("data-id");
                    fetch('/admin/users/toggle-status', {
                        method: 'POST',
                        headers: {
                            'content-type': 'application/json',
                            'Accept': 'application/json',
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        body: JSON.stringify({id})
                    })
                    .then(response => response.json())
                    .then((data) => {
                        document.querySelector(`[data-status-id='${id}']`).innerHTML = `Статус: ${data}`;
                    });
                }
            });
        }
    </script>
@endsection




