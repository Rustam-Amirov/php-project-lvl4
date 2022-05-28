@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        <h1 class="mb-5">{{__('label.create_label')}}</h1>
        <form method="POST" action="{{route('labels.store')}}" accept-charset="UTF-8" class="w-50">
            @csrf
            <div class="form-group mb-3">
                <label for="name">{{__('label.t_name')}}</label>
                <input class="form-control" name="name" type="text" id="name">
            </div>

            <div class="form-group mb-3">
                <label for="description">{{__('label.t_description')}}</label>
                <textarea class="form-control" name="description" cols="50" rows="10" id="description"></textarea>
            </div>

            <input class="btn btn-primary mt-3" type="submit" value="{{__('label.create_button')}}">
        </form>
    </main>
@endsection