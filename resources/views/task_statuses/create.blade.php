@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        <h1 class="mb-5">{{__('taskStatus.create_status')}}</h1>
        <form method="POST" action="{{route('task_statuses.store')}}" accept-charset="UTF-8" class="w-50">
            @csrf
            <div class="form-group mb-3">
                <label for="name">{{__('taskStatus.t_name')}}</label>
                <input class="form-control @error('name') is-invalid @enderror" name="name" type="text" id="name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
            </div>

            <input class="btn btn-primary mt-3" type="submit" value="{{__('taskStatus.create_button')}}">
        </form>
    </main>
@endsection