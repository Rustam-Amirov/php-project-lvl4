@extends('layouts.app')

@section('title', '')

@section('main')
<main class="container py-4">
    <h1 class="mb-5">
        {{__('task.show_task')}}: {{$task->name}}
        @if (!auth()->guest())
            <a href="{{route('tasks.edit', $task->id)}}">⚙</a>
        @endif
    </h1>
    <p>{{__('task.t_name')}}: {{$task->name}}</p>
    <p>{{__('task.t_status')}}: {{$task->status->name}}</p>
    <p>{{__('task.t_description')}}: {{$task->description}}</p>
    <p>{{__('task.t_labels')}}:</p>
        <ul>
            @foreach ($task->labels as $label)
                <li>{{$label->name}}</li>
            @endforeach
        </ul>
</main>
@endsection