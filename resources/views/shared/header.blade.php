<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{route('main')}}">Менеджер задач</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link " href="{{route('tasks.index')}}">Задачи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="{{route('task_statuses.index')}}">Статусы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="https://php-task-manager-ru.hexlet.app/labels">Метки</a>
                </li>
            </ul>

                    <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                @if (auth()->guest())
                <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Вход</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('register')}}">Регистрация</a>
                </li>
                @else

                <li class="nav-item dropdown">
                    <a id="navbarDropdownMenuLink" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                        ffff <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            Выход
                        </a>
                        <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endif
            </ul>
        </div>
    </div>
</nav>