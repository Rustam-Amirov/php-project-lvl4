@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        <h1 class="mb-5">Создать задачу</h1>
        <form method="POST" action="{{route('tasks.store')}}" accept-charset="UTF-8" class="w-50">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Имя</label>
                <input class="form-control" name="name" type="text" id="name">
            </div>

            <div class="form-group mb-3">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" cols="50" rows="10" id="description"></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="status_id">Статус</label>
                <select class="form-control" id="status_id" name="status_id">
                    <option selected="selected" value="">----------</option>
                    @foreach($task_statuses as $status)
                        <option value="{{$status->id}}">{{$status->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="assigned_to_id">Исполнитель</label>
                <select class="form-control" id="assigned_to_id" name="assigned_to_id">
                    <option selected="selected" value="">----------</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="labels">Метки</label>
                <select class="form-control" multiple="" name="labels[]">
                    <option value=""></option>
                    <option value="1">ошибка</option>
                    <option value="2">документация</option>
                    <option value="3">дубликат</option>
                    <option value="4">доработка</option>
                </select>
            </div>

            <input class="btn btn-primary mt-3" type="submit" value="Создать">
        </form>
    </main>
@endsection