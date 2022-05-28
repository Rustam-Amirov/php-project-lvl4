@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        @include('flash::message')
        <h1 class="mb-5">{{__('label.labels')}}</h1>
        @if (!auth()->guest())
            <a href="{{route('labels.create')}}" class="btn btn-primary">{{__('label.create_label_button')}}</a>
        @endif
        <table class="table mt-2">
            <thead>
                <tr>
                    <th>{{__('label.t_ID')}}</th>
                    <th>{{__('label.t_name')}}</th>
                    <th>{{__('label.t_description')}}</th>
                    <th>{{__('label.t_date_create')}}</th>
                @if (!auth()->guest())
                    <th>{{__('label.t_actions')}}</th>
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
                        <a class="text-danger text-decoration-none" href="{{route('labels.destroy', ['_token' => csrf_token(), 'label' => $label])}}" data-confirm="Вы уверены?" data-method="delete">{{__('label.del_button')}}</a>
                        <a class="text-decoration-none" href="{{route('labels.edit', ['label' => $label])}}">{{__('label.change_button')}}</a>
                    </td>
                @endcan
                </tr>
                @endforeach
            </tbody>
        </table>
    </main>
@endsection
