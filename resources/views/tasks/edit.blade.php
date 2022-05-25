@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        <h1 class="mb-5">Изменение задачи</h1>
        <form method="POST" action="{{route('tasks.update', $task->id)}}" accept-charset="UTF-8" class="w-50">
        @method('PATCH')
        @csrf
            <div class="form-group mb-3">
                <label for="name">Имя</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" value="{{$task->name}}" id="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="description">Описание</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="50" rows="10" id="description">
                    {{$task->description}}
                </textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="status_id">Статус</label>
                <select class="form-control @error('status_id') is-invalid @enderror" id="status_id" name="status_id">
                <option selected="selected" value="{{$task->status_id}}"></option>
                    @foreach($task_statuses as $status)
                        <option value="{{$status->id}}" @if ($status->id == $task->status_id) selected @endif>{{$status->name}}</option>
                    @endforeach
                </select>
                @error('status_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="assigned_to_id">Исполнитель</label>
                <select class="form-control @error('assigned_to_id') is-invalid @enderror" id="assigned_to_id" name="assigned_to_id">
                     @foreach ($users as $user)
                        <option value="{{$user->id}}" @if ($user->id == $task->assigned_to_id) selected @endif>{{$user->name}}</option>
                    @endforeach
                </select>
                @error('assigned_to_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="labels">Метки</label>
                <select class="form-control @error('labels[]') is-invalid @enderror" multiple="" name="labels[]">
                    <option value=""></option>
                    @foreach ($labels as $label)
                        <option value="{{$label->id}}" @if (!empty($task->labels->firstWhere('id', $label->id)))selected @endif>{{$label->name}}</option>
                    @endforeach
                </select>
                @error('labels[]')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <input class="btn btn-primary mt-3" type="submit" value="Обновить">
        </form>
    </main>
@endsection
