<li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
    <a class="nav-link" href="{{route('home') }}">Главная</a>
</li>
<li class="nav-item {{ request()->routeIs('news.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('news.index') }}">Новости</a>
</li>
<li class="nav-item {{ request()->routeIs('news.category.index') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('news.category.index') }}">Категории</a>
</li>
<li class="nav-item {{ request()->routeIs('about') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('about') }}">О нас</a>
</li>
@if(Auth::check() && Auth::user()->isAdmin())
<li class="nav-item">
    <div class="dropdown">
    <a class="nav-link " href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Админка</a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ route('admin.users.index') }}">Пользователи</a>
            <a class="dropdown-item" href="{{ route('admin.news.index') }}">Новости</a>
            <a class="dropdown-item" href="{{ route('admin.news.create') }}">Добавить новость</a>
            <a class="dropdown-item" href="{{ route('admin.download') }}">Скачать новости</a>
        </div>
    </div>
</li>
@endif




