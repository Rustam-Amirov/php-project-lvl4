@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        <h1 class="mb-5">Задачи</h1>
        @include('flash::message')
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
                    <th>Автор</th> 
                    <th>Исполнитель</th>
                    <th>Дата создания</th>
                    @if (!auth()->guest())
                        <th>Действия</th>
                    @endif
                </tr>
            </thead>
            <tbody>
                @foreach($tasks as $task)
                <tr>
                    <td>{{$task->id}}</td>
                    <td>{{$task->status->name}}</td>
                    <td>
                        <a class="text-decoration-none" href="{{route('tasks.show', $task->id)}}">
                            {{$task->name}}
                        </a>
                    </td>
                    <td>{{$task->createdUser->name}}</td>
                    <td>{{$task->assignedUser->name}}</td>
                    <td>{{$task->created_at->isoFormat('DD.MM.YYYY')}}</td>
                    <td>
                    @can('delete', $task)
                        <a class="text-danger text-decoration-none" href="{{route('tasks.destroy', ['_token' => csrf_token(), 'task' => $task->id])}}" data-confirm="Вы уверены?" data-method="delete">Удалить</a>
                    @endcan
                    @can('update', $task)
                        <a class="text-decoration-none" href="{{route('tasks.edit', $task->id)}}">Изменить</a>
                    @endcan
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{$tasks->links()}}
</main>

@endsection