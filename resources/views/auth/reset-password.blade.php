@extends('layouts.app')
@section('main')
    <main class="container py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Сброс пароля</div>
                        <div class="card-body">
                            <form method="POST" action="{{route('password.email')}}">
                                @csrf
                                <div class="form-group row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-end">Email</label>
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required="" autocomplete="email" autofocus="">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{$message}}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Сбросить пароль
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection