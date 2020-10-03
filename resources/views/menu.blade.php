<li class="nav-item">
    <a class="nav-link" href="{{route('home') }}">Главная</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('news.index') }}">Новости</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('news.category.index') }}">Категории</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('about') }}">О нас</a>
</li>
<li class="nav-item">
    <div class="dropdown">
    <a class="nav-link " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Админка</a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ route('admin.publish') }}">Добавить новость</a>
            <a class="dropdown-item" href="{{ route('admin.test2') }}">Test 2</a>
        </div>
    </div>
</li>

{{-- href="{{ route('admin.index') }}" --}}

