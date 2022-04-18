@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        @include('flash::message')
        <h1 class="mb-5">Статусы</h1>
        @if (!auth()->guest())
            <a href="{{route('task_statuses.create')}}" class="btn btn-primary">Создать статус</a>
        @endif
        <table class="table mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Дата создания</th>
                @if (!auth()->guest())
                    <th>Действия</th>
                @endif
                </tr>
            </thead>
            <tbody>
                @foreach($taskStatuses as $taskStatus)
                <tr>
                    <td>{{$taskStatus->id}}</td>
                    <td>{{$taskStatus->name}}</td>
                    <td>{{$taskStatus->created_at->format('d.m.Y')}}</td>
                @if (!auth()->guest())
                    <td>
                        <a class="text-danger text-decoration-none" href="{{route('task_statuses.destroy', ['_token' => csrf_token(), 'task_status' => $taskStatus])}}" data-confirm="Вы уверены?" data-method="delete">Удалить</a>
                        <a class="text-decoration-none" href="{{route('task_statuses.edit', ['task_status' => $taskStatus])}}">Изменить</a>
                    </td>
                @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection