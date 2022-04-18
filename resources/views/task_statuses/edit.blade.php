@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        <h1 class="mb-5">Изменить статус</h1>
        <form method="POST" action="{{route('task_statuses.update', $taskStatus)}}" accept-charset="UTF-8" class="w-50">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Имя</label>
                <input type="hidden" name="id" type="text" id="id" value="{{$taskStatus->id}}">
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" id="name" value="{{$taskStatus->name}}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>

            <input class="btn btn-primary mt-3" type="submit" value="Обновить">
        </form>
    </main>
@endsection