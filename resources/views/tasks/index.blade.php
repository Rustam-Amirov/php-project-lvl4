@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        <h1 class="mb-5">{{__('task.tasks')}}</h1>
        @include('flash::message')
        <div class="d-flex mb-3">
            <div>
                <form method="GET" action="{{route('tasks.index')}}" accept-charset="UTF-8">
                    <div class="row g-1">
                        <div class="col">
                            <select class="form-select me-2" name="filter[status_id]">
                                <option selected="selected" value="">{{__('task.t_status')}}</option>
                                @foreach($task_statuses as $status)
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select me-2" name="filter[created_by_id]">
                                <option selected="selected" value="">{{__('task.t_created_by')}}</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <select class="form-select me-2" name="filter[assigned_to_id]">
                                <option selected="selected" value="">{{__('task.t_assigned_to')}}</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <input class="btn btn-outline-primary me-2" type="submit" value="{{__('task.filter_button')}}">
                        </div>
                
                    </div>
                </form>
            </div>
            @if (!auth()->guest())
            <div class="ms-auto">
                <a href="{{route('tasks.create')}}" class="btn btn-primary ml-auto">{{__('task.create_task_button')}}</a>
            </div>
            @endif
        </div>
        <table class="table me-2">
            <thead>
                <tr>
                    <th>{{__('task.t_ID')}}</th>
                    <th>{{__('task.t_status')}}</th>
                    <th>{{__('task.t_name')}}</th>
                    <th>{{__('task.t_created_by')}}</th> 
                    <th>{{__('task.t_assigned_to')}}</th>
                    <th>{{__('task.t_date_create')}}</th>
                    @if (!auth()->guest())
                        <th>{{__('task.t_actions')}}</th>
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
                    <td>{{$task->createdBy->name}}</td>
                    <td>{{$task->assignedUser->name}}</td>
                    <td>{{$task->created_at->isoFormat('DD.MM.YYYY')}}</td>
                    <td>
                    @can('delete', $task)
                        <a class="text-danger text-decoration-none" href="{{route('tasks.destroy', ['_token' => csrf_token(), 'task' => $task->id])}}" data-confirm="???? ???????????????" data-method="delete">{{__('task.del_button')}}</a>
                    @endcan
                    @can('update', $task)
                        <a class="text-decoration-none" href="{{route('tasks.edit', $task->id)}}">{{__('task.change_button')}}</a>
                    @endcan
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{$tasks->links()}}
</main>

@endsection