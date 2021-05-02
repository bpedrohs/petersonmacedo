@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <nav class="breadcrumb-dashboard" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.project.index')}}">Projetos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Criar</li>
            </ol>
        </nav>

        <form action="{{ route('admin.project.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <h1 class="fs-3 mb-3">{{__('Criar projeto')}}</h1>

            <div class="mb-3">
                <label for="title">{{__('Nome do projeto')}}</label>
                <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Título" value="{{old('title')}}">
                @error('title')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <span>{{__('Resumo')}}</span>
                <textarea class="form-control" name="resume" placeholder="Conteúdo">{{old('resume')}}</textarea>
            </div>

            <div class="mb-3">
                <span>{{__('Texto completo')}}</span>
                <textarea class="form-control @error('text') is-invalid @enderror" name="text" placeholder="Conteúdo">{{old('text')}}</textarea>
                @error('text')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3 d-flex flex-column">
                <label for="">{{__('Imagens do projeto')}}</label>
                <input class="form-control @error('photos') is-invalid @enderror" type="file" name="photos[]" id="picture" multiple>
                @error('photos')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>{{__('Data')}}</label>
                <input class="form-control" name="date" placeholder="Data do projeto" value="{{old('text')}}">
            </div>

            <div class="mb-3">
                <label for="">Categoria</label>
                <select id="" name="categories[]" class="form-control @error('categories') is-invalid @enderror" multiple>
                    <option value="" selected="selected" disabled>{{__('Selecione')}}</option>

                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>

                @error('categories')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-submit">{{__('Enviar')}}</button>
            </div>
                
        </form>
    </div>
@endsection