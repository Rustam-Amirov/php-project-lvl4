@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        <h1 class="mb-5">Задачи</h1>
        <div class="d-flex mb-3">
            <div>
                <form method="GET" action="{{route('tasks.index')}}" accept-charset="UTF-8">
                    <div class="row g-1">
                        <div class="col">
                            <select class="form-select me-2" name="filter[status_id]">
                                <option selected="selected" value="">Статус</option>
                                <option value="1">новая</option>
                                <option value="2">завершена</option>
                                <option value="3">выполняется</option>
                                <option value="4">в архиве</option></select>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select me-2" name="filter[created_by_id]">
                                <option selected="selected" value="">Автор</option>
                                <option value="1">Алёна Владимировна Ивановаа</option>
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select me-2" name="filter[assigned_to_id]">
                                <option selected="selected" value="">Исполнитель</option>
                                <option value="1">Алёна Владимировна Ивановаа</option>
                            </select>
                        </div>
                        <div class="col">
                            <input class="btn btn-outline-primary me-2" type="submit" value="Применить">
                        </div>
                
                    </div>
                </form>
            </div>
            @if (!auth()->guest())
            <div class="ms-auto">
                <a href="{{route('tasks.create')}}" class="btn btn-primary ml-auto">Создать задачу</a>
            </div>
            @endif
        </div>
        <table class="table me-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Статус</th>
                    <th>Имя</th>
                    <th>Автор</th> <th>Исполнитель</th>
                    <th>Дата создания</th>
                    <th>Действия</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>завершена</td>
                    <td>
                        <a class="text-decoration-none" href="https://php-task-manager-ru.hexlet.app/tasks/1">
                            Исправить ошибку в какой-нибудь строке
                        </a>
                    </td>
                    <td>Яковлев Антонин Романович</td>
                    <td>Лаврентий Иванович Назаров</td>
                    <td>05.04.2022</td>
                    <td>
                        <a class="text-decoration-none" href="https://php-task-manager-ru.hexlet.app/tasks/1/edit">
                            Изменить</a>
                    </td>
                </tr>

            </tbody>
        </table>
    <nav>
        <ul class="pagination">
            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">
                <span class="page-link" aria-hidden="true">‹</span>
                </li>
            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
            <li class="page-item"><a class="page-link" href="https://php-task-manager-ru.hexlet.app/tasks?page=2">2</a></li>
            <li class="page-item">
                <a class="page-link" href="https://php-task-manager-ru.hexlet.app/tasks?page=2" rel="next" aria-label="Next »">›</a>
            </li>
        </ul>
    </nav>
</main>

@endsection