@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        <h1 class="mb-5">Создать задачу</h1>
        <form method="POST" action="{{route('tasks.store')}}" accept-charset="UTF-8" class="w-50">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Имя</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" id="name">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="description">Описание</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" cols="50" rows="10" id="description"></textarea>
                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="status_id">Статус</label>
                <select class="form-control @error('status_id') is-invalid @enderror" id="status_id" name="status_id">
                    <option selected="selected" value="">----------</option>
                    @foreach($task_statuses as $status)
                        <option value="{{$status->id}}">{{$status->name}}</option>
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
                <select class="form-control" id="assigned_to_id" name="assigned_to_id">
                    <option selected="selected" value="">----------</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group mb-3">
                <label for="labels">Метки</label>
                <select class="form-control @error('labels') is-invalid @enderror" multiple="" name="labels[]">
                    <option value=""></option>
                    @foreach ($labels as $label)
                        <option value="{{$label->id}}">{{$label->name}}</option>
                    @endforeach
                </select>
                @error('labels')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <input class="btn btn-primary mt-3" type="submit" value="Создать">
        </form>
    </main>
@endsection