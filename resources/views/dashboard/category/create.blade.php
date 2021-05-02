@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <nav class="breadcrumb-dashboard" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">{{__('Categorias')}}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{__('Criar')}}</li>
            </ol>
        </nav>
        <form class="p-3" action="{{ route('admin.category.store') }}" method="post">
            @csrf

            <div class="mb-3">
                <h1 class="fs-3">{{__('Criar categoria')}}</h1>
            </div>

            <div class="mb-3">
                <label for="name">{{__('Nome')}}</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Insira o nome.." value="{{old('name')}}">
                @error('name')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="mb-3">
                <span>{{__('Descrição')}}</span>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Conteúdo">{{old('description')}}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            
            <div class="mt-3">
                <button type="submit" class="btn btn-submit">{{__('Enviar')}}</button>
            </div>
            
        </form>
    </div>
@endsection