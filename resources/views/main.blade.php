@extends('layouts.app')

@section('title', '')

@section('main')
    <main class="container py-4">
        <div class="p-5 mb-4 bg-light border rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">{{__('main.title')}}</h1>
                <p class="col-md-8 fs-4">{{__('main.description')}}</p>
                <p class="col-md-8 fs-4">Привет от Хекслета!</p>
                <button onclick="location.href='https://github.com/Rustam-Amirov'" class="btn btn-primary btn-lg" type="button">{{__('main.link')}}</button>
            </div>
        </div>
    </main>
@endsection