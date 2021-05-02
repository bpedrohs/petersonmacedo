@extends('layouts.dashboard')

@section('content')
    <form action="{{route('admin.project.update', ['project' => $project->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <nav class="breadcrumb-dashboard" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">{{__('Home')}}</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.project.index')}}">{{__('Projetos')}}</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{__('Editar')}}</li>
                </ol>
            </nav>
            <h1 class="fs-3 mb-3">{{__('Editar projeto')}}</h1>
        </div>

        <div class="mb-3">
            <label for="title">{{__('Nome do projeto')}}</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" placeholder="Título" value="{{$project->title}}">
            @error('title')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <div class="mb-3">
            <span>{{__('Resumo')}}</span>
            <textarea class="form-control" name="resume" placeholder="Conteúdo">{{$project->resume}}</textarea>
        </div>

        <div class="mb-3">
            <span>{{__('Texto completo')}}</span>
            <textarea class="form-control @error('text') is-invalid @enderror" name="text" placeholder="Conteúdo">{{$project->text}}</textarea>
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
            <input class="form-control" name="date" placeholder="Data do projeto" value="{{$project->date}}">
        </div>

        <div class="mb-3">
            <label for="category">{{__('Categoria')}}</label>
            <select id="categories" name="categories[]" class="form-control @error('categories') is-invalid @enderror" multiple>
                <option value="" selected="selected" disabled>Selecione</option>

                @foreach($categories as $category)
                    <option value="{{ $category->id }}" @if ($project->categories->contains($category)) selected @endif> {{ $category->name }}
                    </option>
                @endforeach

            </select>

            @error('categories')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-submit">{{__('Atualizar')}}</button>
        </div>
    </form>

    @if ($project->photos->count() > 1)
        <hr>
    @endif
    
    @if ($project->photos->count() > 1)
        <div class="row">
            @foreach ($project->photos as $photo)
                <div class="col-3 text-center">
                    <img src="{{asset('storage/' . $photo->photo)}}" alt="" srcset="" class="img-fluid mb-3" height="200">
                    <form action="{{route('admin.project.remove.photo')}}" method="post">
                        @csrf
                        <input type="hidden" name="photoName" value="{{$photo->photo}}">
                        <button type="submit" class="btn btn-danger">{{__('Remover')}}</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@endsection


        