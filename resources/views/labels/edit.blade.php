@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        <h1 class="mb-5">{{__('label.create_label')}}</h1>
        <form method="POST" action="{{route('labels.update', $label)}}" accept-charset="UTF-8" class="w-50">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">{{__('label.t_name')}}</label>
                <input class="form-control" name="name" type="text" value="{{$label->name}}" id="name">
            </div>

            <div class="form-group mb-3">
                <label for="description">{{__('label.t_description')}}</label>
                <textarea class="form-control" name="description" cols="50" rows="10" id="description">{{$label->description}}</textarea>
            </div>

            <input class="btn btn-primary mt-3" type="submit" value="{{__('label.update_button')}}">
        </form>
    </main>
@endsection