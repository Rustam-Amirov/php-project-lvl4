@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        @include('flash::message')
        <h1 class="mb-5">{{__('taskStatus.statuses')}}</h1>
        @if (!auth()->guest())
            <a href="{{route('task_statuses.create')}}" class="btn btn-primary">{{__('taskStatus.create_status')}}</a>
        @endif
        <table class="table mt-2">
            <thead>
                <tr>
                    <th>{{__('taskStatus.t_ID')}}</th>
                    <th>{{__('taskStatus.t_name')}}</th>
                    <th>{{__('taskStatus.t_date_create')}}</th>
                @if (!auth()->guest())
                    <th>{{__('taskStatus.t_actions')}}</th>
                @endif
                </tr>
            </thead>
            <tbody>
                @foreach($taskStatuses as $taskStatus)
                <tr>
                    <td>{{$taskStatus->id}}</td>
                    <td>{{$taskStatus->name}}</td>
                    <td>{{$taskStatus->created_at->format('d.m.Y')}}</td>
                @can('delete', $taskStatus)
                    <td>
                        <a class="text-danger text-decoration-none" href="{{route('task_statuses.destroy', ['_token' => csrf_token(), 'task_status' => $taskStatus])}}" data-confirm="Вы уверены?" data-method="delete">{{__('taskStatus.del_button')}}</a>
                        <a class="text-decoration-none" href="{{route('task_statuses.edit', ['task_status' => $taskStatus])}}">{{__('taskStatus.change_button')}}</a>
                    </td>
                @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection