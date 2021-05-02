@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <nav class="breadcrumb-dashboard" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">{{__('Usuários')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Criar')}}</li>
            </ol>
        </nav>
        <form class="p-3" action="{{ route('admin.user.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <h1 class="fs-3">{{__('Adicionar usuário')}}</h1>
            </div>
            <div class="mb-3">
                <label>{{__('Nome')}}</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name')}}">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label>E-mail</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{old('email')}}">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label>{{__('Senha')}}</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="" id="password" autocomplete="new-password" value="{{old('password')}}">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password-confirm">{{ __('Confirme a senha') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" value="{{old('passowrd_confirmation')}}">
            </div>
            <div class="mt-3">
                <button type="submit" class="btn btn-submit">{{__('Enviar')}}</button>
            </div>
            
        </form>
    </div>
@endsection