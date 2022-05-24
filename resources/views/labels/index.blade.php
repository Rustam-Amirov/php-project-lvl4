@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        @include('flash::message')
        <h1 class="mb-5">Метки</h1>
        @if (!auth()->guest())
            <a href="{{route('labels.create')}}" class="btn btn-primary">Создать метку</a>
        @endif
        <table class="table mt-2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Имя</th>
                    <th>Описание</th>
                    <th>Дата создания</th>
                @if (!auth()->guest())
                    <th>Действия</th>
                @endif
                </tr>
            </thead>
            <tbody>
                @foreach($labels as $label)
                <tr>
                    <td>{{$label->id}}</td>
                    <td>{{$label->name}}</td>
                    <td>{{$label->description}}</td>
                    <td>{{$label->created_at->format('d.m.Y')}}</td>
                @can('update', $label)
                    <td>
                        <a class="text-danger text-decoration-none" href="{{route('labels.destroy', ['_token' => csrf_token(), 'label' => $label])}}" data-confirm="Вы уверены?" data-method="delete">Удалить</a>
                        <a class="text-decoration-none" href="{{route('labels.edit', ['label' => $label])}}">Изменить</a>
                    </td>
                @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
